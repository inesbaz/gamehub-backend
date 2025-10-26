<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'external_id',
        'name',
        'slug',
        'last_synced_at'
    ];

    protected $casts = [
        'last_synced_at' => 'datetime',
    ];

    /** Juegos asociados a este género (N:M) */
    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_genre');
    }
}
