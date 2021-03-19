function init(){

    lista_tabla_modulos();

    $("#guardar_registro").on('click', function(e){
        $("#formulario_modulos").submit();
    });

    $("#formulario_modulos").on("submit", function(e) {
        guardar_modulo(e);
    });

    // respuesta
    $('#caracteristicas_modulo').summernote({
        placeholder: 'Escriba su texto aquí.',
        tabsize: 2,
        height: 180,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
          ]
    });

    // MOSTRAR DATOS
    $("#caracteristicas_modulo").summernote('code', '');
}

function lista_tabla_modulos(){

    $("#lista_tabla_modulos").html('<div id="loader"></div>');

    $.get('/dashboard/configuracion/modulos/lista', function (data){ $("#lista_tabla_modulos").html(data); });
}

function activar_modulos(idmodulos){

    crud_activar('/dashboard/modulos/activar/' + idmodulos , function(){ lista_tabla_modulos(); }, function(){ console.log('Eror') });
}

function desactivar_modulos(idmodulos){

    crud_desactivar('/dashboard/modulos/desactivar/' + idmodulos , function(){ lista_tabla_modulos(); }, function(){ console.log('Eror') });
}

function guardar_modulo(e){

    $(".modal-body").animate({ scrollTop: $(document).height() }, 1000); // colocamos el scrol al final

    crud_guardar_editar( e, '/dashboard/modulos/guardar', 'modulos', function(){ limpiar_form_modulos(); }, function(){ lista_tabla_modulos(); }, function(){ console.log('Console Error'); });
}

function mostrar_one_modulo(idmodulo){

    limpiar_form_modulos();

    $('#titulo_modal').html('Actualizar Módulo');
    $('#btn_footer_modal').html('Actualizar Módulo');

    $('#cargando_edit').show(); //visible icon spiner

    $("#modal_modulos").modal('show');

    $.get('/dashboard/mostrar/modulo/'+idmodulo , function (data){

        data = JSON.parse(data);

        $('#cargando_edit').hide(); //oculto icon spiner

        $('#idmodulos').val(data.idmodulos);

        $('#nombre_input').val(data.nombre);

        $("#caracteristicas_modulo").summernote('code', data.caracteristicas);
    });
}

function limpiar_form_modulos(){

    $('.tooltip').removeClass("show").addClass("hidde"); // REMOVEMOS EL TOOTIP

    $('.form-control').removeClass("is-invalid"); // REMOVEMOS LOS INPUT MARCADOS EN ROJO

    $('#contenedor_de_errores_modulos').html(''); // REMOVEMOS EL CONTENEDOR DE ERRORES

    $('#titulo_modal').html('Agregar Modulo');
    $('#btn_footer_modal').html('Guardar modulo');

    $('#idmodulos').val("");

    $('#nombre_input').val("");

    $("#caracteristicas_modulo").summernote('code', '');
}

function detalle_modulo(idmodulo){
    $("#detalle_one_modulo").html(''+
        '<div class="card col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding: 0px;">'+
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

    $("#modal_detalle_one_modulo").modal('show');

    $.get('/dashboard/informacio/modulo/'+idmodulo, function(data){

        $("#detalle_one_modulo").html(data);

    });
}
init();
