function init(){
    lista_eventos();
    $("#formulario_evento").on("submit", function(e) {
        guardar_evento(e);
        lista_select2('/dashboard/listas/eventos', 'eventos', null);
    });
}

function lista_eventos(){
    $("#lista_eventos").html('<div id="loader"></div>');
    $.get('/dashboard/configuracion/eventos/lista', function (data){
        $("#lista_eventos").html(data);
    });
}

function activar_evento(ideventos){
    crud_activar('/dashboard/evento/activar/' + ideventos , function(){ lista_eventos(); }, function(){ console.log('Eror') });
}

function desactivar_evento(ideventos){
    crud_desactivar('/dashboard/evento/desactivar/' + ideventos , function(){ lista_eventos(); }, function(){ console.log('Eror') });
}

function guardar_evento(e){
    crud_guardar_editar(
        e,
        '/dashboard/evento/guardar',
        'evento',
        function(){ limpiar_evento(); },
        function(){ lista_eventos(); },
        function(){ console.log('Console Error'); }
    );

    $("#registroModalEvento").modal('hide');
}

function limpiar_evento(){
    $('#ideventos').val("");
    $('#nombre_input').val("");
    $('#descripcion_input').val("");
}

function mostrar_one_evento(ideventos){
     $("#registroModalEvento").modal('show');
    $.get('/dashboard/mostrar/evento/'+ideventos , function (data){
        data = JSON.parse(data);
       //console.log(data.cliente);  
        $('#ideventos').val(data.evento['ideventos']);
        $('#nombre_input').val(data.evento['nombre']);
        $('#descripcion_input').val(data.evento['descrripcion'])
        
    });
}

init();