<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('game_id')->nullable()->constrained('games')->cascadeOnDelete();

            $table->enum('type', ['note', 'screenshot', 'clip'])->default('note');
            $table->text('text')->nullable();
            $table->string('media_url')->nullable(); // imagen o video
            $table->unsignedSmallInteger('media_width')->nullable();
            $table->unsignedSmallInteger('media_height')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
