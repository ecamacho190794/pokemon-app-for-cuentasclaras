<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;

Route::get('/pokemon/{pokedex}', [PokemonController::class, 'show']);
Route::post('/pokemon', [PokemonController::class, 'create']);
Route::post('/pokemon/store', [PokemonController::class, 'store']);
