function init(){

    lista_tabla_etiqueta(1);

    // PAGINAMOS LA TABLA ETIQUETA
    $(document).on("click",'.pagination a',function(e){
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        lista_tabla_etiqueta(page);
    });

    $("#guardar_registro").on('click', function(e){  $("#formulario_etiqueta").submit(); });
    $("#formulario_etiqueta").on("submit", function(e) { guardar_editar_etiqueta(e); });

    $('#filtro_estado').select2({
        theme: 'bootstrap4',
        placeholder: 'Filtrar por estado',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });
}

// BUCADOR
var delay = (function(){
    var timer = 0;
    return function(callback, ms){
        clearTimeout (timer);
        timer = setTimeout(callback, ms);
    };
})();
$("#filtro_search").on("keyup", function () { // CAPTURA TEXTO BUSCADOR
    delay(function(){
        lista_tabla_etiqueta(1);
    }, 600 );
    console.log('searg');
});

// ::::::: LISTAR TABLA ETIQUETA :::::::
function lista_tabla_etiqueta(page){

    var filtro_cant = $('#filtro_cant').val();
    var filtro_search    = $('#filtro_search').val();
    var filtro_estado = $('#filtro_estado').val() ;

    $("#lista_tabla_etiquetas").html('<div id="loader"></div>');

    $.get(`/dashboard/configuracion/etiquetas/lista-tabla?page=${page}&filtro_estado=${filtro_estado}&filtro_search=${filtro_search}&filtro_cant=${filtro_cant}`, function (data){

        $("#lista_tabla_etiquetas").html(data);
    });
}

//  :::: GUARDAR Y EDITAR "ETIQUETA" ::::::
function guardar_editar_etiqueta(e) {

    $(".modal-body").animate({ scrollTop: $(document).height() }, 1000); // colocamos el scrol al final

    crud_guardar_editar(
        e,
        '/dashboard/configuracion/etiquetas/guardar-editar',
        'etiqueta',
        function(){ limpiar_form_etiqueta(); },
        function(){ lista_tabla_etiqueta(); },
        function(){ console.log('Console Error'); }
    );
}

function desactivar_etiqueta(idetiquetas) {

    crud_desactivar('/dashboard/configuracion/etiquetas/desactivar/' + idetiquetas , function(){ lista_tabla_etiqueta(); }, function(){ console.log('Eror') });
}

function activar_etiqueta(idetiquetas) {

    crud_activar('/dashboard/configuracion/etiquetas/activar/' + idetiquetas , function(){ lista_tabla_etiqueta(); }, function(){ console.log('Eror') });
}

function mostrar_one_etiqueta(idetiquetas){

    limpiar_form_etiqueta();

    $('#titulo_modal_etiqueta').html('Actualizar Etiqueta');

    $('#btn_footer_modal_etiqueta').html('ACTUALIZAR');

    $('#cargando_edit').show();

    $("#modal_etiqueta").modal('show');

    $.get('/dashboard/configuracion/etiquetas/mostra-one/'+idetiquetas , function (data){

        data = JSON.parse(data);

        $('#cargando_edit').hide();

        $('#idetiquetas').val(data.idetiquetas);

        $('#nombre_etiqueta').val(data.nombre);

        $('#descripcion_etiqueta').val(data.descripcion);
    });
}

function limpiar_form_etiqueta(){ //Para limpIar los campos despues de registrar un interesado

    $('#idetiquetas').val("");

    $('#nombre_etiqueta').val("");

    $('#descripcion_etiqueta').val("");

    $('#titulo_modal_etiqueta').html('Agregar Etiqueta');

    $('#btn_footer_modal_etiqueta').html('GUARDAR');
}

init();


