<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Game;
use App\Models\Genre;
use App\Models\Tag;
use App\Models\Similarity;
use App\Models\User;
use App\Models\Recommendation;
use Carbon\CarbonInterface;

class RecommendationService
{
   /* JUGADORES AFINES (SIMILARITIES) */

    /**
     * Recalcula y guarda los usuarios más similares al usuario a partir de sus ratings.
     *
     * - Compara al usuario A con cada B mirando solo los juegos en común.
     * - La similitud es alto si en esos juegos puntúan parecido.
     * - Si comparten pocos juegos, la similitud es poco fiable y penaliza (shrink).
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

        /*
         * 2) Calcula similitudes:
         *
         * - r1 = ratings de A
         * - r2 = ratings del resto (B)
         * - JOIN por game_id - solo juegos en común
         * - common_games = COUNT(*) - juegos compartidos
         * - avg_diff = AVG(ABS(r1.score - r2.score)) - diferencia media de puntuación
         *
         * Convierte a similitud base [0..1]:
         *   base = 1 - (avg_diff / 9) - 9 porque score va del 1 al 10 (máx diferencia 9)
         *
         * Penaliza pocos juegos en común (shrink):
         *   factor = common / (common + shrink)
         *
         * Similitud final:
         *   similarity = base * factor
         */
        $sql = "
            SELECT *
            FROM (
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
     * Devuelve los datos de los jugadores afines. 
     */
    public function buildSoulmates(int $userId, int $limit = 12): array
    {
        $sims = Similarity::query()
            ->where('user_a_id', $userId)
            ->with(['userB:id,username,name,avatar_url'])
            ->orderByDesc('similarity')
            ->orderByDesc('common_games')
            ->limit($limit)
            ->get(['user_b_id', 'common_games', 'similarity', 'updated_at']);

        $out = [];

        foreach ($sims as $sim) {
            $user = $sim->userB;
            if (!$user) continue;

            $out[] = [
                'id'           => $user->id,
                'username'     => $user->username,
                'name'         => $user->name,
                'avatar_url'   => $user->avatar_url,
                'similarity'   => (float) $sim->similarity,
                'common_games' => (int) $sim->common_games,
                'updated_at'   => $sim->updated_at,
            ];
        }

        return $out;
    }

    /**
     * Devuelve el panel para comparar al usuario sus jugadores afines.
     */
    public function buildSoulmateCompare(int $userId, int $userBId, array $opts = []): ?array
    {
        $limit = isset($opts['limit']) ? (int) $opts['limit'] : 12;
        $limit = max(3, min(50, $limit));

        $likeScore = isset($opts['like_score']) ? (int) $opts['like_score'] : 8;
        $likeScore = max(1, min(10, $likeScore));

        $userB = User::query()
            ->select('id', 'username', 'name', 'avatar_url')
            ->where('id', $userBId)
            ->first();

        if (!$userB) return null;

        // Valida que exista en la tabla Similarities
        $sim = Similarity::query()
            ->where('user_a_id', $userId)
            ->where('user_b_id', $userBId)
            ->first(['common_games', 'similarity', 'updated_at']);

        if (!$sim) return null;

        // Notas en común
        $baseJoin = DB::table('ratings as r1')
            ->join('ratings as r2', function ($join) use ($userBId) {
                $join->on('r1.game_id', '=', 'r2.game_id')
                    ->where('r2.user_id', '=', $userBId);
            })
            ->where('r1.user_id', '=', $userId);

        $stats = (clone $baseJoin)
            ->selectRaw('
                COUNT(*) as common_total,
                AVG(ABS(r1.score - r2.score)) as avg_diff,
                AVG(r1.score) as your_avg,
                AVG(r2.score) as their_avg
            ')
            ->first();

        $commonGames = (clone $baseJoin)
            ->join('games as g', 'g.id', '=', 'r1.game_id')
            ->select([
                'g.id',
                'g.title',
                'g.slug',
                'g.cover_url',
                'g.release_date',
                DB::raw('r1.score as your_score'),
                DB::raw('r2.score as their_score'),
                DB::raw('ABS(r1.score - r2.score) as diff'),
            ])
            ->orderBy('diff')
            ->orderByDesc(DB::raw('(r1.score + r2.score)'))
            ->limit($limit)
            ->get();

        // Aspectos (medias por usuario)
        $rowA = DB::table('reviews as rv')
            ->join('review_aspect as ra', 'ra.review_id', '=', 'rv.id')
            ->where('rv.user_id', $userId)
            ->selectRaw('
                AVG(ra.story_score) as story_avg,
                AVG(ra.gameplay_score) as gameplay_avg,
                AVG(ra.exploration_score) as exploration_avg,
                AVG(ra.art_score) as art_avg,
                AVG(ra.difficulty_score) as difficulty_avg
            ')
            ->first();

        $rowB = DB::table('reviews as rv')
            ->join('review_aspect as ra', 'ra.review_id', '=', 'rv.id')
            ->where('rv.user_id', $userBId)
            ->selectRaw('
                AVG(ra.story_score) as story_avg,
                AVG(ra.gameplay_score) as gameplay_avg,
                AVG(ra.exploration_score) as exploration_avg,
                AVG(ra.art_score) as art_avg,
                AVG(ra.difficulty_score) as difficulty_avg
            ')
            ->first();

        $aspectMap = [
            'story'       => ['label' => 'Historia',     'col' => 'story_avg'],
            'gameplay'    => ['label' => 'Jugabilidad',  'col' => 'gameplay_avg'],
            'exploration' => ['label' => 'Exploración',  'col' => 'exploration_avg'],
            'art'         => ['label' => 'Arte',         'col' => 'art_avg'],
            'difficulty'  => ['label' => 'Dificultad',   'col' => 'difficulty_avg'],
        ];

        $aspects = [];

        foreach ($aspectMap as $key => $cfg) {
            $a = ($rowA && $rowA->{$cfg['col']} !== null) ? (float) $rowA->{$cfg['col']} : null;
            $b = ($rowB && $rowB->{$cfg['col']} !== null) ? (float) $rowB->{$cfg['col']} : null;

            if ($a === null && $b === null) continue;

            $aspects[] = [
                'key'       => $key,
                'name'      => $cfg['label'],
                'your_avg'  => $a,
                'their_avg' => $b,
                'diff'      => ($a !== null && $b !== null) ? abs($a - $b) : null,
            ];
        }

        usort($aspects, function ($x, $y) {
            $dx = $x['diff'];
            $dy = $y['diff'];
            if ($dx === null && $dy === null) return 0;
            if ($dx === null) return 1;
            if ($dy === null) return -1;
            return $dx <=> $dy;
        });

        // Géneros
        $ga = Genre::query()
            ->join('game_genre as gg', 'gg.genre_id', '=', 'genres.id')
            ->join('ratings as r', 'r.game_id', '=', 'gg.game_id')
            ->where('r.user_id', $userId)
            ->where('r.score', '>=', $likeScore)
            ->groupBy('genres.id', 'genres.name', 'genres.slug')
            ->selectRaw('genres.id, genres.name, genres.slug, COUNT(DISTINCT r.game_id) as cnt')
            ->orderByDesc('cnt')
            ->limit(30)
            ->get();

        $gb = Genre::query()
            ->join('game_genre as gg', 'gg.genre_id', '=', 'genres.id')
            ->join('ratings as r', 'r.game_id', '=', 'gg.game_id')
            ->where('r.user_id', $userBId)
            ->where('r.score', '>=', $likeScore)
            ->groupBy('genres.id', 'genres.name', 'genres.slug')
            ->selectRaw('genres.id, genres.name, genres.slug, COUNT(DISTINCT r.game_id) as cnt')
            ->orderByDesc('cnt')
            ->limit(30)
            ->get();

        $byId = [];

        foreach ($ga as $r) {
            $gid = (int) $r->id;
            $byId[$gid] = [
                'id'           => $gid,
                'slug'         => $r->slug,
                'name'         => $r->name,
                'display_name' => $r->display_name,
                'your_count'   => (int) $r->cnt,
                'their_count'  => 0,
            ];
        }

        foreach ($gb as $r) {
            $gid = (int) $r->id;

            if (!isset($byId[$gid])) {
                $byId[$gid] = [
                    'id'           => $gid,
                    'slug'         => $r->slug,
                    'name'         => $r->name,
                    'display_name' => $r->display_name,
                    'your_count'   => 0,
                    'their_count'  => (int) $r->cnt,
                ];
            } else {
                $byId[$gid]['their_count'] = (int) $r->cnt;
            }
        }

        $genres = array_values($byId);

        usort($genres, function ($x, $y) {
            $sx = $x['your_count'] + $x['their_count'];
            $sy = $y['your_count'] + $y['their_count'];
            if ($sx !== $sy) return $sy <=> $sx;

            $mx = min($x['your_count'], $x['their_count']);
            $my = min($y['your_count'], $y['their_count']);
            return $my <=> $mx;
        });

        $genres = array_slice($genres, 0, 8);

        return [
            'user' => [
                'id'         => $userB->id,
                'username'   => $userB->username,
                'name'       => $userB->name,
                'avatar_url' => $userB->avatar_url,
            ],
            'similarity'   => (float) $sim->similarity,
            'common_games' => (int) $sim->common_games,
            'updated_at'   => $sim->updated_at,
            'stats' => [
                'common_total' => (int) ($stats->common_total ?? 0),
                'avg_diff'     => $stats->avg_diff === null ? null : (float) $stats->avg_diff,
                'your_avg'     => $stats->your_avg === null ? null : (float) $stats->your_avg,
                'their_avg'    => $stats->their_avg === null ? null : (float) $stats->their_avg,
            ],
            'common_games_items' => $commonGames,
            'aspects'            => $aspects,
            'genres'             => $genres,
            'like_score'         => $likeScore,
        ];
    }

    /**
     * Devuelve los juegos que aún no han sido valorados por el usuario y que otros usuarios afines han puntuado alto.
     */
    public function soulmateRecommendedGamesQuery(int $userId, int $userBId, int $likeScore)
    {
        $isSoulmate = Similarity::query()
            ->where('user_a_id', $userId)
            ->where('user_b_id', $userBId)
            ->exists();

        if (!$isSoulmate) {
            return null;
        }

        $query = Game::query()
            ->join('ratings as rb', function ($join) use ($userBId, $likeScore) {
                $join->on('rb.game_id', '=', 'games.id')
                    ->where('rb.user_id', '=', $userBId)
                    ->where('rb.score', '>=', $likeScore);
            })

            // Excluye los que ya ha puntuado
            ->whereNotExists(function ($q) use ($userId) {
                $q->select(DB::raw(1))
                    ->from('ratings as ra')
                    ->where('ra.user_id', '=', $userId)
                    ->whereColumn('ra.game_id', 'games.id');
            })

            // Excluye los que ya ha reseñado
            ->whereNotExists(function ($q) use ($userId) {
                $q->select(DB::raw(1))
                    ->from('reviews as rv')
                    ->where('rv.user_id', '=', $userId)
                    ->whereNull('rv.deleted_at')
                    ->whereColumn('rv.game_id', 'games.id');
            })

            ->select([
                'games.id',
                'games.title',
                'games.slug',
                'games.release_date',
                'games.cover_url',
                DB::raw('rb.score as soulmate_score'),
            ])

            ->with(['genres:id,slug,name'])
            ->withAvg(['ratings as avg_all'], 'score')
            ->withCount(['ratings as cnt_all'])

            ->orderByDesc('soulmate_score')
            ->orderByDesc('games.id');

        return $query;
    }

    /* RECOMENDACIONES */

    /**
     * Recalcula y guarda recomendaciones de juegos para un usuario.
     *
     * Señales:
     *  1) VECINOS ("collab"): jugadores afines han puntuado alto el juego.
     *  2) TAXONOMÍA ("tax"): tags y géneros del juego coinciden con gustos del usuario.
     *  3) ASPECTS (apoyo): juegos que le gustan suelen tener ciertos aspects altos.
     *
     * Tiers:
     *  - tier1: collab + tax (lo ideal)
     *  - tier2: solo tax (fallback)
     *
     * Gating de aspects:
     *  - los aspectos solo pueden influir si la taxonomía (géneros y tags) ya son mínimos
     *    (evita salirse de juegos fuera de gustos de tags y géneros).
     */
    public function recomputeRecommendationsForUser(int $userId): void
    {
        $cfg = [
            'minRatings' => 5,
            'topN'       => 75,
            'topCands'   => 200,
            'likeScore'  => 8,

            // Pesos (si la señal existe)
            'wCollab'    => 0.70,
            'wAspect'    => 0.20,
            'wTax'       => 0.10,

            // Favoritos del usuario para taxonomía
            'topTags'    => 20,
            'topGenres'  => 15,
            'minTaxN'    => 2,

            // Gating: si la taxonomía es menor los aspectos no influyen
            'minTaxForAspect' => 0.15,

            // Cuotas para construir el top N con variedad
            'quotaTier1' => 60,
            'quotaTier2' => 15,
        ];

        // Si tiene pocos ratings, borra (evita ruido)
        $count = DB::table('ratings')->where('user_id', $userId)->count();
        if ($count < $cfg['minRatings']) {
            DB::table('recommendations')->where('user_id', $userId)->delete();
            return;
        }

        // 1) Excluye juegos ya puntuados o reseñados por el usuario
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

        /*
         * 2) Señal VECINOS (collab)
         * 
         * - Agrega ratings de usuarios similares 
         * - Solo cuenta notas mayores o iguales al likeScore
         * - Excluye juegos ya vistos
         * - collab_score: media ponderada por similitud
         * - support: número de notas de vecinos que lo avalan
         */
        [$collabMap, $candsCollab] = (function () use ($userId, $cfg) {
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
                $gid = (int) $r->game_id;

                $map[$gid] = [
                    'score'   => $this->clamp01((float) $r->collab_score),
                    'support' => (int) $r->support,
                ];

                $cands[] = $gid;
            }

            return [$map, $cands];
        })();


        // 3) Señal ASPECTS (preferencias del usuario)
        $prefs = $this->userFavoriteAspects($userId, $cfg);

        // 4) Señal TAXONOMÍA (tags/genres favoritos del usuario)
        [$tagAff, $tagIds, $genreAff, $genreIds] = $this->userFavoriteTaxonomy($userId, $cfg);

        // Juegos candidatos por contenido (comparten tags y genres favoritos)
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

        // 5) Mezcla de candidatos (collab + content) filtrando excluidos
        $candidateIds = array_values(array_unique(array_merge($candsCollab, $candsContent)));
        $candidateIds = array_values(array_filter(
            $candidateIds,
            fn($gid) => !isset($excludedSet[$gid])
        ));

        if (empty($candidateIds)) {
            DB::table('recommendations')->where('user_id', $userId)->delete();
            return;
        }

        // 6) Carga datos auxiliares de candidatos
        $aspectsRows = DB::table('aspects')
            ->whereIn('game_id', $candidateIds)
            ->get()
            ->keyBy('game_id');

        $gameTags = [];
        foreach (DB::table('game_tag')->whereIn('game_id', $candidateIds)->get(['game_id', 'tag_id']) as $r) {
            $gameTags[(int) $r->game_id][] = (int) $r->tag_id;
        }

        $gameGenres = [];
        foreach (DB::table('game_genre')->whereIn('game_id', $candidateIds)->get(['game_id', 'genre_id']) as $r) {
            $gameGenres[(int) $r->game_id][] = (int) $r->genre_id;
        }

        // 7) Helpers de scoring

        // Media de afinidades (0..1) del juego para ids que el usuario tiene en su mapa de afinidad
        $avgAff = function (array $ids, array $aff): ?float {
            if (empty($ids) || empty($aff)) return null;

            $sum = 0.0;
            $n = 0;

            foreach ($ids as $id) {
                if (!isset($aff[$id])) continue;
                $sum += (float) $aff[$id];
                $n++;
            }

            return $n > 0 ? $this->clamp01($sum / $n) : null;
        };

        // Score de aspectos ponderado por preferencias del usuario
        $aspectScore = function ($aRow) use ($prefs): ?float {
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
                $v = $this->norm1to10($map[$k] ?? null);
                if ($v === null) continue;

                $num += $w * $v;
                $den += $w;
            }

            return $den > 0 ? $this->clamp01($num / $den) : null;
        };

        // Score combinado de tags y géneros
        $taxonomyScore = function (int $gid) use ($gameTags, $gameGenres, $tagAff, $genreAff, $avgAff): ?float {
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

            return $this->clamp01($sum / $n);
        };

        // 8) Score final y tiers
        $tier1 = []; // collab + tax
        $tier2 = []; // solo tax

        foreach ($candidateIds as $gid) {
            // VECINOS
            $collab  = $collabMap[$gid]['score'] ?? null; // 0..1 o null
            $support = $collabMap[$gid]['support'] ?? 0;  // nº de vecinos

            // TAXONOMÍA
            $tax = $taxonomyScore((int) $gid); // 0..1 o null

            // ASPECTS (gateado por taxonomía)
            $aRow = $aspectsRows[$gid] ?? null;

            $aspect = null;
            if ($tax !== null && $tax >= $cfg['minTaxForAspect']) {
                $aspect = $aspectScore($aRow);
            }

            // Decide el tier
            if ($collab !== null && $tax !== null) {
                $tier = 1;
            } elseif ($tax !== null) {
                $tier = 2;
            } else {
                continue;
            }

            // Mezcla de señales con pesos
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
                $num += $cfg['wTax'] * $tax;
                $den += $cfg['wTax'];
            }

            if ($den <= 0) continue;

            $final = $this->clamp01($num / $den);

            // Guarda las razones de la recomendación desglosadas
            $reason = [
                'tier'              => $tier,
                'collab'            => $collab,
                'support_neighbors' => $support,
                'aspect'            => $aspect,
                'tag_genre'         => $tax,
            ];

            $row = [
                'user_id'    => $userId,
                'game_id'    => (int) $gid,
                'score'      => $final,
                'reason'     => json_encode($reason),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if ($tier === 1) $tier1[] = $row;
            else $tier2[] = $row;
        }

        if (empty($tier1) && empty($tier2)) {
            DB::table('recommendations')->where('user_id', $userId)->delete();
            return;
        }

        // Ordena cada tier por score desc
        $sortDesc = fn($a, $b) => $b['score'] <=> $a['score'];
        usort($tier1, $sortDesc);
        usort($tier2, $sortDesc);

        // 9) Construye el Top N (tabla Reommendations) asignando cuotas a cada tier 
        $quota1 = $cfg['quotaTier1'];
        $quota2 = $cfg['quotaTier2'];

        $rows = array_merge(
            array_slice($tier1, 0, $quota1),
            array_slice($tier2, 0, $quota2),
        );

        $remaining = $cfg['topN'] - count($rows);

        if ($remaining > 0) {
            $left1 = array_slice($tier1, $quota1);
            $left2 = array_slice($tier2, $quota2);

            $fill = array_merge($left1, $left2);

            if (!empty($fill)) {
                $rows = array_merge($rows, array_slice($fill, 0, $remaining));
            }
        }

        // 10) Reemplaza las recomendaciones actuales del usuario
        DB::transaction(function () use ($userId, $rows) {
            DB::table('recommendations')->where('user_id', $userId)->delete();
            DB::table('recommendations')->insert($rows);
        });
    }

    /* FAVORITOS DEL USUSARIO */

    /**
     * Devuelve tags y géneros favoritos del usuario a partir de sus notas.
     */
    private function userFavoriteTaxonomy(int $userId, array $cfg): array
    {
        $tagSql = "
            SELECT
                gt.tag_id AS id,
                AVG((r.score - 1) / 9) AS aff,
                COUNT(*) AS n
            FROM ratings r
            JOIN game_tag gt ON gt.game_id = r.game_id
            WHERE r.user_id = ? AND r.score >= ?
            GROUP BY gt.tag_id
            HAVING COUNT(*) >= {$cfg['minTaxN']}
            ORDER BY aff DESC, n DESC
            LIMIT {$cfg['topTags']}
        ";

        $tagRows = DB::select($tagSql, [$userId, $cfg['likeScore']]);

        $tagAff = [];
        $tagIds = [];

        foreach ($tagRows as $t) {
            $id = (int) $t->id;
            $tagAff[$id] = $this->clamp01((float) $t->aff);
            $tagIds[] = $id;
        }

        $genreSql = "
            SELECT
                gg.genre_id AS id,
                AVG((r.score - 1) / 9) AS aff,
                COUNT(*) AS n
            FROM ratings r
            JOIN game_genre gg ON gg.game_id = r.game_id
            WHERE r.user_id = ? AND r.score >= ?
            GROUP BY gg.genre_id
            HAVING COUNT(*) >= {$cfg['minTaxN']}
            ORDER BY aff DESC, n DESC
            LIMIT {$cfg['topGenres']}
        ";

        $genreRows = DB::select($genreSql, [$userId, $cfg['likeScore']]);

        $genreAff = [];
        $genreIds = [];

        foreach ($genreRows as $g) {
            $id = (int) $g->id;
            $genreAff[$id] = $this->clamp01((float) $g->aff);
            $genreIds[] = $id;
        }

        return [$tagAff, $tagIds, $genreAff, $genreIds];
    }

    /**
     * Devuelve los aspectos favoritos del usuario a partir de sus ratings.
     * Devuelve un mapa de pesos que suma 1.0 (por ejemplo: ['story' => 0.4])
     */
    private function userFavoriteAspects(int $userId, array $cfg): array
    {
        $sql = "
            SELECT
                AVG(a.story_avg)       AS story,
                AVG(a.gameplay_avg)    AS gameplay,
                AVG(a.exploration_avg) AS exploration,
                AVG(a.art_avg)         AS art,
                AVG(a.difficulty_avg)  AS difficulty
            FROM ratings rt
            JOIN aspects a ON a.game_id = rt.game_id
            WHERE rt.user_id = ? AND rt.score >= ?
        ";

        $row = DB::select($sql, [$userId, $cfg['likeScore']])[0] ?? null;
        if (!$row) return [];

        $raw = [
            'story'       => $this->norm1to10($row->story),
            'gameplay'    => $this->norm1to10($row->gameplay),
            'exploration' => $this->norm1to10($row->exploration),
            'art'         => $this->norm1to10($row->art),
            'difficulty'  => $this->norm1to10($row->difficulty),
        ];

        $tmp = [];
        foreach ($raw as $k => $v) {
            if ($v !== null) $tmp[$k] = $v;
        }

        $sum = array_sum($tmp);
        if ($sum <= 0) return [];

        foreach ($tmp as $k => $v) {
            $tmp[$k] = $v / $sum;
        }

        return $tmp;
    }

    /* BLOQUES PARA UI */

    /**
     * Construye los bloques de juegos recomendados para el usuario.
     */
    public function buildRecommendationBlocks(int $userId, array $opts = []): array
    {
        $perBlock     = max(6,  min(20, (int) ($opts['perBlock'] ?? 12)));
        $genreBlocks  = max(0,  min(10, (int) ($opts['genreBlocks'] ?? 4)));
        $tagBlocks    = max(0,  min(10, (int) ($opts['tagBlocks'] ?? 4)));
        $aspectBlocks = max(0,  min(5,  (int) ($opts['aspectBlocks'] ?? 2)));
        $topN         = max(25, min(200, (int) ($opts['topN'] ?? 75)));

        // Recupera las recomendaciones guardadas
        $recs = Recommendation::query()
            ->where('user_id', $userId)
            ->orderByDesc('score')
            ->limit($topN)
            ->get(['game_id', 'score', 'reason']);

        if ($recs->isEmpty()) {
            return ['blocks' => []];
        }

        $recIds = $recs->pluck('game_id')->map(fn($x) => (int) $x)->all();
        $recScoreMap = $recs->pluck('score', 'game_id')->all();

        // Carga juegos recomendados y sus relaciones
        $games = Game::query()
            ->select('id', 'title', 'slug', 'release_date', 'cover_url')
            ->with([
                'genres:id,slug,name',
                'tags:id,slug,name',
                'aspects:game_id,story_avg,gameplay_avg,exploration_avg,art_avg,difficulty_avg',
            ])
            ->withAvg(['ratings as avg_all'], 'score')
            ->withCount(['ratings as cnt_all'])
            ->whereIn('id', $recIds)
            ->get()
            ->keyBy('id');

        // Favoritos del usuario (para sacar bloques por género, tag y aspecto)
        $cfg = [
            'likeScore' => 8,
            'topTags'   => 20,
            'topGenres' => 15,
            'minTaxN'   => 2,
        ];

        [, $tagIds,, $genreIds] = $this->userFavoriteTaxonomy($userId, $cfg);
        $aspectPrefs = $this->userFavoriteAspects($userId, $cfg);

        $blocks = [];
        $used = []; // evita repetidos entre bloques

        // Bloque collab ("Porque les gustan a usuarios como tú...")
        $collabCands = [];

        foreach ($recs as $r) {
            $reason = (array) $r->reason;
            $collab  = $reason['collab'] ?? null;
            $support = (int) ($reason['support_neighbors'] ?? 0);

            if ($collab === null) continue;

            $collabCands[] = [
                'gid'     => (int) $r->game_id,
                'collab'  => (float) $collab,
                'support' => $support,
                'score'   => (float) $r->score,
            ];
        }

        if (!empty($collabCands)) {
            usort($collabCands, function ($a, $b) {
                $cmp = $b['collab'] <=> $a['collab'];
                if ($cmp !== 0) return $cmp;

                $cmp = $b['support'] <=> $a['support'];
                if ($cmp !== 0) return $cmp;

                return $b['score'] <=> $a['score'];
            });

            $picked = [];

            foreach ($collabCands as $c) {
                $g = $games->get($c['gid']);
                if (!$g) continue;

                $picked[] = array_merge(
                    $this->gameToCard($g, $recScoreMap[$g->id] ?? null),
                    [
                        'collab' => $c['collab'],
                        'support_neighbors' => $c['support'],
                    ]
                );

                if (count($picked) >= $perBlock) break;
            }

            if (!empty($picked)) {
                $blocks[] = [
                    'type'  => 'collab',
                    'key'   => 'neighbors',
                    'title' => 'Porque les gustan a usuarios como tú',
                    'games' => $picked,
                ];
            }
        }

        // Helper para no repetir ids entre bloques
        $pickByContains = function (string $rel, int $id) use ($recIds, $games, &$used, $perBlock) {
            $picked = [];

            foreach ($recIds as $gid) {
                if (isset($used[$gid])) continue;

                $g = $games->get($gid);
                if (!$g) continue;

                if ($rel === 'genre' && $g->genres->contains('id', $id)) {
                    $picked[] = $g;
                    $used[$gid] = true;
                    if (count($picked) >= $perBlock) break;
                }

                if ($rel === 'tag' && $g->tags->contains('id', $id)) {
                    $picked[] = $g;
                    $used[$gid] = true;
                    if (count($picked) >= $perBlock) break;
                }
            }

            return $picked;
        };

        // Bloques por género
        $topGenreIds = array_slice($genreIds, 0, $genreBlocks);

        if (!empty($topGenreIds)) {
            $genres = Genre::query()->whereIn('id', $topGenreIds)->get()->keyBy('id');

            foreach ($topGenreIds as $genreId) {
                $genre = $genres->get($genreId);
                if (!$genre) continue;

                $pickedGames = $pickByContains('genre', (int) $genreId);
                if (empty($pickedGames)) continue;

                $blocks[] = [
                    'type'  => 'genre',
                    'key'   => $genre->slug,
                    'title' => 'Porque te gustan los juegos de ' . ($genre->display_name ?? $genre->name),
                    'games' => array_map(
                        fn($g) => $this->gameToCard($g, $recScoreMap[$g->id] ?? null),
                        $pickedGames
                    ),
                ];
            }
        }

        // Bloques por tag
        $topTagIds = array_slice($tagIds, 0, $tagBlocks);

        if (!empty($topTagIds)) {
            $tags = Tag::query()->whereIn('id', $topTagIds)->get()->keyBy('id');

            foreach ($topTagIds as $tagId) {
                $tag = $tags->get($tagId);
                if (!$tag) continue;

                $pickedGames = $pickByContains('tag', (int) $tagId);
                if (empty($pickedGames)) continue;

                $blocks[] = [
                    'type'  => 'tag',
                    'key'   => $tag->slug,
                    'title' => 'Porque te gustan los juegos con ' . ($tag->display_name ?? $tag->name),
                    'games' => array_map(
                        fn($g) => $this->gameToCard($g, $recScoreMap[$g->id] ?? null),
                        $pickedGames
                    ),
                ];
            }
        }

        // Bloques por aspecto
        if ($aspectBlocks > 0 && !empty($aspectPrefs)) {
            arsort($aspectPrefs);
            $topAspects = array_slice(array_keys($aspectPrefs), 0, $aspectBlocks);

            $aspectTitles = [
                'story'       => 'Porque te gustan los juegos con buena Historia 📜',
                'gameplay'    => 'Porque te gustan los juegos con buen Gameplay 🕹️',
                'exploration' => 'Porque te gustan los juegos de Exploración 🧭',
                'art'         => 'Porque te gustan los juegos con buen Arte 🎨',
                'difficulty'  => 'Porque te gustan los juegos con Dificultad 👹',
            ];

            foreach ($topAspects as $ak) {
                $col = $ak . '_avg';

                $cands = [];

                foreach ($recIds as $gid) {
                    if (isset($used[$gid])) continue;

                    $g = $games->get($gid);
                    if (!$g || !$g->aspects) continue;

                    $v = $g->aspects->$col ?? null;
                    if ($v === null) continue;

                    $cands[] = ['gid' => (int) $gid, 'v' => (float) $v];
                }

                if (empty($cands)) continue;

                usort($cands, fn($a, $b) => $b['v'] <=> $a['v']);

                $picked = [];

                foreach ($cands as $c) {
                    $gid = $c['gid'];
                    $g = $games->get($gid);
                    if (!$g) continue;

                    $picked[] = $g;
                    $used[$gid] = true;

                    if (count($picked) >= $perBlock) break;
                }

                if (empty($picked)) continue;

                $blocks[] = [
                    'type'  => 'aspect',
                    'key'   => $ak,
                    'title' => $aspectTitles[$ak] ?? ('Porque te gustan los juegos con ' . $ak),
                    'games' => array_map(
                        fn($g) => $this->gameToCard($g, $recScoreMap[$g->id] ?? null),
                        $picked
                    ),
                ];
            }
        }

        return ['blocks' => $blocks];
    }

    /**
     * Devuelve el juego preparado para mostrar en las cards de UI.
     */
    private function gameToCard(Game $g, $recScore = null): array
    {
        $release = $g->release_date;
        if ($release instanceof CarbonInterface) {
            $release = $release->toDateString();
        }

        return [
            'id'           => $g->id,
            'title'        => $g->title,
            'slug'         => $g->slug,
            'cover_url'    => $g->cover_url,
            'release_date' => $release,
            'avg_all'      => $g->avg_all,
            'cnt_all'      => $g->cnt_all,
            'rec_score'    => $recScore !== null ? (float) $recScore : null,
            'genres'       => $g->genres->map(fn($x) => [
                'id'           => $x->id,
                'slug'         => $x->slug,
                'name'         => $x->name,
                'display_name' => $x->display_name ?? $x->name,
            ])->values(),
        ];
    }

    /* HELPERS DE NORMALIZACIÓN */

    /**
     * Limita un valor decimal para que siempre esté entre 0 y 1.
     */
    private function clamp01(float $x): float
    {
        return max(0.0, min(1.0, $x));
    }

    /**
     * Normaliza un valor en escala 1..10 a una escala 0..1.
     */
    private function norm1to10($v): ?float
    {
        if ($v === null) return null;
        return $this->clamp01((((float) $v) - 1.0) / 9.0);
    }
}
