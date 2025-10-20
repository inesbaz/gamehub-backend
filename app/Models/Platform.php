<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Platform extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Juegos disponibles en esta plataforma (N:M)
     */
    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_platform');
    }

    /**
     * Requisitos del sistema para esta plataforma (1:N)
     */
    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }
}
