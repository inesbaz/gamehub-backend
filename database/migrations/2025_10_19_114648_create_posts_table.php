<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $t) {
            $t->id();
            $t->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $t->foreignId('game_id')->nullable()->constrained('games')->cascadeOnDelete();

            $t->enum('type', ['note', 'screenshot', 'clip'])->default('note');
            $t->text('text')->nullable();
            $t->string('media_url')->nullable();      // imagen o video
            $t->unsignedSmallInteger('media_width')->nullable();
            $t->unsignedSmallInteger('media_height')->nullable();

            $t->timestamps();
            $t->softDeletes();

            $t->index(['game_id', 'type', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
