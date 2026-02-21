<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

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
        return $this->belongsToMany(Game::class, 'game_tag');
    }

    public function getDisplayNameAttribute(): string
    {
        $key = 'tags.' . $this->slug;
        $t = __($key);

        return $t === $key ? $this->name : $t;
    }
}
