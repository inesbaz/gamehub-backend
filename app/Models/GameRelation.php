<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GameRelation extends Model
{
    use HasFactory;

    protected $table = 'game_relations';

    protected $fillable = [
        'game_id',
        'related_game_id',
        'type', // dlc | expansion | goty | parent | series
    ];

    protected $casts = [
        'type' => 'string',
    ];

    // ─────────────────────────────────────────────
    // Relaciones
    // ─────────────────────────────────────────────

    /** Juego origen de la relación */
    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }

    /** Juego relacionado (destino) */
    public function relatedGame()
    {
        return $this->belongsTo(Game::class, 'related_game_id');
    }
}
