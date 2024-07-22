@extends('layouts.app')

@section('title', 'Página principal')

@section('content')

<section id="pokémon-list" class="row">
    @include('pokemon.card')
    @include('pokemon.card')
    @include('pokemon.card')
    @include('pokemon.card')
    @include('pokemon.card')
    @include('pokemon.card')
    @include('pokemon.card')
    @include('pokemon.card')
</section>

@endsection