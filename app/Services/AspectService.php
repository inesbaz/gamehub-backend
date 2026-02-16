<?php

namespace App\Services;

use App\Models\Aspect;
use Illuminate\Support\Facades\DB;

class AspectService
{
    /**
     * Recalcula el resumen de aspectos (tabla `aspects`) para un juego.
     *
     * - 'review_aspect' guarda las puntuaciones por review (1–10, nullable).
     * 
     * - Para calcular las medias usamos AVG (ignora NULL), por lo que solo promedian
     *   las reviews que puntuan cada aspecto.
     * 
     *   Ejemplo: si una review solo puntúa art y difficulty, no afecta a story.
     *
     * - Si el usuario no puntúa ningú aspecto (toda la fila NULL),
     *   esa review no cuenta.
     *
     */
    public function recomputeGameAspects(int $gameId): void
    {
        $query = DB::table('reviews as r')
            ->join('review_aspect as ra', 'ra.review_id', '=', 'r.id')
            ->where('r.game_id', $gameId)
            ->whereNull('r.deleted_at')
            ->where(function ($where) {     // excluye filas donde el usuario no valora nada
                $where->whereNotNull('ra.story_score')
                    ->orWhereNotNull('ra.gameplay_score')
                    ->orWhereNotNull('ra.exploration_score')
                    ->orWhereNotNull('ra.art_score')
                    ->orWhereNotNull('ra.difficulty_score');
            });

        $row = $query->selectRaw('AVG(ra.story_score) as story_avg')
            ->selectRaw('AVG(ra.gameplay_score) as gameplay_avg')
            ->selectRaw('AVG(ra.exploration_score) as exploration_avg')
            ->selectRaw('AVG(ra.art_score) as art_avg')
            ->selectRaw('AVG(ra.difficulty_score) as difficulty_avg')
            ->selectRaw('COUNT(*) as reviews_count')    // cuenta reviews con al menos 1 score
            ->first();

        Aspect::updateOrCreate(
            ['game_id' => $gameId],
            [
                'story_avg'       => $row?->story_avg,
                'gameplay_avg'    => $row?->gameplay_avg,
                'exploration_avg' => $row?->exploration_avg,
                'art_avg'         => $row?->art_avg,
                'difficulty_avg'  => $row?->difficulty_avg,
                'reviews_count'   => (int)($row?->reviews_count ?? 0),
            ]
        );
    }
}
