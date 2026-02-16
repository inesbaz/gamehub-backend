<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('review_aspect', function (Blueprint $table) {
            $table->id();

            $table->foreignId('review_id')->constrained('reviews')->cascadeOnDelete();
            $table->unique('review_id');

            $table->unsignedTinyInteger('story_score')->nullable();
            $table->unsignedTinyInteger('gameplay_score')->nullable();
            $table->unsignedTinyInteger('exploration_score')->nullable();
            $table->unsignedTinyInteger('art_score')->nullable();
            $table->unsignedTinyInteger('difficulty_score')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('review_aspect');
    }
};
