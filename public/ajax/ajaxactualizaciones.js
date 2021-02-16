function init(){
    lista_actualizaciones();
    lista_select2('/dashboard/listas/cliente', 'clientes', null);
    lista_select2('/dashboard/listas/modulos', 'modulos', null);

}


function lista_actualizaciones(){
    $("#lista_actualizaciones").html('<div id="loader"></div>');
    $.get('/dashboard/actualizaciones/lista', function (data){
        $("#lista_actualizaciones").html(data);
    });
}

function desactivar_actualizacion(idactualizacion){
    crud_desactivar('/dashboard/actualizacion/desactivar/' + idactualizacion , function(){ lista_actualizaciones(); }, function(){ console.log('Eror') });
}

function activar_actualizacion(idactualizacion){
    crud_activar('/dashboard/actualizacion/activar/' + idactualizacion , function(){ lista_actualizaciones(); }, function(){ console.log('Eror') });
}

init();