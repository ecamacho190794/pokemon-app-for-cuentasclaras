@extends('layouts.app')

@section('title', 'Página principal')

@section('content')

<section id="pokémon-list" class="row">
    @foreach($pokemons as $pokemon)
        @include('pokemon.card', ['pokemon' => $pokemon])
    @endforeach
</section>

@endsection

@section('scripts')
<script src="{{ asset('js/script.js') }}"></script>
@endsection