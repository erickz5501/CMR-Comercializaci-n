function init(){
    lista_clientes();
    lista_interesados();
    // ..................... .::::: DATOS DEL FORMULARIO PARA "EDITAR O AGREGAR" ::::::::. .............
    $("#formulario_cliente").on("submit", function(e) {
        guardar_cliente(e);
    });

    $("#formulario_interesado").on("submit", function(e){
        guardar_interesado(e);
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
        '/dashboard/editar/clientes',
        'cliente',
        function(){ limpiar_cliente(); },
        function(){ lista_clientes(); },
        function(){ console.log('Console Error'); }
    );

    $("#registroModal").modal('hide');
}

function guardar_interesado(e){
    crud_guardar_editar(
        e,
        '/dashboard/guardar/interesados',
        'interesado',
        function(){ limpiar_interesado(); },
        function(){ lista_interesados(); },
        function(){ console.log('Console Error'); }
    );
    $("#registroModalInteresado").modal('hide');
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
    $('#idclientes').val("");
    $('#nombre_razon_social_input').val("");
    $('#nombre_comercial_input').val("");
    $('#numDocumentoInput').val("");
    $('#InputCorreo1').val("");
    $('#InputCorreo2').val("");
    $('#InputCorreo3').val("");
    $('#number_empresa_input').val("");
    $('#number_contacto_input').val("");
    $('#number_otro_input').val("");
    $('#select_modal_giroNegocio').val(null).trigger('change');
    $('#select_modal_tipoPersona').val("Seleccione").trigger('change');
    $('#select_modal_tipoDocumento').val("Seleccione").trigger('change');
}

function limpiar_interesado(){ //Para limpIar los campos despues de registrar un cliente
    $('#idclientes').val("");
    $('#nombre_razon_social_input').val("");
    $('#nombre_comercial_input').val("");
    $('#numDocumentoInput').val("");
    $('#InputCorreo1').val("");
    $('#InputCorreo2').val("");
    $('#InputCorreo3').val("");
    $('#number_empresa_input').val("");
    $('#number_contacto_input').val("");
    $('#number_otro_input').val("");
    $('#select_modal_giroNegocio').val(null).trigger('change');
    $('#select_modal_tipoPersona').val("Seleccione").trigger('change');
    $('#select_modal_tipoDocumento').val("Seleccione").trigger('change');
}

// ............................. ::::::: LISTAR TABLA CLIENTES ::::::: .................................
function lista_clientes(){
    $.get('/dashboard/listas/clientes/lista', function (data){
        $("#lista_clientes").html(data);
    });
}

function lista_interesados(){
    $.get('/dashboard/listas/interesados/lista', function(data){
        $("#lista_interesados").html(data);
    });
}

function desactivar_cliente(idclientes) {
    crud_desactivar('/dashboard/cliente/desactivar/' + idclientes , function(){ lista_clientes(); lista_interesados(); }, function(){ console.log('Eror') });
}

function activar_cliente(idclientes) {
    crud_activar('/dashboard/cliente/activar/' + idclientes , function(){ lista_clientes();lista_interesados(); }, function(){ console.log('Eror') });
}
// ........................:::::::: LISTA UN DATOS PARA EDITAR CLIENTE :::::: ..........................
function mostrar_one_cliente(idclientes){
    $("#registroModal").modal('show');
    $("#registroModalInteresado").modal('show');
    $.get('/dashboard/mostrar/clientes/'+idclientes , function (data){
        data = JSON.parse(data);
        console.log(data.cliente);  
        $('#idclientes').val(data.cliente['idclientes']);
        $('#nombre_razon_social_input').val(data.cliente['nombres_razon_social']);
        $('#nombre_comercial_input').val(data.cliente['apellidos_nombre_comercial']);
        $('#select_modal_tipoPersona').val(data.cliente['tipo_persona']);
        $('#select_modal_tipoDocumento').val(data.cliente['tipo_documento']);
        $('#numDocumentoInput').val(data.cliente['nro_documento']);
        $('#InputCorreo1').val(data.cliente['correo_1']);
        $('#InputCorreo2').val(data.cliente['correo_2']);
        $('#InputCorreo3').val(data.cliente['correo_3']);
        $('#number_empresa_input').val(data.cliente['telefono_empresa']);
        $('#number_contacto_input').val(data.cliente['telefono_contacto']);
        $('#number_otro_input').val(data.cliente['telefono_otro']);
        $('#select_modal_giroNegocio').val(data.cliente['idgiro_negocio']);
        if (data.cliente['idgiro_negocio']) {
            $('#select_modal_giroNegocio').val(data.cliente['idgiro_negocio']).trigger('change');
        }else{
            $('#select_modal_giroNegocio').val(null).trigger('change');
        }

        $('#select_modal_tipoPersona').val(data.cliente['tipo_persona']);
        if (data.cliente['tipo_persona']) {
            $('#select_modal_tipoPersona').val(data.cliente['tipo_persona']).trigger('change');
        }else{
            $('#select_modal_tipoPersona').val(null).trigger('change');
        }

        $('#select_modal_tipoDocumento').val(data.cliente['tipo_documento']);
        if (data.cliente['tipo_documento']) {
            $('#select_modal_tipoDocumento').val(data.cliente['tipo_documento']).trigger('change');
        }else{
            $('#select_modal_tipoDocumento').val(null).trigger('change');
        }
             
    });
}

init();
