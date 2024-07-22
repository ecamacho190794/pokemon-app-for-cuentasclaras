const POKEMON_API_URL = "https://pokeapi.co/api/v2/characteristic/"

$(document).ready(function() {
    $(".btn-pokemon-card").on("click", function(){
        var pokedex = $(this).data('id');
        $.ajax({
            url: POKEMON_API_URL + pokedex,
            method: "GET",
            success: function(response) {
                var description = response.descriptions.find(function(desc) {
                    return desc.language.name == 'es';
                });
                $("#pokemon-" + pokedex + " .desc").text(description.description);
                $("#pokemon-" + pokedex + " .gen").text(response.gene_modulo);
                $("#pokemon-" + pokedex + " .stat").text(response.highest_stat.name);
                $("#pokemon-" + pokedex + " .values").text(response.possible_values);
            },
            error: function() {
                $("#pokemon-" + pokedex + " .desc").addClass("text-danger").text("¡Ha habido un error al cargar los datos!");
                $("#pokemon-" + pokedex + " .gen").addClass("text-danger").text("¡Ha habido un error al cargar los datos!");
                $("#pokemon-" + pokedex + " .stat").addClass("text-danger").text("¡Ha habido un error al cargar los datos!");
                $("#pokemon-" + pokedex + " .values").addClass("text-danger").text("¡Ha habido un error al cargar los datos!");
                console.log("Error");
            }
        })
    });
});