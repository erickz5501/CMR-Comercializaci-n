function init(){

    lista_tabla_personal(1);

    // PAGINAMOS LA TABLA PERSONAL
    $(document).on("click",'.pagination a',function(e){  e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];  lista_tabla_personal(page);
    });

    $("#guardar_registro_personal").on('click', function(e){
        $("#formulario_personal").submit();
    });

    $("#formulario_personal").on("submit", function(e) {
        guardar_personal(e);
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

init();

// BUCADOR
var delay = (function(){ var timer = 0; return function(callback, ms){ clearTimeout (timer); timer = setTimeout(callback, ms); };})();
$("#filtro_search").on("keyup", function () { delay(function(){ lista_tabla_personal(1); }, 600 ); });  // CAPTURA TEXTO BUSCADOR

function lista_tabla_personal(page){

    var filtro_cant = $('#filtro_cant').val();
    var filtro_search    = $('#filtro_search').val();
    var filtro_estado = $('#filtro_estado').val() ;

    $("#lista_tabla_personal").html('<div id="loader"></div>');

    $.get(`/dashboard/configuracion/personal/lista?page=${page}&filtro_estado=${filtro_estado}&filtro_search=${filtro_search}&filtro_cant=${filtro_cant}`, function (data){ $("#lista_tabla_personal").html(data); });
}

function activar_personal(idpersonal){

    crud_activar('/dashboard/personal/activar/' + idpersonal , function(){ lista_tabla_personal(1); }, function(){ console.log('Eror') });
}

function desactivar_personal(idpersonal){

    crud_desactivar('/dashboard/personal/desactivar/' + idpersonal , function(){ lista_tabla_personal(1); }, function(){ console.log('Eror') });
}

function guardar_personal(e){

    $(".modal-body").animate({ scrollTop: $(document).height() }, 1000); // colocamos el scrol al final

    crud_guardar_editar( e, '/dashboard/personal/guardar', 'personal', function(){ limpiar_form_personal(); }, function(){ lista_tabla_personal(1); }, function(){ console.log('Console Error'); } );
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

        $('#dni_personal').val(data.dni);

        $('#nombre_personal').val(data.nombres);

        $('#apellido_personal').val(data.apellidos);

        $('#avatar_personal_antiguo').val(data.avatar);
    });
}

function limpiar_form_personal(){

    $('.tooltip').removeClass("show").addClass("hidde"); // REMOVEMOS EL TOOTIP

    $('.form-control').removeClass("is-invalid"); // REMOVEMOS LOS INPUT MARCADOS EN ROJO

    $('#contenedor_de_errores_personal').html(''); // REMOVEMOS EL CONTENEDOR DE ERRORES

    $('#titulo_modal').html('Agregar Personal');
    $('#btn_footer_modal').html('Guardar personal');

    $('#idpersonal').val("");

    $('#avatar_personal_antiguo').val("");

    $("#formulario_personal").trigger("reset");
}

//:::: CONSULTAS RUC/DNI SUNAT ::::::
function cunsulta_sunat(){

    let nro_document = $('#dni_personal').val();

    if (nro_document.length != 8) {

        Swal.fire({
            title: "Error",
            text: "DNI Invalido, escriba 8 dígitos.",
            timer: 2000,
            icon: "error"
        });

    }else{
        //Cunsolta DNI a la sunat
        $('#cargado_sunat').hide();

        $('#cargando_sunat').show();

        $.get('/consultas/dni/'+nro_document, function(data){

            data = JSON.parse(data);

            $('#cargado_sunat').show();

            $('#cargando_sunat').hide();

            if (data['status'] == false) {
                Swal.fire({
                    title: "Error",
                    text: "No se puede consultar este DNI",
                    timer: 2000,
                    icon: "error"
                });
            }else{
                $('#nombre_personal').val(data.cliente['name']);
                $('#apellido_personal').val(data.cliente['first_name'] + ' '+ data.cliente['last_name']);
            }
        });
    }

    $('.tooltip').removeClass("show").addClass("hidde");
}
