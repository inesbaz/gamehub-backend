<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trailer extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'name',
        'preview_image',
        'video_url',
    ];

    /** Juego al que pertenece el tráiler */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
