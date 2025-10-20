<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ListItem extends Model
{
    use HasFactory;

    protected $table = 'list_items';

    protected $fillable = [
        'list_id',
        'game_id',
        'position',
    ];

    protected $casts = [
        'position' => 'integer',
    ];

    // ─────────────────────────────────────────────
    // Relaciones
    // ─────────────────────────────────────────────

    /** Lista a la que pertenece el item */
    public function list()
    {
        // Ojo: el modelo de la tabla lists lo llamamos ListModel para evitar palabra reservada
        return $this->belongsTo(ListModel::class, 'list_id');
    }

    /** Juego incluido en la lista */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
