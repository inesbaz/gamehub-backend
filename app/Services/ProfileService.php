<?php

namespace App\Services;

use App\Models\User;
use App\Models\Follow;
use App\Models\Post;
use App\Models\Review;
use App\Models\Rating;
use App\Models\Similarity;
use App\Models\Emotion;
use App\Models\Genre;
use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\Relation;

class ProfileService
{
    /* FUNCIONES BÁSICAS */

    /**
     * Obtiene el id de un usuario a partir de su username.
     */
    public function findUserIdByUsername(string $username): ?int
    {
        $id = User::query()
            ->where('username', $username)
            ->value('id');

        return $id ? (int) $id : null;
    }

    /**
     * Carga el perfil básico del usuario por username, incluyendo contadores agregados.
     */
    private function findUserByUsername(string $username): ?User
    {
        return User::query()
            ->where('username', $username)
            ->withCount(['reviews', 'ratings', 'posts', 'followers', 'following'])
            ->first(['id', 'username', 'name', 'avatar_url', 'country', 'birthdate']);
    }

    /**
     * Devuelve el tipo de un modelo para relaciones polimórficas.
     * si hay un mapa de tipos, usa el nombre corto. Si no, usa la clase completa.
     */
    private function morphType(string $modelClass): string
    {
        $map = Relation::morphMap();
        if (empty($map)) {
            return $modelClass;
        }

        $alias = array_search($modelClass, $map, true);
        return $alias !== false ? (string) $alias : $modelClass;
    }

    /* PÁGINA PRINCIPAL DEL PERFIL */

    /**
     * Construye el payload completo de la página principal del perfil..
     */
    public function buildProfilePage(string $username, ?int $viewerId = null): ?array
    {
        $user = $this->findUserByUsername($username);
        if (!$user) {
            return null;
        }

        $isSelf = $viewerId !== null && (int) $viewerId === (int) $user->id;

        $isFollowing = null;
        if ($viewerId !== null && !$isSelf) {
            $isFollowing = Follow::query()
                ->where('follower_id', $viewerId)
                ->where('followed_id', (int) $user->id)
                ->exists();
        }

        $highlights = $this->buildHighlights((int) $user->id);
        $taste = $this->buildTasteBlocks((int) $user->id);
        $social = $this->buildSocialBlocks((int) $user->id);

        return [
            'user' => [
                'id'         => (int) $user->id,
                'username'   => $user->username,
                'name'       => $user->name,
                'avatar_url' => $user->avatar_url,
                'country'    => $user->country,
                'birthdate'  => $user->birthdate, // YYYY-MM-DD
            ],
            'counts' => [
                'reviews'   => (int) $user->reviews_count,
                'ratings'   => (int) $user->ratings_count,
                'posts'     => (int) $user->posts_count,
                'followers' => (int) $user->followers_count,
                'following' => (int) $user->following_count,
            ],
            'viewer' => [
                'is_self'      => $isSelf,
                'is_following' => $isFollowing,
            ],
            'highlights' => $highlights,
            'taste'      => $taste,
            'social'     => $social,
        ];
    }

