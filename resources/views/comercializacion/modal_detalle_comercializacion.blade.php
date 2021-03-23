<div class="modal-content">
    <!-- ================================= MODAL TITULO ================================= -->
    <div class="modal-header">
        <center style="text-align: -webkit-center !important;">
        <h5 class="modal-title" id="exampleModalLabel">Detalles del registro</h5>
        </center>

        <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red;"></i> </span>
        </button>
    </div>

    <!-- ================================= MODAL CUERPO ================================= -->
    <div class="modal-body" style="padding-top: 0px !important; padding-bottom: 0px !important;">

        <div class="nav-wrapper">
            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" data-toggle="tab" href="#tabs-icons-text-1a" role="tab" aria-controls="tabs-icons-text-1a" aria-selected="true">
                        <i class="fas fa-digital-tachograph"></i> Datos generales
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" data-toggle="tab" href="#tabs-icons-text-2a" role="tab" aria-controls="tabs-icons-text-2a" aria-selected="false">
                        <i class="fas fa-paperclip"></i> Datos del registro
                    </a>
                </li>
            </ul>
        </div>


        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tabs-icons-text-1a"  role="tabpanel" aria-labelledby="tabs-icons-text-1a-tab">
                <ul class=" ">
                    <li class="media pt-1 pb-2 border-bottom">
                        <i class="fas fa-id-card font-size-lg mt-2 mb-0 text-primary"></i>
                        <div class="media-body pl-3">
                            <span class="font-size-ms text-primary">Cliente</span>
                            <span class="d-block text-heading font-size-sm">{{ $det_registro->ModeloCliente->nombres_razon_social }}</span>
                        </div>
                    </li>
                    <li class="media pt-1 pb-2 border-bottom" >
                        <i class="fas fa-laptop-code font-size-lg mt-2 mb-0 text-primary"></i>
                        <div class="media-body pl-3" style="overflow-x: auto !important;">
                            <span class="font-size-ms text-primary">Modulos:</span> <br>
                            <span class="d-block text-heading font-size-sm">

                                <div class=" table-responsive"  >
                                    <table class="table align-items-center table-flush"  >
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Modulo</th>
                                                <th>Cnt. Licencias</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for ($i = 0; $i < $cant_modulos; $i++)
                                            <tr>
                                                <td>{{ $det_modulo[$i]->modulo->nombre }}</td>
                                                <td>{{ $det_modulo[$i]->cant_licencias }}</td>
                                            </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>

                            </span>
                        </div>
                    </li>
                    <li class="media pt-1 pb-2 border-bottom">
                        <i class="fas fa-male font-size-lg mt-2 mb-0 text-primary"></i>
                        <div class="media-body pl-3">
                            <span class="font-size-ms text-primary">Persona contacto:</span>
                            <span class="d-block text-heading font-size-sm">
                                    {{ $det_registro->persona_contacto }}
                            </span>
                        </div>
                    </li>
                    <li class="media pt-1 pb-2 border-bottom">
                        <i class="fas fa-chart-line font-size-lg mt-2 mb-0 text-primary"></i>
                        <div class="media-body pl-3">
                            <span class="font-size-ms text-primary">Actividad</span>
                            <span class="d-block text-heading font-size-sm">
                                @if ( $det_registro->actividad)
                                    {{ $det_registro->actividad->nombre}}
                                @else
                                    -- no definido --
                                @endif

                            </span>
                        </div>
                    </li>
                    <li class="media pt-1 pb-2 border-bottom">
                        <i class="fas fa-phone font-size-lg mt-2 mb-0 text-primary"></i>
                        <div class="media-body pl-3">
                            <span class="font-size-ms text-primary">Medio</span>
                            <span class="d-block text-heading font-size-sm">
                                @if ($det_registro->medio)
                                    {{ $det_registro->medio->nombre }}
                                @else
                                    -- no definido --
                                @endif

                            </span>
                        </div>
                    </li>
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
                </ul>
            </div>

            <div class="tab-pane fade" id="tabs-icons-text-2a" role="tabpanel" aria-labelledby="tabs-icons-text-2a-tab">
                <ul>
                    <li class="media pt-2m pb-3 border-bottom">
                        <i class="fab fa-elementor font-size-lg mt-2 mb-0 text-primary"></i>
                        <div class="media-body pl-3">
                            <span class="font-size-ms text-primary">Cotizacion </span>
                            <span class="d-block text-heading font-size-sm">
                                @if ( $cotizacion )
                                    @if ( $cotizacion->ModeloCotizacion )
                                    {{  $cotizacion->ModeloCotizacion->nombre }}
                                    @endif
                                @else
                                    -- no definido --
                                @endif

                            </span>
                        </div>
                    </li>
                    <li class="media pt-2m pb-3 border-bottom">
                        <i class="fab fa-elementor font-size-lg mt-2 mb-0 text-primary"></i>
                        <div class="media-body pl-3">
                            <span class="font-size-ms text-primary">Eventos </span>
                            <span class="d-block text-heading font-size-sm">
                                @if ( $det_registro->evento)
                                    {{  $det_registro->evento->nombre }}
                                @else
                                    -- no definido --
                                @endif

                            </span>
                        </div>
                    </li>
                    <li class="media pt-2m pb-3 border-bottom">
                        <i class="fas fa-calendar-alt font-size-lg mt-2 mb-0 text-primary"></i>
                        <div class="media-body pl-3">
                            <span class="font-size-ms text-primary">Fecha evento </span>
                            <span class="d-block text-heading font-size-sm">
                                {{ \Carbon\Carbon::parse($det_registro->fecha_evento)->format('Y-m-d / g:i a') }}
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
                    <li class="media pt-2m pb-3 border-bottom">
                        <i class="fas fa-book-open font-size-lg mt-2 mb-0 text-primary"></i>
                        <div class="media-body pl-3">
                            <span class="font-size-ms text-primary">Avanze </span>
                            <span class="d-block text-heading font-size-sm">
                                @if ($det_registro->avance)
                                    {{ $det_registro->avance}}
                                @else
                                    No definido.
                                @endif

                            </span>
                        </div>
                    </li>
                    <li class="media pt-2m pb-3 border-bottom">
                        <i class="fas fa-user-check font-size-lg mt-2 mb-0 text-primary"></i>
                        <div class="media-body pl-3">
                            <span class="font-size-ms text-primary">Personal Encargado: </span>
                            <span class="d-block text-heading font-size-sm">
                                @if ($det_registro->personal)
                                    {{  $det_registro->personal->nombres }}
                                @else
                                    -- no definido --
                                @endif

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


        <!-- ================================= FIN-CUADRO-BRODER ================================= -->
    </div>
    <!-- FIN-MODAL-BODY -->

    <!-- MODAL FOOTER -->
    <div class="modal-footer" style="padding-top: 0px !important;">
    </div>
    <!-- FIN-MODAL-FOOTER -->
</div>
