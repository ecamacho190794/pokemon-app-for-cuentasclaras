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
    const CHARACTERISTICS_API = 'https://pokeapi.co/api/v2/characteristic/';

    function show($pokedex) {
        $characteristics = $this->find_characteristics_from_api($pokedex);
        if ($characteristics == false) {
            return response()->json([
                'status' => 404,
                'errors' => ['pokedex' => ['El Pokémon con número de pokédex ' . $pokedex . ' no existe']]
            ], 404);
        }

        return response()->json([
            'status' => '200',
            'characteristics' => $characteristics
        ]);
    }

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
        
        return response()->json([
            'status' => '200',
            'pokemon_name' => $pokemon['name']
        ]);
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
        if (Cache::has('pokemon_' . $pokedex)) {
            $pokemon = Cache::get('pokemon_' . $pokedex);
        } else {
            $response = Http::get(self::POKEMON_API . $pokedex);
            if ($response == "Not Found") {
                return false;
            }

            $pokemon_json = $response->json();
            $pokemon = [
                'name' => ucwords($pokemon_json['name']),
                'sprite' => $pokemon_json['sprites']['front_default']
            ];
            Cache::put('pokemon_' . $pokedex, $pokemon);
        }

        return $pokemon;
    }

    private function find_characteristics_from_api($pokedex) {
        if (Cache::has('characteristics_' . $pokedex)) {
            $characteristics = Cache::get('characteristics_' . $pokedex);
        } else {
            $response = Http::get(self::CHARACTERISTICS_API . $pokedex);
            if ($response == "Not Found") {
                return false;
            }

            $characteristics_json = $response->json();
            $characteristics = [
                'descriptions' => $characteristics_json['descriptions'],
                'gene_modulo' => $characteristics_json['gene_modulo'],
                'highest_stat' => str_replace('-', ' ', $characteristics_json['highest_stat']),
                'possible_values' => $characteristics_json['possible_values'],
            ];

            Cache::put('characteristics_' . $pokedex, $characteristics);
        }

        return $characteristics;
    }
}
