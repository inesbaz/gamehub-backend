<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'game_id',
        'title',
        'body',
        'is_recommended',
        'spoiler',
    ];

    protected $casts = [
        'is_recommended' => 'boolean',
        'spoiler'        => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

 
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function emotions()
    {
        return $this->belongsToMany(Emotion::class, 'review_emotion')
                    ->withPivot('intensity')
                    ->withTimestamps();
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'entity');
    }
}
