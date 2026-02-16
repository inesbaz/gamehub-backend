<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aspect extends Model
{
    use HasFactory;

    protected $table = 'aspects';

    protected $fillable = [
        'game_id',
        'story_avg',
        'gameplay_avg',
        'exploration_avg',
        'art_avg',
        'difficulty_avg',
        'reviews_count',
    ];

    protected $casts = [
        'story_avg'        => 'decimal:2',
        'gameplay_avg'     => 'decimal:2',
        'exploration_avg'  => 'decimal:2',
        'art_avg'          => 'decimal:2',
        'difficulty_avg'   => 'decimal:2',
        'reviews_count'    => 'integer',
    ];

    /** Relación 1:1 (resumen) con el juego */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
