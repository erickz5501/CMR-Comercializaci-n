@extends('layout') @section('title', 'Lista de clientes') @section('pagina', 'Clientes') @section('content')
<div class="card-header">
    <div class="row align-items-center">
        <div class="col-8">
            <form>
                <input class="form-control" placeholder="Buscar cliente..." type="text" id="searchTerm" onkeyup="doSearch()" />
            </form>
        </div>
        <div class="col-4 text-right">
            <a type="button" href="#" class="btn btn btn-primary" data-toggle="modal" data-target="#registroModal"><i class="fas fa-plus-circle"></i> Agregar Cliente</a>
        </div>
    </div>
</div>

<!-- ================================= MODAL ================================= -->
<div class="modal fade" id="ModalDetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal" role="document" id="cliente_modal">
        <!-- Contenido del modal /  -->
    </div>
</div>
<!-- FIN-MODAL -->

<!-- ================================= MODAL Registro ================================= -->
<div class="modal fade" id="registroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <!-- ================================= MODAL TITULO ================================= -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> <i class="far fa-times-circle"></i> </span>
                </button>
            </div>

            <!-- ================================= MODAL CUERPO ================================= -->
            <form id="formulario_cliente" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="card-body mb-12 col-12" style="padding: 0px; margin-left: 0px !important;">
                        <div class="border" style="margin-bottom: 10px; padding: 20px; border-radius: 10px;">
                            <div class="row">
                                <div class="col-4">
                                    <label for="nombre_razon_social_input">Nombres/Razon social</label>
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="nombre_razon_social_input" name="nombre_razon_social_input" placeholder="Erick" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="nombre_comercial_input">Apellidos/Nombre comercial</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="nombre_comercial_input" name="nombre_comercial_input" placeholder="Zumaeta" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="select_modal_giroNegocio">Giro de negocio</label>
                                        <select class="form-control" data-toggle="select" id="select_modal_giroNegocio" name="select_modal_giroNegocio">
                                            {{-- AQUI VAN LOS "OPTIONS" --}}
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="select_modal_tipoPersona">Tipo persona</label>
                                        <select class="form-control" id="select_modal_tipoPersona" name="select_modal_tipoPersona" data-toggle="select">
                                            <option>Seleccione</option>
                                            <option value="1">Interesado</option>
                                            <option value="2">Cliente</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="select_modal_tipoDocumento">Tipo documento</label>
                                        <select class="form-control" id="select_modal_tipoDocumento" name="select_modal_tipoDocumento" data-toggle="select">
                                            <option>Seleccione</option>
                                            <option value="3">DNI</option>
                                            <option value="6">RUC</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="numDocumentoInput">Numero documento</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-id-badge"></i></span>
                                            </div>
                                            <input type="number" class="form-control" id="numDocumentoInput" name="numDocumentoInput" placeholder="76858587" required />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Correo 1 </label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                            </div>
                                            <input type="email" class="form-control" id="InputCorreo1" name="InputCorreo1" placeholder="name@example.com" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput2">Correo 2 </label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                            </div>
                                            <input type="email" class="form-control" id="InputCorreo2" name="InputCorreo2" placeholder="name@example2.com" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput3">Correo 3 </label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                            </div>
                                            <input type="email" class="form-control" id="InputCorreo3" name="InputCorreo3" placeholder="name@example3.com" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="number-empresa-input">Telefono empresa</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input class="form-control" type="number" id="number_empresa_input" name="number_empresa_input" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="number-contacto-input">Telefono contacto</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                            </div>
                                            <input class="form-control" type="number" id="number_contacto_input" name="number_contacto_input" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="number-otro-input">Telefono otro</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone-square"></i></span>
                                            </div>
                                            <input class="form-control" type="number" id="number_otro_input" name="number_otro_input" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ================================= FIN-CUADRO-BRODER ================================= -->
                </div>
                <!-- FIN-MODAL-BODY -->

                <!-- MODAL FOOTER -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-times-circle"> </i> Cerrar</button>
                    <button type="submit" class="btn btn-success"><i class="far fa-save"> </i> Guardar cliente</button>
                </div>
            </form>
            <!-- FIN-MODAL-FOOTER -->
        </div>
    </div>
</div>
<!-- FIN-MODAL -->

<div class="table-responsive">
    <div>
        <table class="table align-items-center" id="datos">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Tipo Doc.</th>
                    <th>Nombre/Razon Social</th>
                    <th>Apellidos/Nombre comercial</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody class="list" id="lista_clientes"></tbody>
        </table>
    </div>
</div>

<div class="card-footer py-4"></div>

@endsection

<script language="javascript">
    function doSearch() {
        const tableReg = document.getElementById("datos");
        const searchText = document.getElementById("searchTerm").value.toLowerCase();
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
</script>

@section('js')
<script src="{{ asset('funciones/crud.js')}}"></script>
<script src="{{ asset('ajax/ajaxcliente.js')}}"></script>
@endsection

<style>
    #datos tr.noSearch {
        background: White;
        font-size: 0.8em;
    }
    #datos tr.noSearch td {
        padding-top: 10px;
        text-align: right;
    }
    .hide {
        display: none;
    }
    .red {
        color: Red;
    }
</style>
