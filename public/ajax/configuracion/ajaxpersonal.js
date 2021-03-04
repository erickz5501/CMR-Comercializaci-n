function init(){
    lista_personal();

    $("#formulario_personal").on("submit", function(e) {
        guardar_personal(e);
        lista_select2('/dashboard/listas/personal', 'personal', null);
    });

}

function lista_personal(){
    $("#lista_personal").html('<div id="loader"></div>');
    $.get('/dashboard/configuracion/personal/lista', function (data){
        $("#lista_personal").html(data);
    });
}

function activar_personal(idpersonal){
    crud_activar('/dashboard/personal/activar/' + idpersonal , function(){ lista_personal(); }, function(){ console.log('Eror') });
}

function desactivar_personal(idpersonal){
    crud_desactivar('/dashboard/personal/desactivar/' + idpersonal , function(){ lista_personal(); }, function(){ console.log('Eror') });
}

function guardar_personal(e){
    crud_guardar_editar(
        e,
        '/dashboard/personal/guardar',
        'personal',
        function(){ limpiar_personal(); },
        function(){ lista_personal(); },
        function(){ console.log('Console Error'); }
    );

    $("#registroModalPersonal").modal('hide');
}

function limpiar_personal(){
    $('#idpersonal').val("");
    $('#nombre_input').val("");
    $('#apellido_input').val("");
}

function mostrar_one_personal(idpersonal){
    $("#registroModalPersonal").modal('show');
    $.get('/dashboard/mostrar/personal/'+idpersonal , function (data){
        data = JSON.parse(data);
        //console.log(data.cliente);  
        $('#idpersonal').val(data.personal['idpersonal']);
        $('#nombre_input').val(data.personal['nombres']);
        $('#apellido_input').val(data.personal['apellidos']);
    });
}

init();