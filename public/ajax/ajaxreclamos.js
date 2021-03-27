function init(){

    lista_select2('/dashboard/listas/modulos', 'modulos', null);
    lista_select2('/dashboard/listas/medios', 'medios', null);
    lista_select2('/dashboard/listas/personal', 'personal', null);
    lista_select2('/dashboard/listas/clientes', 'clientes', null);

    lista_tabla_reclamos(1);
    $(document).on("click",'.pagination a',function(e){ e.preventDefault();
        var page = $(this).attr('href').split('page=')[1]; lista_tabla_reclamos(page);
    });

    $("#guardar_registro_reclamos").on('click', function(e){ $("#formulario_reclamo").submit(); });
    $("#formulario_reclamo").on("submit", function(e) { crear_editar_reclamo(e); });

    $("#guardar_registro_medio").on('click', function(e){ $("#formulario_medios").submit(); });
    $("#formulario_medios").on("submit", function(e) { crear_medio_contacto(e); });

    $("#guardar_registro_personal").on('click', function(e){ $("#formulario_personal").submit(); });
    $("#formulario_personal").on("submit", function(e) { crear_personal(e); });


    $('#select_modal_modulos').select2({
        theme: 'bootstrap4',
        placeholder: 'Selecione modulo.',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });
    $('#select_modal_medios').select2({
        theme: 'bootstrap4',
        placeholder: 'Selecione medio contac.',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });
    $('#select_modal_personal').select2({
        theme: 'bootstrap4',
        placeholder: 'Selecione personal.',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });
    $('#select_modal_clientes').select2({
        theme: 'bootstrap4',
        placeholder: 'Selecione cliente.',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });
    $('#filtro_estado').select2({
        theme: 'bootstrap4',
        placeholder: 'Filtrar por estado',
        allowClear: true,
        width: 'auto',
		dropdownAutoWidth: true,
    });
    $('#filtro_estado').val('').trigger('change');
}

init();

// BUCADOR
var delay = (function(){ var timer = 0; return function(callback, ms){ clearTimeout (timer); timer = setTimeout(callback, ms); };})();

$("#filtro_search").on("keyup", function () { // CAPTURA TEXTO BUSCADOR
    delay(function(){ lista_tabla_users(1); }, 600 );
});

function lista_tabla_reclamos(page){

    var fecha_inicio = ''; var fecha_fin = '';

    if ($('#fecha_inicio').val()) {

        fecha_inicio = $('#fecha_inicio').val()+' 00:00:00';

        fecha_fin = $('#fecha_fin').val()+' 23:59:59';
    }

    var filtro_cant     = $('#filtro_cant').val();
    var filtro_search   = $('#filtro_search').val();
    var filtro_estado   = $('#filtro_estado').val() ;

    $("#lista_tabla_reclamos").html('<div id="loader"></div>');

    $.get(`/dashboard/reclamos/lista-tabla?page=${page}&filtro_estado=${filtro_estado}&filtro_search=${filtro_search}&filtro_cant=${filtro_cant}&fecha_inicio=${fecha_inicio}&fecha_fin=${fecha_fin}`, function (data){ $("#lista_tabla_reclamos").html(data); });
}

function crear_editar_reclamo(e) {

    $(".modal-body").animate({ scrollTop: $(document).height() }, 1000); // colocamos el scrol al final

    crud_guardar_editar( e, '/dashboard/reclamo/guardar-editar', 'reclamo', function(){ limpiar_form_reclamo(); }, function(){ lista_tabla_reclamos(1); }, function(){ console.log('Console Error'); } );
}

function mostrar_one_reclamo(idreclamo){

    limpiar_form_reclamo();

    $('#guardar_registro_reclamos').html('<i class="fas fa-pencil-alt"></i> ACTUALIZAR');

    $('#titulo_modal_reclamo').html('Actualizar reclamo');

    $('#cargando_edit_reclamo').show();

    $("#modal_reclamo").modal('show');

    $.get('/dashboard/reclamos/mostrar-one/'+idreclamo , function (data){

        data = JSON.parse(data);
        console.log(data);
        $('#cargando_edit_reclamo').hide();

        $('#idreclamos').val(data.idreclamos);
        $('#persona_contacto').val(data.persona_contacto);
        $('#ruc_dni_input').val(data.Ruc_nro_contrato);
        $('#descripcion_reclamo').val(data.descripcion_reclamo);
        $('#tipo_solucion').val(data.tipo_solucion);
        $('#causa').val(data.causa);
        data.procede == 0 ? $('#reclamo_procede').prop('checked', true)  : $('#reclamo_procede').prop('checked', false) ;
        $('#accion_tomar').val(data.accion_tomar);
        $('#solucion_minutos').val(data.solucion_minutos);
        $('#solucion_dias').val(data.solucion_dias);
        $('#evidenciaTextarea').val(data.evidencia);
        $('#emite_correctivo_input').val(data.emite_accion);

        $('#select_modal_clientes').val(data.idclientes).trigger('change');

        $('#select_modal_medios').val(data.idmedios).trigger('change');

        $('#select_modal_modulos').val(data.idmodulos).trigger('change');

        $('#select_modal_eventos').val(data.ideventos).trigger('change');

        $('#select_modal_personal').val(data.idpersonal).trigger('change');

        data.fecha_solucion != null ? $('#fecha_solucion').val(data.fecha_solucion.slice(0,10)) : $('#fecha_solucion').val('');

        data.fecha_compromiso != null ? $('#fecha_compromiso').val(data.fecha_compromiso.slice(0,10)) : $('#fecha_compromiso').val('') ;

        deshabilitar_inputs();

    });
}

