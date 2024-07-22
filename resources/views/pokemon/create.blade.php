@extends('layouts.app')

@section('title', 'Agregar Pokémon a la lista')

@section('content')

<section id="add-pokemon">
    <p>Esta es una función añadida a la solicitud inicial. ¿Tienes algún número en mente? Ingrésalo a continuación y si concide con algún Pokémon... ¡Se añadirá a la lista de Pokémon gracias a la magia de los Web API! Intenta que el número no sea muy mayor a 1000 para tener resultados satisfactorios.</p>
    <div class="d-flex justify-content-center">
        <form id="new-pokemon">
            <div class="form-group">
                <label for="pokedex">*Número de Pokédex</label>
                <input type="number" class="form-control" id="pokedex" placeholder="25" required style="font-size: 25px;">
                <small id="pokedex-help" class="form-text text-muted">Probablemente yo tampoco sé qué Pokémon es.</small>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">¡Revisar!</button>
            </div>
        </form>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="pokemon-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">¡Pokémon encontrado!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nombre: </strong><span id="pokemon-name">Chikapu</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="store-pokemon" class="btn btn-primary">Agregar pokémon a la lista</button>
            </div>
        </div>
    </div>
  </div>

@endsection

@section('scripts')
<script src="{{ asset('js/new_pokemon.js') }}"></script>
@endsection