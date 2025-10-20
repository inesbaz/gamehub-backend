<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // ─────────────────────────────────────────────
    // Atributos básicos
    // ─────────────────────────────────────────────
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'avatar_url',
        'country',
        'birthdate',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthdate' => 'date',
    ];

    // ─────────────────────────────────────────────
    // Relaciones principales
    // ─────────────────────────────────────────────

    /** Un usuario puede tener muchas reseñas */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /** Un usuario puede dejar valoraciones rápidas (ratings) */
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    /** Un usuario puede crear muchos posts (notas, clips, etc.) */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /** Un usuario puede tener muchas listas */
    public function lists()
    {
        return $this->hasMany(ListModel::class); // si tu clase se llama List.php, cambia a ListModel para evitar conflicto PHP
    }

    /** Un usuario puede hacer muchos comentarios */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /** Un usuario puede seguir a otros usuarios */
    public function following()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'follower_id',   // este usuario sigue a...
            'followed_id'    // ...estos usuarios
        )->withTimestamps();
    }

    /** Un usuario puede ser seguido por otros usuarios */
    public function followers()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'followed_id',   // este usuario es seguido por...
            'follower_id'    // ...estos usuarios
        )->withTimestamps();
    }

    /** Recomendaciones personalizadas (precalculadas) */
    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }

    /** Similitudes calculadas con otros usuarios */
    public function similarities()
    {
        return $this->hasMany(Similarity::class, 'user_a_id');
    }
}
