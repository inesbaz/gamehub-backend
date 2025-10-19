<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();

            // Identidad / sincronización con RAWG/IGDB
            $table->unsignedBigInteger('external_id')->nullable();   // RAWG id
            $table->string('external_slug')->nullable();             // RAWG slug (para re-sync)

            // Básicos de ficha
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('summary')->nullable();                 // RAWG puede traer descripciones largas/HTML
            $table->string('official_website')->nullable();

            // Fechas
            $table->date('release_date')->nullable();
            $table->timestamp('rawg_updated_at')->nullable();        // última actualización conocida en RAWG

            // Duración/tiempo de juego
            $table->unsignedSmallInteger('avg_playtime_hours')->nullable(); // tiempo medio (RAWG)

            // Media principal
            $table->string('cover_url')->nullable();
            $table->string('cover_thumb_url')->nullable();
            $table->boolean('has_trailers')->default(false);
            $table->boolean('has_screenshots')->default(false);

            // Ratings agregados (RAWG / Metacritic / ESRB)
            $table->decimal('rawg_rating_avg', 3, 1)->nullable();    // p.ej. 4.3
            $table->unsignedInteger('rawg_rating_count')->default(0);
            $table->tinyInteger('metacritic')->nullable();           // 0–100
            $table->string('metacritic_url')->nullable();
            $table->string('esrb_rating', 20)->nullable();           // E, T, M, etc.

            $table->timestamps();

            // Índices útiles para filtros/búsquedas
            $table->index('title');
            $table->index('release_date');
            $table->index('external_slug');
            $table->index('rawg_rating_avg');
            $table->index('metacritic');
            $table->index('esrb_rating');
            $table->index('avg_playtime_hours');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