    /*
    * Construye la sección de destacados.
    */
    private function buildHighlights(int $userId): array
    {
        $avgScore = Rating::query()
            ->where('user_id', $userId)
            ->avg('score');

        $cntScore = Rating::query()
            ->where('user_id', $userId)
            ->count();

        // Último favorito (último rating o última review recomendada)
        $favRating = Rating::query()
            ->where('user_id', $userId)
            ->where('score', '>=', 9)
            ->with(['game:id,title,slug,cover_url,cover_thumb_url,release_date'])
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->first(['id', 'game_id', 'score', 'created_at']);

        $favReview = null;
        if (!$favRating) {
            $favReview = Review::query()
                ->where('user_id', $userId)
                ->where('is_recommended', true)
                ->with(['game:id,title,slug,cover_url,cover_thumb_url,release_date'])
                ->orderByDesc('created_at')
                ->orderByDesc('id')
                ->first(['id', 'game_id', 'created_at']);
        }

        $favoriteGame = null;
        if ($favRating && $favRating->game) {
            $favoriteGame = [
                'source' => 'rating',
                'score'  => (int) $favRating->score,
                'at'     => $favRating->created_at,
                'game'   => [
                    'id'              => $favRating->game->id,
                    'title'           => $favRating->game->title,
                    'slug'            => $favRating->game->slug,
                    'cover_url'       => $favRating->game->cover_url,
                    'cover_thumb_url' => $favRating->game->cover_thumb_url,
                    'release_date'    => $favRating->game->release_date,
                ],
            ];
        } elseif ($favReview && $favReview->game) {
            $favoriteGame = [
                'source' => 'review',
                'at'     => $favReview->created_at,
                'game'   => [
                    'id'              => $favReview->game->id,
                    'title'           => $favReview->game->title,
                    'slug'            => $favReview->game->slug,
                    'cover_url'       => $favReview->game->cover_url,
                    'cover_thumb_url' => $favReview->game->cover_thumb_url,
                    'release_date'    => $favReview->game->release_date,
                ],
            ];
        }

        // Última actividad (máximo created_at entre posts, reviews y ratings)
        $lastPost = Post::query()->where('user_id', $userId)->max('created_at');
        $lastReview = Review::query()->where('user_id', $userId)->max('created_at');
        $lastRating = Rating::query()->where('user_id', $userId)->max('created_at');

        $lastActivity = collect([$lastPost, $lastReview, $lastRating])->filter()->max();

        // Likes recibidos
        $postType = $this->morphType(Post::class);
        $reviewType = $this->morphType(Review::class);
        $commentType = $this->morphType(Comment::class);

        $likesOnPosts = DB::table('likes as l')
            ->join('posts as p', 'p.id', '=', 'l.entity_id')
            ->where('l.entity_type', $postType)
            ->where('p.user_id', $userId)
            ->count();

        $likesOnReviews = DB::table('likes as l')
            ->join('reviews as r', 'r.id', '=', 'l.entity_id')
            ->where('l.entity_type', $reviewType)
            ->where('r.user_id', $userId)
            ->count();

        $likesOnComments = DB::table('likes as l')
            ->join('comments as c', 'c.id', '=', 'l.entity_id')
            ->where('l.entity_type', $commentType)
            ->where('c.user_id', $userId)
            ->count();

        return [
            'avg_rating_given' => $avgScore === null ? null : (float) $avgScore,
            'ratings_count'    => (int) $cntScore,
            'favorite_recent'  => $favoriteGame, // null si no hay
            'last_activity_at' => $lastActivity, // null si no hay
            'likes_received'   => (int) ($likesOnPosts + $likesOnReviews + $likesOnComments),
        ];
    }

