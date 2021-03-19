<div class="modal fade" id="modal_evento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content" style="box-shadow: 0 5px 45px rgb(30 30 97 / 79%), 0 5px 45px rgb(16 13 13 / 76%) !important;">
            <!-- ::::::: MODAL HEADER ::::::: -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <span id="titulo_modal"> Agregar evento </span>
                    <i style="font-size: 20px !important; display: none;" class="fas fa-spinner fa-pulse" id="cargando_edit"></i>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red"></i> </span>
                </button>
            </div>

            <!-- :::::::: MODAL BODY :::::::: -->
            <div class="modal-body" style="padding-top: 0px !important; padding-bottom: 0px !important;">
                <form id="formulario_evento" >
                    @csrf
                    <input type="hidden" id="ideventos" name="ideventos" />

                    <div class="row">
                        <!-- :::::::: INPUT NOMBRE ::::::::-->
                        <div class="col-sm-12 col-md-12 col-xl-12">
                            <label for="nombre_evento">Nombre</label>
                            <div class="form-group">
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                    </div>
                                    <input  type="text" class="form-control" id="nombre_evento" name="nombre_evento" placeholder="Cotizacion"  style="color: black !important; font-weight: bold !important;"/>
                                    <div class="invalid-feedback"> Rellene el campo por favor. </div>
                                </div>
                            </div>
                        </div>
                        <!-- :::::::: INPUT DESCRIPCION ::::::::-->
                        <div class="col-sm-12 col-md-12 col-xl-12">
                            <div class="form-group">
                                <label for="nombre_comercial_input">Descripción</label>
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-audio-description"></i></span>
                                    </div>
                                    <input  type="text" class="form-control" id="descripcion_input" name="descripcion_input" placeholder="Descripción" style="color: black !important; font-weight: bold !important;" />
                                </div>
                            </div>
                        </div>
                        <!-- :::::::: BARRA DE PROGRESO ::::::::-->
                        <div class="col-sm-12 col-md-12 col-xl-12" >
                            <div class="form-group">
                                <div class="progress" id="div_barra_progress_evento" style="height: 12px !important;">
                                    <div id="barra_progress_evento" class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <!-- :::::::: CONTENEDOR DE ERRORES ::::::::-->
                        <div class="col-sm-12 col-md-12 col-xl-12">
                            <div id="contenedor_de_errores_evento"></div>
                        </div>
                    </div>
                    <button type="submit" style="display: none;"></button>
                </form>
            </div>
            <!-- MODAL FOOTER -->
            <div class="modal-footer" style="padding-top: 0px !important;">
                <button id="guardar_registro" type="button" class="btn btn-outline-success px-2 py-2" >
                    <i class="far fa-save"> </i>
                    <span id="btn_footer_modal">Guardar evento</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- FIN-MODAL -->
