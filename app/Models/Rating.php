<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rating extends Model
{
    use HasFactory;

    // ─────────────────────────────────────────────
    // Atributos
    // ─────────────────────────────────────────────
    protected $fillable = [
        'user_id',
        'game_id',
        'score',
    ];

    protected $casts = [
        'score' => 'integer',
    ];

    // ─────────────────────────────────────────────
    // Relaciones principales
    // ─────────────────────────────────────────────

    /** Usuario que dejó la valoración */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /** Juego al que pertenece la valoración */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