    /*
    * Construye la sección de gustos del usuario.
    */
    private function buildTasteBlocks(int $userId): array
    {
        // Emociones más usadas
        $emRows = DB::table('reviews as rv')
            ->join('review_emotion as re', 're.review_id', '=', 'rv.id')
            ->where('rv.user_id', $userId)
            ->selectRaw('re.emotion_id, COUNT(DISTINCT rv.id) as cnt')
            ->groupBy('re.emotion_id')
            ->orderByDesc('cnt')
            ->limit(5)
            ->get();

        $emotionIds = $emRows->pluck('emotion_id')->map(fn($x) => (int) $x)->values();

        $emotions = Emotion::query()
            ->whereIn('id', $emotionIds)
            ->get(['id', 'slug', 'name'])
            ->keyBy('id');

        $emTop = [];
        foreach ($emRows as $r) {
            $e = $emotions[(int) $r->emotion_id] ?? null;
            if (!$e) continue;

            $emTop[] = [
                'id'           => (int) $e->id,
                'slug'         => $e->slug,
                'name'         => $e->name,
                'display_name' => $e->display_name,
                'count'        => (int) $r->cnt,
            ];
        }

        // Aspectos promedio
        $asp = DB::table('reviews as rv')
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

        $aspectsAvg = [
            'story'       => $asp && $asp->story_avg !== null ? (float) $asp->story_avg : null,
            'gameplay'    => $asp && $asp->gameplay_avg !== null ? (float) $asp->gameplay_avg : null,
            'exploration' => $asp && $asp->exploration_avg !== null ? (float) $asp->exploration_avg : null,
            'art'         => $asp && $asp->art_avg !== null ? (float) $asp->art_avg : null,
            'difficulty'  => $asp && $asp->difficulty_avg !== null ? (float) $asp->difficulty_avg : null,
        ];

        // Géneros y tags favoritos a partir de ratings
        $likeScore = 8;

        $genres = Genre::query()
            ->join('game_genre as gg', 'gg.genre_id', '=', 'genres.id')
            ->join('ratings as r', 'r.game_id', '=', 'gg.game_id')
            ->where('r.user_id', $userId)
            ->where('r.score', '>=', $likeScore)
            ->groupBy('genres.id', 'genres.name', 'genres.slug')
            ->selectRaw('genres.id, genres.name, genres.slug, COUNT(DISTINCT r.game_id) as cnt')
            ->orderByDesc('cnt')
            ->limit(5)
            ->get()
            ->map(fn($g) => [
                'id'           => (int) $g->id,
                'slug'         => $g->slug,
                'name'         => $g->name,
                'display_name' => $g->display_name,
                'count'        => (int) $g->cnt,
            ])
            ->values();

        $tags = Tag::query()
            ->join('game_tag as gt', 'gt.tag_id', '=', 'tags.id')
            ->join('ratings as r', 'r.game_id', '=', 'gt.game_id')
            ->where('r.user_id', $userId)
            ->where('r.score', '>=', $likeScore)
            ->groupBy('tags.id', 'tags.name', 'tags.slug')
            ->selectRaw('tags.id, tags.name, tags.slug, COUNT(DISTINCT r.game_id) as cnt')
            ->orderByDesc('cnt')
            ->limit(5)
            ->get()
            ->map(fn($t) => [
                'id'           => (int) $t->id,
                'slug'         => $t->slug,
                'name'         => $t->name,
                'display_name' => $t->display_name,
                'count'        => (int) $t->cnt,
            ])
            ->values();

        return [
            'like_score'   => $likeScore,
            'emotions_top' => $emTop,
            'aspects_avg'  => $aspectsAvg,
            'genres_top'   => $genres,
            'tags_top'     => $tags,
        ];
    }

    /*
    * Construye la sección social del perfil.
    */
    private function buildSocialBlocks(int $userId): array
    {
        // Previsualización de seguidores y seguidos
        $followersPreview = User::query()
            ->join('follows as f', 'f.follower_id', '=', 'users.id')
            ->where('f.followed_id', $userId)
            ->orderByDesc('users.id')
            ->limit(6)
            ->get(['users.id', 'users.username', 'users.name', 'users.avatar_url'])
            ->map(fn($u) => [
                'id'         => (int) $u->id,
                'username'   => $u->username,
                'name'       => $u->name,
                'avatar_url' => $u->avatar_url,
            ])
            ->values();

        $followingPreview = User::query()
            ->join('follows as f', 'f.followed_id', '=', 'users.id')
            ->where('f.follower_id', $userId)
            ->orderByDesc('users.id')
            ->limit(6)
            ->get(['users.id', 'users.username', 'users.name', 'users.avatar_url'])
            ->map(fn($u) => [
                'id'         => (int) $u->id,
                'username'   => $u->username,
                'name'       => $u->name,
                'avatar_url' => $u->avatar_url,
            ])
            ->values();

        // Jugadores afines
        $sims = Similarity::query()
            ->where('user_a_id', $userId)
            ->with(['userB:id,username,name,avatar_url'])
            ->orderByDesc('similarity')
            ->orderByDesc('common_games')
            ->limit(6)
            ->get(['user_b_id', 'common_games', 'similarity', 'updated_at']);

        $soulmates = [];
        foreach ($sims as $sim) {
            $u = $sim->userB;
            if (!$u) continue;

            $soulmates[] = [
                'id'           => (int) $u->id,
                'username'     => $u->username,
                'name'         => $u->name,
                'avatar_url'   => $u->avatar_url,
                'similarity'   => (float) $sim->similarity,
                'common_games' => (int) $sim->common_games,
                'updated_at'   => $sim->updated_at,
            ];
        }

        return [
            'followers_preview' => $followersPreview,
            'following_preview' => $followingPreview,
            'soulmates'         => $soulmates,
        ];
    }

    /* QUERIES PARA LAS TABS DEL PERFIL */

