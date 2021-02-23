<div class="modal-content">
    <!-- ================================= MODAL TITULO ================================= -->
    <div class="modal-header">
        <center style="text-align: -webkit-center !important;">
        <h5 class="modal-title" id="exampleModalLabel">Detalles del registro</h5>
        </center>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <!-- ================================= MODAL CUERPO ================================= -->
    <div class="modal-body" style="padding-top: 0px !important; padding-bottom:0px !important; padding-right: 0px !important">
        <div class="row col-12">
            <div class="card-body mb-12 col-12" style="padding-top: 0px !important; padding-bottom:0px !important; padding-right: 0px !important">
                
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
                                                <span class="d-block text-heading font-size-sm">{{ $det_registro->clientes->nombres_razon_social }}</span>
                                            </div>
                                        </li>
                                        <li class="media pt-1 pb-2 border-bottom">
                                            <i class="fas fa-laptop-code font-size-lg mt-2 mb-0 text-primary"></i>
                                            <div class="media-body pl-3">
                                                <span class="font-size-ms text-muted">Modulos:</span>
                                                <span class="d-block text-heading font-size-sm">
                                                        {{ $det_modulo->modulo->nombre }}
                                                </span>
                                            </div>
                                        </li>
                                        <li class="media pt-1 pb-2 border-bottom">
                                            <i class="fas fa-male font-size-lg mt-2 mb-0 text-primary"></i>
                                            <div class="media-body pl-3">
                                                <span class="font-size-ms text-muted">Persona contacto:</span>
                                                <span class="d-block text-heading font-size-sm">
                                                        {{ $det_registro->persona_contacto }}
                                                </span>
                                            </div>
                                        </li>
                                        <li class="media pt-1 pb-2 border-bottom">
                                            <i class="fas fa-chart-line font-size-lg mt-2 mb-0 text-primary"></i>
                                            <div class="media-body pl-3">
                                                <span class="font-size-ms text-muted">Actividad</span>
                                                <span class="d-block text-heading font-size-sm">
                                                        {{ $det_registro->actividad}}
                                                </span>
                                            </div>
                                        </li>
                                        <li class="media pt-1 pb-2 border-bottom">
                                            <i class="fas fa-phone font-size-lg mt-2 mb-0 text-primary"></i>
                                            <div class="media-body pl-3">
                                                <span class="font-size-ms text-muted">Medio</span>
                                                <span class="d-block text-heading font-size-sm">
                                                        {{ $det_registro->medio->nombre }}
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
                                                <span class="font-size-ms text-primary">Detalle llamada</span>
                                                <span class="d-block text-heading font-size-sm">
                                                    @if ($det_registro->detalla_llamada)
                                                        {{  $det_registro->detalla_llamada }}
                                                    @else
                                                        No definido.
                                                    @endif
                                                    
                                                </span>
                                            </div>
                                        </li>
                                        <li class="media pt-2m pb-3 border-bottom">
                                            <i class="fab fa-elementor font-size-lg mt-2 mb-0 text-primary"></i>
                                            <div class="media-body pl-3">
                                                <span class="font-size-ms text-primary">Eventos </span>
                                                <span class="d-block text-heading font-size-sm">
                                                    {{  $det_registro->evento->nombre }}
                                                </span>
                                            </div>
                                        </li>
                                        <li class="media pt-2m pb-3 border-bottom">
                                            <i class="fas fa-calendar-alt font-size-lg mt-2 mb-0 text-primary"></i>
                                            <div class="media-body pl-3">
                                                <span class="font-size-ms text-primary">Fecha evento </span>
                                                <span class="d-block text-heading font-size-sm">
                                                    {{  $det_registro->fecha_evento }}
                                                </span>
                                            </div>
                                        </li>
                                        <li class="media pt-2m pb-3 border-bottom">
                                            <i class="fas fa-clipboard font-size-lg mt-2 mb-0 text-primary"></i>
                                            <div class="media-body pl-3">
                                                <span class="font-size-ms text-primary">Descripcion evento </span>
                                                <span class="d-block text-heading font-size-sm">
                                                    @if ($det_registro->descripcion_evento)
                                                        {{  $det_registro->descripcion_evento }}
                                                    @else
                                                        No definido.
                                                    @endif
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
                                                    {{  $det_registro->personal->nombres }}
                                                </span>
                                            </div>
                                        </li>
                                        <li class="media pt-2m pb-3 border-bottom">
                                            <i class="fas fa-star font-size-lg mt-2 mb-0 text-primary"></i>
                                            <div class="media-body pl-3">
                                                <span class="font-size-ms text-primary">Calificacion:</span>
                                                <span class="d-block text-heading font-size-sm">
                                                    @if ($det_registro->calificacion == 1)
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <i class="fas fa-star text-black"></i>
                                                        <i class="fas fa-star text-black"></i>
                                                        <i class="fas fa-star text-black"></i>
                                                        <i class="fas fa-star text-black"></i>
                                                    @else
                                                       @if ( $det_registro->calificacion == 2)
                                                       <i class="fas fa-star text-yellow"></i>
                                                       <i class="fas fa-star text-yellow"></i>
                                                       <i class="fas fa-star text-black"></i>
                                                       <i class="fas fa-star text-black"></i>
                                                       <i class="fas fa-star text-black"></i>
                                                       @else
                                                          @if ($det_registro->calificacion == 3)
                                                          <i class="fas fa-star text-yellow"></i>
                                                          <i class="fas fa-star text-yellow"></i>
                                                          <i class="fas fa-star text-yellow"></i>
                                                          <i class="fas fa-star text-black"></i>
                                                          <i class="fas fa-star text-black"></i>
                                                          @else
                                                              @if ($det_registro->calificacion == 4)
                                                              <i class="fas fa-star text-yellow"></i>
                                                              <i class="fas fa-star text-yellow"></i>
                                                              <i class="fas fa-star text-yellow"></i>
                                                              <i class="fas fa-star text-yellow"></i>
                                                              <i class="fas fa-star text-black"></i>
                                                              @else
                                                              <i class="fas fa-star text-yellow"></i>
                                                              <i class="fas fa-star text-yellow"></i>
                                                              <i class="fas fa-star text-yellow"></i>
                                                              <i class="fas fa-star text-yellow"></i>
                                                              <i class="fas fa-star text-yellow"></i>
                                                              @endif
                                                          @endif 
                                                       @endif 
                                                    @endif
                                                    
                                                </span>
                                            </div>
                                        </li>
                                        <li class="media pt-2m pb-3 border-bottom">
                                            <i class="fas fa-book-open font-size-lg mt-2 mb-0 text-primary"></i>
                                            <div class="media-body pl-3">
                                                <span class="font-size-ms text-primary">Avanze </span>
                                                <span class="d-block text-heading font-size-sm">
                                                    {{ $det_registro->avance}}
                                                </span>
                                            </div>
                                        </li>
                                        <li class="media pt-2m pb-3 border-bottom">
                                            <i class="fas fa-money-check-alt font-size-xl mt-2 mb-0 text-primary" style="font-size: 20px;"></i>
                                            <div class="media-body pl-3">
                                                <span class="font-size-ms text-primary">Por cobrar </span>
                                                <span class="d-block text-heading font-size-sm">
                                                    {{ $det_registro->por_cobrar}}
                                                </span>
                                            </div>
                                        </li>
                                        <li class="media pt-2m pb-3 border-bottom">
                                            <i class="fas fa-book font-size-lg mt-2 mb-0 text-primary"></i>
                                            <div class="media-body pl-3">
                                                <span class="font-size-ms text-primary">Observaciones </span>
                                                <span class="d-block text-heading font-size-sm">
                                                    @if ($det_registro->observacion)
                                                        {{ $det_registro->observacion}}
                                                    @else
                                                        No definido
                                                    @endif
                                                    
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
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
    <!-- FIN-MODAL-FOOTER -->
    </div>