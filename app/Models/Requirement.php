<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Requirement extends Model
{
    use HasFactory;

    // ─────────────────────────────────────────────
    // Atributos
    // ─────────────────────────────────────────────
    protected $fillable = [
        'game_id',
        'platform_id',
        'minimum',
        'recommended',
    ];

    // ─────────────────────────────────────────────
    // Relaciones principales
    // ─────────────────────────────────────────────

    /** Juego al que pertenecen los requisitos */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    /** Plataforma (PC, Linux, Mac, etc.) */
    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }
}
