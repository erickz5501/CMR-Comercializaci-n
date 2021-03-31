function init(){

    lista_select2('/dashboard/listas/personal', 'personal', null);

    lista_tabla_users(1);

    // PAGINAMOS LA TABLA USER
    $(document).on("click",'.pagination a',function(e){ e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];  lista_tabla_users(page);
    });

    $("#guardar_registro").on('click', function(e){ $("#formulario_users").submit(); });
    $("#formulario_users").on("submit", function(e) { guardar_user(e); });

    $("#guardar_registro_personal").on('click', function(e){ $("#formulario_personal").submit(); });
    $("#formulario_personal").on("submit", function(e) { crear_personal(e); });

    $('#filtro_estado').select2({
        theme: 'bootstrap4',
        placeholder: 'Filtrar por estado',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });

    $('#filtro_estado').val('').trigger('change');

    $('#select_modal_personal').select2({
        theme: 'bootstrap4',
        placeholder: 'Selecione personal.',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });
}

init();

// BUCADOR
var delay = (function(){ var timer = 0; return function(callback, ms){ clearTimeout (timer); timer = setTimeout(callback, ms); };})();

$("#filtro_search").on("keyup", function () { delay(function(){ lista_tabla_users(1); }, 600 ); }); // CAPTURA TEXTO BUSCADOR

function lista_tabla_users(page){

    var filtro_cant = $('#filtro_cant').val();
    var filtro_search    = $('#filtro_search').val();
    var filtro_estado = $('#filtro_estado').val() ;

    $("#lista_tabla_users").html('<div id="loader"></div>');

    $.get(`/cmr/configuracion/users/lista-tabla?page=${page}&filtro_estado=${filtro_estado}&filtro_search=${filtro_search}&filtro_cant=${filtro_cant}`, function (data){

        $("#lista_tabla_users").html(data);
    });
}

function activar_user(idusers){

    crud_activar('/cmr/configuracion/user-activar/' + idusers , function(){ lista_tabla_users(1); }, function(){ console.log('Eror') });
}

function desactivar_user(idusers){

    crud_desactivar('/cmr/configuracion/user-desactivar/' + idusers , function(){ lista_tabla_users(1); }, function(){ console.log('Eror') });
}

function guardar_user(e){

    $(".modal-body").animate({ scrollTop: $(document).height() }, 1000); // colocamos el scrol al final

    crud_guardar_editar( e, '/cmr/configuracion/user-guardar-editar', 'users', function(){ limpiar_form_users(); }, function(){ lista_tabla_users(1); }, function(){ console.log('Console Error'); });
}

function limpiar_form_users(){

    $('#titulo_modal').html('Agregar Usuario');
    $('#btn_footer_modal').html('GUARDAR');

    $('.tooltip').removeClass("show").addClass("hidde"); // REMOVEMOS EL TOOTIP

    $('.form-control').removeClass("is-invalid"); // REMOVEMOS LOS INPUT MARCADOS EN ROJO

    $('#contenedor_de_errores_users').html(''); // REMOVEMOS EL CONTENEDOR DE ERRORES

    $('#idusers').val("");

    $('#dni_users').val('');

    $('#nombre_users').val('');

    $('#apellido_users').val('');

    $('#email_users').val('');

    $('#password').val('');

    $('#password_confirmation').val('');
}

function mostrar_one_user(iduser){

    limpiar_form_users();

    $('#titulo_modal').html('Actualizar Usuario');
    $('#btn_footer_modal').html('ACTUALIZAR');

    $('#cargando_edit').show();

    $("#modal_users").modal('show');

    $.get('/cmr/configuracion/user-mostrar-one/'+iduser , function (data){

        data = JSON.parse(data);

        $('#cargando_edit').hide();

        $('#idusers').val(data.idusers);

        $('#dni_users').val(data.dni);

        $('#nombre_users').val(data.nombres);

        $('#apellido_users').val(data.apellidos);

        $('#email_users').val(data.email);

        $('#password').val(data.password);
    });
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

// ::::: AGREGAR UN NUEVO PERSONAL
function abrir_modal_personal() {limpiar_form_personal(); $('.tooltip').removeClass("show").addClass("hidde"); $('#modal_personal').modal('show'); }
function crear_personal(e){
    $(".modal-body").animate({ scrollTop: $(document).height() }, 1000); // colocamos el scrol al final
    crud_guardar_modal( e,'/dashboard/personal/guardar', 'personal', function(){ limpiar_form_personal(); }, function(){ console.log('Console Error'); } );
}
function limpiar_form_personal(){
    $('.form-control').removeClass("is-invalid"); // REMOVEMOS LOS INPUT MARCADOS EN ROJO
    $('#contenedor_de_errores_personal').html(''); // REMOVEMOS EL CONTENEDOR DE ERRORES
    $("#formulario_personal").trigger("reset");
}


