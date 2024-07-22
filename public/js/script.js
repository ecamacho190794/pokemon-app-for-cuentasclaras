const POKEMON_API_URL = "https://pokeapi.co/api/v2/characteristic/"

$(document).ready(function() {
    $(".btn-pokemon-card").on("click", function(){
        $.ajax({
            url: POKEMON_API_URL + $(this).data('id'),
            method: "GET",
            success: function(response) {
                var description = response.descriptions.find(function(desc) {
                    return desc.language.name === 'es';
                });
                console.log(description.description)
            },
            error: function() {
                console.log("Error")
            }
        })
    });
});