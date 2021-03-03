function init(){
    lista_medios();

    $("#formulario_medios").on("submit", function(e) {
        guardar_evento(e);
        lista_select2('/dashboard/listas/medios', 'medios', null);
    });

}

function lista_medios(){
    $("#lista_medios").html('<div id="loader"></div>');

    $.get('/dashboard/configuracion/medios/lista', function (data){
        $("#lista_medios").html(data);
    });
}

function activar_medio(idmedios){
    crud_activar('/dashboard/medio/activar/' + idmedios , function(){ lista_medios(); }, function(){ console.log('Eror') });
}

function desactivar_medio(idmedios){
    crud_desactivar('/dashboard/medio/desactivar/' + idmedios , function(){ lista_medios(); }, function(){ console.log('Eror') });
}

function guardar_evento(e){
    crud_guardar_editar(
        e,
        '/dashboard/medio/guardar',
        'medios',
        function(){ limpiar_medio(); },
        function(){ lista_medios(); },
        function(){ console.log('Console Error'); }
    );

    $("#registroModalMedio").modal('hide');
}

function limpiar_medio(){
    $('#idmedios').val("");
    $('#nombre_input').val("");
}

function mostrar_one_medio(idmedios){
    $("#registroModalMedio").modal('show');
    $.get('/dashboard/mostrar/medio/'+idmedios , function (data){
        data = JSON.parse(data);
        //console.log(data.cliente);  
        $('#idmedios').val(data.medio['idmedios']);
        $('#nombre_input').val(data.medio['nombre']);
    });
}

init();