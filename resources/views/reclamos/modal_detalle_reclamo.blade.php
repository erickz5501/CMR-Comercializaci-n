<div class="modal-content">
    <!-- ================================= MODAL TITULO ================================= -->
    <div class="modal-header " >
        <center style="text-align: -webkit-center !important;">
        <h5 class="modal-title" id="exampleModalLabel">Detalles del reclamo</h5>
        </center>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <!-- ================================= MODAL CUERPO ================================= -->
    <div class="modal-body" style="padding-top: 0px !important; padding-bottom:0px !important; padding-right: 0px !important">
        <div class="row col-12">
            <div class="card-body mb-12 col-12" style="padding-top: 0px !important; padding-bottom:0px !important; padding-right: 0px !important" >  

                    <div class="card-body mb-12 col-12" style="padding-top: 0px !important; padding-bottom:0px !important; ">
                        <div class="accordion" id="accordionExampleDet">
                            <div class="card">
                                <div class="card-header" id="headingOneDet" data-toggle="collapse" data-target="#collapseOneDet" aria-expanded="true" aria-controls="collapseOneDet">
                                    <h5 class="mb-0">#1</h5>
                                </div>
                                <div id="collapseOneDet" class="collapse show" aria-labelledby="headingOneDet" data-parent="#accordionExampleDet">
                                    <div class="card-body">
                                        <ul class="list-unstyled mb-0">
                                            <li class="media pt-1 pb-2 border-bottom">
                                                <i class="fas fa-id-card font-size-lg mt-2 mb-0 text-primary"></i>
                                                <div class="media-body pl-3">
                                                    <span class="font-size-ms text-muted">Cliente</span>
                                                    <span class="d-block text-heading font-size-sm">{{ $det_reclamo->clientes->nombres_razon_social }}</span>
                                                </div>
                                            </li>
                                            <li class="media pt-1 pb-2 border-bottom">
                                                <i class="fas fa-male font-size-lg mt-2 mb-0 text-primary"></i>
                                                <div class="media-body pl-3">
                                                    <span class="font-size-ms text-muted">Persona contacto:</span>
                                                    <span class="d-block text-heading font-size-sm">
                                                            {{ $det_reclamo->persona_contacto }}
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="media pt-1 pb-2 border-bottom">
                                                <i class="fas fa-chart-line font-size-lg mt-2 mb-0 text-primary"></i>
                                                <div class="media-body pl-3">
                                                    <span class="font-size-ms text-muted">RUC</span>
                                                    <span class="d-block text-heading font-size-sm">
                                                            {{$det_reclamo->Ruc_nro_contrato}}
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="media pt-1 pb-2 border-bottom">
                                                <i class="fas fa-phone font-size-lg mt-2 mb-0 text-primary"></i>
                                                <div class="media-body pl-3">
                                                    <span class="font-size-ms text-muted">Medio</span>
                                                    <span class="d-block text-heading font-size-sm">
                                                            {{ $det_reclamo->medio->nombre }}
                                                    </span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
    
                            <div class="card">
                                <div class="card-header" id="headingTwoDet" data-toggle="collapse" data-target="#collapseTwoDet" aria-expanded="false" aria-controls="collapseTwoDet">
                                    <h5 class="mb-0">#2</h5>
                                </div>
                                <div id="collapseTwoDet" class="collapse" aria-labelledby="headingTwoDet" data-parent="#accordionExampleDet">
                                    <div class="card-body">
                                        <ul class="list-unstyled mb-0">
                                            <li class="media pt-2m pb-3 border-bottom">
                                                <i class="fas fa-bookmark font-size-lg mt-2 mb-0 text-primary"></i>
                                                <div class="media-body pl-3">
                                                    <span class="font-size-ms text-primary">Modulos</span>
                                                    <span class="d-block text-heading font-size-sm">
                                                        {{  $det_reclamo->modulo->nombre }}

                                                    </span>
                                                </div>
                                            </li>
                                            <li class="media pt-2m pb-3 border-bottom">
                                                <i class="fab fa-elementor font-size-lg mt-2 mb-0 text-primary"></i>
                                                <div class="media-body pl-3">
                                                    <span class="font-size-ms text-primary">Descripcion </span>
                                                    <span class="d-block text-heading font-size-sm">
                                                        {{  $det_reclamo->descripcion_reclamo }}
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="media pt-2m pb-3 border-bottom">
                                                <i class="fas fa-calendar-alt font-size-lg mt-2 mb-0 text-primary"></i>
                                                <div class="media-body pl-3">
                                                    <span class="font-size-ms text-primary">Solucion </span>
                                                    <span class="d-block text-heading font-size-sm">
                                                        {{ $det_reclamo->tipo_solucion }}
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="media pt-2m pb-3 border-bottom">
                                                <i class="fas fa-clipboard font-size-lg mt-2 mb-0 text-primary"></i>
                                                <div class="media-body pl-3">
                                                    <span class="font-size-ms text-primary">Causa </span>
                                                    <span class="d-block text-heading font-size-sm">
                                                            {{  $det_reclamo->causa }}
                                                    </span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
    
                            <div class="card">
                                <div class="card-header" id="headingTreeDet" data-toggle="collapse" data-target="#collapseTreeDet" aria-expanded="false" aria-controls="collapseTreeDet">
                                    <h5 class="mb-0">#3</h5>
                                </div>
                                <div id="collapseTreeDet" class="collapse" aria-labelledby="headingTreeDet" data-parent="#accordionExampleDet">
                                    <div class="card-body">
                                        <ul class="list-unstyled mb-0">
                                            <li class="media pt-2m pb-3 border-bottom">
                                                <i class="fas fa-user-check font-size-lg mt-2 mb-0 text-primary"></i>
                                                <div class="media-body pl-3">
                                                    <span class="font-size-ms text-primary">Personal Encargado: </span>
                                                    <span class="d-block text-heading font-size-sm">
                                                        {{  $det_reclamo->personal->nombres }}
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="media pt-2m pb-3 border-bottom">
                                                <i class="fas fa-user-check font-size-lg mt-2 mb-0 text-primary"></i>
                                                <div class="media-body pl-3">
                                                    <span class="font-size-ms text-primary">Accion a tomar: </span>
                                                    <span class="d-block text-heading font-size-sm">
                                                        {{  $det_reclamo->accion_tomar }}
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="media pt-2m pb-3 border-bottom">
                                                <i class="fas fa-book-open font-size-lg mt-2 mb-0 text-primary"></i>
                                                <div class="media-body pl-3">
                                                    <span class="font-size-ms text-primary">Fecha compromiso </span>
                                                    <span class="d-block text-heading font-size-sm">
                                                        {{$det_reclamo->fecha_compromiso}}
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="media pt-2m pb-3 border-bottom">
                                                <i class="fas fa-book-open font-size-lg mt-2 mb-0 text-primary"></i>
                                                <div class="media-body pl-3">
                                                    <span class="font-size-ms text-primary">Fecha solucion </span>
                                                    <span class="d-block text-heading font-size-sm">
                                                        {{$det_reclamo->fecha_solucion}}
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="media pt-2m pb-3 border-bottom">
                                                <i class="fas fa-money-check-alt font-size-xl mt-2 mb-0 text-primary" style="font-size: 20px;"></i>
                                                <div class="media-body pl-3">
                                                    <span class="font-size-ms text-primary">Solucion(minutos): </span>
                                                    <span class="d-block text-heading font-size-sm">
                                                        {{ $det_reclamo->solucion_minutos}}
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="media pt-2m pb-3 border-bottom">
                                                <i class="fas fa-book font-size-lg mt-2 mb-0 text-primary"></i>
                                                <div class="media-body pl-3">
                                                    <span class="font-size-ms text-primary">Solucion(dias): </span>
                                                    <span class="d-block text-heading font-size-sm">
                                                        {{ $det_reclamo->solucion_dias}}
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="media pt-2m pb-3 border-bottom">
                                                <i class="fas fa-book font-size-lg mt-2 mb-0 text-primary"></i>
                                                <div class="media-body pl-3">
                                                    <span class="font-size-ms text-primary">Evidencia </span>
                                                    <span class="d-block text-heading font-size-sm">
                                                        {{ $det_reclamo->evidencia}}
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="media pt-2m pb-3 border-bottom">
                                                <i class="fas fa-book font-size-lg mt-2 mb-0 text-primary"></i>
                                                <div class="media-body pl-3">
                                                    <span class="font-size-ms text-primary">Accion </span>
                                                    <span class="d-block text-heading font-size-sm">
                                                        {{ $det_reclamo->emite_accion}}
                                                    </span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
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
    {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div> --}}
    <!-- FIN-MODAL-FOOTER -->
    </div>