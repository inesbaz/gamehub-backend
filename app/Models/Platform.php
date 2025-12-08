<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Platform extends Model
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

    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_platform');
    }

    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }
}
