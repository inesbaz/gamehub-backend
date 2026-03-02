<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RecommendationService;
use Illuminate\Support\Facades\Auth;
use App\Models\Game;


class RecommendationController extends Controller
{

    /* JUGADORES AFINES */

    /**
     * Muestra a los jugadores afines para el carrusel de la vista.
     */
    public function showSoulmates(Request $request, RecommendationService $svc)
    {
        $userId = Auth::id();
        if (!$userId) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        $limit = (int) $request->query('limit', 12);
        $limit = max(1, min(20, $limit));

        return response()->json($svc->buildSoulmates((int) $userId, $limit));
    }

    /**
     * Muestra el panel para comparar jugadores afines.
     */
    public function showSoulmateCompare(int $id, Request $request, RecommendationService $svc)
    {
        $userId = Auth::id();
        if (!$userId) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        $userBId = (int) $id;
        if ($userBId <= 0 || $userBId === (int) $userId) {
            return response()->json(['message' => 'Parámetro inválido'], 400);
        }

        $opts = [
            'limit'      => max(3, min(50, (int) $request->query('limit', 12))),
            'like_score' => max(1, min(10, (int) $request->query('like_score', 8))),
        ];

        $data = $svc->buildSoulmateCompare((int) $userId, $userBId, $opts);

        if ($data === null) {
            return response()->json(['message' => 'No hay similitud registrada para este usuario'], 404);
        }

        return response()->json($data);
    }

    /**
     * Muestra los juegos favoritos de los jugadores afines que el usuario aún no ha probado.
     */
    public function showSoulmateRecommendedGames(int $id, Request $request, RecommendationService $svc)
    {
        $userId = Auth::id();
        if (!$userId) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        $userBId = (int) $id;
        if ($userBId <= 0 || $userBId === (int) $userId) {
            return response()->json(['message' => 'Parámetro inválido'], 400);
        }

        $perPage = (int) $request->query('per_page', 16);
        $perPage = max(8, min(40, $perPage));

        $likeScore = (int) $request->query('like_score', 8);
        $likeScore = max(1, min(10, $likeScore));

        $query = $svc->soulmateRecommendedGamesQuery((int) $userId, $userBId, $likeScore);

        if ($query === null) {
            return response()->json(['message' => 'No hay similitud registrada para este usuario'], 404);
        }

        return $query->paginate($perPage);
    }

    /* RECOMENDACIONES */

    /**
     * Muestra los juegos recomendados para el usuario.
     */
    public function showRecommendationGames(Request $request)
    {
        $userId = Auth::id();
        if (!$userId) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        $perPage = (int) $request->query('per_page', 16);
        $perPage = max(8, min(40, $perPage));

        $query = Game::query()
            ->join('recommendations as rec', 'rec.game_id', '=', 'games.id')
            ->where('rec.user_id', $userId)
            ->orderByDesc('rec.score')
            ->select([
                'games.id',
                'games.title',
                'games.slug',
                'games.release_date',
                'games.cover_url',
                'rec.score as rec_score',
            ])
            ->with(['genres:id,slug,name'])
            ->withAvg(['ratings as avg_all'], 'score')
            ->withCount(['ratings as cnt_all']);

        return $query->paginate($perPage);
    }

    /**
     * Muestra los bloques de juegos recomendados por géneros, tags, aspectos y jugadores afines.
     */
    public function showRecommendationBlocks(Request $request, RecommendationService $svc)
    {
        $userId = Auth::id();
        if (!$userId) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        $opts = [
            'perBlock'     => (int) $request->query('per_block', 12),
            'genreBlocks'  => (int) $request->query('genre_blocks', 4),
            'tagBlocks'    => (int) $request->query('tag_blocks', 4),
            'aspectBlocks' => (int) $request->query('aspect_blocks', 2),
            'topN'         => (int) $request->query('top_n', 75),
        ];

        return response()->json($svc->buildRecommendationBlocks((int) $userId, $opts));
    }
}
