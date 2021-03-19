
// $(document).on("click",'.paginate_button a',function(e){
//     e.preventDefault();
//     var page = $(this).attr('data-dt-idx');
//     console.log('page: '+page);
// });

// var recordate_paginate = '';

function init(){

    lista_tabla_medios();

    $("#guardar_registro").on('click', function(e){
        $("#formulario_medios").submit();
    });

    $("#formulario_medios").on("submit", function(e) {
        guardar_evento(e);
    });
}

function lista_tabla_medios(){

    $("#lista_tabla_medios").html('<div id="loader"></div>');

    $.get('/dashboard/configuracion/medios/lista', function (data){

        $("#lista_tabla_medios").html(data);
    });
}

function activar_medio(idmedios){

    crud_activar('/dashboard/medio/activar/' + idmedios , function(){ lista_tabla_medios(); }, function(){ console.log('Eror') });
}

function desactivar_medio(idmedios){

    crud_desactivar('/dashboard/medio/desactivar/' + idmedios , function(){ lista_tabla_medios(); }, function(){ console.log('Eror') });
}

function guardar_evento(e){

    $(".modal-body").animate({ scrollTop: $(document).height() }, 1000); // colocamos el scrol al final

    crud_guardar_editar( e, '/dashboard/medio/guardar', 'medios', function(){ limpiar_form_medio(); }, function(){ lista_tabla_medios(); }, function(){ console.log('Console Error'); });
}

function mostrar_one_medio(idmedios){

    limpiar_form_medio();

    $('#titulo_modal').html('Actualizar Medio de Contacto');
    $('#btn_footer_modal').html('Actualizar');

    $('#cargando_edit').show(); //visible icon spiner

    $("#modal_medios").modal('show');

    $.get('/dashboard/mostrar/medio/'+idmedios , function (data){

        data = JSON.parse(data);

        $('#cargando_edit').hide(); //oculto icon spiner

        $('#idmedios').val(data.idmedios);

        $('#nombre_medio').val(data.nombre);
    });
}

function limpiar_form_medio(){

    $('.tooltip').removeClass("show").addClass("hidde"); // REMOVEMOS EL TOOTIP

    $('.form-control').removeClass("is-invalid"); // REMOVEMOS LOS INPUT MARCADOS EN ROJO

    $('#contenedor_de_errores_medios').html(''); // REMOVEMOS EL CONTENEDOR DE ERRORES

    $('#titulo_modal').html('Agregar Medio de Contacto');
    $('#btn_footer_modal').html('Guardar');

    $('#idmedios').val("");

    $('#nombre_medio').val("");
}

init();
