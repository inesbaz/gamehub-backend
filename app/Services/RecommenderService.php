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
        $minRatings = 5;   // mínimo de ratings para empezar
        $minCommon  = 3;   // mínimo de juegos en común para comparar
        $topK       = 20;  // cuántos similares guarda
        $shrink     = 5;   // penaliza solapes pequeños

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
        //    2.8) Coge los TOP 20 más similares:
        //        - ORDER BY similarity DESC, common_games DESC
        //          LIMIT $topK
        $sql = "
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
        ORDER BY similarity DESC, common_games DESC
        LIMIT $topK
    ";

        $rows = DB::select($sql, [$shrink, $userA, $minCommon]);

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
}
