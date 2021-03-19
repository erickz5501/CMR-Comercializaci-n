function modal_medios(){
    $('#modal_medios').modal('show');
}

function modal_cotizacion(){
    limpiar_cotizacion();
    $('#modal_cotizacion').modal('show');
}

function modal_actividad(){
    limpiar_actividad_comercializacion();
    $('#modal_actividad').modal('show');
}

function modal_interesado(){
    limpiar_interesado_comercializacion();
    $('#modal_clientes').modal('show');
}

function modal_evento(){
    limpiar_evento_comercializacion();
    $('#modal_evento').modal('show');
}

function modal_personal(){
    limpiar_personal_comercializacion();
    $('#modal_personal').modal('show');
}

function modal_comercializacion(){
    $('#modal_comercializacion').modal('show');
}

function modal_comercializacion_seguimiento(){
    $('#modal_comercializacion_seguimiento').modal('show');
}

function modal_cotizacion_comercializacion(){
    // console.log('RECORDAR: '+recordar_idcomercializacion);
    $('#idcotizacion_comercializacion').val(recordar_idcomercializacion);
    limpiar_cotizacion_comercializacion();
    $('#modal_cotizacion_comercializacion').modal('show');
}
