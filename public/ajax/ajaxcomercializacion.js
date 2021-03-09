function init(){

    $('#filtro').hide();
    $('#generar_n_comercializacion').hide();

    $("#formulario_comercializacion").on("submit", function(e) {
        guardar_registro(e);
    });

    document.getElementById("generar_n_comercializacion").onclick =  function(e){
            guardar_nuevo_registro(e);
    }

    // listamos los grupos para el SELECT
    $('#select_modal_actividad').select2({
        theme: 'bootstrap4',
        width: 'style',
        placeholder: 'Seleccione el cliente',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });

    $('#select_modal_clientes').select2({
        theme: 'bootstrap4',
        placeholder: 'Seleccione el cliente',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });

    lista_comercializacion();

    lista_select2('/dashboard/listas/gironegocio', 'giroNegocio', null);
    lista_select2('/dashboard/listas/modulos', 'modulos', null);
    lista_select2('/dashboard/listas/medios', 'medios', null);
    lista_select2('/dashboard/listas/eventos', 'eventos', null);
    lista_select2('/dashboard/listas/personal', 'personal', null);
    lista_select2('/dashboard/listas/cliente', 'clientes', null);
    lista_select2('/dashboard/listas/cotizacion', 'cotizacion', null);
    lista_select2('/dashboard/listas/actividad', 'actividad', null);

}

function cunsulta_sunat(){
    let id_documento        = $("#select_modal_tipoDocumento").val();
    let nro_document        = $('#numDocumentoInput').val();

    if (id_documento == 1) {

        if (nro_document.length != 8) {

            Swal.fire({
                title: "Error",
                text: "DNI Invalido",
                timer: 2000,
                icon: "error"
            });
            
        }else{
            //Cunsolta DNI a la sunat
            $.get('/consultas/dni/'+nro_document, function(data){
                data = JSON.parse(data);
                if (data['status'] == false) {
                    Swal.fire({
                        title: "Error",
                        text: "No se puede consultar el DNI en este momento",
                        timer: 2000,
                        icon: "error"
                    });
                }else{
                $('#nombre_razon_social_input').val(data.cliente['nombres']);
                $('#nombre_comercial_input').val(data.cliente['apellido_paterno'] + ' '+ data.cliente['apellido_materno']);
                }
            });
        }

    } else {
        if (id_documento == 2) {
            if (nro_document.length != 11) {
                Swal.fire({
                    title: "Error",
                    text: "RUC Invalido",
                    timer: 2000,
                    icon: "error"
                });
            } else {
               //Cunsolta RUC a la sunat
            $.get('/consultas/ruc/'+nro_document, function(data){
                data = JSON.parse(data);
                if (data['status'] == false) {
                    Swal.fire({
                        title: "Error",
                        text: "No se puede consultar el RUC en este momento",
                        timer: 2000,
                        icon: "error"
                    });
                } else {
                    $('#nombre_razon_social_input').val(data.result['razon_social']);
                    $('#nombre_comercial_input').val(data.result['nombre_comercial']);  
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

    // alert('El id es:'+ id_documento + ', con nombre: ' + modulo_txt + ' y documento: '+ nro_document);
}

function lista_comercializacion(){
    $('#filtro').hide();
    $('#generar_n_comercializacion').hide();
    $("#lista_comercializacion").html('<div id="loader"></div>');
    $.get('/dashboard/comercializacion/lista', function (data){
        $("#lista_comercializacion").html(data);
    });
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