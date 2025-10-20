<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recommendation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'game_id',
        'score',
        'reason',
    ];

    protected $casts = [
        'score'  => 'decimal:4',
        'reason' => 'array',     // JSON -> array asociativo
    ];

    // ─────────────────────────────────────────────
    // Relaciones
    // ─────────────────────────────────────────────

    /** Usuario al que va dirigida la recomendación */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /** Juego recomendado */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
