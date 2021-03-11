function init(){
    lista_cotizaciones();
    $("#formulario_cotizacion").on("submit", function(e) {
        guardar_cotizacion(e);
        console.log("hoola nueva cotizacion");
        // lista_select2('/dashboard/listas/cotizacion', 'cotizacion', null);
    });
}

function limpiar_cotizacion(){
    $('#idcotizaciones').val("");
    $.get('/dashboard/cotizacion/generar', function(data){
        data = JSON.parse(data);
        $('#nombre_cotizacion').val(data);
        // nombre_cotizacion.disabled = true; //deshabilitamos el campo para que no pueda modifiar el campo
    });
    $('#ruta_cotizacion').val("");
}

function guardar_cotizacion(e){
    crud_guardar_editar(
        e,
        '/dashboard/cotizacion/crear',
        'cotizacion',
        function(){ limpiar_cotizacion();},
        function(){ lista_cotizaciones(); },
        function(){ console.log('Console Error'); }
    );
    // $("#registroModalCotizacion").modal('hide');
}

function lista_cotizaciones(){
    $("#lista_cotizaciones").html('<div id="loader"></div>');
    $.get('/dashboard/cotizaciones/lista', function (data){
        $("#lista_cotizaciones").html(data);
    });
}

function editar(idcotizacion){

    $("#modal_cotizacion").modal('show');

    $.get('/dashboard/lista/cotizaciones/'+idcotizacion , function (data){

        data = JSON.parse(data);
       //console.log(data.cliente);
        $('#idcotizaciones').val(data.evento['idcotizaciones']);

        $('#nombre_cotizacion').val(data.evento['nombre']);

        // $('#ruta_cotizacion').val(data.evento['ruta']);

        $('#doc_cotizacion_antiguo').val(data.evento['ruta']);

        // nombre_cotizacion.disabled = true;
    });

}

function desactivar(idcotizacion) {
    crud_desactivar('/dashboard/cotizaciones/desactivar/' + idcotizacion , function(){ lista_cotizaciones(); }, function(){ console.log('Eror') });
}
function activar(idcotizacion) {
    crud_activar('/dashboard/cotizaciones/activar/' + idcotizacion , function(){ lista_cotizaciones(); }, function(){ console.log('Eror') });
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

init();
