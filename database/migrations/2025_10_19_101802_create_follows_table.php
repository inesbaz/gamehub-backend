<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->foreignId('follower_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('followed_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();

            // PK compuesta (Laravel lo soporta en Schema)
            $table->primary(['follower_id', 'followed_id']);

            // búsqueda de “a quién sigo”
            $table->index('follower_id');
            // búsqueda de “seguidores”
            $table->index('followed_id');
        });

        // (Opcional) Evita seguirse a una misma persona (CHECK en MySQL 8+)
        // Si tu versión soporta CHECKs:
        if (DB::getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE follows
                ADD CONSTRAINT chk_no_self_follow CHECK (follower_id <> followed_id)');
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('follows');
    }
};
