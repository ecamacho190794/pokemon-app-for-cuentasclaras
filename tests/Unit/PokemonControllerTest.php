<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use App\Models\Pokemon;


class PokemonControllerTest extends TestCase
{
    use RefreshDatabase;

    // Testing show method
    /** @test */
    public function it_shows_pokemon_characteristics(): void {
        Http::fake([
            'pokeapi.co/api/v2/characteristic/25' => Http::response([
                'descriptions' => null,
                'gene_modulo' => 1,
                'highest_stat' => 'hp',
                'possible_values' => [4, 9, 14, 19, 24, 29]
            ], 200),
        ]);

        $response = $this->get('/api/v1/pokemon/characteristics/25');

        $response->assertStatus(200)->assertJson([
            'characteristics' => [
                'descriptions' => null,
                'gene_modulo' => 1,
                'highest_stat' => 'hp',
                'possible_values' => [4, 9, 14, 19, 24, 29]
            ]
        ]);
    }

    /** @test */
    public function it_fails_showing_characteristics_if_pokemon_does_not_exists(): void {
        Http::fake([
            'pokeapi.co/api/v2/characteristic/2000' => Http::response('Not Found', 404),
        ]);

        $response = $this->get('/api/v1/pokemon/characteristics/2000');

        $response->assertStatus(404);
    }

    // Testing Create method
    /** @test */
    public function it_shows_pokemon_found(): void {
        Http::fake([
            'pokeapi.co/api/v2/pokemon/25' => Http::response([
                'name' => 'pikachu',
                'sprites' => ['front_default' => '']
            ], 200),
        ]);

        $data = [
            'pokedex' => 25,
        ];

        $response = $this->post('/api/v1/pokemon', $data);

        $response->assertStatus(200)->assertJson([
            'pokemon_name' => 'Pikachu'
        ]);
    }

    /** @test */
    public function it_fails_showing_pokemon_found_if_not_exists(): void {
        Http::fake([
            'pokeapi.co/api/v2/pokemon/2000' => Http::response('Not Found', 404),
        ]);

        $response = $this->post('/api/v1/pokemon/2000');

        $response->assertStatus(404);
    }
}
