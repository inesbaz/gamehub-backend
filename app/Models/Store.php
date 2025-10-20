<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory;

    // ─────────────────────────────────────────────
    // Atributos
    // ─────────────────────────────────────────────
    protected $fillable = [
        'game_id',
        'store_slug',
        'store_name',
        'url',
    ];

    // ─────────────────────────────────────────────
    // Relaciones
    // ─────────────────────────────────────────────

    /** Juego al que pertenece esta tienda */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
