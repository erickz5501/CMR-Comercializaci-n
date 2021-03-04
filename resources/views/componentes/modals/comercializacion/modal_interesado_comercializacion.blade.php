<div class="modal fade" id="registroModalInteresado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <!-- ================================= MODAL TITULO ================================= -->
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Interesado</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red;"></i> </span>
            </button>
        </div>

        <!-- ================================= MODAL CUERPO ================================= -->
        <form id="formulario_interesado" method="POST">
            @csrf            
            <div class="modal-body" style="padding-top: 0px !important; padding-bottom:0px !important; padding-right: 0px !important">
                <div class="card-body mb-12 col-12" style="padding-top: 0px !important; padding-bottom:0px !important; ">
                    {{-- input ID oculto --}}
                    <input type="hidden" id="idclientes" name="idclientes" />
                    <div class="border" style="margin-bottom: 10px; padding: 20px; border-radius: 10px;">
                        
                        <div class="form-row">
                            <div class="col-4">
                                <label for="nombre_razon_social_input" class="form-control-label">Nombres/Razon social</label>
                                <div class="form-group">
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input style="color: black !important; font-weight: bold !important;" type="text" class="form-control" id="nombre_razon_social_input" name="nombre_razon_social_input" placeholder="Erick" required />
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
                                        <input style="color: black !important; font-weight: bold !important;" type="text" class="form-control" id="nombre_comercial_input" name="nombre_comercial_input" placeholder="Zumaeta" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="select_modal_giroNegocio">Giro de negocio</label>
                                    <select style="color: black !important; font-weight: bold !important;"  class="form-control" data-toggle="select" id="select_modal_giroNegocio" name="select_modal_giroNegocio" required>
                                        {{-- AQUI VAN LOS "OPTIONS" --}}
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="select_modal_tipoPersona">Tipo persona</label>
                                    <select style="color: black !important; font-weight: bold !important;" class="form-control" id="select_modal_tipoPersona" name="select_modal_tipoPersona" data-toggle="select" required>
                                        <option>Seleccione</option>
                                        <option style="color: green !important; font-weight: bold !important;" value="1">Interesado</option>
                                        <option value="2">Cliente</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="select_modal_tipoDocumento">Tipo documento</label>
                                    <select class="form-control" id="select_modal_tipoDocumento" name="select_modal_tipoDocumento" data-toggle="select" required>
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
                                        <input style="color: black !important; font-weight: bold !important;" type="number" class="form-control" id="numDocumentoInput" name="numDocumentoInput" placeholder="numero" required />
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
                                        <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="number_empresa_input" name="number_empresa_input" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Correo 1 </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                                        </div>
                                        <input style="color: black !important; font-weight: bold !important;" type="email" class="form-control" id="InputCorreo1" name="InputCorreo1" placeholder="name@example.com" required />
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput2">Correo 2 </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                                        </div>
                                        <input style="color: black !important; font-weight: bold !important;" type="email" class="form-control" id="InputCorreo2" name="InputCorreo2" placeholder="name@example2.com" />
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
                                        <input style="color: black !important; font-weight: bold !important;" type="email" class="form-control" id="InputCorreo3" name="InputCorreo3" placeholder="name@example3.com" />
                                    </div>
                                </div>
                            </div> --}}
                        </div>

                        <div class="row">
                            
                            {{-- <div class="col-4">
                                <div class="form-group">
                                    <label for="number-contacto-input">Telefono contacto</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                        </div>
                                        <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="number_contacto_input" name="number_contacto_input" required />
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
                                        <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="number_otro_input" name="number_otro_input" />
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <!-- ================================= FIN-CUADRO-BRODER ================================= -->
            </div>
            <!-- FIN-MODAL-BODY -->

            <!-- MODAL FOOTER -->
            <div class="modal-footer">
            <button type="submit" class="btn btn-success"> <i class="far fa-save"> </i> Guardar Interesado</button>
            </div>
        </form>
        <!-- FIN-MODAL-FOOTER -->
      </div>
    </div>
</div>
<!-- FIN-MODAL -->