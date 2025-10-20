<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'entity_type',
        'entity_id',
    ];

    /**
     * Usuario que dio el like
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Entidad a la que pertenece el like (review, comment, post, etc.)
     */
    public function entity()
    {
        return $this->morphTo(__FUNCTION__, 'entity_type', 'entity_id');
    }
}
