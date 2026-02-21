<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Services\ImportRawgGameService;
use App\Models\Genre;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Devuelve el detalle de un juego. Si no existe en BD, lo importa desde RAWG (lazy import).
     */
    public function show(string $slugOrExternalId, ImportRawgGameService $importer)
    {
        // Se busca en la base de datos
        $game = Game::where('slug', $slugOrExternalId)
            ->orWhere('external_slug', $slugOrExternalId)
            ->orWhere('external_id', is_numeric($slugOrExternalId) ? $slugOrExternalId : -1)
            ->first();

        // Si no existe, se importa desde RAWG
        if (!$game) {
            $game = $importer->importBySlugOrId($slugOrExternalId);
        }

        // Se devuelve el juego con sus relaciones
        return $game->load([
            'genres',
            'platforms',
            'tags',
            'stores',
            'screenshots',
            'trailers',
        ]);
    }

    /**
     * Devuelve los 12 géneros más populares por número de juegos asociados e incluye 3 covers por género.
     */
    public function exploreGenres()
    {
        // Top géneros por cantidad de juegos asociados (tabla pivot game_genre)
        $genres = Genre::withCount('games')
            ->orderByDesc('games_count')
            ->limit(12)
            ->get();

        // Para cada género, saca 3 screenshots de juegos populares (con muchos ratings en RAWG)
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
     * Devuelve un listado paginado de juegos con orden configurable: alfabético, por fecha, por popularidad o por valoración.
     */
    public function exploreGames(Request $request)
    {
        $sort = $request->query('sort', 'popular');
        $perPage = (int) $request->query('per_page', 24);

        $query = Game::query()->select('id', 'title', 'slug', 'release_date', 'cover_url');

        // 1) Orden alfabético
        if ($sort === 'alpha') {
            return $query->orderBy('title')->paginate($perPage);
        }

        // 2) Fecha de lanzamiento
        if ($sort === 'release') {
            return $query->orderByDesc('release_date')->paginate($perPage);
        }

        // 3) Más populares (más ratings y reviews)
        if ($sort === 'popular') {
            return $query
                ->withCount(['ratings', 'reviews'])
                ->orderByDesc('ratings_count')
                ->orderByDesc('reviews_count')
                ->orderBy('title')
                ->paginate($perPage);
        }

        // 4) Más valorados en los últimos 30 días
        $since = now()->subDays(30);

        return $query
            ->whereHas('ratings', function ($q) use ($since) {
                $q->where('created_at', '>=', $since);
            })
            ->withAvg(['ratings as avg_30d' => function ($q) use ($since) {
                $q->where('created_at', '>=', $since);
            }], 'score')
            ->withCount(['ratings as cnt_30d' => function ($q) use ($since) {
                $q->where('created_at', '>=', $since);
            }])
            ->orderByDesc('avg_30d')
            ->orderByDesc('cnt_30d')
            ->orderBy('title')
            ->paginate($perPage);
    }
}
