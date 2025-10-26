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
        'ordering',
        'external_id'
    ];

    protected $casts = [
        'width'    => 'integer',
        'height'   => 'integer',
        'ordering' => 'integer',
    ];

    /** Juego al que pertenece la captura */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
