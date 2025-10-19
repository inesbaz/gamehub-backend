<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();   // autor del comentario
            $table->foreignId('review_id')->constrained()->cascadeOnDelete(); // comenta una reseña
            $table->longText('body');
            $table->timestamps();
            $table->softDeletes();

            $table->index(['review_id','created_at']); // listados por reseña
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
