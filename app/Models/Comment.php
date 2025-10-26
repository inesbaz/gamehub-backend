<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'post_id',
        'body',
    ];

    // ─────────────────────────────────────────────
    // Relaciones
    // ─────────────────────────────────────────────

    /** Autor del comentario */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /** Reseña comentada */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /** Likes recibidos (polimórfico) */
    public function likes()
    {
        return $this->morphMany(Like::class, 'entity');
    }
}
