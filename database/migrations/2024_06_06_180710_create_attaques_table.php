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
        Schema::create('attaques', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->integer('power')->nullable();
            $table->foreignId('type_id')->constrained('types')->onDelete('cascade');
            $table->string('category');
            $table->integer('accuracy')->nullable();
            $table->integer('pp');
            $table->string('description');
            $table->integer('probability')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attaques');
    }
};
