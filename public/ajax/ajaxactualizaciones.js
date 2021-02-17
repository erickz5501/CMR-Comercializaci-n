function init(){
    lista_actualizaciones();
    lista_select2('/dashboard/listas/cliente', 'clientes', null);
    lista_select2('/dashboard/listas/modulos', 'modulos', null);

}


function lista_actualizaciones(){
    $("#lista_actualizaciones").html('<div id="loader"></div>');
    $.get('/dashboard/actualizaciones/lista', function (data){
        $("#lista_actualizaciones").html(data);
    });
}

function desactivar_actualizacion(idactualizacion){
    crud_desactivar('/dashboard/actualizacion/desactivar/' + idactualizacion , function(){ lista_actualizaciones(); }, function(){ console.log('Eror') });
}

function activar_actualizacion(idactualizacion){
    crud_activar('/dashboard/actualizacion/activar/' + idactualizacion , function(){ lista_actualizaciones(); }, function(){ console.log('Eror') });
}

function detalle_actualizacion(idactualizacion){
    return alert("Esta opcion esta en desarollo");
}

function editar_actualizacion(idactualizacion){
    return alert("Esta opcion esta en desarollo");     
}

function limpiar_formulario(){
    $('#idactualizaciones').val("");
    $('#date_input').val("");
    $('#nro_contrato_input').val("");
    $('#nro_factura_input').val("");
    $('#cant_licencias_input').val("");
    $('#date_input2').val("");
    $('#date_input3').val("");
    $('#date_input4').val("");
    $('#licencia_input').val("");
    $('#licencias_cantidad_input').val("");
    $('#precio_input').val("");
    $('#acto_input').val("");
    $('#salida_input').val("");
    $('#date_input5').val("");
    $('#date_input6').val("");
    $('#date_input7').val("");
    $('#procedimientoTextarea').val("");
    $('#select_modal_clientes').val(null).trigger('change');
    $('#select_modal_modulos').val(null).trigger('change');
    $('#select_modal_cotizacion').val(null).trigger('change');
    $('#select_modal_tipo').val(null).trigger('change');
    $('#select_modal_version').val(null).trigger('change');
    $('#select_modal_tiempo_licencia').val(null).trigger('change');
}

init();