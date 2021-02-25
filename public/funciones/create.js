function _tr(table, idtable, data) {
    return `<tr class="tr_${table}" id="tr_${idtable}">${data}</tr>`;
}

function _td(data) {
    return `<td>${data}</td>`;
}

function _input_a(name, value) {
    return `<input type="hidden" name="${name}[]" value="${value}">`;
}

function _input_n_edit(name, value) {
    return `<input class="form-control form-control-sm" type="number" name="${name}[]"  value="${value}" style="width: 100px;">`;
}

function _btn_eliminar(id, action = 'eliminar_tr') {
    return `<a href="javascript:void(0)" class="btn btn-danger btn-sm" 
               data-toggle="tooltip" data-original-title="Eliminar"
               onclick="${action}(${id})">
            <i class="fas fa-trash"></i>
            </a>`;
}
    
function eliminar_tr(id) {
    console.log('Eliminar tr: '+id);
    Swal.fire({
        icon    : "warning",
        title: "¿Deseas eliminar este registro?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#f34770",
        confirmButtonText: "Si, eliminar",
        cancelButtonText: "No, cancelar",
        closeOnConfirm: false,
        closeOnCancel: false
    }).then((result) => {
        if (result.value) {

            $("#tr_" + id).remove(); //eliminamos la fila 

            Swal.fire({
                icon:"success",
                title: "Exito",
                text: 'Se elimino el registro',
                timer: 2000,
                type: "success"
            });
           

        } else if ( result.dismiss ) {
            Swal.fire({
                icon:"info",
                title: 'Se cancelo la accion',
                timer: 2000,
                type: "info"
            });
        }
    });
}

function _validate_exist_array(id) { //valida si existe ese modulo en la tabla
    flat = false;
    $('input[name="modulo[]"').each(function() {

      if (id == $(this).val()) {
        flat = true;
      }
  
    });
    return flat;
}

function _number_positive(value) {
    return /^-?\d+$/.test(value);
}

function _id() { //crea un id unico para eliminar la fila de la tabla
    return parseInt(Math.round(new Date().getTime() + (Math.random() * 100)));
}