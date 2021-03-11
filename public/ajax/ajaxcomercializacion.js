function init(){

    $('#filtro').hide();
    $('#generar_n_comercializacion').hide();
    $('#guardar_registro').hide();
    $('#ant_form').hide();

    $("#guardar_registro").on('click', function(e){
        $("#formulario_comercializacion").submit();
    });

    $("#formulario_comercializacion").on("submit", function(e) {
        guardar_registro(e);
    });

    $("#formulario_evento").on("submit", function(e) {
        guardar_evento_comercializacion(e);
    });

    $("#formulario_cotizacion").on("submit", function(e) {
        guardar_cotizacion_comercializacion(e);
    });

    $("#formulario_personal").on("submit", function(e) {
        guardar_personal_comercializacion(e);
    });

    $("#formulario_clientes").on("submit", function(e){
        guardar_interesado_comercializacion(e);
    });

    $("#formulario_actividad").on("submit", function(e){
        guardar_actividad_comercializacion(e);
    });

    $("#formulario_medios").on("submit", function(e){
        guardar_medio(e);
    });

    $("#formulario_giro_negocio").on("submit", function(e){
        guardar_giro_negocio(e);
    });

    document.getElementById("generar_n_comercializacion").onclick =  function(e){
        guardar_nuevo_registro(e);
    }

    // listamos los grupos para el SELECT
    $('#select_modal_actividad').select2({
        theme: 'bootstrap4',
        width: 'style',
        placeholder: 'Selec. actividad',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });

    $('#select_modal_clientes').select2({
        theme: 'bootstrap4',
        placeholder: 'Selec. cliente',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });

    $('#select_modal_medios').select2({
        theme: 'bootstrap4',
        placeholder: 'Selec. medio',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });

    $('#select_modal_modulos').select2({
        theme: 'bootstrap4',
        placeholder: 'Selec. modulo',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });

    $('#select_modal_evento').select2({
        theme: 'bootstrap4',
        placeholder: 'Selec. evento',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });

    $('#select_modal_cotizacion').select2({
        theme: 'bootstrap4',
        placeholder: 'Selec. cotizacion',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });

    $('#select_modal_personal').select2({
        theme: 'bootstrap4',
        placeholder: 'Selec. personal',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });
    $('#select_modal_tipoDocumento').select2({
        theme: 'bootstrap4',
        placeholder: 'Seleccione',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });

    $('#select_modal_giro_negocio').select2({
        theme: 'bootstrap4',
        placeholder: 'Seleccione',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });

    lista_comercializacion();

    lista_select2('/dashboard/listas/giro_negocio', 'giro_negocio', null);
    lista_select2('/dashboard/listas/modulos', 'modulos', null);
    lista_select2('/dashboard/listas/medios', 'medios', null);
    lista_select2('/dashboard/listas/evento', 'evento', null);
    lista_select2('/dashboard/listas/personal', 'personal', null);
    lista_select2('/dashboard/listas/clientes', 'clientes', null);
    lista_select2('/dashboard/listas/cotizacion', 'cotizacion', null);
    lista_select2('/dashboard/listas/actividad', 'actividad', null);

}




$("#btn_arriba_1").on('click', function () {
    $('#guardar_registro').hide();
    $('#sgt_form').show();
    $('#ant_form').hide();
    console.log('btn arriba');

    $('#tabs-icons-text-1').addClass('show active');
    $('#tabs-icons-text-2').removeClass('show active');
});

$("#btn_arriba_2").on('click', function () {

    if ($("#select_modal_clientes").val() != null  && $("#select_modal_actividad").val() != null && $("#select_modal_medios").val() != null ) {
        $('#guardar_registro').show();
        $('#sgt_form').hide();
        $('#ant_form').show();
        $('#tabs-icons-text-1').removeClass('show active');
        $('#tabs-icons-text-2').addClass('show active');

    }else{
        $('#btn_arriba_2').addClass('disabled');
        sw_error('Selecione campos requeridos');
    }
});

