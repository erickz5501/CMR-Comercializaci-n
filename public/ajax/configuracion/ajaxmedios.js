
// var recordate_paginate = '';

function init(){

    lista_tabla_medios(1);

    // PAGINAMOS LA TABLA MEDIOS
    $(document).on("click",'.pagination a',function(e){
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        lista_tabla_medios(page);
    });

    $("#guardar_registro").on('click', function(e){
        $("#formulario_medios").submit();
    });

    $("#formulario_medios").on("submit", function(e) {
        guardar_evento(e);
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

// BUCADOR
var delay = (function(){ var timer = 0; return function(callback, ms){ clearTimeout (timer); timer = setTimeout(callback, ms); };})();

$("#filtro_search").on("keyup", function () { // CAPTURA TEXTO BUSCADOR
    delay(function(){ lista_tabla_medios(1); }, 600 );
});

function lista_tabla_medios(page){

    var filtro_cant = $('#filtro_cant').val();
    var filtro_search    = $('#filtro_search').val();
    var filtro_estado = $('#filtro_estado').val() ;

    $("#lista_tabla_medios").html('<div id="loader"></div>');

    $.get(`/dashboard/configuracion/medios/lista?page=${page}&filtro_estado=${filtro_estado}&filtro_search=${filtro_search}&filtro_cant=${filtro_cant}`, function (data){

        $("#lista_tabla_medios").html(data);
    });
}

function activar_medio(idmedios){

    crud_activar('/dashboard/medio/activar/' + idmedios , function(){ lista_tabla_medios(1); }, function(){ console.log('Eror') });
}

function desactivar_medio(idmedios){

    crud_desactivar('/dashboard/medio/desactivar/' + idmedios , function(){ lista_tabla_medios(1); }, function(){ console.log('Eror') });
}

function guardar_evento(e){

    $(".modal-body").animate({ scrollTop: $(document).height() }, 1000); // colocamos el scrol al final

    crud_guardar_editar( e, '/dashboard/medio/guardar', 'medios', function(){ limpiar_form_medio(); }, function(){ lista_tabla_medios(1); }, function(){ console.log('Console Error'); });
}

function mostrar_one_medio(idmedios){

    limpiar_form_medio();

    $('#titulo_modal').html('Actualizar Medio de Contacto');
    $('#btn_footer_modal').html('Actualizar');

    $('#cargando_edit').show(); //visible icon spiner

    $("#modal_medios").modal('show');

    $.get('/dashboard/mostrar/medio/'+idmedios , function (data){

        data = JSON.parse(data);

        $('#cargando_edit').hide(); //oculto icon spiner

        $('#idmedios').val(data.idmedios);

        $('#nombre_medio').val(data.nombre);
    });
}

function limpiar_form_medio(){

    $('.tooltip').removeClass("show").addClass("hidde"); // REMOVEMOS EL TOOTIP

    $('.form-control').removeClass("is-invalid"); // REMOVEMOS LOS INPUT MARCADOS EN ROJO

    $('#contenedor_de_errores_medios').html(''); // REMOVEMOS EL CONTENEDOR DE ERRORES

    $('#titulo_modal').html('Agregar Medio de Contacto');
    $('#btn_footer_modal').html('Guardar');

    $('#idmedios').val("");

    $('#nombre_medio').val("");
}

init();
