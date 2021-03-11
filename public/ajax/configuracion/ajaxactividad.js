function init(){

    lista_actividades();

    $('#formulario_actividad').on("submit", function(e){
        guardar_actividad(e);
    })

}

function lista_actividades(){
    $("#lista_actividades").html('<div id="loader"></div>');
    $.get('/dashboard/configuracion/actividad/lista', function (data){
        $("#lista_actividades").html(data);
    });
}

function desactivar_actividad(idactividad){
    crud_desactivar('/dashboard/actividad/desactivar/' + idactividad , function(){ lista_actividades(); }, function(){ console.log('Eror') });
}

function activar_actividad(idactividad){
    crud_activar('/dashboard/actividad/activar/' + idactividad , function(){ lista_actividades(); }, function(){ console.log('Eror') });
}

function mostrar_one_actividad(idactividad){
    $("#modal_actividad").modal('show');
    $.get('/dashboard/mostrar/actividad/'+ idactividad, function(data){
        data = JSON.parse(data);
        $("#idactividad").val(data.actividad['idactividad']);
        $("#nombre_input").val(data.actividad['nombre']);
    });
}

function limpiar_actividad(){
    $('#idactividad').val("");
    $('#nombre_input').val("");
}

function guardar_actividad(e){
    crud_guardar_editar(
        e,
        '/dashboard/actividad/guardar',
        'actividad',
        function(){ limpiar_actividad(); },
        function(){ lista_actividades(); },
        function(){ console.log('Console Error'); }
    );

    $("#registroModalActividad").modal('hide');
}


init();