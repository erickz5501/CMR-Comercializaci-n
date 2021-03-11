function modal_medios(){
    $('#modal_medios').modal('show');
}

function modal_cotizacion(){
    limpiar_cotizacion_comercializacion();
    $('#registroModalCotizacion').modal('show');
}

function modal_actividad(){
    limpiar_actividad_comercializacion();
    $('#modal_actividad').modal('show');
}

function modal_interesado(){
    limpiar_interesado_comercializacion();
    $('#modal_registro_interesado').modal('show');
}

function modal_evento(){
    limpiar_evento_comercializacion();
    $('#registroModalEvento').modal('show');
}

function modal_personal(){
    limpiar_personal_comercializacion();
    $('#registroModalPersonal').modal('show');
}