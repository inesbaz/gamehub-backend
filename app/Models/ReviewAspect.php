<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewAspect extends Model
{
    protected $table = 'review_aspect';
    
    protected $fillable = [
        'review_id',
        'story_score',
        'gameplay_score',
        'exploration_score',
        'art_score',
        'difficulty_score',
    ];

    protected $casts = [
        'story_score'       => 'integer',
        'gameplay_score'    => 'integer',
        'exploration_score' => 'integer',
        'art_score'         => 'integer',
        'difficulty_score'  => 'integer',
    ];

    public function review()
    {
        return $this->belongsTo(Review::class);
    }
}
