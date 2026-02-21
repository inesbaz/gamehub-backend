<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'genres';

    protected $fillable = [
        'external_id',
        'name',
        'slug',
        'last_synced_at'
    ];

    protected $casts = [
        'last_synced_at' => 'datetime',
    ];

    protected $appends = ['display_name'];

    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_genre');
    }

    public function getDisplayNameAttribute(): string
    {
        $key = 'genres.' . $this->slug;
        $t = __($key);

        return $t === $key ? $this->name : $t;
    }
}
