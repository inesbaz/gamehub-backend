<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('similarities', function (Blueprint $table) {
            $table->foreignId('user_a_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('user_b_id')->constrained('users')->cascadeOnDelete();
            $table->decimal('similarity', 5, 4)->default(0); // 0.0000–1.0000
            $table->timestamp('updated_at')->nullable();

            // Evita duplicados y busca rápido por origen
            $table->primary(['user_a_id','user_b_id']);
            $table->index('user_a_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_similarity');
    }
};
