<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;

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
    ];

    protected $casts = [
        'release_date'      => 'date',
        'rawg_updated_at'   => 'datetime',
        'has_trailers'      => 'boolean',
        'has_screenshots'   => 'boolean',
        'rawg_rating_avg'   => 'decimal:1',
    ];

    // ─────────────────────────────────────────────
    // Relaciones principales
    // ─────────────────────────────────────────────

    /** Reseñas del juego (opiniones largas) */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /** Valoraciones rápidas (ratings 1–10) */
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    /** Características objetivas (1:1 con game_features) */
    public function features()
    {
        return $this->hasOne(Feature::class);
    }

    /** Requisitos del sistema por plataforma */
    public function systemRequirements()
    {
        return $this->hasMany(Requirement::class);
    }

    /** Tiendas donde está disponible */
    public function stores()
    {
        return $this->hasMany(Store::class);
    }

    /** Capturas de pantalla */
    public function screenshots()
    {
        return $this->hasMany(Screenshot::class);
    }

    /** Tráilers o vídeos */
    public function trailers()
    {
        return $this->hasMany(Trailer::class);
    }

    /** Relaciones entre juegos (DLCs, expansiones, GOTY, etc.) */
    public function relatedGames()
    {
        return $this->belongsToMany(
            Game::class,
            'game_relations',
            'game_id',
            'related_game_id'
        )->withPivot('type')
         ->withTimestamps();
    }

    /** Relación inversa opcional (si quieres obtener los juegos que lo tienen como relacionado) */
    public function parentRelations()
    {
        return $this->belongsToMany(
            Game::class,
            'game_relations',
            'related_game_id',
            'game_id'
        )->withPivot('type')
         ->withTimestamps();
    }

    /** Géneros (N:M) */
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'game_genre');
    }

    /** Plataformas (N:M) */
    public function platforms()
    {
        return $this->belongsToMany(Platform::class, 'game_platform');
    }

    /** Etiquetas (tags) N:M */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'game_tag');
    }

    /** Estadísticas por aspecto (media de historia, dificultad, etc.) */
    public function aspects()
    {
        return $this->hasMany(Aspect::class);
    }

    /** Posts del diario o capturas asociadas a este juego */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /** Listas en las que aparece este juego */
    public function listItems()
    {
        return $this->hasMany(ListItem::class);
    }

    /** Recomendaciones en las que aparece este juego */
    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }
}
