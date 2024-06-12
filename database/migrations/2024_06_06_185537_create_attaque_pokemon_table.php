<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attaque_pokemon', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('pokemon_id')->constrained('pokemon')->onDelete('cascade');;
            $table->foreignId('attaque_id')->constrained('attaques')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attaque_pokemon');
    }
};
