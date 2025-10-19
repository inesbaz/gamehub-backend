<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aspect_stats', function (Blueprint $table) {
            $table->foreignId('game_id')->constrained('games')->cascadeOnDelete();
            $table->foreignId('aspect_id')->constrained('aspects')->cascadeOnDelete();

            $table->decimal('avg_score', 4, 2)->nullable(); // para type=score
            $table->string('mode_enum', 50)->nullable();    // para type=enum (e.g. difficulty)
            $table->unsignedInteger('count_reviews')->default(0);
            $table->timestamp('updated_at')->nullable();

            $table->primary(['game_id', 'aspect_id']);
            $table->index(['aspect_id', 'avg_score']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('game_aspect_stats');
    }
};
