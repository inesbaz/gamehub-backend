<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('emotions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();    // ej. relax, miedo, tristeza, tensión…
            $table->string('slug')->unique();    // relax, fear, sadness…
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('emotions');
    }
};
