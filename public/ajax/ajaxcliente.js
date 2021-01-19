function init(){

}

function mostrar_modal(id){
    $("#ModalDetalle").modal('show');

    $.get('/dashboard/listas/clientes/'+id, function(data){ //Obtenemos la ruta con el id del registro
        $("#cliente_modal").html(data); //Mostramos el CUERPO modal con los datos del registro
    });
}

function mostrar_modal_interesado(id){
    $("#ModalDetalleInteresado").modal('show');

    $.get('/dashboard/listas/interesados/'+id, function(data){
        $("#interesado_modal").html(data);
    });
}

init();