$("#sgt_form").on('click', function () {

    if ($("#select_modal_clientes").val() == null || $("#select_modal_clientes").val() == '') {
        $('#invlid_cliente').addClass("d-block");
    }else{
        $('#invlid_cliente').removeClass("d-block");
    }

    if ($("#select_modal_actividad").val() == null || $("#select_modal_actividad").val() == '') {
        $('#invlid_actividad').addClass("d-block");
    }else{
        $('#invlid_actividad').removeClass("d-block");
    }

    if ($("#select_modal_medios").val() == null || $("#select_modal_medios").val() == '') {
        $('#invlid_medio').addClass("d-block");
    }else{
        $('#invlid_medio').removeClass("d-block");
    }

    if ($("#select_modal_medios").val() != null  && $("#select_modal_actividad").val() != null && $("#select_modal_clientes").val() != null ) {
        $('#guardar_registro').show();
        $('#sgt_form').hide();
        $('#ant_form').show();
        $('#btn_arriba_1').removeClass('active');
        $('#btn_arriba_2').addClass("active");

        $('#tabs-icons-text-1').removeClass('show active');
        $('#tabs-icons-text-2').addClass('show active');

        $('#btn_arriba_2').removeClass("disabled");

    }else{
        $('#btn_arriba_2').addClass('disabled');
        sw_error('Selecione campos requeridos');
    }
});

$("#ant_form").on('click', function () {
    $('#guardar_registro').hide();
    $('#sgt_form').show();
    $('#ant_form').hide();
    $('#btn_arriba_1').addClass('active');
    $('#btn_arriba_2').removeClass("active");

    $('#tabs-icons-text-1').addClass('show active');
    $('#tabs-icons-text-2').removeClass('show active');
});

