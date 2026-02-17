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

        // 1) Si tiene pocos ratings, limpia (cualquier similitud es ruido y además evita similitudes viejas)
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

        // 3) Si no hay candidatos, limpia
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
     * Recalcula recomendaciones para un usuario y guarda un TOP N en la tabla recommendations.
     *
     * Vías que mezcla:
     *  1) VECINOS: usuarios similares han puntuado alto el juego (y el usuario aún no lo ha visto)
     *  2) ASPECTS: al usuario le suelen gustar juegos con X aspectos altos (story, gameplay,...)
     *  3) TAG/GENRE: al usuario le suelen gustar juegos con ciertos tags/géneros
     *
     */
    public function recomputeRecommendationsForUser(int $userId): void
    {
        $minRatings = 5;     // no hay recomendaciones si el usuario tiene menos
        $topN       = 50;    // cuántas recomendaciones guarda la tabla
        $topCands   = 200;   // cuántos candidatos coge de cada vía
        $likeScore  = 8;     // mínimo para considerarlo

        // 0) Si tiene pocos ratings, no hay base y limpia al usuario de la tabla
        $count = DB::table('ratings')->where('user_id', $userId)->count();
        if ($count < $minRatings) {
            DB::table('recommendations')->where('user_id', $userId)->delete();
            return;
        }

        // 1) Excluye juegos ya puntuados o reseñados
        $excluded = array_unique(array_merge(
            DB::table('ratings')->where('user_id', $userId)->pluck('game_id')->all(),
            DB::table('reviews')->where('user_id', $userId)->whereNull('deleted_at')->pluck('game_id')->all()
        ));
        $excludedSet = array_flip($excluded);

        // 2) Vía VECINOS: similares + ratings altos
        $sqlCollab = "
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
            LIMIT $topCands
        ";

        $collabRows = DB::select($sqlCollab, [$userId, $likeScore, $userId, $userId]);

        $collabMap = [];
        $candidateIds = [];

        foreach ($collabRows as $r) {
            $gid = (int) $r->game_id;
            $collabMap[$gid] = [
                'score'   => max(0, min(1, (float) $r->collab_score)),
                'support' => (int) $r->support,
            ];
            $candidateIds[] = $gid;
        }

        // 3) Vía ASPECTS: promedio de aspects de los juegos que puntúa alto
        $sqlPrefs = "
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
        $prefsRow = DB::select($sqlPrefs, [$userId, $likeScore]);
        $prefsRow = $prefsRow[0] ?? null;

        // Normaliza y convierte en pesos
        $prefs = [];     // prefs = pesos que suman 1.0 (más peso = más importante ese aspecto)
        if ($prefsRow) {
            $raw = [
                'story'      => $prefsRow->story,
                'gameplay'   => $prefsRow->gameplay,
                'exploration' => $prefsRow->exploration,
                'art'        => $prefsRow->art,
                'difficulty' => $prefsRow->difficulty,
            ];

            // normaliza cada aspecto 1..10 a 0..1
            $tmp = [];
            foreach ($raw as $k => $v) {
                if ($v === null) continue;
                $tmp[$k] = max(0.0, min(1.0, (((float)$v) - 1.0) / 9.0));
            }

            // convierte en pesos que sumen 1
            $sum = array_sum($tmp);
            if ($sum > 0) {
                foreach ($tmp as $k => $v) $prefs[$k] = $v / $sum;
            }
        }

        // 4) Afinidades por TAG y GÉNERO: qué tags y géneros aparecen en los juegos que puntúa alto
        $sqlTagAff = "
            SELECT gt.tag_id AS id, AVG((r.score - 1) / 9) AS aff, COUNT(*) AS n
            FROM ratings r
            JOIN game_tag gt ON gt.game_id = r.game_id
            WHERE r.user_id = ?
              AND r.score >= ?
            GROUP BY gt.tag_id
            HAVING COUNT(*) >= 2
            ORDER BY aff DESC, n DESC
            LIMIT 20
        ";
        $tagRows = DB::select($sqlTagAff, [$userId, $likeScore]);
        $tagAff = [];
        $tagIds = [];
        foreach ($tagRows as $t) {
            $id = (int) $t->id;
            $tagAff[$id] = max(0, min(1, (float) $t->aff));
            $tagIds[] = $id;
        }

        $sqlGenreAff = "
            SELECT gg.genre_id AS id, AVG((r.score - 1) / 9) AS aff, COUNT(*) AS n
            FROM ratings r
            JOIN game_genre gg ON gg.game_id = r.game_id
            WHERE r.user_id = ?
              AND r.score >= ?
            GROUP BY gg.genre_id
            HAVING COUNT(*) >= 2
            ORDER BY aff DESC, n DESC
            LIMIT 15
        ";
        $genreRows = DB::select($sqlGenreAff, [$userId, $likeScore]);
        $genreAff = [];
        $genreIds = [];
        foreach ($genreRows as $g) {
            $id = (int) $g->id;
            $genreAff[$id] = max(0, min(1, (float) $g->aff));
            $genreIds[] = $id;
        }

        // Juegos que tengan esos tags/géneros top
        if (!empty($tagIds)) {
            $ids = DB::table('game_tag')->whereIn('tag_id', $tagIds)->limit($topCands)->pluck('game_id')->all();
            $candidateIds = array_merge($candidateIds, $ids);
        }
        if (!empty($genreIds)) {
            $ids = DB::table('game_genre')->whereIn('genre_id', $genreIds)->limit($topCands)->pluck('game_id')->all();
            $candidateIds = array_merge($candidateIds, $ids);
        }

        // Excluir juegos duplicados y vistos
        $candidateIds = array_values(array_unique(array_filter($candidateIds, fn($gid) => !isset($excludedSet[$gid]))));

        if (empty($candidateIds)) {
            DB::table('recommendations')->where('user_id', $userId)->delete();
            return;
        }

        // 5) Cargar datos de candidatos para puntuar: aspects, tags y genres
        $aspectsRows = DB::table('aspects')
            ->whereIn('game_id', $candidateIds)
            ->get()
            ->keyBy('game_id');

        $gameTags = [];
        foreach (DB::table('game_tag')->whereIn('game_id', $candidateIds)->get(['game_id', 'tag_id']) as $r) {
            $gameTags[(int)$r->game_id][] = (int)$r->tag_id;
        }

        $gameGenres = [];
        foreach (DB::table('game_genre')->whereIn('game_id', $candidateIds)->get(['game_id', 'genre_id']) as $r) {
            $gameGenres[(int)$r->game_id][] = (int)$r->genre_id;
        }

        // HELPERS
        $aspectScoreFn = function ($aRow) use ($prefs): ?float {
            if (!$aRow || empty($prefs)) return null;

            $map = [
                'story'      => $aRow->story_avg,
                'gameplay'   => $aRow->gameplay_avg,
                'exploration' => $aRow->exploration_avg,
                'art'        => $aRow->art_avg,
                'difficulty' => $aRow->difficulty_avg,
            ];

            $num = 0.0;
            $den = 0.0;
            foreach ($prefs as $k => $w) {
                $v = $map[$k] ?? null;
                if ($v === null) continue;
                $vNorm = max(0.0, min(1.0, (((float)$v) - 1.0) / 9.0));
                $num += $w * $vNorm;
                $den += $w;
            }
            return $den > 0 ? max(0.0, min(1.0, $num / $den)) : null;
        };

        $affScoreFn = function (array $ids, array $aff): ?float {
            if (empty($ids) || empty($aff)) return null;
            $sum = 0.0;
            $n = 0;
            foreach ($ids as $id) {
                if (!isset($aff[$id])) continue;
                $sum += (float)$aff[$id];
                $n++;
            }
            return $n > 0 ? max(0.0, min(1.0, $sum / $n)) : null;
        };

        // 6) Puntuar y guardar en el top 50
        $rows = [];

        foreach ($candidateIds as $gid) {
            // Vía VECINOS
            $collab = $collabMap[$gid]['score'] ?? null;
            $support = $collabMap[$gid]['support'] ?? 0;

            // Vía ASPECTS
            $aRow = $aspectsRows[$gid] ?? null;
            $aspect = $aspectScoreFn($aRow);

            // Vía TAGS/GENRES
            $tagS   = $affScoreFn($gameTags[$gid] ?? [], $tagAff);
            $genreS = $affScoreFn($gameGenres[$gid] ?? [], $genreAff);
            $tg = null;
            if ($tagS !== null || $genreS !== null) {
                $tg = (($tagS ?? 0) + ($genreS ?? 0)) / (($tagS !== null ? 1 : 0) + ($genreS !== null ? 1 : 0));
            }

            // Mezcla final
            $num = 0.0;
            $den = 0.0;

            if ($collab !== null) {
                $num += 0.70 * $collab;
                $den += 0.70;
            }
            if ($aspect !== null) {
                $num += 0.20 * $aspect;
                $den += 0.20;
            }
            if ($tg !== null) {
                $num += 0.10 * $tg;
                $den += 0.10;
            }

            if ($den <= 0) continue; // si no aplica ninguna vía, no hay recomendaciones

            $final = max(0.0, min(1.0, $num / $den));

            // Guarda el por qué de las recomendaciones (la VÍA)
            $reason = [
                'collab' => $collab,
                'support_neighbors' => $support,
                'aspect' => $aspect,
                'tag_genre' => $tg,
            ];

            $rows[] = [
                'user_id' => $userId,
                'game_id' => $gid,
                'score'   => $final,
                'reason'  => json_encode($reason),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Borra al usuario de la tabla si no ha salido nada
        if (empty($rows)) {
            DB::table('recommendations')->where('user_id', $userId)->delete();
            return;
        }

        // Ordena por score descendente y recorta top 50
        usort($rows, fn($a, $b) => $b['score'] <=> $a['score']);
        $rows = array_slice($rows, 0, $topN);

        // upsert de una fila por usuario y juego
        DB::table('recommendations')->upsert(
            $rows,
            ['user_id', 'game_id'],
            ['score', 'reason', 'updated_at']
        );

        // Borra recomendaciones viejas y deja solo las actuales del top
        $keepIds = array_column($rows, 'game_id');
        DB::table('recommendations')
            ->where('user_id', $userId)
            ->whereNotIn('game_id', $keepIds)
            ->delete();
    }
}
