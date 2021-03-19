<div class="modal fade" id="registroModalPersonal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="box-shadow: 0 5px 45px rgb(30 30 97 / 79%), 0 5px 45px rgb(16 13 13 / 76%) !important;">
            <!-- ================================= MODAL TITULO ================================= -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Personal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red"></i> </span>
                </button>
            </div>

            <!-- ================================= MODAL CUERPO ================================= -->
            <form id="formulario_personal" >
                @csrf
                <div class="modal-body">
                    {{-- input ID oculto --}}
                    <input type="hidden" id="idpersonal" name="idpersonal" />
                    <div class="card-body mb-12 col-12" style="padding: 0px; margin-left: 0px !important;">

                        <div class="row">
                            <div class="col">
                                <label for="nombre_input">Nombres</label>
                                <div class="form-group">
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                        </div>
                                        <input style="color: black !important; font-weight: bold !important;" type="text" class="form-control" id="nombre_personal" name="nombre_personal" placeholder="Nombre" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="apellido_input">Apellidos</label>
                                <div class="form-group">
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                        </div>
                                        <input style="color: black !important; font-weight: bold !important;" type="text" class="form-control" id="apellido_personal" name="apellido_personal" placeholder="Apellido" required />
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
                    <button type="submit" class="btn btn-success"><i class="far fa-save"> </i> Guardar personal</button>
                </div>
            </form>
            <!-- FIN-MODAL-FOOTER -->
        </div>
    </div>
</div>
<!-- FIN-MODAL -->
