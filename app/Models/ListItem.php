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

    public function list()
    {
        // Disclaimer: el modelo de la tabla 'Lists' se llama 'ListModel' para evitar palabra reservada
        return $this->belongsTo(ListModel::class, 'list_id');
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
