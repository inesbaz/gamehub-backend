<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Screenshot extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'image_url',
        'width',
        'height',
        'position',
    ];

    protected $casts = [
        'width'    => 'integer',
        'height'   => 'integer',
        'position' => 'integer',
    ];

    /** Juego al que pertenece la captura */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
