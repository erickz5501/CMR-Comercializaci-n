function crud_guardar_editar(event, url, nombre_modulo, callback_limpiar, callback_true, callback_false) {

    event.preventDefault();

    $("#div_barra_progress_" + nombre_modulo).show();

    var formData = new FormData($("#formulario_" + nombre_modulo)[0]);
    //console.log(formData);
    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            datos = JSON.parse(datos);
            //console.log(datos);
            if (datos.status) {
                sw_success(datos.message);
                //limpiar_form(nombre_modulo, callback_limpiar);
                if (callback_true) {
                    callback_true();
                }
            } else {
                sw_error(datos.message);
                if (callback_false) {
                    callback_false();
                }
            }

        },
        xhr: function () {
            var xhr = new window.XMLHttpRequest();

            xhr.upload.addEventListener("progress", function (evt) {
                if (evt.lengthComputable) {

                    var prct = (evt.loaded / evt.total) * 100;
                        prct = Math.round(prct);

                    $("#barra_progress_" + nombre_modulo).css({
                        "width": prct + '%'
                    });

                    $("#barra_progress_" + nombre_modulo).text(prct + "%");

                    // if (prct === 100) {
                    //     setTimeout(function(){ reniciar_barra(nombre_modulo) }, 600);
                    // }
                }
            }, false);
            return xhr;
        },
        beforeSend: function () {
            $("#div_barra_progress_" + nombre_modulo).show();
            $("#barra_progress_" + nombre_modulo).css({
                "width": '0%'
            });
            $("#barra_progress_" + nombre_modulo).text("0%");
        },
        complete: function () {
            $("#div_barra_progress_" + nombre_modulo).hide();
            $("#barra_progress_" + nombre_modulo).css({
                "width": '0%'
            });
            $("#barra_progress_" + nombre_modulo).text("0%");
        },
        error: function (jqXhr) {

            //comprobar_errores(jqXhr, nombre_modulo);
        }
    });
    //$("#registroModal").modal('hide');
    
}


function lista_select2(url, nombre_modulo, id) {
    $.get(url, function (data, status) {
        data = JSON.parse(data);

        $("#select_modal_" + nombre_modulo).html('');

        $.each(data, function (i, item) {

            var option = '<option style="color: black !important; font-weight: bold !important;" value="' + item.id + '">' + item.nombre + '</option>';

            $('#select_modal_' + nombre_modulo).append(option);
        });



        if (id) {
            $("#select_modal_" + nombre_modulo).val(id).trigger('change');
        } else {
            $("#select_modal_" + nombre_modulo).val(null).trigger('change');
        }


    });
}

function sw_success(txt = 'Exito', timer = 2000) {
    Swal.fire({
        title: "Exito",
        text: txt,
        timer: timer,
        icon: "success"
    });
}
function sw_cancelar(txt = 'Se canceló', timer = 2000) {
    Swal.fire({
        title: txt,
        // text: txt,
        timer: timer,
        icon: "info"
    });
}

function sw_error(txt = 'Error', timer = 2000) {
    Swal.fire({
        title: "Error",
        text: txt,
        timer: timer,
        icon: "error"
    });
}
// ............................ :::::::: DESACTIVAR CLIENTE :::::::: ................................
function crud_desactivar(url, callback_true, callback_false) {
    Swal.fire({
            title: "¿Deseas desactivar este registro?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#f34770",
            confirmButtonText: "Si, desactivar",
            cancelButtonText: "No, cancelar",
            closeOnConfirm: false,
            closeOnCancel: false
    }).then((result) => {
        if (result.value) {
            $.get(url, function (data, status) {
                data = JSON.parse(data);
                if (data.status) {
                    sw_success("Se desactivó");
                    if (callback_true) {
                        callback_true();
                    }
                } else {
                    sw_error("Error en desactivar");
                    if (callback_false) {
                        callback_false();
                    }
                }

            });

        }else if ( result.dismiss ) {
            sw_cancelar();
        }
    });
}

// ........................... :::::: ACTIVAR CLIENTE ::::::: .........................
function crud_activar(url, callback_true, callback_false) {
    Swal.fire({
        title: "¿Deseas activar este registro?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#42d697",
        // cancelButtonColor: "#f34770",
        confirmButtonText: "Si, activar",
        cancelButtonText: "No, cancelar",
        closeOnConfirm: false,
        closeOnCancel: false
    }).then((result) => {
        if (result.value) {
            $.get(url, function (data, status) {
                data = JSON.parse(data);
                if (data.status) {
                    sw_success("Se desactivó");
                    if (callback_true) {
                        callback_true();
                    }
                } else {
                    sw_error("Error en desactivar");
                    if (callback_false) {
                        callback_false();
                    }
                }

            });
        }else if ( result.dismiss ) {
            sw_cancelar();
        }
    })
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
        const cellsOfRow = tableReg.rows[i].getElementsByTagName("td");
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
            tableReg.rows[i].style.display = "";
        } else {
            // si no ha encontrado ninguna coincidencia, esconde la
            // fila de la tabla
            tableReg.rows[i].style.display = "none";
        }
    }

    // mostramos las coincidencias
    const lastTR = tableReg.rows[tableReg.rows.length - 1];
    const td = lastTR.querySelector("td");
    lastTR.classList.remove("hide", "red");
    if (searchText == "") {
        lastTR.classList.add("hide");
    } else if (total) {
        td.innerHTML = "Se ha encontrado " + total + " coincidencia" + (total > 1 ? "s" : "");
    } else {
        lastTR.classList.add("red");
        td.innerHTML = "No se han encontrado coincidencias";
    }
}


/****************************************************** */
/****************************************************** */
/****************************************************** */

// Funciones

function formatText(icon) {
    return $('<span><i class="' + icon.text + '"></i> ' + icon.text + '</span>');
};

function formatLabel(icon) {
    return $('<span class="label ' + icon.text + '"> ' + icon.text + ' </span>');
};


//Redondear 2 decimales (1.56 = 1.60, 1.52 = 1.50)
function roundTwo(num) {
    // return Number(+(Math.round(num + "e+1") + "e-1")).toFixed(2);

    return parseFloat(num).toFixed(2);
}


function unique_id() {
    return parseInt(Math.round(new Date().getTime() + (Math.random() * 100)));
}