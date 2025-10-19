<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('requirements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained()->cascadeOnDelete();
            $table->foreignId('platform_id')->constrained()->cascadeOnDelete(); // PC/Windows/Linux/Mac
            $table->text('minimum')->nullable();     // texto plano que da RAWG
            $table->text('recommended')->nullable(); // idem
            $table->timestamps();
            $table->unique(['game_id', 'platform_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('requirements');
    }
};