function limpiar_form_reclamo(){

    $('#sgt_form').show();
    $('#ant_form').hide();
    $('#contenedor_form_1').addClass('show active');
    $('#contenedor_form_2').removeClass('show active');
    $('#btn_arriba_1').addClass('active');
    $('#btn_arriba_2').removeClass("active");

    $('#titulo_modal_reclamo').html('Agregar Reclamo');
    $('#guardar_registro_reclamos').html('<i class="far fa-save"> </i> GUARDAR');
    $('#guardar_registro_reclamos').hide();
    $('#ant_form').hide();
    $('#idreclamos').val('');
    $("#formulario_reclamo").trigger("reset"); //RESET EL FORM
    $('#formulario_reclamo select').val('').trigger("change"); //RESET EL FORM
}

function desactivar_reclamo(idreclamo){
    crud_desactivar('/dashboard/reclamos/desactivar/' + idreclamo , function(){ lista_tabla_reclamos(1); }, function(){ console.log('Eror') });
}

function activar_reclamo(idreclamo){
    crud_activar('/dashboard/reclamos/activar/' + idreclamo , function(){ lista_tabla_reclamos(1); }, function(){ console.log('Eror') });
}

function detalle_reclamo(id){

    $('.tooltip').removeClass("show").addClass("hidde");

    $("#modal_detalle_reclamo").modal('show');

    $.get('/dashboard/reclamos/ver-detalle/'+id, function(data){

        $("#detalle_reclamo_modal").html(data);
    });
}

$('#select_modal_clientes').on('select2:select', function (e) { //ASIGNAMOS UN EL NOMBRE DEL CLIENTE AL INPUT "PERSONA DE CONTACTO"
    $('#persona_contacto').val($('select[name="select_modal_clientes"] option:selected').text());
});

$("#btn_arriba_1").on('click', function () {
    $('#guardar_registro').hide();
    $('#sgt_form').show();
    $('#ant_form').hide();

    $('#contenedor_form_1').addClass('show active');
    $('#contenedor_form_2').removeClass('show active');
});

$("#btn_arriba_2").on('click', function () {

    $("#select_modal_clientes").val() == null ? $('#select_modal_clientes').addClass("is-invalid") : $('#select_modal_clientes').removeClass("is-invalid") ;

    $("#persona_contacto").val() == '' ? $('#persona_contacto').addClass("is-invalid") : $('#persona_contacto').removeClass("is-invalid");

    $("#select_modal_medios").val() == null ? $('#select_modal_medios').addClass("is-invalid") : $('#select_modal_medios').removeClass("is-invalid");

    $("#select_modal_modulos").val() == null ? $('#select_modal_modulos').addClass("is-invalid") : $('#select_modal_modulos').removeClass("is-invalid");

    $("#descripcion_reclamo").val() == null ? $('#descripcion_reclamo').addClass("is-invalid") : $('#descripcion_reclamo').removeClass("is-invalid");

    if ($("#select_modal_clientes").val() != null   && $("#persona_contacto").val() != '' && $("#select_modal_medios").val() !== null && $("#select_modal_modulos").val() != null && $("#descripcion_reclamo").val() != '') {
        $('#guardar_registro_reclamos').show();
        $('#sgt_form').hide();
        $('#ant_form').show();
        $('#contenedor_form_1').removeClass('show active');
        $('#contenedor_form_2').addClass('show active');
    }else{
        $('#btn_arriba_2').addClass('disabled');
        sw_error('Escriba o selecione campos requeridos');
    }
    deshabilitar_inputs();
});

