<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('game_genre', function (Blueprint $table) {
            $table->foreignId('game_id')->constrained()->cascadeOnDelete();
            $table->foreignId('genre_id')->constrained()->cascadeOnDelete();
            $table->primary(['game_id', 'genre_id']);   // PK compuesta
            $table->index('genre_id');                 // filtros por género
            $table->index('game_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('game_genre');
    }
};
