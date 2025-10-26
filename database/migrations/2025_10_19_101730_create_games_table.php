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

            // Identidad / sincronización con RAWG
            $table->unsignedBigInteger('external_id')->nullable()->unique(); // RAWG id
            $table->string('external_slug')->nullable()->index();            // RAWG slug
            $table->timestamp('last_synced_at')->nullable();                  // cuándo lo importaste/actualizaste

            // Básicos de ficha
            $table->string('title');
            $table->string('slug')->unique(); // tu slug interno
            $table->longText('summary')->nullable();
            $table->string('official_website')->nullable();

            // Fechas
            $table->date('release_date')->nullable();
            $table->timestamp('rawg_updated_at')->nullable(); // updated_at del juego en RAWG si lo expones

            // Duración/tiempo de juego
            $table->unsignedSmallInteger('avg_playtime_hours')->nullable();

            // Media principal
            $table->string('cover_url')->nullable();
            $table->string('cover_thumb_url')->nullable();
            $table->boolean('has_trailers')->default(false);
            $table->boolean('has_screenshots')->default(false);

            // Ratings agregados (RAWG / Metacritic / ESRB)
            $table->decimal('rawg_rating_avg', 3, 1)->nullable();
            $table->unsignedInteger('rawg_rating_count')->default(0);
            $table->unsignedTinyInteger('metacritic')->nullable();  // 0–100
            $table->string('metacritic_url')->nullable();
            $table->string('esrb_rating', 20)->nullable();          // E, T, M…

            $table->timestamps();

            // Índices útiles
            $table->index('title');
            $table->index('release_date');
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
