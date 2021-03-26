function init (){

    lista_giro_negocio(1);

    // PAGINAMOS LA TABLA GIRO DE NEGOCIO
    $(document).on("click",'.pagination a',function(e){
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        lista_giro_negocio(page);
    });

    $("#guardar_registro").on('click', function(e){
        $("#formulario_giro_negocio").submit();
    });

    $("#formulario_giro_negocio").on("submit", function(e) {
        guardar_giro_negocio(e);
    });

    $('#filtro_estado').select2({
        theme: 'bootstrap4',
        placeholder: 'Filtrar por estado',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });
    $('#filtro_estado').val('').trigger('change');
}

function guardar_giro_negocio(e){

    $(".modal-body").animate({ scrollTop: $(document).height() }, 1000); // colocamos el scrol al final

    crud_guardar_editar( e,'/dashboard/gironegocio/guardar','giro_negocio', function(){ limpiar_form_giro_negocio(); }, function(){ lista_giro_negocio(1); }, function(){ console.log('Console Error'); });
}

// BUCADOR
var delay = (function(){ var timer = 0; return function(callback, ms){ clearTimeout (timer); timer = setTimeout(callback, ms); };})();

$("#filtro_search").on("keyup", function () { // CAPTURA TEXTO BUSCADOR
    delay(function(){ lista_giro_negocio(1); }, 600 );
});

function lista_giro_negocio(page){

    var filtro_cant = $('#filtro_cant').val();
    var filtro_search    = $('#filtro_search').val();
    var filtro_estado = $('#filtro_estado').val() ;

    $("#lista_tabla_giro_negocio").html('<div id="loader"></div>');

    $.get(`/dashboard/configuracion/gironegocio/lista?page=${page}&filtro_estado=${filtro_estado}&filtro_search=${filtro_search}&filtro_cant=${filtro_cant}`, function (data){ $("#lista_tabla_giro_negocio").html(data); });
}

function desactivar_giro(idgiro){

    crud_desactivar('/dashboard/gironegocio/desactivar/' + idgiro , function(){ lista_giro_negocio(1); }, function(){ console.log('Eror') });
}

function activar_giro(idgiro){
    crud_activar('/dashboard/gironegocio/activar/' + idgiro , function(){ lista_giro_negocio(1); }, function(){ console.log('Eror') });
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
