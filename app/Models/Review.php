<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, SoftDeletes;

    // ─────────────────────────────────────────────
    // Atributos
    // ─────────────────────────────────────────────
    protected $fillable = [
        'user_id',
        'game_id',
        'title',
        'body',
        'is_recommended',
        'spoiler',
    ];

    protected $casts = [
        'is_recommended' => 'boolean',
        'spoiler'        => 'boolean',
    ];

    // ─────────────────────────────────────────────
    // Relaciones principales
    // ─────────────────────────────────────────────

    /** Autor de la reseña */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /** Juego reseñado */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    /** Emociones asociadas (relación N:M) */
    public function emotions()
    {
        return $this->belongsToMany(Emotion::class, 'review_emotion')
                    ->withPivot('intensity')
                    ->withTimestamps();
    }

    /** Comentarios en la reseña */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /** Likes (relación polimórfica) */
    public function likes()
    {
        return $this->morphMany(Like::class, 'entity');
    }
}
