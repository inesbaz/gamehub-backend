<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trailer extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'name',
        'preview_image',
        'video_url',
        'external_id',
        'ordering'
    ];

    protected $casts = [
        'ordering' => 'integer'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
