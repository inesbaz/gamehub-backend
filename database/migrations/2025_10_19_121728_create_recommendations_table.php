<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('game_id')->constrained('games')->cascadeOnDelete();
            $table->decimal('score', 6, 4)->default(0); // ranking interno
            $table->json('reason')->nullable();         // e.g. {"neighbors":[123,456],"aspects":["story"]}
            $table->timestamps();

            $table->unique(['user_id','game_id']);
            $table->index(['user_id','score']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recommendations');
    }
};
