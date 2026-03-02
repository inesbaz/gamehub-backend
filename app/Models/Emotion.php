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

    protected $appends = ['display_name'];

    public function reviews()
    {
        return $this->belongsToMany(Review::class, 'review_emotion')
            ->withTimestamps();
    }

    /**
     * Devuelve el nombre a mostrar (display_name).
     * Usa la traducción por slug si existe en la carpeta lang.
     */
    public function getDisplayNameAttribute(): string
    {
        $key = 'emotions.' . $this->slug;
        $t = __($key);

        return $t === $key ? $this->name : $t;
    }
}
