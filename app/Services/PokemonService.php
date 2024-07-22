<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Pokemon;

class PokemonService {
    // Return 10 pokémons form services if the database is empty
    public function insertPokemonsFromApi() {
        if (Pokemon::count() > 0) {
            return false;
        }

        $response = Http::get('https://pokeapi.co/api/v2/pokemon', ['limit' => 10]);
        if ($response->successful()) {
            $pokemonList = $response->json()['results'];

            $pokemons = [];
            foreach($pokemonList as $id => $pokemon) {
                $pokemons[] = [
                    'pokedex' => $id + 1,
                    'name' => ucwords($pokemon['name']),
                    'sprite' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/' . $id + 1 . '.png'
                ];
            }
            Pokemon::insert($pokemons);
        }
        return true;
    }
}