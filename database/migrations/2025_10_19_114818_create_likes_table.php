<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            // Polimórfico: review | comment (y en el futuro post, etc.)
            $table->string('entity_type', 30);  // 'review' | 'comment | 'post'
            $table->unsignedBigInteger('entity_id');

            $table->timestamps();

            $table->unique(['user_id', 'entity_type', 'entity_id']); // un like por usuario y entidad
            $table->index(['entity_type', 'entity_id']);            // contar likes por entidad
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
