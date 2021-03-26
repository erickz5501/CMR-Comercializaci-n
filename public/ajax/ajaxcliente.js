function init(){

    lista_tabla_clientes(1);
    // lista_interesados();
    // PAGINAMOS LA TABLA CLIENTE
    $(document).on("click",'.pagination a',function(e){
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        lista_tabla_clientes(page);
    });

    $("#guardar_registro").on('click', function(e){  $("#formulario_cliente_interesado").submit(); });
    $("#formulario_cliente_interesado").on("submit", function(e) { guardar_cliente(e); });

    // Giro negocio
    $("#guardar_registro_giro_negocio").on('click', function(e){ $("#formulario_giro_negocio").submit(); });
    $("#formulario_giro_negocio").on("submit", function(e){ guardar_giro_negocio(e); });

    // etiqueta
    $("#guardar_registro_etiquetas").on('click', function(e){  $("#formulario_etiquetas").submit(); });
    $("#formulario_etiquetas").on("submit", function(e) { guardar_editar_etiqueta(e); });
    // $("#formulario_registro_interesado").on("submit", function(e){ guardar_interesado(e); });

    lista_select2('/dashboard/listas/giro_negocio', 'giro_negocio', null);
    lista_select2('/dashboard/listas/modulos', 'software', null);
    lista_select2('/dashboard/listas/actividad', 'actividad', null);
    lista_select2('/dashboard/listas/etiquetas', 'etiquetas', null);
    lista_select2('/dashboard/listas/filtro_etiqueta', 'filtro_etiqueta', null);

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

    $('#select_modal_etiquetas').select2({
        theme: 'bootstrap4',
        placeholder: 'Seleccione',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });

    $('#select_modal_actividad').select2({
        theme: 'bootstrap4',
        placeholder: 'Seleccione',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });



    // FILTROS DE BUSQUEDA ........
    $('#filtro_estado').select2({
        theme: 'bootstrap4',
        placeholder: 'Filtrar por estado',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });
    $('#filtro_tipo').select2({
        theme: 'bootstrap4',
        placeholder: 'Filtrar por',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });
    $('#select_modal_filtro_etiqueta').select2({
        theme: 'bootstrap4',
        placeholder: 'Filtrar por etiqueta',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });

    $('#filtro_etiqueta').val('').trigger('change');
}

// BUSCADOR
var delay = (function(){
    var timer = 0;
    return function(callback, ms){
        clearTimeout (timer);
        timer = setTimeout(callback, ms);
    };
})();
$("#filtro_search").on("keyup", function () {
    delay(function(){
        lista_tabla_clientes(1);
    }, 600 );
    console.log('searg');
});

// ::::::: LISTAR TABLA CLIENTES :::::::
function lista_tabla_clientes(page){

    var filtro_cant = $('#filtro_cant').val();
    var filtro_search    = $('#filtro_search').val();

    var filtro_tipo = $('#filtro_tipo').val() ;
    var filtro_estado = $('#filtro_estado').val() ;
    var filtro_etiqueta = $('#select_modal_filtro_etiqueta').val() ;

    $("#lista_tabla_clientes_interesados").html('<div id="loader"></div>');

    $.get(`/dashboard/clientes-interesados/lista-tabla?page=${page}&filtro_tipo=${filtro_tipo}&filtro_estado=${filtro_estado}&filtro_search=${filtro_search}&filtro_cant=${filtro_cant}&filtro_etiqueta=${filtro_etiqueta}`, function (data){
        $("#lista_tabla_clientes_interesados").html(data);
    });
}

$("#interesado").on('click', function(e){
    limpiar_form_cliente();
    $('#titulo_modal_cliente').html('Agregar Interesado');
    $('#select_modal_tipoPersona').val('1');
    $('#modal_cliente_interesado').modal('show');
});

$("#cliente").on('click', function(e){
    limpiar_form_cliente();
    $('#titulo_modal_cliente').html('Agregar Cliente');
    $('#select_modal_tipoPersona').val('2');
    $('#modal_cliente_interesado').modal('show');
});

