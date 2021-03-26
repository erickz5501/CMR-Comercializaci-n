function init(){

    lista_tabla_eventos(1);

    // PAGINAMOS LA TABLA EVENTOS
    $(document).on("click",'.pagination a',function(e){
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        lista_tabla_eventos(page);
    });

    $("#guardar_registro").on('click', function(e){
        $("#formulario_evento").submit();
    });

    $("#formulario_evento").on("submit", function(e) {
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
    delay(function(){ lista_tabla_eventos(1); }, 600 );
});

function lista_tabla_eventos(page){

    var filtro_cant = $('#filtro_cant').val();
    var filtro_search    = $('#filtro_search').val();
    var filtro_estado = $('#filtro_estado').val() ;

    $("#lista_tabla_eventos").html('<div id="loader"></div>');

    $.get(`/dashboard/configuracion/eventos/lista?page=${page}&filtro_estado=${filtro_estado}&filtro_search=${filtro_search}&filtro_cant=${filtro_cant}`, function (data){ $("#lista_tabla_eventos").html(data); });
}

function activar_evento(ideventos){

    crud_activar('/dashboard/evento/activar/' + ideventos , function(){ lista_tabla_eventos(1); }, function(){ console.log('Eror') });
}

function desactivar_evento(ideventos){

    crud_desactivar('/dashboard/evento/desactivar/' + ideventos , function(){ lista_tabla_eventos(1); }, function(){ console.log('Eror') });
}

function guardar_evento( e ){

    $(".modal-body").animate({ scrollTop: $(document).height() }, 1000); // colocamos el scrol al final

    crud_guardar_editar( e, '/dashboard/evento/guardar', 'evento', function(){ limpiar_evento(); }, function(){ lista_tabla_eventos(1); }, function(){ console.log('Console Error'); } );
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

function mostrar_detalle_evento(ideventos){
    $('#ver_detalle_evento').html(''+
        '<div class="row">'+
            '<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 ">'+
            '</div>'+
            '<div class="col-ms-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 " style="padding-bottom: 40px;">'+
                '<center>'+
                    '<i class="fas fa-spinner fa-spin fa-6x" aria-hidden="true"></i>'+
                '</center>'+
            '</div>'+
            '<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 ">'+
            '</div>'+
            '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">'+
                'Consultando a la Base de Datos, momento por favor...'+
            '</div>'+
        '</div>'+
    '');

    $("#modal_detalle_evento").modal('show');

    $.get('/dashboard/mostrar/evento/'+ideventos , function (data){

        data = JSON.parse(data);

        $('#ver_detalle_evento').html(''+
            '<h5 class="h2 card-title mb-0">' + data.nombre + '</h5>'+
            '<small class="text-muted">' + moment(data.created_at).format('YYYY/MM/DD - hh:mm a') + '</small>'+
            '<p class="card-text mt-4"> ' + data.descrripcion + '</p>'+
        '');
    });
}

init();


