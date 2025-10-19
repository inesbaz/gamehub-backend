<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    /* ==========================
     |  Asignación en masa
     ========================== */
    protected $fillable = [
        // Identidad / sync
        'external_id',
        'external_slug',

        // Ficha
        'title',
        'slug',
        'summary',
        'official_website',

        // Fechas
        'release_date',
        'rawg_updated_at',

        // Duración
        'avg_playtime_hours',

        // Media
        'cover_url',
        'cover_thumb_url',
        'has_trailers',
        'has_screenshots',

        // Ratings agregados
        'rawg_rating_avg',
        'rawg_rating_count',
        'metacritic',
        'metacritic_url',
        'esrb_rating',
    ];

    /* ==========================
     |  Casts
     ========================== */
    protected function casts(): array
    {
        return [
            'release_date'       => 'date',
            'rawg_updated_at'    => 'datetime',
            'avg_playtime_hours' => 'integer',
            'has_trailers'       => 'boolean',
            'has_screenshots'    => 'boolean',
            'rawg_rating_avg'    => 'decimal:1', // p.ej. 4.3
            'rawg_rating_count'  => 'integer',
            'metacritic'         => 'integer',
        ];
    }

    /* ==========================
     |  Route binding por slug
     ========================== */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /* ==========================
     |  Accesores / Mutadores
     ========================== */

    // Si no hay portada, devuelve una imagen por defecto
    public function getCoverUrlAttribute($value): string
    {
        return $value ?: 'https://cdn.example.com/games/placeholder-cover.png';
    }

    // Normaliza slug en minúsculas (por si lo asignas manualmente)
    public function setSlugAttribute($value): void
    {
        $this->attributes['slug'] = \Str::slug($value ?: $this->attributes['title'] ?? '');
    }

    /* ==========================
     |  Relaciones 1—N
     ========================== */

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
        // Nullable en la tabla: habrá posts sin juego
        return $this->hasMany(Post::class);
    }

    public function systemRequirements()
    {
        return $this->hasMany(GameSystemRequirement::class);
    }

    public function stores()
    {
        return $this->hasMany(GameStore::class);
    }

    public function screenshots()
    {
        return $this->hasMany(GameScreenshot::class)->orderBy('position');
    }

    public function trailers()
    {
        return $this->hasMany(GameTrailer::class);
    }

    public function listItems()
    {
        return $this->hasMany(ListItem::class);
    }

    public function aspectStats()
    {
        return $this->hasMany(GameAspectStat::class);
    }

    /* ==========================
     |  Relación 1—1 (opcional)
     ========================== */

    public function features()
    {
        // PK=FK en game_features.game_id
        return $this->hasOne(GameFeature::class);
    }

    /* ==========================
     |  Auto-relación N—M (game_relations)
     ========================== */

    // Relaciones donde ESTE juego es el origen
    public function related()
    {
        return $this->hasMany(GameRelation::class, 'game_id');
    }

    // Relaciones donde ESTE juego aparece como relacionado (inverso)
    public function relatedOf()
    {
        return $this->hasMany(GameRelation::class, 'related_game_id');
    }

    /* ==========================
     |  N—M: géneros / plataformas / tags
     ========================== */

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'game_genre')
            ->withTimestamps();
    }

    public function platforms()
    {
        return $this->belongsToMany(Platform::class, 'game_platform')
            ->withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'game_tag')
            ->withTimestamps();
    }

    /* ==========================
     |  Scopes de filtro útiles
     ========================== */

    public function scopeSearchTitle($q, string $term)
    {
        return $q->where('title', 'like', '%' . $term . '%');
    }

    public function scopeByMetacritic($q, int $min = 0, ?int $max = null)
    {
        $q->whereNotNull('metacritic')
            ->where('metacritic', '>=', $min);
        if ($max !== null) {
            $q->where('metacritic', '<=', $max);
        }
        return $q;
    }

    public function scopeByPlaytime($q, ?int $min = null, ?int $max = null)
    {
        if ($min !== null) $q->where('avg_playtime_hours', '>=', $min);
        if ($max !== null) $q->where('avg_playtime_hours', '<=', $max);
        return $q;
    }

    public function scopeWithDifficultyAvgAtLeast($q, float $min)
    {
        // Requiere que precalcules game_aspect_stats y que exista Aspect con slug=difficulty
        return $q->whereHas('aspectStats', function ($s) use ($min) {
            $s->whereHas('aspect', fn($a) => $a->where('slug', 'difficulty'))
                ->where('avg_score', '>=', $min);
        });
    }
}
