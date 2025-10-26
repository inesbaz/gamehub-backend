<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('game_relations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained('games')->cascadeOnDelete();
            $table->foreignId('related_game_id')->constrained('games')->cascadeOnDelete();
            $table->enum('type', ['dlc', 'expansion', 'goty', 'parent', 'series']);
            $table->enum('source', ['rawg', 'manual'])->default('rawg'); // NUEVO
            $table->string('notes')->nullable(); // opcional para casos manuales
            $table->timestamps();
            $table->unique(['game_id', 'related_game_id', 'type']);
            $table->index(['related_game_id', 'type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('game_realtions');
    }
};
