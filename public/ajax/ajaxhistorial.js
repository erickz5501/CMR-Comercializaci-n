function init(){
    lista_historial();

    lista_select2('/dashboard/listas/modulos', 'modulos', null);
    lista_select2('/dashboard/listas/medios', 'medios', null);
    lista_select2('/dashboard/listas/eventos', 'eventos', null);
    lista_select2('/dashboard/listas/personal', 'personal', null);

    $("#formulario_historial").on("submit", function(e) {
        guardar_historial(e);
    });
}

function lista_historial(){
    $.get('/dashboard/listas/historial/lista', function (data){
        $("#lista_historial").html(data);
    });
}

function guardar_historial(e){
    crud_guardar_editar(
        e,
        '/dashboard/guardar/registro',
        'historial',
        function(){ limpiar_historial(); },
        function(){ lista_historial(); },
        function(){ console.log('Console Error'); }
    );
    $("#registroModal").modal('hide');
}

function mostrar_one_registro(idregistro){
    $("#registroModal").modal('show');
    $.get('/dashboard/mostrar/registro/' + idregistro, function(data){
        data = JSON.parse(data);
        //console.log(data.registro);
        $('#idhistorial_comercializacion').val(data.registro['idhistorial_comercializacion']);
        $('#persona_contacto_input').val(data.registro['persona_contacto']);

        if (data.registro['idmodulos']) {
            $('#select_modal_modulos').val(data.registro['idmodulos']).trigger('change');
        }else{
            $('#select_modal_modulos').val(null).trigger('change');
        }

        if (data.registro['idmedios']) {
            $('#select_modal_medios').val(data.registro['idmedios']).trigger('change');
        }else{
            $('#select_modal_medios').val(null).trigger('change');
        }

        $('#llamadaDetTextarea').val(data.registro['detalle_llamada']);

        if (data.registro['ideventos']) {
            $('#select_modal_eventos').val(data.registro['ideventos']).trigger('change');
        }else{
            $('#select_modal_eventos').val(null).trigger('change');
        }

        $('#example_date_input').val(data.registro['fecha_evento']);
        $('#eventoTextarea').val(data.registro['descripcion_evento']);

        if (data.registro['idpersonal']) {
            $('#select_modal_personal').val(data.registro['idpersonal']).trigger('change');
        }else{
            $('#select_modal_personal').val(null).trigger('change');
        }

        if (data.registro['calificacion_encuesta']) {
            $('#calificacionSelect').val(data.registro['calificacion_encuesta']).trigger('change');
        }else{
            $('#calificacionSelect').val(null).trigger('change');
        }

        $('#solucionInput').val(data.registro['solucion_temporal']);
        $('#observacionesTextarea').val(data.registro['observaciones']);
        $('#conclusionesTextarea').val(data.registro['conclusiones']);
    })
}

function limpiar_historial(){ //Para limpIar los campos despues de registrar 
    $('#idhistorial_comercializacion').val("");
    $('#persona_contacto_input').val("");
    $('#select_modal_modulos').val(null).trigger('change');
    $('#select_modal_medios').val(null).trigger('change');
    $('#llamadaDetTextarea').val("");
    $('#select_modal_eventos').val(null).trigger('change');
    $('#example_date_input').val("");
    $('#eventoTextarea').val("");
    $('#select_modal_personal').val(null).trigger('change');
    $('#calificacionSelect').val("1 estrella").trigger('change');
    $('#solucionInput').val("");
    $('#observacionesTextarea').val("");
    $('#conclusionesTextarea').val("");
}

function doSearch(){
        const tableReg = document.getElementById('datos');
        const searchText = document.getElementById('searchTerm').value.toLowerCase();
        let total = 0;

        // Recorremos todas las filas con contenido de la tabla
        for (let i = 1; i < tableReg.rows.length; i++) {
            // Si el td tiene la clase "noSearch" no se busca en su cntenido
            if (tableReg.rows[i].classList.contains("noSearch")) {
                continue;
            }

            let found = false;
            const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
            // Recorremos todas las celdas
            for (let j = 0; j < cellsOfRow.length && !found; j++) {
                const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                // Buscamos el texto en el contenido de la celda
                if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
                    found = true;
                    total++;
                }
            }
            if (found) {
                tableReg.rows[i].style.display = '';
            } else {
                // si no ha encontrado ninguna coincidencia, esconde la
                // fila de la tabla
                tableReg.rows[i].style.display = 'none';
            }
        }

        // mostramos las coincidencias
        const lastTR=tableReg.rows[tableReg.rows.length-1];
        const td=lastTR.querySelector("td");
        lastTR.classList.remove("hide", "red");
        if (searchText == "") {
            lastTR.classList.add("hide");
        } else if (total) {
            td.innerHTML="Se ha encontrado "+total+" coincidencia"+((total>1)?"s":"");
        } else {
            lastTR.classList.add("red");
            td.innerHTML="No se han encontrado coincidencias";
        }
}

function mostrar_modal(id){
    $('#detalle_registro').modal('show');
    $.get('/dashboard/listas/registro/'+id, function(data){
        $('#modal_registro').html(data);
    })
}

function registrar_historial(){
    $("#registroModal").modal('show');
}

function mostrar_regHistorial(){
    
    $("#ModalDetalleHistorial").modal('show');
    $("#historial_reg_modal").modal('show');
}

init();