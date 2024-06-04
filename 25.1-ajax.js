function buscarPacientes() {
    const $nombre = $("#nombre").val(); //alert("Buscando..."+nombre);
    let datos = {
        nombre: $nombre
    };

    $.ajax({
        url: "26-ajax-pdo.php", 
        type: "POST", 
        data: datos, 
        success: function(result) {
            console.log(result); 
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error: " + status + error); 
        }
    });
}

$("#buscar").on("click", buscarPacientes);
