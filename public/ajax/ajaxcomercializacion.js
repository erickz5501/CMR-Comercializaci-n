function init(){

    $('#filtro').hide();
    $('#generar_n_comercializacion').hide();

    $("#formulario_comercializacion").on("submit", function(e) {
        guardar_registro(e);
    });

    document.getElementById("generar_n_comercializacion").onclick =  function(e){
            guardar_nuevo_registro(e);
    }

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
        function(){ lista_select2('/dashboard/listas/cliente', 'clientes', null); },
        function(){ console.log('Console Error'); }
    );
    $("#registroModalInteresado").modal('hide');
}

// function ultimo_cliente(){
//     $("#registroModalComercializacion").modal('show');
//     $.get('/dashboard/comercializacion/interesado/ultimo', function (data){
//         data = JSON.parse(data);
//         if (data.ultimo['idclientes']) {
//             $('#select_modal_clientes').val(data.ultimo['idclientes']).trigger('change');
//         }else{
//             $('#select_modal_clientes').val(null).trigger('change');
//         }
//     })
// }

function limpiar_interesado(){ //Para limpiar los campos despues de registrar un cliente
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
    $('#filtro').hide();
    $('#generar_n_comercializacion').hide();
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
        function(){ limpiar_comercializacion(); },
        function(){ lista_select2('/dashboard/listas/cotizacion', 'cotizacion', null); },
        function(){ console.log('Console Error'); }
    );
    $("#registroModalCotizacion").modal('hide');
}

function limpiar_cotizacion(){
    $('#idcotizaciones').val("");
    $.get('/dashboard/cotizacion/generar', function(data){
        data = JSON.parse(data);
        $('#nombre_cotizacion').val(data);
        nombre_cotizacion.disabled = true; //deshabilitamos el campo para que no pueda modifiar el campo
    });
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

function guardar_nuevo_registro(e) {
    //alert('nuevo registro ')
    crud_guardar_editar(
        e,
        '/dashboard/comercializacion/guardar-registro',
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
        $('#tabla_detalle_modulos').empty();//Limpiamos los registro de esa tabla

        for (let i = 0; i < data.cant_modulos; i++) {
            let id  = _id();
            let tr_detalle =    `<tr class="tr_detalle_modulos" id="tr_`+id+`">
                                    <td>` + data.modulo[i].modulo.nombre+ ` <input type="hidden" name="modulo[]" value="` + data.modulo[i].idmodulos + `"</td>
                                    <td> 
                                        <input class="form-control form-control-sm" type="number" name="licencias[]"  value="` + data.modulo[i].cant_licencias+ `" style="width: 100px;"> 
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn btn-danger btn-sm" data-toggle="tooltip" data-original-title="Eliminar" onclick="eliminar_tr(`+id+`)">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>`;

            $("#tabla_detalle_modulos").append(tr_detalle);
            console.log(data.modulo[i].idmodulos);
        }
        

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

function desactivar_registro(idregistro, idcliente) {
    crud_desactivar('/dashboard/comercializacion/desactivar/' + idregistro , function(){ mostrar_seguimiento(idcliente); }, function(){ console.log('Eror') });
}

function activar_registro(idregistro, idcliente) {
    crud_activar('/dashboard/comercializacion/activar/' + idregistro , function(){ mostrar_seguimiento(idcliente); }, function(){ console.log('Eror') });
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
    $('#cant_licencias').val("");
    $('#conclusionessTextarea').val("");
    $('#tabla_detalle_modulos').empty();
    $('#select_modal_cotizacion').val(null).trigger('change');
    $('#select_modal_clientes').val(null).trigger('change');
    $('#select_modal_medios').val(null).trigger('change');
    $('#select_modal_modulos').val(null).trigger('change');
    $('#select_modal_eventos').val(null).trigger('change');
    $('#select_modal_personal').val(null).trigger('change');
}

function mostrar_seguimiento(idcliente){
    //location.href ="http://127.0.0.1:8000/dashboard/comercializacion/historial";
    $('#filtro').show("slow");
    $('#generar_n_comercializacion').show("slow");
    $("#lista_comercializacion").html('<div id="loader"></div>');
    $.get('/dashboard/comercializacion/detalle/'+idcliente, function(data){
        $("#lista_comercializacion").html(data);
    });
}

function validar_pdf(){
    //validamos que el archivo a subir sea un pdf
    var fileInput = document.getElementById('ruta_cotizacion');
    var filePath = fileInput.value;
    extensiones_permitidas = new Array(".pdf");
    mi_error = "";

    extension = (filePath.substring(filePath.lastIndexOf("."))).toLowerCase();//Obtiene la extension del archivo a subir
    //alert(extension);

    if (extension == ".pdf") {
        return true;
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Solo documentos PDF!',
            text: 'esto es un archivo: ' + extension
            //footer: 'Este documento es un: ' + extension
          })

        $('#ruta_cotizacion').val("");
        return false;
    }

}

//Funciones para agregar los modulos con la cantidad de licencias xD

function add_detalle() { //crea una fila con el nombre del modulo y la cantidad de licencias

    //declaramos las variables
    let idmodulo            = $("#select_modal_modulos").val();
    let modulo_txt          = $("#select_modal_modulos option:selected").text();
    let cant_licencias      = $("#cant_licencias").val();
    let id                  = _id(); //creamos un id aleatorio

    console.log(idmodulo);
    console.log(cant_licencias);

    if (validar_detalle(idmodulo, cant_licencias)) { //llamamos a la funcion validar_detalle()

        let tr_detalle = _tr('detalle_modulos', id, //creamos un tr con el id aleatorio
                     _td( modulo_txt + _input_a('modulo', idmodulo) ) + //mostramos el nombre del modulo
                     _td( _input_n_edit('licencias', cant_licencias ) ) + //mostramos la cantidad de licencias de ese modulo
                     _td( _btn_eliminar(id, 'eliminar_tr') ) //creamos la opcion de eliminar  la fila
         );

        $("#tabla_detalle_modulos").append(tr_detalle);//adjuntamos el registro a la tabla_detalle_modulos
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

    if (!_validate_exist_array(idmodulo)) {//si existe el detalle, nos da una alerta
        flat_idturno = true;
    }else{
        Swal.fire({
            icon: "error",
            title: "Ya existe este modulo",
            timer: 2000,
            type: "error"
        });
    }

    return flat_idturno && flat_cant_licencias;
}

init();