//  :::: GUARDAR Y EDITAR "CLIENTE" ::::::
function guardar_cliente(e) {

    $(".modal-body").animate({ scrollTop: $(document).height() }, 1000); // colocamos el scrol al final

    crud_guardar_editar(
        e,
        '/dashboard/guardar/clientes-interesados',
        'cliente_interesado',
        function(){ limpiar_form_cliente(); },
        function(){ lista_tabla_clientes(); },
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
    $('#btn_footer_modal_cliente').html('GUARDAR');

    $('#cargando_edit_cliente').hide(); //oculto icon spiner

    $('#idclientes').val('');
    $('#select_modal_tipoPersona').val('');
    $('#select_modal_tipo_doc').val('');
    $('#nro_documento').val('');
    $('#nombre_razon_social_input').val('');
    $('#nombre_comercial_input').val('');
    $('#InputCorreo1').val('');
    $('#number_empresa_input').val('');
    $('#direccion').val('');

    $('#select_modal_provincia').val('');
    $('#select_modal_grado_interes').val('');
    $('#select_modal_tamano_empresa').val('');
    $('#select_modal_a_que_dedicas').val('');
    $('#InputCorreo2').val('');
    $('#InputCorreo3').val('');
    $('#number_contacto_input').val('');
    $('#number_otro_input').val('');

    $('#select_modal_giro_negocio').val('').trigger('change');

    $('#select_modal_tipo_doc').val('').trigger('change');
}

function limpiar_form_interesado(){ //Para limpIar los campos despues de registrar un interesado
    $('#idclientes').val("");
    $('#nombre_razon_social_input').val("");
    $('#nombre_comercial_input').val("");
    $('#select_modal_tipo_doc').val("");
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

function desactivar_cliente(idclientes) {
        crud_desactivar('/dashboard/cliente/desactivar/' + idclientes , function(){ lista_tabla_clientes(); lista_interesados(); }, function(){ console.log('Eror') });
}

function activar_cliente(idclientes) {
    crud_activar('/dashboard/cliente/activar/' + idclientes , function(){ lista_tabla_clientes();lista_interesados(); }, function(){ console.log('Eror') });
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
        // console.log(data);
        $('#cargando_edit_cliente').hide(); //oculto icon spiner

        $('#idclientes').val(data.idclientes);
        $('#select_modal_tipoPersona').val(data.tipo_persona);
        $('#select_modal_tipo_doc').val(data.tipo_documento);
        $('#nro_documento').val(data.nro_documento);
        $('#nombre_razon_social_input').val(data.nombres_razon_social);
        $('#nombre_comercial_input').val(data.apellidos_nombre_comercial);
        $('#InputCorreo1').val(data.correo_1);
        $('#number_empresa_input').val(data.telefono_empresa);
        $('#direccion').val(data.direccion);

        $('#select_modal_provincia').val(data.provincia);
        $('#select_modal_grado_interes').val(data.grado_interes);
        $('#select_modal_tamano_empresa').val(data.tamano_empresa);
        $('#select_modal_a_que_dedicas').val(data.a_que_dedicas);
        $('#InputCorreo2').val(data.correo_2);
        $('#InputCorreo3').val(data.correo_3);
        $('#number_contacto_input').val(data.telefono_contacto);
        $('#number_otro_input').val(data.telefono_otro);

        if (data.idetiquetas) {
            $('#select_modal_etiquetas').val(data.idetiquetas).trigger('change');
        }else{
            $('#select_modal_etiquetas').val('').trigger('change');
        }

        if (data.idgiro_negocio) {
            $('#select_modal_giro_negocio').val(data.idgiro_negocio).trigger('change');
        }else{
            $('#select_modal_giro_negocio').val('').trigger('change');
        }

        if (data.tipo_documento) {
            $('#select_modal_tipo_doc').val(data.tipo_documento).trigger('change');
        }else{
            $('#select_modal_tipo_doc').val('').trigger('change');
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
        $('#select_modal_tipo_doc').val(data.cliente['nro_documento']);
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
                console.log(data);
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
                console.log(data);
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
                    $('#direccion').val(data.result['domicilio_fiscal']);
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


// ..:::: GUARDAR ACTIVIDAD ::::..
function guardar_actividad(e){

    $(".modal-body").animate({ scrollTop: $(document).height() }, 1000); // colocamos el scrol al final

    crud_guardar_editar( e, '/dashboard/actividad/guardar', 'actividad', function(){ limpiar_form_actividad(); }, function(){ lista_tabla_actividades(); }, function(){ console.log('Console Error'); });
}
// ..:::
function limpiar_form_actividad(){

    $('.tooltip').removeClass("show").addClass("hidde"); // REMOVEMOS EL TOOTIP

    $('.form-control').removeClass("is-invalid"); // REMOVEMOS LOS INPUT MARCADOS EN ROJO

    $('#contenedor_de_errores_actividad').html(''); // REMOVEMOS EL CONTENEDOR DE ERRORES

    $('#titulo_modal').html('Agregar actividad');
    $('#btn_footer_modal').html('Guardar actividad');

    $('#idactividad').val("");

    $('#nombre_actividad').val("");
}

// AGREGAR - GIRO NEGOCIO
function guardar_giro_negocio(e){
    crud_guardar_modal(
        e,
        '/dashboard/gironegocio/guardar',
        'giro_negocio',
        function(){ limpiar_form_giro_negocio(); },
        function(){ console.log('Console Error'); }
    );
}

function limpiar_form_giro_negocio(){
    $('#idgiro_negocio').val("");
    $('#nombre_input').val("");
}


//  :::: GUARDAR Y EDITAR "ETIQUETA" ::::::
function guardar_editar_etiqueta(e) {

    $(".modal-body").animate({ scrollTop: $(document).height() }, 1000); // colocamos el scrol al final

    crud_guardar_modal(
        e,
        '/dashboard/configuracion/etiquetas/guardar-editar',
        'etiquetas',
        function(){ limpiar_form_etiqueta(); },
        function(){ console.log('Console Error'); }
    );
}

function limpiar_form_etiqueta(){ //Para limpIar los campos despues de registrar un interesado

    $('#idetiquetas').val("");

    $('#nombre_etiqueta').val("");

    $('#descripcion_etiqueta').val("");
}
init();

