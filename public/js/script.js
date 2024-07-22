const POKEMON_API_URL = "/api/v1/pokemon/characteristics/"

$(document).ready(function() {
    $(".btn-pokemon-card").on("click", function(){
        var pokedex = $(this).data("id");
        $("#loading-"+pokedex).css("display", "flex");
        $.ajax({
            url: POKEMON_API_URL + pokedex,
            method: "GET",
            success: function(response) {
                var characteristics = response.characteristics;
                var description = characteristics.descriptions.find(function(desc) {
                    return desc.language.name == 'es';
                });
                $("#pokemon-" + pokedex + " .desc").text(description.description);
                $("#pokemon-" + pokedex + " .gen").text(characteristics.gene_modulo);
                $("#pokemon-" + pokedex + " .stat").text(characteristics.highest_stat.name);
                $("#pokemon-" + pokedex + " .values").text(characteristics.possible_values);
                $("#loading-"+pokedex).css("display", "none");
            },
            error: function() {
                $("#pokemon-" + pokedex + " .desc").addClass("text-danger").text("¡No existe información en el API!");
                $("#pokemon-" + pokedex + " .gen").addClass("text-danger").text("¡No existe información en el API!");
                $("#pokemon-" + pokedex + " .stat").addClass("text-danger").text("¡No existe información en el API!");
                $("#pokemon-" + pokedex + " .values").addClass("text-danger").text("¡No existe información en el API!");
                $("#loading-"+pokedex).css("display", "none");
                console.log("Error");
            }
        })
    });
});