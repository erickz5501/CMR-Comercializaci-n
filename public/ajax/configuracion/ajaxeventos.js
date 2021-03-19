function init(){

    lista_tabla_eventos();

    $("#guardar_registro").on('click', function(e){
        $("#formulario_evento").submit();
    });

    $("#formulario_evento").on("submit", function(e) {
        guardar_evento(e);
    });
}

function lista_tabla_eventos(){

    $("#lista_tabla_eventos").html('<div id="loader"></div>');

    $.get('/dashboard/configuracion/eventos/lista', function (data){ $("#lista_tabla_eventos").html(data); });
}

function activar_evento(ideventos){

    crud_activar('/dashboard/evento/activar/' + ideventos , function(){ lista_tabla_eventos(); }, function(){ console.log('Eror') });
}

function desactivar_evento(ideventos){

    crud_desactivar('/dashboard/evento/desactivar/' + ideventos , function(){ lista_tabla_eventos(); }, function(){ console.log('Eror') });
}

function guardar_evento( e ){

    $(".modal-body").animate({ scrollTop: $(document).height() }, 1000); // colocamos el scrol al final

    crud_guardar_editar( e, '/dashboard/evento/guardar', 'evento', function(){ limpiar_evento(); }, function(){ lista_tabla_eventos(); }, function(){ console.log('Console Error'); } );
}

function limpiar_evento(){

    $('.tooltip').removeClass("show").addClass("hidde"); // REMOVEMOS EL TOOTIP

    $('.form-control').removeClass("is-invalid"); // REMOVEMOS LOS INPUT MARCADOS EN ROJO

    $('#contenedor_de_errores_evento').html(''); // REMOVEMOS EL CONTENEDOR DE ERRORES

    $('#titulo_modal').html('Agregar evento');
    $('#btn_footer_modal').html('Guardar evento');

    $('#ideventos').val("");

    $('#nombre_evento').val("");

    $('#descripcion_input').val("");
}

function mostrar_one_evento(ideventos){

    limpiar_evento();

    $('#titulo_modal').html('Actualizar evento');
    $('#btn_footer_modal').html('Actualizar evento');

    $('#cargando_edit').show(); //visible icon spiner

    $("#modal_evento").modal('show');

    $.get('/dashboard/mostrar/evento/'+ideventos , function (data){

        data = JSON.parse(data);

        $('#cargando_edit').hide(); //oculto icon spiner

        $('#ideventos').val(data.ideventos);

        $('#nombre_evento').val(data.nombre);

        $('#descripcion_input').val(data.descrripcion);
    });
}

init();


