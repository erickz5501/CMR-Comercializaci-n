function init (){

    lista_giro_negocio();

    $("#guardar_registro").on('click', function(e){
        $("#formulario_giro_negocio").submit();
    });

    $("#formulario_giro_negocio").on("submit", function(e) {
        guardar_giro_negocio(e);
    });
}

function guardar_giro_negocio(e){

    $(".modal-body").animate({ scrollTop: $(document).height() }, 1000); // colocamos el scrol al final

    crud_guardar_editar( e,'/dashboard/gironegocio/guardar','giro_negocio', function(){ limpiar_form_giro_negocio(); }, function(){ lista_giro_negocio(); }, function(){ console.log('Console Error'); });
}


function lista_giro_negocio(){

    $("#lista_tabla_giro_negocio").html('<div id="loader"></div>');

    $.get('/dashboard/configuracion/gironegocio/lista', function (data){ $("#lista_tabla_giro_negocio").html(data); });
}

function desactivar_giro(idgiro){

    crud_desactivar('/dashboard/gironegocio/desactivar/' + idgiro , function(){ lista_giro_negocio(); }, function(){ console.log('Eror') });
}

function activar_giro(idgiro){
    crud_activar('/dashboard/gironegocio/activar/' + idgiro , function(){ lista_giro_negocio(); }, function(){ console.log('Eror') });
}

function mostrar_one_giro_negocio(idgiro){

    limpiar_form_giro_negocio();

    $('#titulo_modal').html('Actualizar Giro de Negocio');
    $('#btn_footer_modal').html('Actualizar');

    $('#cargando_edit').show(); //visible icon spiner

    $("#modal_giro_negocio").modal('show');

    $.get('/dashboard/mostrar/gironegocio/'+idgiro , function (data){

        data = JSON.parse(data);

        $('#cargando_edit').hide(); //oculto icon spiner

        $('#idgiro_negocio').val(data.idgiro_negocio);

        $('#nombre_giro_negocio').val(data.nombre);
    });
}

function limpiar_form_giro_negocio(){

    $('.tooltip').removeClass("show").addClass("hidde"); // REMOVEMOS EL TOOTIP

    $('.form-control').removeClass("is-invalid"); // REMOVEMOS LOS INPUT MARCADOS EN ROJO

    $('#contenedor_de_errores_giro_negocio').html(''); // REMOVEMOS EL CONTENEDOR DE ERRORES

    $('#titulo_modal').html('Agregar Giro de Negocio');
    $('#btn_footer_modal').html('Guardar');

    $('#idgiro_negocio').val("");

    $('#nombre_giro_negocio').val("");
}

init();
