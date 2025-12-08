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

            // PK compuesta
            $table->primary(['follower_id', 'followed_id']);
        });

        // No permite seguirse a uno mismo
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
