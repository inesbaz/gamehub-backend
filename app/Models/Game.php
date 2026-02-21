<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;

    protected $table = 'games';

    // ─────────────────────────────────────────────
    // Atributos
    // ─────────────────────────────────────────────
    protected $fillable = [
        'external_id',
        'external_slug',
        'title',
        'slug',
        'summary',
        'official_website',
        'release_date',
        'rawg_updated_at',
        'avg_playtime_hours',
        'cover_url',
        'cover_thumb_url',
        'has_trailers',
        'has_screenshots',
        'rawg_rating_avg',
        'rawg_rating_count',
        'metacritic',
        'metacritic_url',
        'esrb_rating',
        'last_synced_at',
    ];

    protected $casts = [
        'release_date'    => 'date',
        'rawg_updated_at' => 'datetime',
        'last_synced_at'  => 'datetime',
        'has_trailers'    => 'boolean',
        'has_screenshots' => 'boolean',
        'rawg_rating_avg' => 'decimal:1',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function systemRequirements()
    {
        return $this->hasMany(Requirement::class);
    }

    public function stores()
    {
        return $this->belongsToMany(Store::class, 'game_store')
            ->withPivot('url')
            ->withTimestamps();
    }

    public function screenshots()
    {
        return $this->hasMany(Screenshot::class);
    }

    public function trailers()
    {
        return $this->hasMany(Trailer::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'game_genre');
    }

    public function platforms()
    {
        return $this->belongsToMany(Platform::class, 'game_platform');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'game_tag');
    }

    public function aspects()
    {
        return $this->hasOne(Aspect::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function listItems()
    {
        return $this->hasMany(ListItem::class);
    }

    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }

    public function getCoverUrlAttribute($value)
    {
        return $value ?: url('/images/no-image.png');
    }
}
