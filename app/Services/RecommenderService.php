<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class RecommenderService
{
    /**
     * Recalcula y guarda los 20 usuarios más similares a $userA a partir de sus ratings.
     *
     * Idea:
     * - Dos usuarios son comparables si han puntuado juegos en común.
     * - Si puntúan parecido en esos juegos comunes, su similitud es alta.
     * - Si sólo comparten 2 o 3 juegos, su similitud es poco fiable y se penaliza (shrink).
     */
    public function recomputeSimilaritiesForUser(int $userA): void
    {
        $minRatings     = 5;    // mínimo de ratings para empezar
        $minCommon      = 3;    // mínimo de juegos en común para comparar
        $topK           = 20;   // cuántos similares guarda
        $shrink         = 5;    // penaliza solapes pequeños
        $minSimilarity  = 0.25; // umbral mínimo de similitud 

        // 1) Si tiene pocos ratings, borra (evita ruido y similitudes viejas)
        $count = DB::table('ratings')->where('user_id', $userA)->count();
        if ($count < $minRatings) {
            DB::table('similarities')->where('user_a_id', $userA)->delete();
            return;
        }

        // 2) Top similares con penalización por pocos juegos en común
        //    2.1) Empareja ratings por juego (coincidencias en juegos):
        //        - ON r1.game_id = r2.game_id
        //
        //    2.2) Mide cuántos juegos comparten A y B:
        //        - COUNT(*) AS common_games
        //
        //    2.3) Mide la diferencia media de puntuación en esos juegos comunes:
        //        - AVG(ABS(r1.score - r2.score))
        //
        //    2.4) Convierte la diferencia a similitud base en [0..1] (baseSimilarity = 1 - (diff_media / diff_max)):
        //        - (1 - (AVG(ABS(r1.score - r2.score)) / 9))
        //
        //    2.5) Penaliza solapes pequeños por poca evidencia (common / (common + shrink)):
        //        - (COUNT(*) / (COUNT(*) + shrink))
        //
        //    2.6) Similaridad final (similaridad_base * factor_shrink):
        //        - ( (1 - (AVG(ABS(r1.score - r2.score)) / 9)) * (COUNT(*) / (COUNT(*) + ?)) ) AS similarity
        //
        //    2.7) Excluye comparaciones poco fiables (mínimo de juegos en común):
        //        - HAVING COUNT(*) >= minCommon
        //
        //    2.8) Excluye a los usuarios con una similitud por debajo de 0.25:
        //        - WHERE t.similarity >= 0.25
        //
        //    2.9) Coge los TOP 20 más similares:
        //        - ORDER BY similarity DESC, common_games DESC
        //          LIMIT $topK
        $sql = "
            SELECT * FROM (
                SELECT
                    r2.user_id AS user_b_id,
                    COUNT(*) AS common_games,
                    (
                     (1 - (AVG(ABS(r1.score - r2.score)) / 9))
                      * (COUNT(*) / (COUNT(*) + ?))
                    ) AS similarity
                FROM ratings r1
                JOIN ratings r2
                ON r1.game_id = r2.game_id
                AND r2.user_id <> r1.user_id
                WHERE r1.user_id = ?
                GROUP BY r2.user_id
                HAVING COUNT(*) >= ?
            ) t
            WHERE t.similarity >= ?
            ORDER BY t.similarity DESC, t.common_games DESC
            LIMIT $topK
        ";

        $rows = DB::select($sql, [$shrink, $userA, $minCommon, $minSimilarity]);

        $now = now();

        $upserts = array_map(fn($r) => [
            'user_a_id'    => $userA,
            'user_b_id'    => (int) $r->user_b_id,
            'common_games' => (int) $r->common_games,
            'similarity'   => max(0, min(1, (float) $r->similarity)),
            'updated_at'   => $now,
        ], $rows);

        // 3) Si no hay candidatos, borra
        if (empty($upserts)) {
            DB::table('similarities')->where('user_a_id', $userA)->delete();
            return;
        }

        // 4) Upsert y deja solo el top actual
        DB::table('similarities')->upsert(
            $upserts,
            ['user_a_id', 'user_b_id'],
            ['common_games', 'similarity', 'updated_at']
        );

        $keepIds = array_column($upserts, 'user_b_id');
        DB::table('similarities')
            ->where('user_a_id', $userA)
            ->whereNotIn('user_b_id', $keepIds)
            ->delete();
    }

    /**
     * Recalcula y guarda recomendaciones de juegos para un usuario.
     *
     * Recomienda juegos combinando 3 señales:
     *   1) VECINOS ("collab"): usuarios similares han puntuado alto el juego.
     *   2) TAXONOMÍA ("tax"): el juego contiene tags/genres que aparecer en los juegos bien puntuados por el usuario.
     *   3) ASPECTS (solo apoyo): los juegos que bien puntuados suelen tener ciertos aspects altos (story, gameplay, etc).
     *
     * La idea es una recomendación mezclada con fallback: se prioriza que existan 2 señales (collab + tax),
     * pero si falta una señal se permite recomendar con la otra.
     * 
     * Los 3 niveles (tiers) al construir el Top N son los siguientes:
     *   1) tier1: collab + tax
     *   2) tier2: solo collab
     *   3) tier3: solo tax
     *
     * En cuanto a ASPECTS, no dejamos que empuje recomendaciones fuera de los géneros preferidos por el usuario (gating).
     * Ejemplo: si al usuario le gusta historia (ASPECT) pero odia terror (GENRE), no potenciamos un juego de terror solo por tener buena historia.
     *
     */
    public function recomputeRecommendationsForUser(int $userId): void
    {
        $cfg = [
            'minRatings' => 5,      // min de rating para empezar a recomendar
            'topN'       => 60,     // cuántas recomendaciones guarda
            'topCands'   => 200,    // cuántos candidatos coge por señal
            'likeScore'  => 8,      // a partir de qué nota se considera "me gusta"
            'wCollab'    => 0.70,   // pesos para mezclar las señales
            'wAspect'    => 0.20,
            'wTax'       => 0.10,
            'topTags'    => 20,     // cuántos tags/genres favoritos considera
            'topGenres'  => 15,
            'minTaxN'    => 2,      // min de apariciones del tag/genre en juego (evita que un tag/genre aparezca por causalidad en un solo juego)
            'minTaxForAspect' => 0.15,  // gating: si tax es menor, aspects no influye
        ];

        // Helpers para normalizar
        $clamp01   = fn(float $x): float => max(0.0, min(1.0, $x)); // fuerza a [0..1]
        $norm1to10 = fn($v): ?float => $v === null ? null : $clamp01((((float)$v) - 1.0) / 9.0); // convierte escala 1..10 a 0..1

        // 1) Si tiene pocos ratings, borra (evita ruido y similitudes viejas)
        $count = DB::table('ratings')->where('user_id', $userId)->count();
        if ($count < $cfg['minRatings']) {
            DB::table('recommendations')->where('user_id', $userId)->delete();
            return;
        }

        // 2) Excluye juegos ya puntuados o reseñados por el usuario
        $excludedSet = (function () use ($userId) {
            $rated = DB::table('ratings')->where('user_id', $userId)->pluck('game_id')->all();
            $reviewed = DB::table('reviews')
                ->where('user_id', $userId)
                ->whereNull('deleted_at')
                ->pluck('game_id')
                ->all();

            $all = array_values(array_unique(array_merge($rated, $reviewed)));
            return array_fill_keys($all, true);
        })();

        // 2) Señal VECINOS
        //    2.1) Coge ratings de usuarios similares:
        //        - JOIN ratings r ON r.user_id = s.user_b_id
        //
        //    2.2) Solo cuenta si el vecino ha puntuado alto:
        //        - WHERE r.score >= likeScore
        //
        //    2.3) Excluye juegos ya vistos por el usuario:
        //        - r.game_id NOT IN
        //
        //    2.4) Se hace una media ponderada por similitud:
        //        - collab = SUM(similarity * ((score-1)/9)) / SUM(similarity)
        //
        //    2.5) Se cuenta cuántos ratings de vecinos lo sustentan:
        //        - COUNT(*) AS support
        [$collabMap, $candsCollab] = (function () use ($userId, $cfg, $clamp01) {
            $sql = "
            SELECT
                r.game_id AS game_id,
                (SUM(s.similarity * ((r.score - 1) / 9)) / NULLIF(SUM(s.similarity), 0)) AS collab_score,
                COUNT(*) AS support
            FROM similarities s
            JOIN ratings r ON r.user_id = s.user_b_id
            WHERE s.user_a_id = ?
              AND r.score >= ?
              AND r.game_id NOT IN (
                    SELECT game_id FROM ratings WHERE user_id = ?
                    UNION
                    SELECT game_id FROM reviews WHERE user_id = ? AND deleted_at IS NULL
              )
            GROUP BY r.game_id
            ORDER BY collab_score DESC, support DESC
            LIMIT {$cfg['topCands']}
        ";

            $rows = DB::select($sql, [$userId, $cfg['likeScore'], $userId, $userId]);

            $map = [];
            $cands = [];
            foreach ($rows as $r) {
                $gid = (int)$r->game_id;
                $map[$gid] = [
                    'score'   => $clamp01((float)$r->collab_score),
                    'support' => (int)$r->support,
                ];
                $cands[] = $gid;
            }

            return [$map, $cands];
        })();

        // 3) Señal ASPECTS (solo reordena candidatos)
        //    3.1) Mira solo juegos que el usuario puntúa alto:
        //        - (>= likeScore).
        //    3.2) Une con los aspects del juego:
        //        - JOIN aspects a ON a.game_id = rt.game_id
        //
        //    3.3) Promedia cada aspecto en los juegos gustados:
        //        - AVG(a.story_avg) AS story
        //
        //    3.4) Normaliza 1..10 a [0..1]:
        //        - norm = (avg - 1) / 9
        //
        //    3.5) Convierte a pesos que suman 1 (importancia):
        //        - w_k = norm_k / SUM(norm_k)
        $prefs = (function () use ($userId, $cfg, $norm1to10) {
            $sql = "
            SELECT
                AVG(a.story_avg)       AS story,
                AVG(a.gameplay_avg)    AS gameplay,
                AVG(a.exploration_avg) AS exploration,
                AVG(a.art_avg)         AS art,
                AVG(a.difficulty_avg)  AS difficulty
            FROM ratings rt
            JOIN aspects a ON a.game_id = rt.game_id
            WHERE rt.user_id = ?
              AND rt.score >= ?
        ";
            $row = DB::select($sql, [$userId, $cfg['likeScore']])[0] ?? null;
            if (!$row) return [];

            $raw = [
                'story'       => $norm1to10($row->story),
                'gameplay'    => $norm1to10($row->gameplay),
                'exploration' => $norm1to10($row->exploration),
                'art'         => $norm1to10($row->art),
                'difficulty'  => $norm1to10($row->difficulty),
            ];

            $tmp = [];
            foreach ($raw as $k => $v) {
                if ($v !== null) $tmp[$k] = $v;
            }

            $sum = array_sum($tmp);
            if ($sum <= 0) return [];

            foreach ($tmp as $k => $v) $tmp[$k] = $v / $sum;
            return $tmp;
        })();

        // 4) Señal TAGS/GÉNEROS
        //    4.1) Afinidad por tag/genre:
        //        - aff = AVG((score-1)/9)
        //
        //    4.2) Exige una evidencia mínima para que no sea un tag/genre que aparezca por casualidad:
        //        - HAVING COUNT(*) >= minTaxN
        //
        //    4.3) Se cuentan las coincidencias (hits) y se ordena:
        //        -  SELECT game_id, COUNT(*) hits ... GROUP BY game_id ORDER BY hits DESC
        //        -  tags: HAVING hits >= 2; genres: HAVING hits >= 1
        [$tagAff, $tagIds] = (function () use ($userId, $cfg, $clamp01) {
            $sql = "
            SELECT gt.tag_id AS id, AVG((r.score - 1) / 9) AS aff, COUNT(*) AS n
            FROM ratings r
            JOIN game_tag gt ON gt.game_id = r.game_id
            WHERE r.user_id = ?
              AND r.score >= ?
            GROUP BY gt.tag_id
            HAVING COUNT(*) >= {$cfg['minTaxN']}
            ORDER BY aff DESC, n DESC
            LIMIT {$cfg['topTags']}
        ";
            $rows = DB::select($sql, [$userId, $cfg['likeScore']]);

            $aff = [];
            $ids = [];
            foreach ($rows as $t) {
                $id = (int)$t->id;
                $aff[$id] = $clamp01((float)$t->aff);
                $ids[] = $id;
            }
            return [$aff, $ids];
        })();

        [$genreAff, $genreIds] = (function () use ($userId, $cfg, $clamp01) {
            $sql = "
            SELECT gg.genre_id AS id, AVG((r.score - 1) / 9) AS aff, COUNT(*) AS n
            FROM ratings r
            JOIN game_genre gg ON gg.game_id = r.game_id
            WHERE r.user_id = ?
              AND r.score >= ?
            GROUP BY gg.genre_id
            HAVING COUNT(*) >= {$cfg['minTaxN']}
            ORDER BY aff DESC, n DESC
            LIMIT {$cfg['topGenres']}
        ";
            $rows = DB::select($sql, [$userId, $cfg['likeScore']]);

            $aff = [];
            $ids = [];
            foreach ($rows as $g) {
                $id = (int)$g->id;
                $aff[$id] = $clamp01((float)$g->aff);
                $ids[] = $id;
            }
            return [$aff, $ids];
        })();

        // Recoge juegos con más coincidencias con los tags/genres top del usuario, ordenador por fuerza de coincidencia (hits)
        $candsContent = [];
        if (!empty($tagIds)) {
            $candsContent = array_merge(
                $candsContent,
                DB::table('game_tag')
                    ->select('game_id', DB::raw('COUNT(*) as hits'))
                    ->whereIn('tag_id', $tagIds)
                    ->groupBy('game_id')
                    ->havingRaw('COUNT(*) >= 2') // fuerza mínima por tags
                    ->orderByDesc('hits')
                    ->limit($cfg['topCands'])
                    ->pluck('game_id')
                    ->all()
            );
        }

        if (!empty($genreIds)) {
            $candsContent = array_merge(
                $candsContent,
                DB::table('game_genre')
                    ->select('game_id', DB::raw('COUNT(*) as hits'))
                    ->whereIn('genre_id', $genreIds)
                    ->groupBy('game_id')
                    ->havingRaw('COUNT(*) >= 1') // genres son menos numerosos
                    ->orderByDesc('hits')
                    ->limit($cfg['topCands'])
                    ->pluck('game_id')
                    ->all()
            );
        }

        // 5) Mezcla los candidatos de cada señal con fallback (por si una de ellas es nula)
        $candidateIds = array_values(array_unique(array_merge($candsCollab, $candsContent)));
        $candidateIds = array_values(array_filter(
            $candidateIds,
            fn($gid) => !isset($excludedSet[$gid])
        ));

        if (empty($candidateIds)) {
            DB::table('recommendations')->where('user_id', $userId)->delete();
            return;
        }

        // 6) Carga los aspects, los tags y los genres de los juegos candidatos
        $aspectsRows = DB::table('aspects')->whereIn('game_id', $candidateIds)->get()->keyBy('game_id');

        $gameTags = [];
        foreach (DB::table('game_tag')->whereIn('game_id', $candidateIds)->get(['game_id', 'tag_id']) as $r) {
            $gameTags[(int)$r->game_id][] = (int)$r->tag_id;
        }

        $gameGenres = [];
        foreach (DB::table('game_genre')->whereIn('game_id', $candidateIds)->get(['game_id', 'genre_id']) as $r) {
            $gameGenres[(int)$r->game_id][] = (int)$r->genre_id;
        }

        // 7) Helpers de scoring
        // Media de afinidades del juego que esten entre las afinidades del usuario (si no comparte tags/genres favoritos devuelve null)
        $avgAff = function (array $ids, array $aff) use ($clamp01): ?float {
            if (empty($ids) || empty($aff)) return null;
            $sum = 0.0;
            $n = 0;
            foreach ($ids as $id) {
                if (!isset($aff[$id])) continue;
                $sum += (float)$aff[$id];
                $n++;
            }
            return $n > 0 ? $clamp01($sum / $n) : null;
        };

        // Promedia aspectos del juego usando las preferencias del usuario (si no hay preferencias o aspects devuelve null)
        $aspectScore = function ($aRow) use ($prefs, $norm1to10, $clamp01): ?float {
            if (!$aRow || empty($prefs)) return null;

            $map = [
                'story'       => $aRow->story_avg,
                'gameplay'    => $aRow->gameplay_avg,
                'exploration' => $aRow->exploration_avg,
                'art'         => $aRow->art_avg,
                'difficulty'  => $aRow->difficulty_avg,
            ];

            $num = 0.0;
            $den = 0.0;
            foreach ($prefs as $k => $w) {
                $v = $norm1to10($map[$k] ?? null);
                if ($v === null) continue;
                $num += $w * $v;
                $den += $w;
            }
            return $den > 0 ? $clamp01($num / $den) : null;
        };

        // Combina señal de tag y genres y media las que existan (si no comparte tags/genres favoritos del usuario devuelve null)
        $taxonomyScore = function (int $gid) use ($gameTags, $gameGenres, $tagAff, $genreAff, $avgAff, $clamp01): ?float {
            $tagScore   = $avgAff($gameTags[$gid] ?? [], $tagAff);
            $genreScore = $avgAff($gameGenres[$gid] ?? [], $genreAff);

            if ($tagScore === null && $genreScore === null) return null;

            $sum = 0.0;
            $n = 0;
            if ($tagScore !== null) {
                $sum += $tagScore;
                $n++;
            }
            if ($genreScore !== null) {
                $sum += $genreScore;
                $n++;
            }

            return $clamp01($sum / $n);
        };

        // 8) Scoring final
        $tier1 = []; // collab + tax 
        $tier2 = []; // solo collab 
        $tier3 = []; // solo tax

        foreach ($candidateIds as $gid) {
            // Señal de VECINOS
            $collab  = $collabMap[$gid]['score'] ?? null; // 0..1 o null
            $support = $collabMap[$gid]['support'] ?? 0; // nº de vecinos

            // Señal de TAXONOMÍAS
            $tax  = $taxonomyScore((int)$gid); // 0..1 o null

            // Señal de ASPECTS (gateada)
            $aRow = $aspectsRows[$gid] ?? null;
            // Si no hay taxonomía mínima, no deja que aspects influya
            // Por ejemplo: Si al usuario le gustan los juegos con historia (aspect) pero odia los juegos de terror (tag/genre), no queremos un juego de terror en recomendaciones por muy buena historia que tenga
            $aspect = null;
            if ($tax !== null && $tax >= $cfg['minTaxForAspect']) {
                $aspect = $aspectScore($aRow);
            }

            // Decide tier
            if ($collab !== null && $tax !== null) {
                $tier = 1; // mezcla ideal
            } elseif ($collab !== null) {
                $tier = 2; // vecinos
            } elseif ($tax !== null) {
                $tier = 3; // contenido
            } else {
                continue; // no hay señales
            }

            // Mezcla de señales con pesos: solo suma el peso si la señal no es null y vuelve a normalizar dividiendo por la suma de pesos usados (así, si falta una señal, el score sigue 0..1 y es comparable)
            $num = 0.0;
            $den = 0.0;

            if ($collab !== null) {
                $num += $cfg['wCollab'] * $collab;
                $den += $cfg['wCollab'];
            }
            if ($aspect !== null) {
                $num += $cfg['wAspect'] * $aspect;
                $den += $cfg['wAspect'];
            }
            if ($tax !== null) {
                $num += $cfg['wTax']    * $tax;
                $den += $cfg['wTax'];
            }

            if ($den <= 0) continue;

            $final = $clamp01($num / $den);

            // Guarda el desglose de señales en JSON para tener un manejar de dónde viene el peso de la recomendación
            $reason = [
                'tier'              => $tier, // opcional
                'collab'            => $collab,
                'support_neighbors' => $support,
                'aspect'            => $aspect,
                'tag_genre'         => $tax,
            ];

            $row = [
                'user_id'    => $userId,
                'game_id'    => (int)$gid,
                'score'      => $final,
                'reason'     => json_encode($reason),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if ($tier === 1)      $tier1[] = $row;
            elseif ($tier === 2)  $tier2[] = $row;
            else                  $tier3[] = $row;
        }

        // Si no sale nada, borra
        if (empty($tier1) && empty($tier2) && empty($tier3)) {
            DB::table('recommendations')->where('user_id', $userId)->delete();
            return;
        }

        // Ordena internamente cada tier por score descendente
        $sortDesc = fn($a, $b) => $b['score'] <=> $a['score'];
        usort($tier1, $sortDesc);
        usort($tier2, $sortDesc);
        usort($tier3, $sortDesc);

        // Construye el Top N con prioridad por tiers
        $rows = [];
        $need = $cfg['topN'];

        $take = array_slice($tier1, 0, $need);
        $rows = array_merge($rows, $take);
        $need -= count($take);

        if ($need > 0) {
            $take = array_slice($tier2, 0, $need);
            $rows = array_merge($rows, $take);
            $need -= count($take);
        }

        if ($need > 0) {
            $take = array_slice($tier3, 0, $need);
            $rows = array_merge($rows, $take);
        }

        // Se borran las recomendaciones previas del usuario y se inserta el nuevo Top N
        DB::transaction(function () use ($userId, $rows) {
            DB::table('recommendations')->where('user_id', $userId)->delete();
            DB::table('recommendations')->insert($rows);
        });
    }

}
