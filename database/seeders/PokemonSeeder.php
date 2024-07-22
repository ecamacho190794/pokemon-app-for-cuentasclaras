<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pokemon;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pokemons = [
            [
                'pokedex' => 1,
                'name' => 'Bulbasaur',
                'sprite' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/1.png'
            ],
            [
                'pokedex' => 4,
                'name' => 'Charmander',
                'sprite' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/4.png'
            ],
            [
                'pokedex' => 7,
                'name' => 'Squirtle',
                'sprite' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/7.png'
            ],
            [
                'pokedex' => 25,
                'name' => 'Pikachu',
                'sprite' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/25.png'
            ],
            [
                'pokedex' => 133,
                'name' => 'Eevee',
                'sprite' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/133.png'
            ],
            [
                'pokedex' => 151,
                'name' => 'Mew',
                'sprite' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/151.png'
            ],
            [
                'pokedex' => 227,
                'name' => 'Skarmory',
                'sprite' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/227.png'
            ],
            [
                'pokedex' => 280,
                'name' => 'Ralts',
                'sprite' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/280.png'
            ],
            [
                'pokedex' => 778,
                'name' => 'Mimikyu',
                'sprite' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/778.png'
            ],
            [
                'pokedex' => 959,
                'name' => 'Tinkaton',
                'sprite' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/959.png'
            ]
        ];

        foreach ($pokemons as $pokemon) {
            Pokemon::create($pokemon);
        }
    }
}
