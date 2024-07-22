<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemon;

class AppController extends Controller
{
    function index() {
        $pokemons = Pokemon::all();
        return view('pokemon.index', ['pokemons' => $pokemons]);
    }

    function create() {
        return view('pokemon.create');
    }
}
