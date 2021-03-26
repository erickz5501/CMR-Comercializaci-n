function init(){

    lista_tabla_cotizaciones(1);

    // PAGINAMOS LA TABLA COTIZACION
    $(document).on("click",'.pagination a',function(e){
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        lista_tabla_cotizaciones(page);
    });

    $("#guardar_registro").on('click', function(e){
        $("#formulario_cotizacion").submit();
    });

    $("#formulario_cotizacion").on("submit", function(e) {
        guardar_cotizacion(e);
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
    delay(function(){ lista_tabla_cotizaciones(1); }, 600 );
});

function guardar_cotizacion(e){

    $(".modal-body").animate({ scrollTop: $(document).height() }, 1000); // colocamos el scrol al final

    crud_guardar_editar( e, '/dashboard/cotizacion/crear', 'cotizacion', function(){ limpiar_cotizacion();}, function(){ lista_tabla_cotizaciones(1); }, function(){ console.log('Console Error'); });
}

function lista_tabla_cotizaciones(page){

    var filtro_cant = $('#filtro_cant').val();
    var filtro_search    = $('#filtro_search').val();
    var filtro_estado = $('#filtro_estado').val() ;

    $("#lista_tabla_cotizaciones").html('<div id="loader"></div>');

    $.get(`/dashboard/cotizaciones/lista?page=${page}&filtro_estado=${filtro_estado}&filtro_search=${filtro_search}&filtro_cant=${filtro_cant}`, function (data){ $("#lista_tabla_cotizaciones").html(data); });
}

function mostrar_one_cotizacion(idcotizacion){

    $('#titulo_modal').html('Actualizar Cotizacion');
    $('#btn_footer_modal').html('Actualizar');

    $('#cargando_edit').show(); //visible icon spiner

    $('#validez_cotizacion').val('');

    $("#modal_cotizacion").modal('show');

    $.get('/dashboard/cotizaciones/mostrar-one/'+idcotizacion , function (data){

        data = JSON.parse(data);

        $('#cargando_edit').hide(); //oculto icon spiner

        $('#idcotizaciones').val(data.idcotizaciones);

        $('#nombre_cotizacion').val(data.nombre);

        $('#validez_cotizacion').val(data.validez);

        $('#doc_cotizacion_antiguo').val(data.ruta);
        // console.log(data.validez);
    });

}

function desactivar(idcotizacion) {

    crud_desactivar('/dashboard/cotizaciones/desactivar/' + idcotizacion , function(){ lista_tabla_cotizaciones(1); }, function(){ console.log('Eror') });
}
function activar(idcotizacion) {

    crud_activar('/dashboard/cotizaciones/activar/' + idcotizacion , function(){ lista_tabla_cotizaciones(1); }, function(){ console.log('Eror') });
}

function validar_pdf(){

    var fileInput = document.getElementById('ruta_cotizacion');

    var filePath = fileInput.value;

    extensiones_permitidas = new Array(".pdf");

    extension = (filePath.substring(filePath.lastIndexOf("."))).toLowerCase();//Obtiene la extension del archivo a subir

    if (extension == ".pdf" || extension == ".docx") { //validamos que el archivo a subir sea un pdf

        return true;

    } else {

        Swal.fire({
            icon: 'error',
            title: 'Solo documentos PDF!',
            text: 'esto es un archivo: ' + extension
            //footer: 'Este documento es un: ' + extension
        })

        $('#ruta_cotizacion').val("");

        return false;
    }
}

function ver_documento(idcotizacion) {

    $("#visualizar_pdf").html(''+
        '<div class="card" style="padding: 0px;">'+
            '<div class="card-body">'+
                '<div class="row">'+
                    '<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 ">'+
                    '</div>'+

                    '<div class="col-ms-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center" style="padding-bottom: 40px;">'+
                        '<i class="fas fa-spinner fa-spin fa-6x" aria-hidden="true"></i>'+
                    '</div>'+

                    '<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 ">'+
                    '</div>'+
                    '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">'+
                        'Consultando a la Base de Datos, momento por favor...'+
                    '</div>'+
                '</div>'+
            '</div>'+
        '</div>'+
    '');

    $('#modal_ver_doc').modal('show');

    $.get('/dashboard/cotizaciones/mostrar-one/'+idcotizacion , function (data){

        data = JSON.parse(data);

        $('#titulo_modal_doc').html(data.nombre);

        if (data.ruta.substring(data.ruta.lastIndexOf(".")) == ".pdf" || data.ruta.substring(data.ruta.lastIndexOf(".")) == ".png" || data.ruta.substring(data.ruta.lastIndexOf(".")) == ".jpg" || data.ruta.substring(data.ruta.lastIndexOf(".")) == ".jpeg" || data.ruta.substring(data.ruta.lastIndexOf(".")) == ".jfif" || data.ruta.substring(data.ruta.lastIndexOf(".")) == ".svg") {

            $('#visualizar_pdf').html('<embed  src="/docs/'+data.ruta+'" width="100%" style=" height: 400px !important;" ></embed>');

        } else {

            $('#visualizar_pdf').html('<div class="alert alert-default alert-dismissible fade show" role="alert">'+
                '<embed  src="/docs/'+data.ruta+'" width="100%" style=" height: 1px !important;" ></embed>'+
                '<span class="alert-icon"><i class="ni ni-like-2"></i></span>'+
                '<span class="alert-text"><strong>Alerta!</strong> El documento no se puede previzualizar, su descarga empresara en breve, o de lo contrario pulse el boton <span class="badge badge-success badge-lg"><i class="ni ni-cloud-download-95 align-middle"></i> DESCARGAR</span>.</span>'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                '<span aria-hidden="true">&times;</span>'+
                '</button>'+
            '</div>');
        }

        $('#download_doc').html('<a href="/docs/'+data.ruta+'" download="'+data.nombre+'" class="btn btn-outline-success px-2 py-2"><i class="ni ni-cloud-download-95 align-middle"> </i> DESCARGAR</a>');
    });
}

function limpiar_cotizacion(){

    $.get('/dashboard/cotizacion/generar', function(data){

        data = JSON.parse(data);

        $('#nombre_cotizacion').val(data);
        // nombre_cotizacion.disabled = true; //deshabilitamos el campo para que no pueda modifiar el campo
    });

    $('.tooltip').removeClass("show").addClass("hidde"); // REMOVEMOS EL TOOTIP

    $('.form-control').removeClass("is-invalid"); // REMOVEMOS LOS INPUT MARCADOS EN ROJO

    $('#contenedor_de_errores_evento').html(''); // REMOVEMOS EL CONTENEDOR DE ERRORES

    $('#titulo_modal').html('Agregar Cotizacion');
    $('#btn_footer_modal').html('Guardar');

    $('#idcotizaciones').val("");

    $('#validez_cotizacion').val(7);

    $('#ruta_cotizacion').val("");
}

init();
