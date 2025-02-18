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
        Schema::create('pokemons', function (Blueprint $table) {
            $table->id();
            $table->integer('pokedex');
            $table->string('name');
            $table->string('sprite');
            $table->timestamps();

            $table->index('pokedex');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemons');
    }
};
