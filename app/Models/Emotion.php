<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Emotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Reseñas que tienen asociada esta emoción (N:M)
     * Pivot: review_emotion (review_id, emotion_id, intensity?, timestamps)
     */
    public function reviews()
    {
        return $this->belongsToMany(Review::class, 'review_emotion')
                    ->withPivot('intensity')
                    ->withTimestamps();
    }
}
