<?php

namespace App\Http\Controllers;

use App\Services\ImportRawgGameService;
use App\Models\Game;
use App\Models\Genre;
use App\Models\Tag;
use App\Models\Emotion;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Rating;
use App\Models\Recommendation;
use App\Models\Aspect;
use App\Models\ReviewAspect;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    /* DETALLE */

    /**
     * Devuelve el detalle de un juego.
     */
    public function show(Request $request, string $slugOrExternalId, ImportRawgGameService $importer)
    {
        $game = $this->findOrImportGame($slugOrExternalId, $importer);

        $this->loadGameRelations($game);

        $stats = $this->buildGameStats((int) $game->id);
        $game->setAttribute('stats', $stats);

        $emotionsSummary = $this->buildEmotionsSummary((int) $game->id, (int) $stats['reviews_count']);
        $game->setAttribute('emotions_summary', $emotionsSummary);

        $user = $request->user();
        $game->setAttribute('me', $this->buildMeData($user, (int) $game->id));

        return $game;
    }

    /* LISTAS Y CATÁLOGOS */

    /**
     * Devuelve un listado paginado de juegos con orden configurable.
     */
    public function showGames(Request $request)
    {
        $sort = $request->query('sort', 'popular');
        $perPage = (int) $request->query('per_page', 16);

        $query = Game::query()
            ->select('id', 'title', 'slug', 'release_date', 'cover_url')
            ->with(['genres:id,slug,name'])
            ->withAvg(['ratings as avg_all'], 'score')
            ->withCount(['ratings as cnt_all']);

        $query = $this->applyGameSort($query, $sort);

        return $query->paginate($perPage);
    }

    /**
     * Devuelve un listado con todos los géneros por número de juegos asociados e incluye 3 covers por género.
     */
    public function showGenres()
    {
        $genres = Genre::withCount('games')
            ->orderByDesc('games_count')
            ->get();

        $out = [];

        foreach ($genres as $g) {
            $covers = $g->games()
                ->whereNotNull('cover_url')
                ->orderByDesc('rawg_rating_count')
                ->orderByDesc('rawg_rating_avg')
                ->limit(3)
                ->pluck('cover_url')
                ->values();

            $out[] = [
                'id'           => $g->id,
                'name'         => $g->name,
                'slug'         => $g->slug,
                'display_name' => $g->display_name,
                'covers'       => $covers,
            ];
        }

        return response()->json($out);
    }

    /**
     * Devuelve los 12 géneros más populares por número de juegos asociados e incluye 3 covers por género.
     */
    public function showTopGenres()
    {
        $genres = Genre::withCount('games')
            ->orderByDesc('games_count')
            ->limit(12)
            ->get();

        $out = [];

        foreach ($genres as $g) {
            $covers = $g->games()
                ->whereNotNull('cover_url')
                ->orderByDesc('rawg_rating_count')
                ->orderByDesc('rawg_rating_avg')
                ->limit(3)
                ->pluck('cover_url')
                ->values();

            $out[] = [
                'id'           => $g->id,
                'name'         => $g->name,
                'slug'         => $g->slug,
                'display_name' => $g->display_name,
                'covers'       => $covers,
            ];
        }

        return response()->json($out);
    }

    /**
     * Devuelve un listado paginado de juegos de un género por slug.
     */
    public function showGamesByGenre(string $slug, Request $request)
    {
        $sort = $request->query('sort', 'popular');
        $perPage = (int) $request->query('per_page', 20);

        $genre = Genre::where('slug', $slug)->firstOrFail();

        $query = $genre->games()
            ->select('games.id', 'games.title', 'games.slug', 'games.release_date', 'games.cover_url')
            ->with(['genres:id,slug,name'])
            ->withAvg(['ratings as avg_all'], 'score')
            ->withCount(['ratings as cnt_all']);

        $query = $this->applyGameSort($query, $sort);

        return response()->json([
            'genre' => [
                'id' => $genre->id,
                'slug' => $genre->slug,
                'name' => $genre->name,
                'display_name' => $genre->display_name,
            ],
            'games' => $query->paginate($perPage),
        ]);
    }

    /**
     * Devuelve un listado paginado de juegos de un tag por slug.
     */
    public function showGamesByTag(string $slug, Request $request)
    {
        $sort = $request->query('sort', 'popular');
        $perPage = (int) $request->query('per_page', 20);

        $tag = Tag::where('slug', $slug)->firstOrFail();

        $query = $tag->games()
            ->select('games.id', 'games.title', 'games.slug', 'games.release_date', 'games.cover_url')
            ->with(['genres:id,slug,name'])
            ->withAvg(['ratings as avg_all'], 'score')
            ->withCount(['ratings as cnt_all']);

        $query = $this->applyGameSort($query, $sort);

        return response()->json([
            'tag' => [
                'id' => $tag->id,
                'slug' => $tag->slug,
                'name' => $tag->name,
                'display_name' => $tag->display_name ?? $tag->name,
            ],
            'games' => $query->paginate($perPage),
        ]);
    }

    /* EMOCIONES */

    /**
     * Devuelve bloques para explorar por emociones.
     * Por cada emoción devuelve una lista de juegos ordenada por menciones, incluyendo porcentaje (menciones por total).
     */
    public function showEmotions(Request $request)
    {
        $limit = (int) $request->query('limit', 8);

        $emotions = Emotion::query()
            ->orderBy('name')
            ->get(['id', 'name', 'slug']);

        $out = [];

        foreach ($emotions as $emotion) {
            $mentionsSub = Review::query()
                ->join('review_emotion', 'review_emotion.review_id', '=', 'reviews.id')
                ->whereColumn('reviews.game_id', 'games.id')
                ->where('review_emotion.emotion_id', $emotion->id)
                ->selectRaw('COUNT(DISTINCT reviews.id)');

            $totalSub = Review::query()
                ->join('review_emotion', 'review_emotion.review_id', '=', 'reviews.id')
                ->whereColumn('reviews.game_id', 'games.id')
                ->selectRaw('COUNT(DISTINCT reviews.id)');

            $games = Game::query()
                ->select('id', 'title', 'slug', 'cover_url')
                ->selectSub($mentionsSub, 'votes_for')
                ->selectSub($totalSub, 'votes_total')
                ->having('votes_for', '>', 0)
                ->orderByRaw('(votes_for / NULLIF(votes_total, 0)) DESC')
                ->orderByDesc('votes_for')
                ->orderBy('title')
                ->limit($limit)
                ->get();

            if ($games->isEmpty()) {
                continue;
            }

            $games = $games->map(function ($g) {
                $for = (int) ($g->votes_for ?? 0);
                $total = (int) ($g->votes_total ?? 0);
                $pct = $total > 0 ? (int) round(($for / $total) * 100) : 0;

                return [
                    'id'          => $g->id,
                    'title'       => $g->title,
                    'slug'        => $g->slug,
                    'cover_url'   => $g->cover_url,
                    'pct'         => $pct,
                    'votes_for'   => $for,
                    'votes_total' => $total,
                ];
            })->values()->all();

            $out[] = [
                'id'           => $emotion->id,
                'name'         => $emotion->name,
                'slug'         => $emotion->slug,
                'display_name' => $emotion->display_name,
                'games'        => $games,
            ];
        }

        return response()->json($out);
    }

    /**
     * Devuelve un listado paginado de juegos de una emoción por slug.
     */
    public function showGamesByEmotion(string $slug, Request $request)
    {
        $sort = $request->query('sort', 'popular');
        $perPage = (int) $request->query('per_page', 20);

        $emotion = Emotion::where('slug', $slug)->firstOrFail();

        $mentionsSub = Review::query()
            ->join('review_emotion', 'review_emotion.review_id', '=', 'reviews.id')
            ->whereColumn('reviews.game_id', 'games.id')
            ->where('review_emotion.emotion_id', $emotion->id)
            ->selectRaw('COUNT(DISTINCT reviews.id)');

        $totalSub = Review::query()
            ->join('review_emotion', 'review_emotion.review_id', '=', 'reviews.id')
            ->whereColumn('reviews.game_id', 'games.id')
            ->selectRaw('COUNT(DISTINCT reviews.id)');

        $query = Game::query()
            ->select('id', 'title', 'slug', 'release_date', 'cover_url')
            ->selectSub($mentionsSub, 'votes_for')
            ->selectSub($totalSub, 'votes_total')
            ->having('votes_for', '>', 0);

        if ($sort === 'votes') {
            $query->orderByDesc('votes_for')->orderBy('title');
        } elseif ($sort === 'alpha') {
            $query->orderBy('title');
        } else {
            $query->orderByRaw('(votes_for / NULLIF(votes_total, 0)) DESC')
                ->orderByDesc('votes_for')
                ->orderBy('title');
        }

        $page = $query->paginate($perPage);

        $page->getCollection()->transform(function ($g) {
            $for = (int) ($g->votes_for ?? 0);
            $total = (int) ($g->votes_total ?? 0);
            $g->pct = $total > 0 ? (int) round(($for / $total) * 100) : 0;
            return $g;
        });

        return response()->json([
            'emotion' => [
                'id' => $emotion->id,
                'slug' => $emotion->slug,
                'name' => $emotion->name,
                'display_name' => $emotion->display_name,
            ],
            'games' => $page,
        ]);
    }

    /* RANKINGS */

    /**
     * Devuelve 3 rankings para la sección "En tendencia": popular, valorados, comentados.
     */
    public function showTrendingWeek()
    {
        $since = now()->subDays(20);

        $popular = Game::query()
            ->select('id', 'title', 'slug', 'cover_url')
            ->selectSub(
                DB::table('ratings')
                    ->selectRaw('COUNT(*)')
                    ->whereColumn('ratings.game_id', 'games.id')
                    ->where('created_at', '>=', $since),
                'ratings_7d'
            )
            ->selectSub(
                DB::table('reviews')
                    ->selectRaw('COUNT(*)')
                    ->whereColumn('reviews.game_id', 'games.id')
                    ->where('created_at', '>=', $since),
                'reviews_7d'
            )
            ->havingRaw('(ratings_7d + reviews_7d) > 0')
            ->orderByRaw('(ratings_7d + reviews_7d) DESC')
            ->orderBy('title')
            ->limit(5)
            ->get();

        $rated = Game::query()
            ->select('id', 'title', 'slug', 'cover_url')
            ->selectSub(
                DB::table('ratings')
                    ->selectRaw('AVG(score)')
                    ->whereColumn('ratings.game_id', 'games.id')
                    ->where('created_at', '>=', $since),
                'avg_7d'
            )
            ->selectSub(
                DB::table('ratings')
                    ->selectRaw('COUNT(*)')
                    ->whereColumn('ratings.game_id', 'games.id')
                    ->where('created_at', '>=', $since),
                'cnt_7d'
            )
            ->havingRaw('cnt_7d > 0')
            ->orderByDesc('avg_7d')
            ->orderByDesc('cnt_7d')
            ->orderBy('title')
            ->limit(5)
            ->get();

        $commented = Game::query()
            ->select('id', 'title', 'slug', 'cover_url')
            ->selectSub(
                DB::table('posts')
                    ->selectRaw('COUNT(*)')
                    ->whereColumn('posts.game_id', 'games.id')
                    ->where('created_at', '>=', $since),
                'posts_7d'
            )
            ->selectSub(
                DB::table('reviews')
                    ->selectRaw('COUNT(*)')
                    ->whereColumn('reviews.game_id', 'games.id')
                    ->where('created_at', '>=', $since),
                'reviews_7d'
            )
            ->havingRaw('(posts_7d + reviews_7d) > 0')
            ->orderByRaw('(posts_7d + reviews_7d) DESC')
            ->orderBy('title')
            ->limit(5)
            ->get();

        return response()->json([
            'since'     => $since->toDateString(),
            'popular'   => $popular,
            'rated'     => $rated,
            'commented' => $commented,
        ]);
    }

    public function showTrendingWeekList(string $kind, Request $request)
    {
        $since = now()->subDays(20);
        $perPage = (int) $request->query('per_page', 16);

        $query = Game::query()
            ->select('id', 'title', 'slug', 'release_date', 'cover_url')
            ->with(['genres:id,slug,name'])
            ->withAvg(['ratings as avg_all'], 'score')
            ->withCount(['ratings as cnt_all']);

        if ($kind === 'popular') {
            $query->selectSub(
                DB::table('ratings')
                    ->selectRaw('COUNT(*)')
                    ->whereColumn('ratings.game_id', 'games.id')
                    ->where('created_at', '>=', $since),
                'ratings_7d'
            )->selectSub(
                DB::table('reviews')
                    ->selectRaw('COUNT(*)')
                    ->whereColumn('reviews.game_id', 'games.id')
                    ->where('created_at', '>=', $since),
                'reviews_7d'
            )->havingRaw('(ratings_7d + reviews_7d) > 0')
                ->orderByRaw('(ratings_7d + reviews_7d) DESC')
                ->orderBy('title');
        } elseif ($kind === 'rated') {
            $query->selectSub(
                DB::table('ratings')
                    ->selectRaw('AVG(score)')
                    ->whereColumn('ratings.game_id', 'games.id')
                    ->where('created_at', '>=', $since),
                'avg_7d'
            )->selectSub(
                DB::table('ratings')
                    ->selectRaw('COUNT(*)')
                    ->whereColumn('ratings.game_id', 'games.id')
                    ->where('created_at', '>=', $since),
                'cnt_7d'
            )->havingRaw('cnt_7d > 0')
                ->orderByDesc('avg_7d')
                ->orderByDesc('cnt_7d')
                ->orderBy('title');
        } elseif ($kind === 'commented') {
            $query->selectSub(
                DB::table('posts')
                    ->selectRaw('COUNT(*)')
                    ->whereColumn('posts.game_id', 'games.id')
                    ->where('created_at', '>=', $since),
                'posts_7d'
            )->selectSub(
                DB::table('reviews')
                    ->selectRaw('COUNT(*)')
                    ->whereColumn('reviews.game_id', 'games.id')
                    ->where('created_at', '>=', $since),
                'reviews_7d'
            )->havingRaw('(posts_7d + reviews_7d) > 0')
                ->orderByRaw('(posts_7d + reviews_7d) DESC')
                ->orderBy('title');
        } else {
            return response()->json(['message' => 'kind inválido'], 400);
        }

        return $query->paginate($perPage);
    }

    /* RESEÑAS */

    public function showReviews(Request $request, string $slugOrExternalId, ImportRawgGameService $importer)
    {
        $game = $this->findOrImportGame($slugOrExternalId, $importer);

        $perPage = (int) $request->query('per_page', 10);
        $sort = $request->query('sort', 'recent'); // recent | liked
        $onlyReco = $request->boolean('recommended');
        $hideSpoilers = $request->boolean('hide_spoilers');
        $emotionSlug = $request->query('emotion');

        $q = Review::query()
            ->where('game_id', $game->id)
            ->whereNull('deleted_at')
            ->with([
                'user:id,username,avatar_url',
                'emotions:id,slug,name',
                'aspects',
            ])
            ->withCount(['likes as likes_count']);

        if ($onlyReco) {
            $q->where('is_recommended', true);
        }

        if ($hideSpoilers) {
            $q->where('spoiler', false);
        }

        if ($emotionSlug) {
            $q->whereHas('emotions', function ($qq) use ($emotionSlug) {
                $qq->where('slug', $emotionSlug);
            });
        }

        if ($sort === 'liked') {
            $q->orderByDesc('likes_count')->latest();
        } else {
            $q->latest();
        }

        return $q->paginate($perPage);
    }

    public function storeReview(Request $request, string $slugOrExternalId, ImportRawgGameService $importer)
    {
        $userId = Auth::id();
        if (!$userId) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        $game = $this->findOrImportGame($slugOrExternalId, $importer);

        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'body' => ['nullable', 'string', 'max:5000'],

            'is_recommended' => ['required', 'boolean'],
            'spoiler' => ['sometimes', 'boolean'],

            'emotion_slugs' => ['sometimes', 'array'],
            'emotion_slugs.*' => ['string', 'max:80', 'exists:emotions,slug'],

            'story_score' => ['nullable', 'integer', 'min:1', 'max:10'],
            'gameplay_score' => ['nullable', 'integer', 'min:1', 'max:10'],
            'exploration_score' => ['nullable', 'integer', 'min:1', 'max:10'],
            'art_score' => ['nullable', 'integer', 'min:1', 'max:10'],
            'difficulty_score' => ['nullable', 'integer', 'min:1', 'max:10'],
        ]);

        $title = isset($data['title']) ? trim((string) $data['title']) : '';
        $body  = isset($data['body']) ? trim((string) $data['body']) : '';

        if ($title === '' && $body === '') {
            return response()->json(['message' => 'Debes escribir un título o un texto'], 422);
        }

        $existing = Review::withTrashed()
            ->where('user_id', (int) $userId)
            ->where('game_id', (int) $game->id)
            ->first();

        if ($existing && !$existing->trashed()) {
            return response()->json(['message' => 'Ya tienes una reseña para este juego'], 409);
        }

        return DB::transaction(function () use ($existing, $data, $userId, $game, $title, $body) {
            $created = false;

            if ($existing && $existing->trashed()) {
                $review = $existing;
                $review->restore();
            } else {
                $created = true;
                $review = new Review();
                $review->user_id = (int) $userId;
                $review->game_id = (int) $game->id;
            }

            $review->title = $title !== '' ? $title : null;
            $review->body = $body !== '' ? $body : null;
            $review->is_recommended = (bool) ($data['is_recommended'] ?? false);
            $review->spoiler = (bool) ($data['spoiler'] ?? false);
            $review->save();

            $emotionSlugs = $data['emotion_slugs'] ?? [];
            $emotionIds = Emotion::query()
                ->whereIn('slug', $emotionSlugs)
                ->pluck('id')
                ->values()
                ->all();

            $review->emotions()->sync($emotionIds);

            $aspectPayload = [
                'story_score' => $data['story_score'] ?? null,
                'gameplay_score' => $data['gameplay_score'] ?? null,
                'exploration_score' => $data['exploration_score'] ?? null,
                'art_score' => $data['art_score'] ?? null,
                'difficulty_score' => $data['difficulty_score'] ?? null,
            ];

            $hasAnyAspect = false;
            foreach ($aspectPayload as $v) {
                if ($v !== null) {
                    $hasAnyAspect = true;
                    break;
                }
            }

            if ($hasAnyAspect) {
                ReviewAspect::updateOrCreate(['review_id' => $review->id], $aspectPayload);
            } else {
                ReviewAspect::query()->where('review_id', $review->id)->delete();
            }

            $this->recalcGameAspects((int) $game->id);

            $out = Review::query()
                ->where('id', $review->id)
                ->whereNull('deleted_at')
                ->with(['user:id,username,avatar_url', 'emotions:id,slug,name', 'aspects'])
                ->withCount(['likes as likes_count'])
                ->first();

            return response()->json(['review' => $out], $created ? 201 : 200);
        });
    }

    public function updateReview(Request $request, string $slugOrExternalId, int $id, ImportRawgGameService $importer)
    {
        $userId = Auth::id();
        if (!$userId) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        $game = $this->findOrImportGame($slugOrExternalId, $importer);

        $review = Review::query()
            ->where('id', $id)
            ->where('game_id', $game->id)
            ->whereNull('deleted_at')
            ->first();

        if (!$review) {
            return response()->json(['message' => 'Reseña no encontrada'], 404);
        }

        if ((int) $review->user_id !== (int) $userId) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'body' => ['nullable', 'string', 'max:5000'],

            'is_recommended' => ['required', 'boolean'],
            'spoiler' => ['sometimes', 'boolean'],

            'emotion_ids' => ['sometimes', 'array'],
            'emotion_ids.*' => ['integer', 'exists:emotions,id'],

            'emotion_slugs' => ['sometimes', 'array'],
            'emotion_slugs.*' => ['string', 'max:80', 'exists:emotions,slug'],

            'story_score' => ['nullable', 'integer', 'min:1', 'max:10'],
            'gameplay_score' => ['nullable', 'integer', 'min:1', 'max:10'],
            'exploration_score' => ['nullable', 'integer', 'min:1', 'max:10'],
            'art_score' => ['nullable', 'integer', 'min:1', 'max:10'],
            'difficulty_score' => ['nullable', 'integer', 'min:1', 'max:10'],
        ]);

        $title = isset($data['title']) ? trim((string) $data['title']) : '';
        $body  = isset($data['body'])  ? trim((string) $data['body'])  : '';

        if ($title === '' && $body === '') {
            return response()->json(['message' => 'Debes escribir un título o un texto'], 422);
        }

        return DB::transaction(function () use ($review, $data, $game, $title, $body) {
            $review->title = $title !== '' ? $title : null;
            $review->body = $body !== '' ? $body : null;

            $review->is_recommended = (bool) ($data['is_recommended'] ?? false);
            $review->spoiler = (bool) ($data['spoiler'] ?? false);
            $review->save();

            $emotionIds = [];

            if (!empty($data['emotion_ids'])) {
                $emotionIds = $data['emotion_ids'];
            }

            if (!empty($data['emotion_slugs'])) {
                $emotionIds = Emotion::query()
                    ->whereIn('slug', $data['emotion_slugs'])
                    ->pluck('id')
                    ->values()
                    ->all();
            }

            $review->emotions()->sync($emotionIds);

            $aspectPayload = [
                'story_score' => $data['story_score'] ?? null,
                'gameplay_score' => $data['gameplay_score'] ?? null,
                'exploration_score' => $data['exploration_score'] ?? null,
                'art_score' => $data['art_score'] ?? null,
                'difficulty_score' => $data['difficulty_score'] ?? null,
            ];

            $hasAnyAspect = false;
            foreach ($aspectPayload as $v) {
                if ($v !== null) {
                    $hasAnyAspect = true;
                    break;
                }
            }

            if ($hasAnyAspect) {
                ReviewAspect::updateOrCreate(['review_id' => $review->id], $aspectPayload);
            } else {
                ReviewAspect::query()->where('review_id', $review->id)->delete();
            }

            $this->recalcGameAspects((int) $game->id);

            $out = Review::query()
                ->where('id', $review->id)
                ->with(['user:id,username,avatar_url', 'emotions:id,slug,name', 'aspects'])
                ->withCount(['likes as likes_count'])
                ->first();

            if ($out) {
                $out->is_mine = true;
            }

            return response()->json(['review' => $out]);
        });
    }

    public function deleteReview(Request $request, string $slugOrExternalId, int $id, ImportRawgGameService $importer)
    {
        $userId = Auth::id();
        if (!$userId) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        $game = $this->findOrImportGame($slugOrExternalId, $importer);

        $review = Review::query()
            ->where('id', $id)
            ->where('game_id', $game->id)
            ->whereNull('deleted_at')
            ->first();

        if (!$review) {
            return response()->json(['message' => 'Reseña no encontrada'], 404);
        }

        if ((int) $review->user_id !== (int) $userId) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        return DB::transaction(function () use ($review, $game) {
            $review->emotions()->sync([]);
            ReviewAspect::query()->where('review_id', $review->id)->delete();

            $review->delete(); // soft delete

            $this->recalcGameAspects((int) $game->id);

            return response()->json(['deleted' => true]);
        });
    }

    /* NOTAS */

    public function showMyRating(Request $request, string $slugOrExternalId, ImportRawgGameService $importer)
    {
        $userId = Auth::id();
        if (!$userId) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        $game = $this->findOrImportGame($slugOrExternalId, $importer);

        $score = Rating::query()
            ->where('user_id', (int) $userId)
            ->where('game_id', (int) $game->id)
            ->value('score');

        return response()->json(['score' => $score]);
    }

    public function upsertRating(Request $request, string $slugOrExternalId, ImportRawgGameService $importer)
    {
        $userId = Auth::id();
        if (!$userId) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        $data = $request->validate([
            'score' => ['required', 'integer', 'min:1', 'max:10'],
        ]);

        $game = $this->findOrImportGame($slugOrExternalId, $importer);

        return DB::transaction(function () use ($userId, $game, $data) {
            $rating = Rating::updateOrCreate(
                ['user_id' => (int) $userId, 'game_id' => (int) $game->id],
                ['score' => (int) $data['score']]
            );

            $agg = Rating::query()
                ->where('game_id', (int) $game->id)
                ->selectRaw('AVG(score) as avg_all, COUNT(*) as cnt_all')
                ->first();

            return response()->json([
                'rating' => [
                    'user_id' => (int) $rating->user_id,
                    'game_id' => (int) $rating->game_id,
                    'score' => (int) $rating->score,
                    'created_at' => $rating->created_at,
                    'updated_at' => $rating->updated_at,
                ],
                'avg_all' => $agg?->avg_all,
                'cnt_all' => (int) ($agg?->cnt_all ?? 0),
            ], 200);
        });
    }

    public function deleteRating(Request $request, string $slugOrExternalId, ImportRawgGameService $importer)
    {
        $userId = Auth::id();
        if (!$userId) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        $game = $this->findOrImportGame($slugOrExternalId, $importer);

        return DB::transaction(function () use ($userId, $game) {
            Rating::query()
                ->where('user_id', (int) $userId)
                ->where('game_id', (int) $game->id)
                ->delete();

            $agg = Rating::query()
                ->where('game_id', (int) $game->id)
                ->selectRaw('AVG(score) as avg_all, COUNT(*) as cnt_all')
                ->first();

            return response()->json([
                'deleted' => true,
                'avg_all' => $agg?->avg_all,
                'cnt_all' => (int) ($agg?->cnt_all ?? 0),
            ], 200);
        });
    }

    /* HELPERS DEL CONTROLLER */

    /**
     * Busca el juego en la BD o lo importa de RAWG.
     */
    private function findOrImportGame(string $slugOrExternalId, ImportRawgGameService $importer): Game
    {
        $game = Game::query()
            ->where('slug', $slugOrExternalId)
            ->orWhere('external_slug', $slugOrExternalId)
            ->orWhere('external_id', is_numeric($slugOrExternalId) ? $slugOrExternalId : -1)
            ->first();

        if (!$game) {
            $game = $importer->importBySlugOrId($slugOrExternalId);
        }

        return $game;
    }

    /**
     * Aplica ordenación a cualquier query de juegos.
     */
    private function applyGameSort($query, string $sort)
    {
        if ($sort === 'alpha') {
            return $query->orderBy('title');
        }

        if ($sort === 'release') {
            return $query->orderByDesc('release_date');
        }

        if ($sort === 'popular') {
            return $query
                ->withCount(['ratings', 'reviews'])
                ->orderByDesc('ratings_count')
                ->orderByDesc('reviews_count')
                ->orderBy('title');
        }

        return $query
            ->whereHas('ratings')
            ->orderByDesc('avg_all')
            ->orderByDesc('cnt_all')
            ->orderBy('title');
    }

    /**
     * Carga las relaciones de los juegos.
     */
    private function loadGameRelations(Game $game): void
    {
        $game->load([
            'genres',
            'platforms',
            'tags',
            'stores',
            'screenshots',
            'trailers',
            'aspects',
            'systemRequirements.platform',
        ]);
    }

    /**
     * Construye las estadísticas de los juegos.
     */
    private function buildGameStats(int $gameId): array
    {
        $ratingAgg = Rating::query()
            ->where('game_id', $gameId)
            ->selectRaw('COUNT(*) as cnt, AVG(score) as avg')
            ->first();

        $reviewsAgg = Review::query()
            ->where('game_id', $gameId)
            ->whereNull('deleted_at')
            ->selectRaw('COUNT(*) as total, SUM(CASE WHEN is_recommended = 1 THEN 1 ELSE 0 END) as reco')
            ->first();

        $ratingsCount = (int) ($ratingAgg->cnt ?? 0);
        $ratingsAvg = $ratingAgg->avg !== null ? round((float) $ratingAgg->avg, 2) : null;

        $reviewsTotal = (int) ($reviewsAgg->total ?? 0);
        $reviewsReco = (int) ($reviewsAgg->reco ?? 0);

        $recommendedPct = $reviewsTotal > 0 ? (int) round(($reviewsReco / $reviewsTotal) * 100) : 0;

        return [
            'ratings_count'   => $ratingsCount,
            'ratings_avg'     => $ratingsAvg,
            'reviews_count'   => $reviewsTotal,
            'recommended_pct' => $recommendedPct,
        ];
    }

    /**
     * Construye el resumen de emociones del juego a partir de sus reseñas.
     */
    private function buildEmotionsSummary(int $gameId, int $reviewsTotal): array
    {
        $emotionRows = DB::table('review_emotion')
            ->join('reviews', 'reviews.id', '=', 'review_emotion.review_id')
            ->join('emotions', 'emotions.id', '=', 'review_emotion.emotion_id')
            ->where('reviews.game_id', $gameId)
            ->whereNull('reviews.deleted_at')
            ->select(
                'emotions.slug',
                'emotions.name',
                DB::raw('COUNT(DISTINCT reviews.id) as reviews_count')
            )
            ->groupBy('emotions.slug', 'emotions.name')
            ->orderByDesc('reviews_count')
            ->get();

        return $emotionRows->map(function ($r) use ($reviewsTotal) {
            $pct = $reviewsTotal > 0 ? (int) round(((int) $r->reviews_count / $reviewsTotal) * 100) : 0;

            $displayName = __('emotions.' . $r->slug);
            if ($displayName === 'emotions.' . $r->slug) {
                $displayName = $r->name;
            }

            return [
                'slug'          => $r->slug,
                'name'          => $r->name,
                'display_name'  => $displayName,
                'reviews_count' => (int) $r->reviews_count,
                'pct'           => $pct,
            ];
        })->values()->all();
    }

    /**
     * Construye los datos del usuario para un juego si está logueado.
     */
    private function buildMeData($user, int $gameId): ?array
    {
        if (!$user) return null;

        $myRating = Rating::query()
            ->where('user_id', $user->id)
            ->where('game_id', $gameId)
            ->value('score');

        $rec = Recommendation::query()
            ->where('user_id', $user->id)
            ->where('game_id', $gameId)
            ->first();

        $myReviewId = Review::query()
            ->where('user_id', $user->id)
            ->where('game_id', $gameId)
            ->whereNull('deleted_at')
            ->value('id');

        $recData = null;
        if ($rec) {
            $raw = (float) $rec->score;
            $recData = [
                'score'  => $raw,
                'pct'    => $this->recommendationScoreToPct($raw),
                'reason' => $rec->reason,
            ];
        }

        return [
            'rating' => $myRating !== null ? (int) $myRating : null,
            'recommendation' => $recData,
            'has_review' => $myReviewId !== null,
            'review_id'  => $myReviewId !== null ? (int) $myReviewId : null,
        ];
    }

    /**
     * Convierte el score interno de recomendación a porcentaje normalizando tanto valores 0–1
     * como valores ya en escala 0–100.
     */
    private function recommendationScoreToPct(float $raw): int
    {
        $pct = $raw <= 1.0 ? (int) round($raw * 100) : (int) round($raw);
        return max(0, min(100, $pct));
    }

    /*
    * Recalcula y guarda las medias de aspectos del juego a partir de las puntuaciones por reseña.
    */
    private function recalcGameAspects(int $gameId): void
    {
        $row = ReviewAspect::query()
            ->join('reviews', 'reviews.id', '=', 'review_aspect.review_id')
            ->whereNull('reviews.deleted_at')
            ->where('reviews.game_id', $gameId)
            ->selectRaw('
                AVG(story_score) as story_avg,
                AVG(gameplay_score) as gameplay_avg,
                AVG(exploration_score) as exploration_avg,
                AVG(art_score) as art_avg,
                AVG(difficulty_score) as difficulty_avg,
                COUNT(*) as reviews_count
            ')
            ->first();

        $payload = [
            'story_avg' => $row?->story_avg,
            'gameplay_avg' => $row?->gameplay_avg,
            'exploration_avg' => $row?->exploration_avg,
            'art_avg' => $row?->art_avg,
            'difficulty_avg' => $row?->difficulty_avg,
            'reviews_count' => (int) ($row?->reviews_count ?? 0),
        ];

        Aspect::updateOrCreate(['game_id' => $gameId], $payload);
    }
}
