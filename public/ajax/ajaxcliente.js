function init(){
    lista_clientes();
    // ..................... .::::: DATOS DEL FORMULARIO PARA "EDITAR O AGREGAR" ::::::::. .............
    $("#formulario_cliente").on("submit", function(e) {
        guardar_cliente(e);
    });

    // ...................... .:::: LISTAR SELECT 2 "GIRO DE NEGOCIO" ::::. ......................
    lista_select2('/dashboard/listas/gironegocio', 'giroNegocio', null);
    // lista_select2('/dashboard/listas/tipopersona', 'tipoPersona', null);
    // lista_select2('/dashboard/listas/tipodoc', 'tipoDocumento', null);
}

// ......................... :::: GUARDAR Y EDITAR "CLIENTE" :::::: .............................
function guardar_cliente(e) {

    crud_guardar_editar(
        e,
        '/dashboard/guardar/clientes',
        'cliente',
        function(){ limpiar_cliente(); },
        function(){ lista_clientes(); },
        function(){ console.log('Console Error'); }
    );

    $("#registroModal").modal('hide');
}


// .................. :::: Funciones para "mostar" los modals :::: ....................
function mostrar_modal(id){
    $("#ModalDetalle").modal('show');

    $.get('/dashboard/listas/clientes/'+id, function(data){ //Obtenemos la ruta con el id del registro
        $("#cliente_modal").html(data); //Mostramos el CUERPO modal con los datos del registro
    });
}

function mostrar_modal_interesado(id){
    $("#ModalDetalleInteresado").modal('show');

    $.get('/dashboard/listas/interesados/'+id, function(data){
        $("#interesado_modal").html(data);
    });
}

// ......................... ::::::: LIMPIAR FORMULARIO CLIENTE :::::: ..............................
function limpiar_cliente(){ //Para limpIar los campos despues de registrar un cliente
    $('#nombre_razon_social_input').val();
    $('#nombre_comercial_input').val();
    $('#select_modal_tipoPersona').val();
    $('#select_modal_tipoDocumento').val();
    $('#numDocumentoInput').val();
    $('#InputCorreo1').val();
    $('#InputCorreo2').val();
    $('#InputCorreo3').val();
    $('#number_empresa_input').val();
    $('#number_contacto_input').val();
    $('#number_otro_input').val();
}

// ............................. ::::::: LISTAR TABLA CLIENTES ::::::: .................................
function lista_clientes(){
    $.get('/dashboard/listas/clientes/lista', function (data){
        $("#lista_clientes").html(data);
    });
}

function desactivar_cliente(idclientes) {
    crud_desactivar('/dashboard/cliente/desactivar/' + idclientes , function(){ lista_clientes() }, function(){ console.log('Eror') });
}

function activar_cliente(idclientes) {
    crud_activar('/dashboard/cliente/activar/' + idclientes , function(){ lista_clientes() }, function(){ console.log('Eror') });
}

init();
