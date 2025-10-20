<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aspects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained('games')->cascadeOnDelete();

            $table->decimal('story_avg', 4, 2)->nullable();        // Historia
            $table->decimal('gameplay_avg', 4, 2)->nullable();     // Jugabilidad
            $table->decimal('exploration_avg', 4, 2)->nullable();  // Exploración
            $table->decimal('art_avg', 4, 2)->nullable();          // Arte / Estilo
            $table->decimal('difficulty_avg', 4, 2)->nullable();   // Dificultad (numérica)
            $table->unsignedInteger('reviews_count')->default(0);  // cuántas reseñas consideró

            $table->timestamps();

            $table->unique('game_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('game_aspects');
    }
};
