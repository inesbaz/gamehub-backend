<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('features', function (Blueprint $table) {
            $table->foreignId('game_id')->primary()->constrained('games')->cascadeOnDelete();

            // Booleans frecuentes
            $table->boolean('has_story')->default(false);
            $table->boolean('open_world')->default(false);
            $table->boolean('co_op')->default(false);
            $table->boolean('multiplayer')->default(false);
            $table->boolean('requires_online')->default(false);
            $table->boolean('singleplayer')->default(true);
            $table->boolean('vr_support')->default(false);
            $table->boolean('local_coop')->default(false);

            // Enums típicos
            $table->enum('camera', ['first', 'third', 'isometric', 'side', 'top', 'mixed'])->nullable();
            $table->enum('art_style', ['realistic', 'toon', 'pixel', 'lowpoly', 'anime', 'mixed'])->nullable();

            // Duraciones y edad (útil para filtros)
            $table->unsignedSmallInteger('avg_playtime_hours')->nullable();  // opcional si no lo llevas en games
            $table->string('esrb_rating', 20)->nullable();                    // E, T, M…

            $table->timestamps();

            $table->index('co_op');
            $table->index('singleplayer');
            $table->index('camera');
            $table->index('art_style');
            $table->index('esrb_rating');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('game_features');
    }
};
