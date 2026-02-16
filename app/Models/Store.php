<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory;

    protected $table = 'stores';

    protected $fillable = [
        'external_id',
        'slug',
        'name',
        'last_synced_at',
    ];

    protected $casts = [
        'last_synced_at' => 'datetime',
    ];

    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_store')
            ->withPivot('url')
            ->withTimestamps();
    }
}
