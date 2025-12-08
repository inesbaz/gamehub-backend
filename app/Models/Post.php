<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'game_id',
        'type',            // note | screenshot | clip
        'text',
        'media_url',
        'media_width',
        'media_height',
    ];

    protected $casts = [
        'media_width'  => 'integer',
        'media_height' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'entity');
    }
}
