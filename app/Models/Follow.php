<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Follow extends Model
{
    use HasFactory;

    // ─────────────────────────────────────────────
    // Configuración básica
    // ─────────────────────────────────────────────
    // No hay columna id autoincremental
    public $incrementing = false;
    protected $primaryKey = null;

    protected $fillable = [
        'follower_id',
        'followed_id',
    ];

    // ─────────────────────────────────────────────
    // Relaciones
    // ─────────────────────────────────────────────

    /** Usuario que sigue a otro */
    public function follower()
    {
        return $this->belongsTo(User::class, 'follower_id');
    }

    /** Usuario que es seguido */
    public function followed()
    {
        return $this->belongsTo(User::class, 'followed_id');
    }
}
