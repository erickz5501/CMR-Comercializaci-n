function init(){

    $("#formulario_comercializacion").on("submit", function(e) {
        guardar_registro(e);
    });

    $("#formulario_cotizacion").on("submit", function(e) {
        guardar_cotizacion(e);
    });

    lista_comercializacion();

    lista_select2('/dashboard/listas/modulos', 'modulos', null);
    lista_select2('/dashboard/listas/medios', 'medios', null);
    lista_select2('/dashboard/listas/eventos', 'eventos', null);
    lista_select2('/dashboard/listas/personal', 'personal', null);
    lista_select2('/dashboard/listas/cliente', 'clientes', null);
    lista_select2('/dashboard/listas/cotizacion', 'cotizacion', null);

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
        if (data.registro['nro_cotizacion']) {
            $('#select_modal_cotizacion').val(data.registro['nro_cotizacion']).trigger('change');
        }else{
            $('#select_modal_clientes').val(null).trigger('change');
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
    $('#select_modal_clientes').val(null).trigger('change');
    $('#select_modal_medios').val(null).trigger('change');
    $('#select_modal_modulos').val(null).trigger('change');
    $('#select_modal_eventos').val(null).trigger('change');
    $('#select_modal_personal').val(null).trigger('change');
}

init();