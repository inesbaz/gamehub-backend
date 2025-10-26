<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trailers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('external_id')->nullable()->index(); // si existe
            $table->string('name')->nullable();
            $table->string('preview_image')->nullable(); // thumbnail
            $table->string('video_url');                 // mp4/webm o YT embed url
            $table->unsignedSmallInteger('ordering')->default(0);
            $table->timestamps();
            $table->index(['game_id', 'ordering']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trailers');
    }
};
