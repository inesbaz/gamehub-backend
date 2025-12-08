<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Similarity extends Model
{
    use HasFactory;

    protected $table = 'similarity';

    // No hay columna id y la PK es compuesta
    public $incrementing = false;
    protected $primaryKey = null;

    // Solo hay updated_at, no created_at
    public $timestamps = true;
    public const CREATED_AT = null;
    public const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'user_a_id',
        'user_b_id',
        'similarity',
        'updated_at',
    ];

    protected $casts = [
        'similarity' => 'decimal:4',
        'updated_at' => 'datetime',
    ];

    // Usuario de origen
    public function userA()
    {
        return $this->belongsTo(User::class, 'user_a_id');
    }

    // Usuario de destino
    public function userB()
    {
        return $this->belongsTo(User::class, 'user_b_id');
    }
}
