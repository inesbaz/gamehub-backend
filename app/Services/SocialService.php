<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Review;

class SocialService
{
    /**
     * Recupera los datos de reseñas y posts de usuarios de la BD y permite su ordenación.
     */
    public function feedQuery(int $userId, array $opts)
    {
        $scope = $opts['scope'] ?? 'community';
        $type  = $opts['type'] ?? 'all';
        $sort  = $opts['sort'] ?? 'recent';
        $days  = (int) ($opts['days'] ?? 7);

        $since = null;
        if ($sort === 'top') {
            $days = max(1, min(30, $days));
            $since = now()->subDays($days);
        }

        $postMorph   = (new Post())->getMorphClass();
        $reviewMorph = (new Review())->getMorphClass();

        $postsQ   = $this->postsQuery($userId, $scope, $since, $postMorph);
        $reviewsQ = $this->reviewsQuery($userId, $scope, $since, $reviewMorph);

        if ($type === 'post') {
            $sub = $postsQ;
        } elseif ($type === 'review') {
            $sub = $reviewsQ;
        } else {
            $sub = $postsQ->unionAll($reviewsQ);
        }

        $q = DB::query()
            ->fromSub($sub, 't')
            ->select('t.*');

        if ($sort === 'top') {
            $q->orderByDesc('likes_count')
                ->orderByDesc('created_at')
                ->orderByDesc('item_id');
        } else {
            $q->orderByDesc('created_at')
                ->orderByDesc('item_id');
        }

        return $q;
    }

    /**
     * Recupera los datos de posts de usuarios de la BD.
     */
    private function postsQuery(int $userId, string $scope, $since, string $postMorph)
    {
        $q = DB::table('posts as p')
            ->join('users as u', 'u.id', '=', 'p.user_id')
            ->leftJoin('games as g', 'g.id', '=', 'p.game_id')
            ->whereNull('p.deleted_at');

        if ($since) {
            $q->where('p.created_at', '>=', $since);
        }

        if ($scope === 'following') {
            $q->whereExists(function ($sub) use ($userId) {
                $sub->select(DB::raw(1))
                    ->from('follows as f')
                    ->where('f.follower_id', '=', $userId)
                    ->whereColumn('f.followed_id', 'p.user_id');
            });
        } elseif ($scope === 'soulmates') {
            $q->whereExists(function ($sub) use ($userId) {
                $sub->select(DB::raw(1))
                    ->from('similarities as s')
                    ->where('s.user_a_id', '=', $userId)
                    ->whereColumn('s.user_b_id', 'p.user_id');
            });
        }

        // Para hacer UNION con reviews ambos SELECT deben devolver exactamente las mismas columnas.
        //  DB::raw se utiliza para que Laravel no interprete el código y lo pegue tal cuál en el SQL.
        return $q->select([
            DB::raw('p.id as item_id'),
            DB::raw("'post' as item_type"),
            DB::raw('p.created_at as created_at'),

            DB::raw('u.id as user_id'),
            DB::raw('u.username as username'),
            DB::raw('u.name as name'),
            DB::raw('u.avatar_url as avatar_url'),

            DB::raw('p.game_id as game_id'),
            DB::raw('g.slug as game_slug'),
            DB::raw('g.title as game_title'),
            DB::raw('g.cover_url as game_cover_url'),

            DB::raw('p.type as post_type'),
            DB::raw('p.text as post_text'),
            DB::raw('p.media_url as media_url'),
            DB::raw('p.media_width as media_width'),
            DB::raw('p.media_height as media_height'),

            // Post no tiene estos campos pero el SELECT de reviews sí.
            // Como luego hace UNION ALL, ambos SELECT deben devolver el mismo número de columnas en el mismo orden. Por eso se pone NULL con el mismo alias.
            DB::raw('NULL as review_title'),
            DB::raw('NULL as review_body'),
            DB::raw('NULL as is_recommended'),
            DB::raw('NULL as spoiler'),
        ])
            // Para añadir columnas calculadas.
            ->selectRaw(
                '(SELECT COUNT(*) FROM likes l WHERE l.entity_type = ? AND l.entity_id = p.id) as likes_count',
                [$postMorph]
            )
            ->selectRaw(
                'EXISTS(SELECT 1 FROM likes l WHERE l.user_id = ? AND l.entity_type = ? AND l.entity_id = p.id) as liked_by_me',
                [$userId, $postMorph]
            )
            ->selectRaw(
                '(SELECT COUNT(*) FROM comments c WHERE c.post_id = p.id AND c.deleted_at IS NULL) as comments_count'
            );
    }

    /**
     * Recupera los datos de reseñas de usuarios de la BD.
     */
    private function reviewsQuery(int $userId, string $scope, $since, string $reviewMorph)
    {
        $q = DB::table('reviews as r')
            ->join('users as u', 'u.id', '=', 'r.user_id')
            ->join('games as g', 'g.id', '=', 'r.game_id')
            ->whereNull('r.deleted_at');

        if ($since) {
            $q->where('r.created_at', '>=', $since);
        }

        if ($scope === 'following') {
            $q->whereExists(function ($sub) use ($userId) {
                $sub->select(DB::raw(1))
                    ->from('follows as f')
                    ->where('f.follower_id', '=', $userId)
                    ->whereColumn('f.followed_id', 'r.user_id');
            });
        } elseif ($scope === 'soulmates') {
            $q->whereExists(function ($sub) use ($userId) {
                $sub->select(DB::raw(1))
                    ->from('similarities as s')
                    ->where('s.user_a_id', '=', $userId)
                    ->whereColumn('s.user_b_id', 'r.user_id');
            });
        }

        return $q->select([
            DB::raw('r.id as item_id'),
            DB::raw("'review' as item_type"),
            DB::raw('r.created_at as created_at'),

            DB::raw('u.id as user_id'),
            DB::raw('u.username as username'),
            DB::raw('u.name as name'),
            DB::raw('u.avatar_url as avatar_url'),

            DB::raw('r.game_id as game_id'),
            DB::raw('g.slug as game_slug'),
            DB::raw('g.title as game_title'),
            DB::raw('g.cover_url as game_cover_url'),

            DB::raw('NULL as post_type'),
            DB::raw('NULL as post_text'),
            DB::raw('NULL as media_url'),
            DB::raw('NULL as media_width'),
            DB::raw('NULL as media_height'),

            DB::raw('r.title as review_title'),
            DB::raw('SUBSTRING(r.body, 1, 1200) as review_body'),
            DB::raw('r.is_recommended as is_recommended'),
            DB::raw('r.spoiler as spoiler'),
        ])
            ->selectRaw(
                '(SELECT COUNT(*) FROM likes l WHERE l.entity_type = ? AND l.entity_id = r.id) as likes_count',
                [$reviewMorph]
            )
            ->selectRaw(
                'EXISTS(SELECT 1 FROM likes l WHERE l.user_id = ? AND l.entity_type = ? AND l.entity_id = r.id) as liked_by_me',
                [$userId, $reviewMorph]
            )
            ->selectRaw('0 as comments_count');
    }
}
