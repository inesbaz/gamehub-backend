<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('game_id')->constrained()->cascadeOnDelete();

            $table->string('title')->nullable();
            $table->longText('body')->nullable();

            $table->boolean('is_recommended')->default(false);
            $table->boolean('spoiler')->default(false);

            $table->timestamps();
            $table->softDeletes();

            // 1 reseña por usuario y juego
            $table->unique(['user_id', 'game_id']);

            // para listados por juego recientes
            $table->index(['game_id', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
