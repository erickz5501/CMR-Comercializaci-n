<!-- ================================= MODAL Registro Interesado ================================= -->
<div class="modal fade" id="modal_clientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <!-- ================================= MODAL TITULO ================================= -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Agregar Interesado
                    <i style="font-size: 24px; display: none;" class="fas fa-spinner fa-pulse fa-2x" id="cargando_edit"></i>
                </h5>
                <button onclick="limpiar_interesado_comercializacion();" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red;"></i> </span>
                </button>
            </div>

            <!-- ================================= MODAL CUERPO ================================= -->
            <form id="formulario_clientes" method="POST">
                @csrf
                <div class="modal-body" >
                    <div class="row">
                        <div class="card-body mb-12 col-12 border" style="padding-bottom: 0px !important; border-radius: 10px;">
                            {{-- input ID oculto --}}
                            <input type="hidden" id="idclientes" name="idclientes" />
                            <input type="hidden" id="select_modal_tipoPersona" name="select_modal_tipoPersona" value="1" />


                            <div class="row">

                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="select_modal_tipoDocumento">Tipo documento</label>
                                        <select style="color: black !important; font-weight: bold !important;" class="form-control" id="select_modal_tipoDocumento" name="select_modal_tipoDocumento" data-toggle=""  >

                                            <option value="1">DNI</option>
                                            <option value="2">RUC</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="numDocumentoInput">Numero documento</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-id-badge"></i></span>
                                            </div>
                                            <input style="color: black !important; font-weight: bold !important;" type="number" class="form-control" id="numDocumentoInput" name="numDocumentoInput" placeholder="numero"   />
                                            <span class="input-group-addon input-group-append">
                                                <button class="btn btn-default" type="button" id="button-addon2" onclick="cunsulta_sunat();" data-toggle="tooltip" data-placement="top" title="Consulta SUNAT">
                                                    <i class="fas fa-angle-right" id="cargado_sunat"></i>
                                                    <i style="font-size: 20px; display: none;" class="fas fa-spinner fa-pulse fa-2x" id="cargando_sunat"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label for="nombre_razon_social_input" class="form-control-label">Nombres/Razon social</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input style="color: black !important; font-weight: bold !important;" type="text" class="form-control" id="nombre_razon_social_input" name="nombre_razon_social_input" placeholder="Erick" autocomplete="off"/>
                                            <div class="invalid-feedback">Por Favor escriba un nombre valido</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="nombre_comercial_input">Apellidos/Nombre comercial</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input style="color: black !important; font-weight: bold !important;" type="text" class="form-control" id="nombre_comercial_input" name="nombre_comercial_input" placeholder="Zumaeta" autocomplete="off" />
                                            <div class="invalid-feedback">Por Favor escriba un apellido valido</div>
                                        </div>
                                    </div>
                                    {{-- <button type="button" class="btn btn-sm btn-secondary btn-tooltip" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom" data-container="body" data-animation="true">Secondary</button> --}}
                                </div>

                                <div class="col-4">
                                    <label class="form-control-label" for="select_modal_giroNegocio">Giro de negocio</label>
                                    <div class="input-group">
                                        <select style="color: black !important; font-weight: bold !important;" class="form-control" data-toggle="" id="select_modal_giro_negocio" name="select_modal_giro_negocio"  >
                                            {{-- AQUI VAN LOS "OPTIONS" --}}
                                        </select>
                                        <span class="input-group-addon input-group-append" data-toggle="tooltip" data-placement="top" title="Crear nuevo giro negocio">
                                            <button class="btn btn-default" type="button" id="button-addon2" onclick="" data-toggle="modal" data-target="#modal_giro_negocio" >
                                                <i class="fas fa-plus-circle"></i>
                                            </button>
                                        </span>
                                        <div class="invalid-feedback">Por Favor selecione un giro de negocio</div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="number-empresa-input">Telefono empresa</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="number_empresa_input" name="number_empresa_input" autocomplete="off"/>
                                            <div class="invalid-feedback">Por Favor escriba un numero valido</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleFormControlInput1">Correo 1 </label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                            </div>
                                            <input style="color: black !important; font-weight: bold !important;" type="email" class="form-control" id="InputCorreo1" name="InputCorreo1" placeholder="name@example.com"   />
                                            <div class="invalid-feedback">Por Favor escriba un email valido</div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div id="contenedor_de_errores_clientes"></div>
                            </div>
                        </div>
                    </div>
                    <!-- ================================= FIN-CUADRO-BRODER ================================= -->
                </div>
                <!-- FIN-MODAL-BODY -->

                <!-- MODAL FOOTER -->
                <div class="modal-footer" style="padding-top: 0px !important;">
                    {{-- <button type="submit" class="btn btn-success"></button> --}}
                    <button type="submit" class="btn btn-outline-success">

                        <i style="font-size: 20px;" class="far fa-save"> </i> Guardar Interesado
                    </button>
                </div>
            </form>
            <!-- FIN-MODAL-FOOTER -->
        </div>
    </div>
</div>
<!-- FIN-MODAL -->
