<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'game_id',
        'type',            // note | screenshot | clip
        'text',
        'media_url',
        'media_width',
        'media_height',
    ];

    protected $casts = [
        'media_width'  => 'integer',
        'media_height' => 'integer',
    ];

    // ─────────────────────────────
    // Relaciones
    // ─────────────────────────────

    /** Autor del post */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /** Juego asociado (opcional) */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    /** Likes recibidos (polimórfico) */
    public function likes()
    {
        return $this->morphMany(Like::class, 'entity');
    }
}
