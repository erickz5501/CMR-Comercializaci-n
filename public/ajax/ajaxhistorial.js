function init(){
    lista_historial();
}

function lista_historial(){
    $.get('/dashboard/listas/historial/lista', function (data){
        $("#lista_historial").html(data);
    });
}

init();