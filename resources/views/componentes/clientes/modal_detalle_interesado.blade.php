<div class="modal-content">
    <!-- ================================= MODAL TITULO ================================= -->
    <div class="modal-header">
        <center style="text-align: -webkit-center !important;">
        <h5 class="modal-title" id="exampleModalLabel">Datos del interesado</h5>
        </center>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><i class="far fa-times-circle" style="color: red;"></i></span>
        </button>
    </div>

    <!-- ================================= MODAL CUERPO ================================= -->
    <div class="modal-body" style="padding-top: 0px !important; padding-bottom:0px !important;">
        <div class="accordion" id="accordionExampleDet">
            <div class="card">
                <div class="card-header" id="headingOneDet" data-toggle="collapse" data-target="#collapseOneDet" aria-expanded="true" aria-controls="collapseOneDet">
                    <h5 class="mb-0">DATOS PRINCIPALES</h5>
                </div>
                <div id="collapseOneDet" class="collapse show" aria-labelledby="headingOneDet" data-parent="#accordionExampleDet">
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            <li class="media pt-1 pb-2 border-bottom">
                                <i class="fas fa-tag font-size-lg mt-2 mb-0 text-primary"></i>
                                <div class="media-body pl-3">
                                    <span class="font-size-ms text-primary">Etiqueta:</span>
                                    <span class="d-block text-heading font-size-sm">
                                        @if ($cliente->ModeloEtiqueta)
                                            {{ $cliente->ModeloEtiqueta->nombre }}
                                        @else
                                            -- no definido --
                                        @endif

                                    </span>
                                </div>
                            </li>
                            <li class="media pt-1 pb-2 border-bottom">
                                <i class="far fa-user font-size-lg mt-2 mb-0 text-primary"></i>
                                <div class="media-body pl-3">
                                    <span class="font-size-ms text-primary">Nombres:</span>
                                    <span class="d-block text-heading font-size-sm">{{ $cliente->nombres_razon_social }} {{ $cliente->apellidos_nombre_comercial }}</span>
                                </div>
                            </li>

                            <li class="media pt-1 pb-2 border-bottom">
                                <i class="fas fa-phone-alt font-size-lg mt-2 mb-0 text-primary"></i>
                                <div class="media-body pl-3">
                                    <span class="font-size-ms text-primary">Telfono de empresa:</span>
                                    <span class="d-block text-heading font-size-sm">{{ $cliente->telefono_empresa }}</span>
                                </div>
                            </li>

                            <li class="media pt-1 pb-2 border-bottom">
                                <i class="fas fa-briefcase font-size-lg mt-2 mb-0 text-primary"></i>
                                <div class="media-body pl-3">
                                    <span class="font-size-ms text-primary">Giro negocio</span>
                                    <span class="d-block text-heading font-size-sm">
                                            {{ $cliente->gironegocio->nombre }}
                                    </span>
                                </div>
                            </li>
                            <li class="media pt-1 pb-2 border-bottom">
                                <i class="fas fa-id-card font-size-lg mt-2 mb-0 text-primary"></i>
                                <div class="media-body pl-3">
                                    <span class="font-size-ms text-primary">N° documento</span>
                                    <span class="d-block text-heading font-size-sm">
                                            {{ $cliente->nro_documento }}
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="headingTwoDet" data-toggle="collapse" data-target="#collapseTwoDet" aria-expanded="false" aria-controls="collapseTwoDet">
                    <h5 class="mb-0">DATOS SECUNDARIOS</h5>
                </div>
                <div id="collapseTwoDet" class="collapse" aria-labelledby="headingTwoDet" data-parent="#accordionExampleDet">
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            <li class="media pt-2m pb-3 border-bottom">
                                <i class="fas fa-envelope font-size-lg mt-2 mb-0 text-primary"></i>
                                <div class="media-body pl-3">
                                    <span class="font-size-ms text-primary">Correo 1</span>
                                    <span class="d-block text-heading font-size-sm">
                                        {{ $cliente->correo_1 }}
                                    </span>
                                </div>
                            </li>
                            <li class="media pt-2m pb-3 border-bottom">
                                <i class="fas fa-envelope font-size-lg mt-2 mb-0 text-primary"></i>
                                <div class="media-body pl-3">
                                    <span class="font-size-ms text-primary">Correo 2 </span>
                                    <span class="d-block text-heading font-size-sm">
                                        {{  $cliente->correo_2 }}
                                    </span>
                                </div>
                            </li>
                            <li class="media pt-2m pb-3 border-bottom">
                                <i class="fas fa-envelope font-size-lg mt-2 mb-0 text-primary"></i>
                                <div class="media-body pl-3">
                                    <span class="font-size-ms text-primary">Correo 3</span>
                                    <span class="d-block text-heading font-size-sm">
                                        {{  $cliente->correo_3 }}
                                    </span>
                                </div>
                            </li>

                            <li class="media pt-2m pb-3 border-bottom">
                                <i class="fas fa-phone-alt font-size-lg mt-2 mb-0 text-primary"></i>
                                <div class="media-body pl-3">
                                    <span class="font-size-ms text-primary">Telefono contacto</span>
                                    <span class="d-block text-heading font-size-sm">
                                        {{  $cliente->telefono_contacto }}
                                    </span>
                                </div>
                            </li>
                            <li class="media pt-2m pb-3 border-bottom">
                                <i class="fas fa-phone-alt font-size-lg mt-2 mb-0 text-primary"></i>
                                <div class="media-body pl-3">
                                    <span class="font-size-ms text-primary">Telefono otro</span>
                                    <span class="d-block text-heading font-size-sm">
                                        {{  $cliente->telefono_otro }}
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL FOOTER -->
    <div class="modal-footer">

    </div>
</div>
