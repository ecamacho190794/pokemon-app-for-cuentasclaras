<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    function index() {
        
        return view('pokemon.index');
    }

    function create() {
        return view('pokemon.create');
    }
}
