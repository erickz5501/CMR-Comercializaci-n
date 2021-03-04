function init (){
    lista_giro_negocio();

    $("#formulario_negocio").on("submit", function(e) {
        guardar_giro_negocio(e);
        lista_select2('/dashboard/listas/gironegocio', 'giroNegocio', null);
    });
}

function guardar_giro_negocio(e){
    crud_guardar_editar(
        e,
        '/dashboard/gironegocio/guardar',
        'negocio',
        function(){ limpiar_evento(); },
        function(){ lista_giro_negocio(); },
        function(){ console.log('Console Error'); }
    );

    $("#registroModalGiroNegocio").modal('hide');
}

function limpiar_evento(){
    $('#idgiro_negocio').val("");
    $('#nombre_input').val("");
}

function lista_giro_negocio(){
    $("#lista_negocios").html('<div id="loader"></div>');
    $.get('/dashboard/configuracion/gironegocio/lista', function (data){
        $("#lista_negocios").html(data);
    });
}

function desactivar_giro(idgiro){
    crud_desactivar('/dashboard/gironegocio/desactivar/' + idgiro , function(){ lista_giro_negocio(); }, function(){ console.log('Eror') });
}

function activar_giro(idgiro){
    crud_activar('/dashboard/gironegocio/activar/' + idgiro , function(){ lista_giro_negocio(); }, function(){ console.log('Eror') });
}

function editar(idgiro){
    $("#registroModalGiroNegocio").modal('show');
    $.get('/dashboard/mostrar/gironegocio/'+idgiro , function (data){
        data = JSON.parse(data);
        //console.log(data.cliente);  
        $('#idgiro_negocio').val(data.evento['idgiro_negocio']);
        $('#nombre_input').val(data.evento['nombre']);
    });
}

init();