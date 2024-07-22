<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use App\Models\Pokemon;

class PokemonController extends Controller
{
    const POKEMON_API = 'https://pokeapi.co/api/v2/pokemon/';

    function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'pokedex' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->errors()
            ], 422);
        }

        $pokedex = $request->pokedex;
        if (Pokemon::where('pokedex', $pokedex)->exists()) {
            return response()->json([
                'status' => 422,
                'errors' => ['pokedex' => ['El Pokémon con número de pokédex ' . $pokedex . ' ya existe en la lista']]
            ], 422);
        }

        $pokemon = $this->find_from_api($pokedex);

        if ($pokemon == false) {
            return response()->json([
                'status' => 404,
                'errors' => ['pokedex' => ['El Pokémon con número de pokédex ' . $pokedex . ' no existe']]
            ]);
        }

        $response_data = [
            'status' => '200',
            'pokemon_name' => $pokemon['name']
        ];
        
        return response()->json($response_data);
    }

    function store(Request $request) {
        $pokemon = $this->find_from_api($request->pokedex);
        $new_pokemon = new Pokemon();
        $new_pokemon->name = $pokemon['name'];
        $new_pokemon->sprite = $pokemon['sprite'];
        $new_pokemon->pokedex = $request->pokedex;
        $new_pokemon->save();

        return response()->json([
            'status' => 200,
            'message' => '¡Pokémon ' . $new_pokemon->name . ' añadido a la lista!'
        ]);
    }

    private function find_from_api($pokedex) {
        if (Cache::has('pokemon_name_' . $pokedex)) {
            $pokemon = [
                'name' => Cache::get('pokemon_name_' . $pokedex),
                'sprite' => Cache::get('pokemon_sprite_' . $pokedex)
            ];
        } else {
            $response = Http::get(self::POKEMON_API . $pokedex);
            if ($response == "Not Found") {
                return false;
            }

            $pokemon = $response->json();
            $pokemon = [
                'name' => ucwords($pokemon['name']),
                'sprite' => $pokemon['sprites']['front_default']
            ];
            Cache::put('pokemon_name_' . $pokedex, ucwords($pokemon['name']), $seconds = 120);
            Cache::put('pokemon_sprite_' . $pokedex, $pokemon['sprite'], $seconds = 120);
        }

        return $pokemon;
    }
}
