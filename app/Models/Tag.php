<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Juegos asociados a esta etiqueta (N:M)
     */
    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_tag');
    }
}
