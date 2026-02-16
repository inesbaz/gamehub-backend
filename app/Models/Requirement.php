<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Requirement extends Model
{
    use HasFactory;

    protected $table = 'requirements';

    protected $fillable = [
        'game_id',
        'platform_id',
        'minimum',
        'recommended',
        'source'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }
}
