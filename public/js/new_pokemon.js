const POKEMON_API_CREATE_URL = "/api/v1/pokemon/";
const POKEMON_API_STORE_URL = "/api/v1/pokemon/store";

$(document).ready(function() {
    $("#new-pokemon").on("submit", function(e) {
        e.preventDefault();
        var pokedex = $("#pokedex").val();

        $.ajax({
            url: POKEMON_API_CREATE_URL,
            data: { pokedex: pokedex },
            method: "POST",
            success: function(data) {
                $("#pokemon-name").text(data.pokemon_name);
                $("#store-pokemon").data("pokedex", pokedex);
                $("#pokemon-modal").modal("show");
            },
            error: function(data) {
                response = JSON.parse(data.responseText);
                alert("Ha ocurrido un error: " + response.errors.pokedex.join(", "));
            }
        });
        
    });

    $("#store-pokemon").on("click", function(){
        var pokedex = $(this).data("pokedex");

        $.ajax({
            url: POKEMON_API_STORE_URL,
            data: { pokedex: pokedex },
            method: "POST",
            success: function(data) {
                alert("¡Se agregó correctamente a la lista!");
                $("#pokemon-modal").modal("hide");
            },
            error: function(data) {
                alert("Ha ocurrido un error inesperado");
                $("#pokemon-modal").modal("hide");
            }
        });
    });
});