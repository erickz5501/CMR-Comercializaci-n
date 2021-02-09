function init(){
    lista_actualizaciones();
    lista_select2('/dashboard/listas/cliente', 'clientes', null);
    lista_select2('/dashboard/listas/modulos', 'modulos', null);

}


function lista_actualizaciones(){
    $.get('/dashboard/actualizaciones/lista', function (data){
        $("#lista_actualizaciones").html(data);
    });
}

init();