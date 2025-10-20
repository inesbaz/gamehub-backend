<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    /** Juegos asociados a este género (N:M) */
    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_genre');
    }
}
