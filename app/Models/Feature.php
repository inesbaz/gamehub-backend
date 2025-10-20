<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Feature extends Model
{
    use HasFactory;

    // La PK es también FK a games.id
    protected $primaryKey = 'game_id';
    public $incrementing = false;

    protected $fillable = [
        'game_id',
        'has_story',
        'open_world',
        'co_op',
        'multiplayer',
        'requires_online',
        'singleplayer',
        'vr_support',
        'local_coop',
        'camera',
        'art_style',
        'avg_playtime_hours',
        'esrb_rating',
    ];

    protected $casts = [
        'has_story'        => 'boolean',
        'open_world'       => 'boolean',
        'co_op'            => 'boolean',
        'multiplayer'      => 'boolean',
        'requires_online'  => 'boolean',
        'singleplayer'     => 'boolean',
        'vr_support'       => 'boolean',
        'local_coop'       => 'boolean',
        'avg_playtime_hours' => 'integer',
    ];

    /** Relación 1:1 con el juego */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
