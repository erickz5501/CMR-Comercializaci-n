function init(){
    lista_users();

    $("#formulario_users").on("submit", function(e) {
        guardar_user(e);
    });
}

function lista_users(){
    $("#lista_users").html('<div id="loader"></div>');
    $.get('/dashboard/configuracion/users/lista', function (data){
        $("#lista_users").html(data);
    });
}

function activar_user(idusers){
    crud_activar('/dashboard/users/activar/' + idusers , function(){ lista_users(); }, function(){ console.log('Eror') });
}

function desactivar_user(idusers){
    crud_desactivar('/dashboard/users/desactivar/' + idusers , function(){ lista_users(); }, function(){ console.log('Eror') });
}

function guardar_user(e){
    crud_guardar_editar(
        e,
        '/dashboard/users/guardar',
        'users',
        function(){ limpiar_users(); },
        function(){ lista_users(); },
        function(){ console.log('Console Error'); }
    );

    $("#registroModalusers").modal('hide');
}

function limpiar_users(){
    $('#idusers').val("");
    $('#nombre_input').val("");
    $('#apellido_input').val("");
    $('#email_input').val("");
    $('#password_input').val("");
}

function mostrar_one_user(iduser){
    $("#registroModalusers").modal('show');
    $.get('/dashboard/mostrar/user/'+iduser , function (data){
        data = JSON.parse(data);
        //console.log(data.cliente);  
        $('#idusers').val(data.user['idusers']);
        $('#nombre_input').val(data.user['nombres']);
        $('#apellido_input').val(data.user['apellidos']);
        $('#email_input').val(data.user['email']);
        $('#password_input').val(data.user['password']);
    });
}
init();