<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'description',
        'avatar_url',
        'country',
        'birthdate',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'birthdate'         => 'date',
            'password'          => 'hashed',
        ];
    }

    // Forzamos username sin espacios alrededor
    public function setUsernameAttribute($value): void
    {
        $this->attributes['username'] = trim(mb_strtolower($value));
    }

    // País en mayúsculas (ISO-3166-1 alpha-2)
    public function setCountryAttribute($value): void
    {
        $this->attributes['country'] = $value ? mb_strtoupper($value) : null;
    }

    // Avatar por defecto si no hay
    public function getAvatarUrlAttribute($value): string
    {
        return $value ?: 'https://www.shutterstock.com/image-vector/avatar-gender-neutral-silhouette-vector-600nw-2470054311.jpg';
    }

    // Usar username en las rutas: /u/{username}
    public function getRouteKeyName(): string
    {
        return 'username';
    }

    /* ==========================
     |  Relaciones de dominio
     ========================== */

    // Contenido del usuario
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

    // OJO: nombra el modelo como GameList (no "List") y mapea tabla 'lists'
    public function lists()
    {
        return $this->hasMany(GameList::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }

    // Follows (self N:M)
    public function following()
    {
        // a quién sigo
        return $this->belongsToMany(
            self::class,
            'follows',
            'follower_id',
            'followed_id'
        )->withTimestamps();
    }

    public function followers()
    {
        // quién me sigue
        return $this->belongsToMany(
            self::class,
            'follows',
            'followed_id',
            'follower_id'
        )->withTimestamps();
    }

    // Likes (si usas tabla polimórfica 'likes' con entity_type/entity_id)
    // Helpers para consultar lo que ha likeado el usuario:
    public function likedReviews()
    {
        return $this->belongsToMany(Review::class, 'likes', 'user_id', 'entity_id')
            ->wherePivot('entity_type', 'review')
            ->withTimestamps();
    }

    public function likedComments()
    {
        return $this->belongsToMany(Comment::class, 'likes', 'user_id', 'entity_id')
            ->wherePivot('entity_type', 'comment')
            ->withTimestamps();
    }

    public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'likes', 'user_id', 'entity_id')
            ->wherePivot('entity_type', 'post')
            ->withTimestamps();
    }

    // Similitudes (dirigidas; puedes consultar como A o como B)
    public function similarityAsA()
    {
        return $this->hasMany(Similarity::class, 'user_a_id');
    }

    public function similarityAsB()
    {
        return $this->hasMany(Similarity::class, 'user_b_id');
    }

    /* ==========================
     |  Scopes útiles
     ========================== */

    public function scopeByUsername($query, string $username)
    {
        return $query->where('username', mb_strtolower($username));
    }

    /* ==========================
     |  Helpers de dominio
     ========================== */

    public function isFollowing(User $other): bool
    {
        if ($this->id === $other->id) return false;
        // evita N+1 cargando relación con ->with('following') cuando toque
        return $this->following()->where('users.id', $other->id)->exists();
    }
}
