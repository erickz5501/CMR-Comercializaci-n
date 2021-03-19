function init(){

    lista_tabla_actividades();

    $("#guardar_registro").on('click', function(e){
        $("#formulario_actividad").submit();
    });

    $('#formulario_actividad').on("submit", function(e){
        guardar_actividad(e);
    })
}

function lista_tabla_actividades(){

    $("#lista_tabla_actividades").html('<div id="loader"></div>');

    $.get('/dashboard/configuracion/actividad/lista', function (data){

        $("#lista_tabla_actividades").html(data);
    });
}

function guardar_actividad(e){

    $(".modal-body").animate({ scrollTop: $(document).height() }, 1000); // colocamos el scrol al final

    crud_guardar_editar( e, '/dashboard/actividad/guardar', 'actividad', function(){ limpiar_form_actividad(); }, function(){ lista_tabla_actividades(); }, function(){ console.log('Console Error'); });
}

function desactivar_actividad(idactividad){

    crud_desactivar('/dashboard/actividad/desactivar/' + idactividad , function(){ lista_tabla_actividades(); }, function(){ console.log('Eror') });
}

function activar_actividad(idactividad){

    crud_activar('/dashboard/actividad/activar/' + idactividad , function(){ lista_tabla_actividades(); }, function(){ console.log('Eror') });
}

function mostrar_one_actividad(idactividad){

    limpiar_form_actividad();

    $('#titulo_modal').html('Actualizar actividad');
    $('#btn_footer_modal').html('Actualizar actividad');

    $('#cargando_edit').show(); //visible icon spiner

    $("#modal_actividad").modal('show');

    $.get('/dashboard/mostrar/actividad/'+ idactividad, function(data){

        data = JSON.parse(data);

        $('#cargando_edit').hide(); //oculto icon spiner

        $("#idactividad").val(data.idactividad);

        $("#nombre_actividad").val(data.nombre);

    });
}

function limpiar_form_actividad(){

    $('.tooltip').removeClass("show").addClass("hidde"); // REMOVEMOS EL TOOTIP

    $('.form-control').removeClass("is-invalid"); // REMOVEMOS LOS INPUT MARCADOS EN ROJO

    $('#contenedor_de_errores_actividad').html(''); // REMOVEMOS EL CONTENEDOR DE ERRORES

    $('#titulo_modal').html('Agregar actividad');
    $('#btn_footer_modal').html('Guardar actividad');

    $('#idactividad').val("");

    $('#nombre_actividad').val("");
}

init();
