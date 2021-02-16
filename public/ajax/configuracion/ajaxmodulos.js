function init(){
    lista_modulos();

    $("#formulario_modulos").on("submit", function(e) {
        guardar_modulo(e);
    });
}

function lista_modulos(){
    $("#lista_modulos").html('<div id="loader"></div>');
    $.get('/dashboard/configuracion/modulos/lista', function (data){
        $("#lista_modulos").html(data);
    });
}

function activar_modulos(idmodulos){
    crud_activar('/dashboard/modulos/activar/' + idmodulos , function(){ lista_modulos(); }, function(){ console.log('Eror') });
}

function desactivar_modulos(idmodulos){
    crud_desactivar('/dashboard/modulos/desactivar/' + idmodulos , function(){ lista_modulos(); }, function(){ console.log('Eror') });
}

function guardar_modulo(e){
    crud_guardar_editar(
        e,
        '/dashboard/modulos/guardar',
        'modulos',
        function(){ limpiar_modulos(); },
        function(){ lista_modulos(); },
        function(){ console.log('Console Error'); }
    );

    $("#registroModalModulos").modal('hide');
}

function limpiar_modulos(){
    $('#idmodulos').val("");
    $('#nombre_input').val("");
}

function mostrar_one_modulo(idmodulo){
    $("#registroModalModulos").modal('show');
    $.get('/dashboard/mostrar/modulo/'+idmodulo , function (data){
        data = JSON.parse(data);
        //console.log(data.cliente);  
        $('#idmodulos').val(data.modulo['idmodulos']);
        $('#nombre_input').val(data.modulo['nombre']);
    });
}

init();