    /*
    * Tab de reseñas del usuario.
    */
    public function userReviewsQuery(int $userId)
    {
        return Review::query()
            ->where('user_id', $userId)
            ->select([
                'id',
                'user_id',
                'game_id',
                'title',
                'body',
                'is_recommended',
                'spoiler',
                'created_at',
                'updated_at',
            ])
            ->with([
                'game:id,title,slug,cover_url,cover_thumb_url,release_date',
                'game.genres:id,slug,name',
                'emotions:id,slug,name',
                'aspects:review_id,story_score,gameplay_score,exploration_score,art_score,difficulty_score',
            ])
            ->withCount(['likes'])
            ->orderByDesc('created_at')
            ->orderByDesc('id');
    }

    /*
    * Tab de notas de juegos del usuario con ordenación.
    */
    public function userRatingsQuery(int $userId, string $sort = 'recent')
    {
        $q = Rating::query()
            ->where('user_id', $userId)
            ->with([
                'game:id,title,slug,cover_url,cover_thumb_url,release_date',
                'game.genres:id,slug,name',
            ])
            ->select(['id', 'user_id', 'game_id', 'score', 'created_at', 'updated_at']);

        if ($sort === 'high') {
            $q->orderByDesc('score')->orderByDesc('created_at')->orderByDesc('id');
        } elseif ($sort === 'low') {
            $q->orderBy('score')->orderByDesc('created_at')->orderByDesc('id');
        } else {
            $q->orderByDesc('created_at')->orderByDesc('id');
        }

        return $q;
    }

    /*
    * Tab de posts del usuario.
    */
    public function userPostsQuery(int $userId)
    {
        return Post::query()
            ->where('user_id', $userId)
            ->select([
                'id',
                'user_id',
                'game_id',
                'type',
                'text',
                'media_url',
                'media_width',
                'media_height',
                'created_at',
                'updated_at',
            ])
            ->with(['game:id,title,slug,cover_url,cover_thumb_url,release_date'])
            ->withCount(['likes', 'comments'])
            ->orderByDesc('created_at')
            ->orderByDesc('id');
    }

    /*
    * Tab de seguidores del usuario.
    */
    public function followersQuery(int $userId)
    {
        return User::query()
            ->join('follows as f', 'f.follower_id', '=', 'users.id')
            ->where('f.followed_id', $userId)
            ->orderByDesc('users.id')
            ->select(['users.id', 'users.username', 'users.name', 'users.avatar_url']);
    }

    /*
    * Tab de seguidos por el usuario.
    */
    public function followingQuery(int $userId)
    {
        return User::query()
            ->join('follows as f', 'f.followed_id', '=', 'users.id')
            ->where('f.follower_id', $userId)
            ->orderByDesc('users.id')
            ->select(['users.id', 'users.username', 'users.name', 'users.avatar_url']);
    }

