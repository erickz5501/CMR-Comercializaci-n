function init(){
    lista_clientes();

    $("#formulario_cliente").on("submit", function(e) {
        guardar_cliente(e);
    });

    lista_select2('/dashboard/listas/gironegocio', 'giroNegocio', null);
    // lista_select2('/dashboard/listas/tipopersona', 'tipoPersona', null);
    // lista_select2('/dashboard/listas/tipodoc', 'tipoDocumento', null);
}

function guardar_cliente(e) {

    crud_guardar_editar(
        e,
        '/dashboard/guardar/clientes',
        'cliente',
        function(){ limpiar_cliente(); },
        function(){ lista_clientes(); },
        function(){ console.log('Console Error'); }
    );

    $("#registroModal").modal('hide');
}


// Funciones para mostar los modals //
function mostrar_modal(id){
    $("#ModalDetalle").modal('show');

    $.get('/dashboard/listas/clientes/'+id, function(data){ //Obtenemos la ruta con el id del registro
        $("#cliente_modal").html(data); //Mostramos el CUERPO modal con los datos del registro
    });
}

function mostrar_modal_interesado(id){
    $("#ModalDetalleInteresado").modal('show');

    $.get('/dashboard/listas/interesados/'+id, function(data){
        $("#interesado_modal").html(data);
    });
}
// .........................//

function limpiar_cliente(){ //Para limipar los campos despues de registrar un cliente
    $('#nombre_razon_social_input').val();
    $('#nombre_comercial_input').val();
    $('#select_modal_tipoPersona').val();
    $('#select_modal_tipoDocumento').val();
    $('#numDocumentoInput').val();
    $('#InputCorreo1').val();
    $('#InputCorreo2').val();
    $('#InputCorreo3').val();
    $('#number_empresa_input').val();
    $('#number_contacto_input').val();
    $('#number_otro_input').val();
}

function lista_clientes(){
    $.get('/dashboard/listas/clientes/lista', function (data){
        $("#lista_clientes").html(data);
    });
}

function desactivar_cliente(){
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Desactivado!',
            'Your file has been deleted.',
            'success'
          )
        }else{
            Swal.fire(
                'Cancelado!',
                'Se cancelo esta accion',
                'error'
            )
        }
      })
    
}

init();