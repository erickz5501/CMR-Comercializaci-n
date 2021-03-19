function init(){

    lista_tabla_personal();

    $("#guardar_registro").on('click', function(e){
        $("#formulario_personal").submit();
    });

    $("#formulario_personal").on("submit", function(e) {
        guardar_personal(e);
    });
}

function lista_tabla_personal(){

    $("#lista_tabla_personal").html('<div id="loader"></div>');

    $.get('/dashboard/configuracion/personal/lista', function (data){ $("#lista_tabla_personal").html(data); });
}

function activar_personal(idpersonal){

    crud_activar('/dashboard/personal/activar/' + idpersonal , function(){ lista_tabla_personal(); }, function(){ console.log('Eror') });
}

function desactivar_personal(idpersonal){

    crud_desactivar('/dashboard/personal/desactivar/' + idpersonal , function(){ lista_tabla_personal(); }, function(){ console.log('Eror') });
}

function guardar_personal(e){

    $(".modal-body").animate({ scrollTop: $(document).height() }, 1000); // colocamos el scrol al final

    crud_guardar_editar( e, '/dashboard/personal/guardar', 'personal', function(){ limpiar_form_personal(); }, function(){ lista_tabla_personal(); }, function(){ console.log('Console Error'); } );
}

function mostrar_one_personal(idpersonal){

    limpiar_form_personal();

    $('#titulo_modal').html('Actualizar Personal');
    $('#btn_footer_modal').html('Actualizar personal');

    $('#cargando_edit').show(); //visible icon spiner

    $("#modal_personal").modal('show');

    $.get('/dashboard/mostrar/personal/'+idpersonal , function (data){

        data = JSON.parse(data);

        $('#cargando_edit').hide(); //oculto icon spiner

        $('#idpersonal').val(data.idpersonal);

        $('#nombre_personal').val(data.nombres);

        $('#apellido_personal').val(data.apellidos);
    });
}

function limpiar_form_personal(){

    $('.tooltip').removeClass("show").addClass("hidde"); // REMOVEMOS EL TOOTIP

    $('.form-control').removeClass("is-invalid"); // REMOVEMOS LOS INPUT MARCADOS EN ROJO

    $('#contenedor_de_errores_personal').html(''); // REMOVEMOS EL CONTENEDOR DE ERRORES

    $('#titulo_modal').html('Agregar Personal');
    $('#btn_footer_modal').html('Guardar personal');

    $('#idpersonal').val("");

    $('#nombre_personal').val("");

    $('#apellido_personal').val("");
}

init();
