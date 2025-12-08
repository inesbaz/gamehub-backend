<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Services\ImportRawgGameService;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Devuelve el detalle de un juego.
     * Si no existe en BD, lo importa desde RAWG (lazy import).
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
}
