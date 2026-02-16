<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

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
    
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function lists()
    {
        return $this->hasMany(ListModel::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function following()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'follower_id', // este usuario sigue
            'followed_id' // estos usuarios son seguidos
        )->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(
            User::class,
            'follows',
            'followed_id', // este usuario es seguido
            'follower_id' // estos usuarios siguen al usuario
        )->withTimestamps();
    }

    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }

    public function similarities()
    {
        return $this->hasMany(Similarity::class, 'user_a_id');
    }
}