// ......................... :::: CONSULTAS RUC/DNI SUNAT :::::: .............................
function cunsulta_sunat(){
    let id_documento        = $("#select_modal_tipoDocumento").val();
    let modulo_txt          = $("#select_modal_tipoDocumento option:selected").text();
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

function lista_comercializacion(){
    $('#filtro').hide();
    $('#generar_n_comercializacion').hide();
    $('#guardar_registro').hide();
    $('#ant_form').hide();
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

    // $("#registroModalComercializacion").modal('hide');
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
    $("#modal_comercializacion").modal('show');
    $.get('/dashboard/mostrar/comercializacion/'+idregistro , function (data){
        data = JSON.parse(data);

        //console.log(data.cliente);
        $('#idcomercializacion').val(data.registro['idcomercializacion']);
        $('#idusers').val(data.registro['idusers']);
        $('#persona_contacto_input').val(data.registro['persona_contacto']);
        $('#llamadaDetTextarea').val(data.registro['detalla_llamada']);
        $('#example_date_input').val(data.registro['fecha_evento']);
        $('#evento_input').val(data.registro['descripcion_evento']);
        $('#avance_input').val(data.registro['avance']);
        $('#cobrar_input').val(data.registro['por_cobrar']);
        $('#conclusionessTextarea').val(data.registro['observacion']);
        $('#tabla_detalle_modulos').empty();//Limpiamos los registro de esa tabla
        console.log(data.registro['idclientes']);
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
            //console.log(data.modulo[i].idmodulos);
        }


        if (data.registro['idactividad']) {
            $('#select_modal_actividad').val(data.registro['idactividad']).trigger('change');
        }else{
            $('#select_modal_actividad').val(null).trigger('change');
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
            $('#select_modal_evento').val(data.registro['ideventos']).trigger('change');
        }else{
            $('#select_modal_evento').val(null).trigger('change');
        }

        if (data.registro['idpersonal']) {
            $('#select_modal_personal').val(data.registro['idpersonal']).trigger('change');
        }else{
            $('#select_modal_personal').val(null).trigger('change');
        }
        console.log('cotizacion: '+data.mod_cotizacion.cotizacion.idcotizaciones);

        if (data.mod_cotizacion.cotizacion.idcotizaciones) {
            $('#select_modal_cotizacion').val(data.mod_cotizacion.cotizacion.idcotizaciones).trigger('change');
        }else{
            $('#select_modal_cotizacion').val(null).trigger('change');
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
    $('#persona_atencion_input').val("");
    $('#llamadaDetTextarea').val("");
    $('#example_date_input').val("");
    $('#evento_input').val("");
    $('#avance_input').val("");
    $('#cobrar_input').val("");
    $('#cant_licencias').val("");
    $('#conclusionessTextarea').val("");
    $('#tabla_detalle_modulos').empty();
    $('#select_modal_actividad').val(null).trigger('change');
    $('#select_modal_cotizacion').val(null).trigger('change');
    $('#select_modal_clientes').val(null).trigger('change');
    $('#select_modal_medios').val(null).trigger('change');
    $('#select_modal_modulos').val(null).trigger('change');
    $('#select_modal_eventos').val(null).trigger('change');
    $('#select_modal_personal').val(null).trigger('change');

    $('#guardar_registro').hide();
    $('#generar_n_comercializacion').hide();
    $('#sgt_form').show();
    $('#ant_form').hide();
    $('#tabs-icons-text-1').addClass('show active');
    $('#tabs-icons-text-2').removeClass('show active');
    $('#btn_arriba_1').addClass('active');
    $('#btn_arriba_2').removeClass("active");

    $('#invlid_cliente').removeClass("d-block");
    $('#invlid_actividad').removeClass("d-block");
    $('#invlid_medio').removeClass("d-block");
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

//:::::.... Funciones de evento ....:::://
function limpiar_evento_comercializacion(){
    $('#ideventos').val("");
    $('#nombre_input').val("");
    $('#descripcion_input').val("");
}

function guardar_evento_comercializacion(e){
    crud_guardar_modal(
        e,
        '/dashboard/evento/guardar',
        'evento',
        function(){ limpiar_evento_comercializacion(); },
        function(){ console.log('Console Error'); }
    );
    $("#registroModalEvento").modal('hide');
}

//:::::.... Funciones de cotizacion ....:::://
function limpiar_cotizacion_comercializacion(){
    $('#idcotizaciones').val("");
    $.get('/dashboard/cotizacion/generar', function(data){
        data = JSON.parse(data);
        $('#nombre_cotizacion').val(data);
        nombre_cotizacion.disabled = true; //deshabilitamos el campo para que no pueda modificar el campo
    });
    $('#ruta_cotizacion').val("");
}

function guardar_cotizacion_comercializacion(e){
    crud_guardar_modal(
        e,
        '/dashboard/cotizacion/guardar',
        'cotizacion',
        function(){ limpiar_cotizacion_comercializacion();},
        function(){ console.log('Console Error'); }
    );
    $("#registroModalCotizacion").modal('hide');
}

//:::::.... Funciones de personal ....:::://
function guardar_personal_comercializacion(e){
    crud_guardar_modal(
        e,
        '/dashboard/personal/guardar',
        'personal',
        function(){ limpiar_personal_comercializacion(); },
        function(){ console.log('Console Error'); }
    );

    $("#registroModalPersonal").modal('hide');
}

function limpiar_personal_comercializacion(){
    $('#idpersonal').val("");
    $('#nombre_input').val("");
    $('#apellido_input').val("");
}

//:::::.... Funciones de clientes/interesados ....:::://
function guardar_interesado_comercializacion(e){
    crud_guardar_modal(
        e,
        '/dashboard/guardar/interesados',
        'clientes',
        function(){ limpiar_interesado_comercializacion(); },
        function(){ console.log('Console Error'); }
    );
    // $("#modal_registro_interesado").modal('hide');
}

function limpiar_interesado_comercializacion(){ //Para limpIar los campos despues de registrar un interesado
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

//:::::.... Funciones de actividad ....:::://
function limpiar_actividad_comercializacion(){
    $('#idactividad').val("");
    $('#nombre_input').val("");
}

function guardar_actividad_comercializacion(e){
    crud_guardar_modal(
        e,
        '/dashboard/actividad/guardar',
        'actividad',
        function(){ limpiar_actividad_comercializacion(); },
        function(){ console.log('Console Error'); }
    );

    // $("#registroModalActividad").modal('hide');
}

//:::::.... Funciones de medios ....:::://
function guardar_medio(e){
    crud_guardar_modal(
        e,
        '/dashboard/medio/guardar',
        'medios',
        function(){ limpiar_medio(); },
        function(){ console.log('Console Error'); }
    );

    $("#registroModalMedio").modal('hide');
}

function limpiar_medio(){
    $('#idmedios').val("");
    $('#nombre_input').val("");
}

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
        //limpiamos los campos modulo y cant.licencias
        $("#select_modal_modulos").val("").trigger('change');
        $("#cant_licencias").val('')
    }

}

function validar_detalle(idmodulo, cant_licencias) {//aegura que no registre un modulo que ya existe
    // idturno no debe repertirser
    let flat_idturno = false;
    let flat_cant_licencias = false;

    if (cant_licencias > 0) {
        flat_cant_licencias = true;
        $("#cant_licencias").removeClass("is-invalid");
    }else{
        Swal.fire({
            icon: "error",
            title: "Cantidad invalida",
            timer: 2000,
            type: "error"
        });
        $("#cant_licencias").addClass("is-invalid");
    }

    if (!_validate_exist_array(idmodulo) && idmodulo != null ) {//si existe el detalle, nos da una alerta
        flat_idturno = true;
    }else{
        Swal.fire({
            icon: "error",
            title: "Seleccione un modulo o el modulo ya existe",
            timer: 2000,
            type: "error"
        });
    }

    return flat_idturno && flat_cant_licencias;
}

init();