    /*
    * Construye la tab de Actividad del usuario.
    */
    public function buildUserActivity(int $userId, int $page, int $perPage): array
    {
        $need = $page * $perPage;
        $need = max($perPage, min(200, $need));

        $posts = Post::query()
            ->where('user_id', $userId)
            ->with(['game:id,title,slug,cover_url,cover_thumb_url'])
            ->withCount(['likes', 'comments'])
            ->orderByDesc('created_at')->orderByDesc('id')
            ->limit($need)
            ->get(['id', 'game_id', 'type', 'text', 'media_url', 'media_width', 'media_height', 'created_at']);

        $reviews = Review::query()
            ->where('user_id', $userId)
            ->with(['game:id,title,slug,cover_url,cover_thumb_url', 'emotions:id,slug,name'])
            ->withCount(['likes'])
            ->orderByDesc('created_at')->orderByDesc('id')
            ->limit($need)
            ->get(['id', 'game_id', 'title', 'body', 'is_recommended', 'spoiler', 'created_at']);

        $ratings = Rating::query()
            ->where('user_id', $userId)
            ->with(['game:id,title,slug,cover_url,cover_thumb_url'])
            ->orderByDesc('created_at')->orderByDesc('id')
            ->limit($need)
            ->get(['id', 'game_id', 'score', 'created_at']);

        $items = [];

        foreach ($posts as $p) {
            $items[] = [
                'type' => 'post',
                'id' => (int) $p->id,
                'created_at' => $p->created_at,
                'game' => $p->game ? [
                    'id' => $p->game->id,
                    'title' => $p->game->title,
                    'slug' => $p->game->slug,
                    'cover_url' => $p->game->cover_url,
                    'cover_thumb_url' => $p->game->cover_thumb_url,
                ] : null,
                'post' => [
                    'type' => $p->type,
                    'text' => $p->text,
                    'media_url' => $p->media_url,
                    'media_width' => $p->media_width,
                    'media_height' => $p->media_height,
                    'likes_count' => (int) ($p->likes_count ?? 0),
                    'comments_count' => (int) ($p->comments_count ?? 0),
                ],
            ];
        }

        foreach ($reviews as $r) {
            $items[] = [
                'type' => 'review',
                'id' => (int) $r->id,
                'created_at' => $r->created_at,
                'game' => $r->game ? [
                    'id' => $r->game->id,
                    'title' => $r->game->title,
                    'slug' => $r->game->slug,
                    'cover_url' => $r->game->cover_url,
                    'cover_thumb_url' => $r->game->cover_thumb_url,
                ] : null,
                'review' => [
                    'title' => $r->title,
                    'body'  => $r->body,
                    'is_recommended' => (bool) $r->is_recommended,
                    'spoiler' => (bool) $r->spoiler,
                    'likes_count' => (int) ($r->likes_count ?? 0),
                    'emotions' => ($r->emotions ?? collect())
                        ->map(fn($e) => [
                            'id' => (int) $e->id,
                            'slug' => $e->slug,
                            'name' => $e->name,
                            'display_name' => $e->display_name,
                            'intensity' => isset($e->pivot) ? (int) ($e->pivot->intensity ?? 0) : null,
                        ])
                        ->values(),
                ],
            ];
        }

        foreach ($ratings as $rt) {
            $items[] = [
                'type' => 'rating',
                'id' => (int) $rt->id,
                'created_at' => $rt->created_at,
                'game' => $rt->game ? [
                    'id' => $rt->game->id,
                    'title' => $rt->game->title,
                    'slug' => $rt->game->slug,
                    'cover_url' => $rt->game->cover_url,
                    'cover_thumb_url' => $rt->game->cover_thumb_url,
                ] : null,
                'rating' => [
                    'score' => (int) $rt->score,
                ],
            ];
        }

        usort($items, function ($a, $b) {
            $ta = $a['created_at'] ? strtotime((string) $a['created_at']) : 0;
            $tb = $b['created_at'] ? strtotime((string) $b['created_at']) : 0;

            if ($ta !== $tb) return $tb <=> $ta;
            return ($b['id'] ?? 0) <=> ($a['id'] ?? 0);
        });

        $total = count($items);
        $offset = ($page - 1) * $perPage;
        $slice = array_slice($items, $offset, $perPage);

        return [
            'data' => $slice,
            'meta' => [
                'page' => $page,
                'per_page' => $perPage,
                'returned' => count($slice),
                'has_more' => ($offset + $perPage) < $total,
            ],
        ];
    }

    /*
    * Sigue a un usuario por su nombre de usuario.
    */
    public function followByUsername(string $username, int $viewerId): ?array
    {
        $u = User::query()->where('username', $username)->first(['id']);
        if (!$u) return null;

        $targetId = (int) $u->id;
        if ($targetId === $viewerId) {
            return ['error' => 'No puedes seguirte a ti mismo'];
        }

        Follow::query()->firstOrCreate([
            'follower_id' => $viewerId,
            'followed_id' => $targetId,
        ]);

        $followersCount = Follow::query()
            ->where('followed_id', $targetId)
            ->count();

        return [
            'is_following' => true,
            'followers_count' => (int) $followersCount,
        ];
    }

    /*
    * Deja de seguir un usuario por su nombre de usuario.
    */
    public function unfollowByUsername(string $username, int $viewerId): ?array
    {
        $u = User::query()->where('username', $username)->first(['id']);
        if (!$u) return null;

        $targetId = (int) $u->id;
        if ($targetId === $viewerId) {
            return ['error' => 'No puedes dejar de seguirte a ti mismo'];
        }

        Follow::query()
            ->where('follower_id', $viewerId)
            ->where('followed_id', $targetId)
            ->delete();

        $followersCount = Follow::query()
            ->where('followed_id', $targetId)
            ->count();

        return [
            'is_following' => false,
            'followers_count' => (int) $followersCount,
        ];
    }
}
