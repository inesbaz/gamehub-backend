<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ListModel extends Model
{
    use HasFactory;

    protected $table = 'lists';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'is_public',
    ];

    protected $casts = [
        'is_public' => 'boolean',
    ];

    // ─────────────────────────────────────────────
    // Relaciones
    // ─────────────────────────────────────────────

    /** Propietario de la lista */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /** Items de la lista (para ordenar, etc.) */
    public function items()
    {
        return $this->hasMany(ListItem::class, 'list_id');
    }

    /** Juegos incluidos en la lista (N:M vía list_items) */
    public function games()
    {
        return $this->belongsToMany(Game::class, 'list_items', 'list_id', 'game_id')
                    ->withPivot('position')
                    ->withTimestamps();
    }
}
