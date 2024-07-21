<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PokemonController extends Controller
{
    function index() {
        return view('pokemon.index');
    }
}
