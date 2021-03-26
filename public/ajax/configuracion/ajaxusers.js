function init(){

    lista_tabla_users(1);

    // PAGINAMOS LA TABLA USER
    $(document).on("click",'.pagination a',function(e){
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        lista_tabla_users(page);
    });

    $("#guardar_registro").on('click', function(e){ $("#formulario_users").submit(); });

    $("#formulario_users").on("submit", function(e) { guardar_user(e); });

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
    delay(function(){ lista_tabla_users(1); }, 600 );
});

function lista_tabla_users(page){

    var filtro_cant = $('#filtro_cant').val();
    var filtro_search    = $('#filtro_search').val();
    var filtro_estado = $('#filtro_estado').val() ;

    $("#lista_tabla_users").html('<div id="loader"></div>');

    $.get(`/dashboard/configuracion/users/lista?page=${page}&filtro_estado=${filtro_estado}&filtro_search=${filtro_search}&filtro_cant=${filtro_cant}`, function (data){

        $("#lista_tabla_users").html(data);
    });
}

function activar_user(idusers){

    crud_activar('/dashboard/users/activar/' + idusers , function(){ lista_tabla_users(1); }, function(){ console.log('Eror') });
}

function desactivar_user(idusers){

    crud_desactivar('/dashboard/users/desactivar/' + idusers , function(){ lista_tabla_users(1); }, function(){ console.log('Eror') });
}

function guardar_user(e){

    $(".modal-body").animate({ scrollTop: $(document).height() }, 1000); // colocamos el scrol al final

    crud_guardar_editar( e, '/dashboard/users/guardar', 'users', function(){ limpiar_form_users(); }, function(){ lista_tabla_users(1); }, function(){ console.log('Console Error'); });
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

    $.get('/dashboard/mostrar/user/'+iduser , function (data){

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
    // let tipo_documento        = $("#select_modal_tipo_doc").val();
    // let modulo_txt          = $("#select_modal_tipoDocumento option:selected").text();
    let nro_document        = $('#dni_users').val();

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
            console.log(data);
            if (data['status'] == false) {
                Swal.fire({
                    title: "Error",
                    text: "No se puede consultar este DNI",
                    timer: 2000,
                    icon: "error"
                });
            }else{
                $('#nombre_users').val(data.cliente['name']);
                $('#apellido_users').val(data.cliente['first_name'] + ' '+ data.cliente['last_name']);
            }
        });
    }

    $('.tooltip').removeClass("show").addClass("hidde");
}
init();
