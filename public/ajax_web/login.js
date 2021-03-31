var errores_list = [];


function login() {

    $("#formulario_login").on("submit", function(e) {
        loguearse(e);
    });


    $("#div_barra_progress_login").hide();
    $("#div_barra_progress_registar_empresa").hide();
}

function loguearse(e) {

    e.preventDefault();

    var formData = new FormData($("#formulario_login")[0]);
    $("#div_barra_progress_login").show();
    $.ajax({
        url: '/loguearse',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            datos = JSON.parse(datos);
            if (datos.status) {
                sw_success("Redireccionando...");

                if (datos.redirect === '') {
                    location.reload();
                }else{
                    location.replace(datos.redirect)
                }

                // location.reload();
            }else{
                sw_error(datos.message);
            }
        },
        xhr: function () {
            var xhr = new window.XMLHttpRequest();

            xhr.upload.addEventListener("progress", function (evt) {
                if (evt.lengthComputable) {

                    var prct = (evt.loaded / evt.total) * 100;

                    $("#barra_progress_login").css({ "width": prct + '%' });

                    $("#barra_progress_login").text(prct + "%");

                    if (prct === 100) {
                        setTimeout(function(){ reniciar_barra('login') }, 600);
                    }
                }
            }, false);
            return xhr;
        },
        error: function (jqXhr) {
            comprobar_errores(jqXhr, 'login');
        }
    });
}

function registrar_user(e) {

    e.preventDefault();

    var formData = new FormData($("#formulario_registar_empresa")[0]);
    $("#div_barra_progress_registar_empresa").show();
    $.ajax({
        url: '/registar/empresa',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {

            datos = JSON.parse(datos);
            if (datos.status) {
                sw_success("¡Exito!");
                // location.reload();
                location.replace('/tienda/perfil');
            }else{
                sw_error(datos.message);
            }

        },
        xhr: function () {
            var xhr = new window.XMLHttpRequest();

            xhr.upload.addEventListener("progress", function (evt) {
                if (evt.lengthComputable) {

                    var prct = (evt.loaded / evt.total) * 100;

                    $("#barra_progress_registar_empresa").css({ "width": prct + '%' });

                    $("#barra_progress_registar_empresa").text(prct + "%");

                    if (prct === 100) {
                        setTimeout(function(){ reniciar_barra("registar_empresa") }, 600);
                    }
                }
            }, false);
            return xhr;
        },
        error: function (jqXhr) {
            comprobar_errores(jqXhr, 'registar_empresa');
        }
    });
}

login()
