<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Emotion extends Model
{
    use HasFactory;

    protected $table = 'emotions';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function reviews()
    {
        return $this->belongsToMany(Review::class, 'review_emotion')
                    ->withPivot('intensity')
                    ->withTimestamps();
    }
}
