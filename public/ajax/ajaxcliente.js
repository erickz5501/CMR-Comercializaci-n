function init(){
    lista_clientes();
    lista_interesados();

    $("#guardar_registro_cliente").on('click', function(e){  $("#formulario_cliente_interesado").submit(); });
    $("#formulario_cliente_interesado").on("submit", function(e) { guardar_cliente(e); });

    $("#formulario_registro_interesado").on("submit", function(e){
        guardar_interesado(e);
    });

    lista_select2('/dashboard/listas/giro_negocio', 'giro_negocio', null);
    lista_select2('/dashboard/listas/modulos', 'software', null);
    // lista_select2('/dashboard/listas/tipopersona', 'tipoPersona', null);
    // lista_select2('/dashboard/listas/tipodoc', 'tipoDocumento', null);

    $('#select_modal_tipo_doc').select2({
        theme: 'bootstrap4',
        width: 'style',
        placeholder: 'Seleccione el documento',
        allowClear: true
    });

    $('#select_modal_giro_negocio').select2({
        theme: 'bootstrap4',
        width: 'auto',
        height: 'auto',
        placeholder: 'Seleccione',
        allowClear: true,
        overflow: 'scroll'
    });

    $('#filtrar_por').select2({
        theme: 'bootstrap4',
        placeholder: 'Filtrar por',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });

    $('#select_modal_tipoPersona').select2({
        theme: 'bootstrap4',
        placeholder: 'Seleccione',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });
}

// ::::::: LISTAR TABLA CLIENTES :::::::
function lista_clientes(){

    $("#lista_tabla_clientes_interesados").html('<div id="loader"></div>');

    $.get('/dashboard/clientes-interesados/lista-tabla', function (data){

        $("#lista_tabla_clientes_interesados").html(data);
    });
}

//  :::: GUARDAR Y EDITAR "CLIENTE" ::::::
function guardar_cliente(e) {

    $(".modal-body").animate({ scrollTop: $(document).height() }, 1000); // colocamos el scrol al final

    crud_guardar_editar(
        e,
        '/dashboard/editar/clientes',
        'cliente_interesado',
        function(){ limpiar_form_cliente(); },
        function(){ lista_clientes(); },
        function(){ console.log('Console Error'); }
    );
}

function guardar_interesado(e){
    crud_guardar_editar(
        e,
        '/dashboard/guardar/interesados',
        'registro_interesado',
        function(){ limpiar_form_interesado(); },
        function(){ lista_interesados(); },
        function(){ console.log('Console Error'); }
    );

}

//  :::: Funciones para "mostar" los modals ::::
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

//  ::::::: LIMPIAR FORMULARIO CLIENTE ::::::
function limpiar_form_cliente(){ //Para limpIar los campos despues de registrar un cliente

    $('.tooltip').removeClass("show").addClass("hidde"); // REMOVEMOS EL TOOTIP

    $('.form-control').removeClass("is-invalid"); // REMOVEMOS LOS INPUT MARCADOS EN ROJO

    $('#contenedor_de_errores_cliente_interesado').html(''); // REMOVEMOS EL CONTENEDOR DE ERRORES

    $('#titulo_modal_cliente').html('Agregar Cliente');
    $('#btn_footer_modal_cliente').html('Guardar');

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

function limpiar_form_interesado(){ //Para limpIar los campos despues de registrar un interesado
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
    //$('#select_modal_tipoPersona').val("2");
    $('#select_modal_giroNegocio').val(null).trigger('change');
    $('#select_modal_tipoDocumento').val("Seleccione").trigger('change');
}



function lista_interesados(){
    $("#lista_interesados").html('<div id="loader"></div>');
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
// .:::::::: LISTA UN DATOS PARA EDITAR CLIENTE ::::::.
function mostrar_one_cliente(idclientes){

    limpiar_form_cliente();

    $('#titulo_modal_cliente').html('Actualizar Cliente');
    $('#btn_footer_modal_cliente').html('Actualizar');

    $('#cargando_edit_cliente').show(); //visible icon spiner

    $("#modal_cliente_interesado").modal('show');

    //$("#registroModalInteresado").modal('show');
    $.get('/dashboard/mostrar/clientes/'+idclientes , function (data){
        data = JSON.parse(data);
        //console.log(data.cliente);
        $('#cargando_edit_cliente').hide(); //oculto icon spiner

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

function mostrar_one_interesado(idclientes){

    limpiar_form_interesado();

    $("#modal_registro_interesado").modal('show');
    $('#cargando_edit').show();
    $.get('/dashboard/mostrar/clientes/'+idclientes , function (data){
        data = JSON.parse(data);
        $('#cargando_edit').hide();
        //console.log(data.cliente);
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

function añadirLicencia(idcliente){
    $("#ModalRegistroLicencia").modal('show');
    $.get('/dashboard/mostrar/clientes/'+idcliente, function(data){
        data = JSON.parse(data);
        $('#nombre_empresa').val(data.cliente['nombres_razon_social']);
        $('#ruc_empresa').val(data.cliente['nro_documento']);
        $('#correo_empresa').val(data.cliente['correo_1']);
        $('#telefono_empresa').val(data.cliente['telefono_empresa']);
    });
}

//:::: CONSULTAS RUC/DNI SUNAT ::::::
function cunsulta_sunat(){
    let tipo_documento        = $("#select_modal_tipo_doc").val();
    let modulo_txt          = $("#select_modal_tipoDocumento option:selected").text();
    let nro_document        = $('#nro_documento').val();

    if (tipo_documento == 1) {

        if (nro_document.length != 8) {

            Swal.fire({
                title: "Error",
                text: "DNI Invalido",
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
                    $('#nombre_razon_social_input').val(data.cliente['name']);
                    $('#nombre_comercial_input').val(data.cliente['first_name'] + ' '+ data.cliente['last_name']);
                    // rellenamos persona de contactoen en el form comercializacion
                    $('#persona_contacto_input').val(data.cliente['name'] +' '+data.cliente['first_name'] +' '+ data.cliente['last_name']);
                }
            });
        }

    } else {
        if (tipo_documento == 2) {
            if (nro_document.length != 11) {
                Swal.fire({
                    title: "Error",
                    text: "RUC Invalido",
                    timer: 2000,
                    icon: "error"
                });
            } else {
               //Cunsolta RUC a la sunat
            $('#cargado_sunat').hide();
            $('#cargando_sunat').show();
            $.get('/consultas/ruc/'+nro_document, function(data){
                data = JSON.parse(data);
                $('#cargado_sunat').show();
                $('#cargando_sunat').hide();

                if (data['success'] == false) {
                    Swal.fire({
                        title: "Error",
                        text: "No se puede consultar este RUC",
                        timer: 2000,
                        icon: "error"
                    });
                } else {
                    $('#nombre_razon_social_input').val(data.result['razon_social']);
                    $('#nombre_comercial_input').val(data.result['nombre_comercial']);
                    $('#persona_contacto_input').val('');
                }

            });
            }
        }else{
            Swal.fire({
                title: "Error",
                text: "Seleccione el tipo de documento",
                timer: 2000,
                icon: "error"
            });
        }

    }

    $('.tooltip').removeClass("show").addClass("hidde");
    // alert('El id es:'+ id_documento + ', con nombre: ' + modulo_txt + ' y documento: '+ nro_document);
}
init();
