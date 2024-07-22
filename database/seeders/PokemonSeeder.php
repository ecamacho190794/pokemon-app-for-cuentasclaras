<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pokemon;
use App\Services\PokemonService;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pokemonService = new PokemonService();
        if ($pokemonData = $pokemonService->insertPokemonsFromApi()){
            echo "¡Seeds ejecutados!";
        } else {
            echo "Ya existían datos en la BD";
        }
    }
}
