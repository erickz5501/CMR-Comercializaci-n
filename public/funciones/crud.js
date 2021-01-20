function crud_guardar_editar(event, url, nombre_modulo, callback_limpiar, callback_true, callback_false) {

    event.preventDefault();

    $("#div_barra_progress_" + nombre_modulo).show();

    var formData = new FormData($("#formulario_" + nombre_modulo)[0]);
    console.log(formData);
    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            datos = JSON.parse(datos);
            console.log(datos);
            if (datos.status) {
                sw_success(datos.message);
                limpiar_form(nombre_modulo, callback_limpiar);
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

            comprobar_errores(jqXhr, nombre_modulo);
        }
    });
    $("#registroModal").modal('hide');
}


function lista_select2(url, nombre_modulo, id) {
    $.get(url, function (data, status) {
        data = JSON.parse(data);

        $("#select_modal_" + nombre_modulo).html('');

        $.each(data, function (i, item) {

            var option = '<option  value="' + item.idgiro_negocio + '">' + item.nombre + '</option>';
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