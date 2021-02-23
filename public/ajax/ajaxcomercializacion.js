function init(){

    $("#formulario_comercializacion").on("submit", function(e) {
        guardar_registro(e);
        
    });

    $("#formulario_cotizacion").on("submit", function(e) {
        guardar_cotizacion(e);
        lista_select2('/dashboard/listas/cotizacion', 'cotizacion', null);
    });

    $("#formulario_interesado").on("submit", function(e){
        guardar_interesado(e);
    });

    lista_comercializacion();

    lista_select2('/dashboard/listas/gironegocio', 'giroNegocio', null);
    lista_select2('/dashboard/listas/modulos', 'modulos', null);
    lista_select2('/dashboard/listas/medios', 'medios', null);
    lista_select2('/dashboard/listas/eventos', 'eventos', null);
    lista_select2('/dashboard/listas/personal', 'personal', null);
    lista_select2('/dashboard/listas/cliente', 'clientes', null);
    lista_select2('/dashboard/listas/cotizacion', 'cotizacion', null);

}

function guardar_interesado(e){
    crud_guardar_editar(
        e,
        '/dashboard/guardar/interesados',
        'interesado',
        function(){ limpiar_interesado(); },
        //function(){ lista_interesados(); },
        function(){ lista_select2('/dashboard/listas/cliente', 'clientes', null); },
        function(){ console.log('Console Error'); }
    );
    $("#registroModalInteresado").modal('hide');
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

function lista_comercializacion(){
    $("#lista_comercializacion").html('<div id="loader"></div>');
    $.get('/dashboard/comercializacion/lista', function (data){
        $("#lista_comercializacion").html(data);
    });
}

function guardar_cotizacion(e){
    crud_guardar_editar(
        e,
        '/dashboard/cotizacion/guardar',
        'cotizacion',
        //function(){ limpiar_comercializacion(); },
        
        function(){ console.log('Console Error'); }
    );
    $("#registroModalCotizacion").modal('hide');
}

function limpiar_cotizacion(){
    $('#idcotizaciones').val("");
    $('#nombre_cotizacion').val("");
    $('#ruta_cotizacion').val("");
}

function guardar_registro(e) {

    crud_guardar_editar(
        e,
        '/dashboard/comercializacion/guardar',
        'comercializacion',
        function(){ limpiar_comercializacion(); },
        function(){ lista_comercializacion(); },
        function(){ console.log('Console Error'); }
    );

    $("#registroModalComercializacion").modal('hide');
}

function detalle_registro(id){
    $("#ModalDetalle").modal('show');

    $.get('/dashboard/lista/comercializacion/'+id, function(data){ //Obtenemos la ruta con el id del registro
        $("#registro_modal").html(data); //Mostramos el CUERPO modal con los datos del registro
    });
}

function mostrar_one_registro(idregistro){
    $("#registroModalComercializacion").modal('show');
    //$("#registroModalInteresado").modal('show');
    $.get('/dashboard/mostrar/comercializacion/'+idregistro , function (data){
        data = JSON.parse(data);
        //console.log(data.cliente);  
        $('#idcomercializacion').val(data.registro['idcomercializacion']);
        $('#idusers').val(data.registro['idusers']);
        $('#persona_contacto_input').val(data.registro['persona_contacto']);
        $('#actividad_input').val(data.registro['actividad']);
        $('#llamadaDetTextarea').val(data.registro['detalla_llamada']);
        $('#example_date_input').val(data.registro['fecha_evento']);
        $('#evento_input').val(data.registro['descripcion_evento']);
        $('#avance_input').val(data.registro['avance']);
        $('#cobrar_input').val(data.registro['por_cobrar']);
        $('#conclusionessTextarea').val(data.registro['observacion']);

        if (data.cotizacion['idcotizaciones']) {
            $('#select_modal_cotizacion').val(data.cotizacion['idcotizaciones']).trigger('change');
        }else{
            $('#select_modal_cotizacion').val(null).trigger('change');
        }
        if (data.registro['idclientes']) {
            $('#select_modal_clientes').val(data.registro['idclientes']).trigger('change');
        }else{
            $('#select_modal_clientes').val(null).trigger('change');
        }
        if (data.modulo['idmodulos']) {
            $('#select_modal_modulos').val(data.modulo['idmodulos']).trigger('change');
        }else{
            $('#select_modal_modulos').val(null).trigger('change');
        }
        if (data.registro['idmedios']) {
            $('#select_modal_medios').val(data.registro['idmedios']).trigger('change');
        }else{
            $('#select_modal_medios').val(null).trigger('change');
        }
        if (data.registro['ideventos']) {
            $('#select_modal_eventos').val(data.registro['ideventos']).trigger('change');
        }else{
            $('#select_modal_eventos').val(null).trigger('change');
        }
        if (data.registro['idpersonal']) {
            $('#select_modal_personal').val(data.registro['idpersonal']).trigger('change');
        }else{
            $('#select_modal_personal').val(null).trigger('change');
        }
        
    });
}

function desactivar_registro(idregistro) {
    crud_desactivar('/dashboard/comercializacion/desactivar/' + idregistro , function(){ lista_comercializacion(); }, function(){ console.log('Eror') });
}

function activar_registro(idregistro) {
    crud_activar('/dashboard/comercializacion/activar/' + idregistro , function(){ lista_comercializacion(); }, function(){ console.log('Eror') });
}

function limpiar_comercializacion(){
    $('#idcomercializacion').val("");
    $('#idusers').val("");
    $('#persona_contacto_input').val("");
    $('#actividad_input').val("");
    $('#persona_atencion_input').val("");
    $('#llamadaDetTextarea').val("");
    $('#example_date_input').val("");
    $('#evento_input').val("");
    $('#avance_input').val("");
    $('#cobrar_input').val("");
    $('#conclusionessTextarea').val("");
    $('#select_modal_cotizacion').val(null).trigger('change');
    $('#select_modal_clientes').val(null).trigger('change');
    $('#select_modal_medios').val(null).trigger('change');
    $('#select_modal_modulos').val(null).trigger('change');
    $('#select_modal_eventos').val(null).trigger('change');
    $('#select_modal_personal').val(null).trigger('change');
}

//Funciones para agregar los modulos con la cantidad de licencias xD

function add_detalle() {

    let idmodulo            = $("#select_modal_modulos").val();
    let modulo_txt          = $("#select_modal_modulos option:selected").text();
    let cant_licencias      = $("#cant_licencias").val();
    let id                  = _id();

    console.log(idmodulo);
    console.log(cant_licencias);

    if (validar_detalle(idmodulo, cant_licencias)) {

        let tr_detalle = _tr('detalle_modulos', id, 
                     _td( modulo_txt + _input_a('modulo', idmodulo) ) +
                     _td( _input_n_edit('licencias', roundTwo(cant_licencias) ) ) +
                     _td( _btn_eliminar(id, 'eliminar_detalle_modulo') )
         );

        $("#tabla_detalle_modulos").append(tr_detalle);
    }

}

function validar_detalle(idmodulo, cant_licencias) {//aegura que no registre un modulo que ya existe
    // idturno no debe repertirser
    let flat_idturno = false;
    let flat_cant_licencias = false;

    if (cant_licencias) {
        flat_cant_licencias = true;
        $("#cant_licencias").removeClass("is-invalid");
    }else{
        Toast.fire({
            type: 'error',
            title: 'Cantidad invalida'
          })

        $("#cant_licencias").addClass("is-invalid");
    }

    if (!_validate_exist_array(idmodulo)) {
        flat_idturno = true;
    }else{
        Swal.fire({
            title: "Ya existe este modulo",
            timer: 2000,
            type: "error"
        });
    }

    return flat_idturno && flat_cant_licencias;
}

init();