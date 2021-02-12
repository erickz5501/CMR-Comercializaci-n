function init(){

    $("#formulario_reclamo").on("submit", function(e) {
        guardar_reclamo(e);
    });

    lista_reclamos();

    lista_select2('/dashboard/listas/modulos', 'modulos', null);
    lista_select2('/dashboard/listas/medios', 'medios', null);
    lista_select2('/dashboard/listas/personal', 'personal_responsable', null);
    lista_select2('/dashboard/listas/cliente', 'clientes', null);
}

function guardar_reclamo(e) {

    crud_guardar_editar(
        e,
        '/dashboard/reclamo/guardar',
        'reclamo',
        //function(){ limpiar_comercializacion(); },
        function(){ lista_reclamos(); },
        function(){ console.log('Console Error'); }
    );

    $("#registroModalReclamo").modal('hide');
}

function detalle_reclamo(idreclamo){
        $("#registroModalReclamo").modal('show');
        //$("#registroModalInteresado").modal('show');
        $.get('/dashboard/mostrar/reclamo/'+idreclamo , function (data){
            data = JSON.parse(data);
            //console.log(data.cliente);  
            $('#idreclamos').val(data.reclamo['idreclamos']);
            $('#persona_contacto_input').val(data.reclamo['persona_contacto']);
            $('#ruc_dni_input').val(data.reclamo['Ruc_nro_contrato']);
            $('#reclamoDetTextarea').val(data.reclamo['descripcion_reclamo']);
            $('#solucion_input').val(data.reclamo['tipo_solucion']);
            $('#causa_input').val(data.reclamo['causa']);
            $('#reclamo_procede').val(data.reclamo['procede']);
            $('#accion_tomar_input').val(data.reclamo['accion_tomar']);
            $('#fecha_compromiso').val(data.reclamo['fecha_compromiso']);
            $('#fecha_solucion').val(data.reclamo['fecha_solucion']);
            $('#solucion_minutos_input').val(data.reclamo['solucion_minutos']);
            $('#solucion_dias_input').val(data.reclamo['solucion_dias']);
            $('#evidenciaTextarea').val(data.reclamo['evidencia']);
            $('#emite_correctivo_input').val(data.reclamo['emite_accion']);

            
            if (data.reclamo['idclientes']) {
                $('#select_modal_clientes').val(data.reclamo['idclientes']).trigger('change');
            }else{
                $('#select_modal_clientes').val(null).trigger('change');
            }
            if (data.reclamo['idmedios']) {
                $('#select_modal_medios').val(data.reclamo['idmedios']).trigger('change');
            }else{
                $('#select_modal_medios').val(null).trigger('change');
            }
            if (data.reclamo['idmodulos']) {
                $('#select_modal_modulos').val(data.reclamo['idmodulos']).trigger('change');
            }else{
                $('#select_modal_modulos').val(null).trigger('change');
            }
            if (data.reclamo['ideventos']) {
                $('#select_modal_eventos').val(data.reclamo['ideventos']).trigger('change');
            }else{
                $('#select_modal_eventos').val(null).trigger('change');
            }    
            if (data.reclamo['idpersonal']) {
                $('#select_modal_personal_responsable').val(data.reclamo['idpersonal']).trigger('change');
            }else{
                $('#select_modal_personal_responsable').val(null).trigger('change');
            }
            
        });
}

function lista_reclamos(){
    $.get('/dashboard/reclamos/lista', function (data){
        $("#lista_reclamos").html(data);
    });
}

function desactivar_reclamo(idreclamo){
    crud_desactivar('/dashboard/reclamos/desactivar/' + idreclamo , function(){ lista_reclamos(); }, function(){ console.log('Eror') });
}

function activar_reclamo(idreclamo){
    crud_activar('/dashboard/reclamos/activar/' + idreclamo , function(){ lista_reclamos(); }, function(){ console.log('Eror') });
}

function detalle_reclamo_ver(id){
    $("#ModalDetalle").modal('show');

    $.get('/dashboard/lista/reclamo/'+id, function(data){ //Obtenemos la ruta con el id del registro
        $("#reclamo_modal").html(data); //Mostramos el CUERPO modal con los datos del registro
    });
}

init();