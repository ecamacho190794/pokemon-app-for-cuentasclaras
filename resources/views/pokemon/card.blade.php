<div class="col-md-4 col-sm-6 p-3">
    <div class="pokemon-list-card row">
        <div class="col-md-5 d-flex justify-content-center">
            <img class="img-fluid" src="{{ $pokemon->sprite }}" alt="{{ $pokemon->name }}">
        </div>
        <div class="col-md-7 d-flex justify-content-center flex-column pokemon-list-card-info">
            <h4 class="px-3 py-2">{{ $pokemon->name }} - #{{ $pokemon->pokedex }}</h2>
            <button class="btn btn-sm btn-info btn-pokemon-card" data-id="{{ $pokemon->pokedex }}">
                Caracterísiticas
            </button>
            <div id="pokemon-{{  $pokemon->pokedex }}">
                <p><strong>Descripción: </strong><span class="desc"></span></p>
                <p><strong>Genes: </strong><span class="gen"></span></p>
                <p><strong>Estadística más alta: </strong><span class="stat"></span></p>
                <p><strong>Posibles valores: </strong><span class="values"></span></p>
            </div>
        </div>
    </div>
</div>