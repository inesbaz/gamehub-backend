<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('review_emotion', function (Blueprint $table) {
            $table->foreignId('review_id')->constrained()->cascadeOnDelete();
            $table->foreignId('emotion_id')->constrained('emotions')->cascadeOnDelete();
            $table->tinyInteger('intensity')->nullable(); // 1–5 (opcional)
            
            $table->timestamps();
            $table->primary(['review_id','emotion_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_emotion');
    }
};
