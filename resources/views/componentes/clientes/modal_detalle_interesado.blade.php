<div class="modal-content">
    <!-- ================================= MODAL TITULO ================================= -->
    <div class="modal-header">
        <center style="text-align: -webkit-center !important;">
        <h5 class="modal-title" id="exampleModalLabel">Datos del interesado</h5>
        </center>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <!-- ================================= MODAL CUERPO ================================= -->
    <div class="modal-body">
        <div class="row col-12">
            <div class="card-body mb-12 col-12">
                <div class="row">
                    <div class="col-6">
                        @if ($det_interesado->tipo_documento == 1)
                        <h4>Nombres: </h4>
                        @else
                        <h4>Razon Social: </h4>
                        @endif 
                    </div>
                    <div class="col-6">
                        <p>{{ $det_interesado->nombres_razon_social}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        @if ($det_interesado->tipo_documento == 1)
                        <h4>Apellidos: </h4>
                        @else
                        <h4>Nombre Comercial: </h4>
                        @endif
                    </div>
                    <div class="col-6">
                        <p>{{ $det_interesado->apellidos_nombre_comercial}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h4>Giro de negocio: </h4>
                    </div>
                    <div class="col-6">
                        <p>{{ $det_interesado->idgiro_negocio}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h4>Tipo persona: </h4>
                    </div>
                    <div class="col-6">
                        <p>{{ $det_interesado->tipo_persona}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h4>N° documento: </h4>
                    </div>
                    <div class="col-6">
                        <p>{{ $det_interesado->nro_documento}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h4>Correo 1: </h4>
                    </div>
                    <div class="col-6">
                        <p>{{ $det_interesado->correo_1}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h4>Correo 2: </h4>
                    </div>
                    <div class="col-6">
                        <p>{{ $det_interesado->correo_2}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h4>Correo 3: </h4>
                    </div>
                    <div class="col-6">
                        <p>{{ $det_interesado->correo_3}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h4>Telefono empresa: </h4>
                    </div>
                    <div class="col-6">
                        <p>{{ $det_interesado->telefono_empresa}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h4>Telefono contanto: </h4>
                    </div>
                    <div class="col-6">
                        <p>{{ $det_interesado->telefono_contacto}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h4>Telefono otro: </h4>
                    </div>
                    <div class="col-6">
                        <p>{{ $det_interesado->telefono_otro}}</p>
                    </div>
                </div>

            </div>
        </div>
        <!-- ================================= FIN-CUADRO-BRODER ================================= -->
    </div>
    <!-- FIN-MODAL-BODY -->

    <!-- MODAL FOOTER -->
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
    <!-- FIN-MODAL-FOOTER -->
    </div>