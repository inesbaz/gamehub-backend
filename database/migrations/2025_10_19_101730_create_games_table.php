<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('external_id')->nullable()->unique(); // RAWG id
            $table->string('external_slug')->nullable()->index(); // RAWG slug
            $table->timestamp('last_synced_at')->nullable(); // cuándo se importó/actualizó

            $table->string('title');
            $table->string('slug')->unique(); // slug interno
            $table->longText('summary')->nullable();
            $table->string('official_website')->nullable();
            $table->date('release_date')->nullable();
            $table->timestamp('rawg_updated_at')->nullable(); // updated_at del juego en RAWG
            
            $table->unsignedSmallInteger('avg_playtime_hours')->nullable();
            
            $table->string('cover_url')->nullable();
            $table->string('cover_thumb_url')->nullable();
            $table->boolean('has_trailers')->default(false);
            $table->boolean('has_screenshots')->default(false);
            
            $table->decimal('rawg_rating_avg', 3, 1)->nullable();
            $table->unsignedInteger('rawg_rating_count')->default(0);
            $table->unsignedTinyInteger('metacritic')->nullable();
            $table->string('metacritic_url')->nullable();
            $table->string('esrb_rating', 20)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
