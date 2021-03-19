function init(){
    lista_tabla_users();

    $("#guardar_registro").on('click', function(e){
        $("#formulario_users").submit();
    });

    $("#formulario_users").on("submit", function(e) {
        guardar_user(e);
    });
}

function lista_tabla_users(){

    $("#lista_tabla_users").html('<div id="loader"></div>');

    $.get('/dashboard/configuracion/users/lista', function (data){

        $("#lista_tabla_users").html(data);
    });
}

function activar_user(idusers){

    crud_activar('/dashboard/users/activar/' + idusers , function(){ lista_tabla_users(); }, function(){ console.log('Eror') });
}

function desactivar_user(idusers){

    crud_desactivar('/dashboard/users/desactivar/' + idusers , function(){ lista_tabla_users(); }, function(){ console.log('Eror') });
}

function guardar_user(e){

    $(".modal-body").animate({ scrollTop: $(document).height() }, 1000); // colocamos el scrol al final

    crud_guardar_editar( e, '/dashboard/users/guardar', 'users', function(){ limpiar_form_users(); }, function(){ lista_tabla_users(); }, function(){ console.log('Console Error'); });
}

function limpiar_form_users(){

    $('.tooltip').removeClass("show").addClass("hidde"); // REMOVEMOS EL TOOTIP

    $('.form-control').removeClass("is-invalid"); // REMOVEMOS LOS INPUT MARCADOS EN ROJO

    $('#contenedor_de_errores_users').html(''); // REMOVEMOS EL CONTENEDOR DE ERRORES

    $('#idusers').val("");

    $('#nombre_input').val("");

    $('#apellido_input').val("");

    $('#email_input').val("");

    $('#password_input').val("");
}

function mostrar_one_user(iduser){

    limpiar_form_users();

    $('#cargando_edit').show();

    $("#registroModalusers").modal('show');

    $.get('/dashboard/mostrar/user/'+iduser , function (data){

        data = JSON.parse(data);

        $('#cargando_edit').hide();

        $('#idusers').val(data.user['idusers']);

        $('#nombre_input').val(data.user['nombres']);

        $('#apellido_input').val(data.user['apellidos']);

        $('#email_input').val(data.user['email']);

        $('#password_input').val(data.user['password']);
    });
}
init();