$("#sgt_form").on('click', function () {

    $("#select_modal_clientes").val() == null ? $('#select_modal_clientes').addClass("is-invalid") : $('#select_modal_clientes').removeClass("is-invalid") ;

    $("#persona_contacto").val() == '' ? $('#persona_contacto').addClass("is-invalid") : $('#persona_contacto').removeClass("is-invalid");

    $("#select_modal_medios").val() == null ? $('#select_modal_medios').addClass("is-invalid") : $('#select_modal_medios').removeClass("is-invalid");

    $("#select_modal_modulos").val() == null ? $('#select_modal_modulos').addClass("is-invalid") : $('#select_modal_modulos').removeClass("is-invalid");

    $("#descripcion_reclamo").val() == '' ? $('#descripcion_reclamo').addClass("is-invalid") : $('#descripcion_reclamo').removeClass("is-invalid");

    if ($("#select_modal_clientes").val() != null   && $("#persona_contacto").val() != '' && $("#select_modal_medios").val() !== null && $("#select_modal_modulos").val() != null && $("#descripcion_reclamo").val() != '') {
        $('#guardar_registro_reclamos').show();
        $('#sgt_form').hide();
        $('#ant_form').show();
        $('#btn_arriba_1').removeClass('active');
        $('#btn_arriba_2').addClass("active");
        $('#contenedor_form_1').removeClass('show active');
        $('#contenedor_form_2').addClass('show active');
        $('#btn_arriba_2').removeClass("disabled");
    }else{
        $('#btn_arriba_2').addClass('disabled');
        sw_error('Escriba o selecione campos requeridos');
    }
    deshabilitar_inputs();
});

$("#ant_form").on('click', function () {
    $('#guardar_registro').hide();
    $('#sgt_form').show();
    $('#ant_form').hide();
    $('#btn_arriba_1').addClass('active');
    $('#btn_arriba_2').removeClass("active");

    $('#contenedor_form_1').addClass('show active');
    $('#contenedor_form_2').removeClass('show active');
});

// ::::: AGREGAR UN NUEVO MEDIO DE CONTACTO
function abrir_modal_medios() { limpiar_form_medio_contacto(); $('.tooltip').removeClass("show").addClass("hidde");  $('#modal_medios').modal('show'); }
function crear_medio_contacto(e){ crud_guardar_modal( e, '/dashboard/medio/guardar','medios', function(){ limpiar_form_medio_contacto(); }, function(){ console.log('Console Error'); } ); }
function limpiar_form_medio_contacto(){ $("#formulario_medios").trigger("reset");}

// ::::: AGREGAR UN NUEVO PERSONAL
function abrir_modal_personal() {limpiar_form_personal(); $('.tooltip').removeClass("show").addClass("hidde"); $('#modal_personal').modal('show'); }
function crear_personal(e){ crud_guardar_modal( e,'/dashboard/personal/guardar', 'personal', function(){ limpiar_form_personal(); }, function(){ console.log('Console Error'); } ); }
function limpiar_form_personal(){ $("#formulario_personal").trigger("reset");  }

//:::: CONSULTAS RUC/DNI SUNAT ::::::
function cunsulta_sunat(){
    let nro_document        = $('#dni_personal').val();

    if (nro_document.length != 8) {

        Swal.fire({
            title: "Error",
            text: "DNI Invalido, escriba 8 dígitos.",
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
                $('#nombre_personal').val(data.cliente['name']);
                $('#apellido_personal').val(data.cliente['first_name'] + ' '+ data.cliente['last_name']);
            }
        });
    }

    $('.tooltip').removeClass("show").addClass("hidde");
}

function calcular_dias() {
    $('#solucion_dias').val( ($('#solucion_minutos').val()/480).toFixed(2) );
}

function deshabilitar_inputs() {
    if( $('#reclamo_procede').prop('checked') || $('#reclamo_procede').is(':checked') ) {
        console.log('on');
        $('#tipo_solucion').removeAttr("readonly");
        $('#select_modal_personal').attr("disabled", false);
        $('#causa').removeAttr("readonly");
        $('#accion_tomar').removeAttr("readonly");
        $('#fecha_compromiso').removeAttr("readonly");
        $('#fecha_solucion').removeAttr("readonly");
        $('#solucion_minutos').removeAttr("readonly");
        $('#evidenciaTextarea').removeAttr("readonly");
        $('#emite_correctivo_input').removeAttr("readonly");
    }else{
        console.log('off');
        $('#tipo_solucion').attr("readonly","readonly");
        $('#select_modal_personal').attr("disabled", true);
        $('#causa').attr("readonly","readonly");
        $('#accion_tomar').attr("readonly","readonly");
        $('#fecha_compromiso').attr("readonly","readonly");
        $('#fecha_solucion').attr("readonly","readonly");
        $('#solucion_minutos').attr("readonly","readonly");
        $('#evidenciaTextarea').attr("readonly","readonly");
        $('#emite_correctivo_input').attr("readonly","readonly");
    }
}
