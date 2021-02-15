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
                    <div class="row">
                        <div class="col-6">
                            <h4>Cliente: </h4>
                        </div>
                        <div class="col-6">
                            <p>{{ $det_reclamo->clientes->nombres_razon_social}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <h4>Persona contacto: </h4>
                        </div>
                        <div class="col-6">
                            <p>{{ $det_reclamo->persona_contacto}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <h4>RUC: </h4>
                        </div>
                        <div class="col-6">
                            <p>{{ $det_reclamo->Ruc_nro_contrato}}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <h4>Medio: </h4>
                        </div>
                        <div class="col-6">
                            <p>{{ $det_reclamo->medio->nombre}}</p>
                        </div>
                    </div>   

                    <div class="row">
                        <div class="col-6">
                            <h4>Modulos: </h4>
                        </div>
                        <div class="col-6">
                            <p>{{ $det_reclamo->modulo->nombre}}</p>
                        </div>
                    </div>   

                    <div class="row">
                        <div class="col-6">
                            <h4>Descripcion: </h4>
                        </div>
                        <div class="col-6">
                            <p>{{ $det_reclamo->descripcion_reclamo}}</p>
                        </div>
                    </div>   

                    <div class="row">
                        <div class="col-6">
                            <h4>Solucion: </h4>
                        </div>
                        <div class="col-6">
                            <p>{{ $det_reclamo->tipo_solucion}}</p>
                        </div>
                    </div>   

                    <div class="row">
                        <div class="col-6">
                            <h4>Causa: </h4>
                        </div>
                        <div class="col-6">
                            <p>{{ $det_reclamo->causa}}</p>
                        </div>
                    </div>   

                    <div class="row">
                        <div class="col-6">
                            <h4>Accion a tomar: </h4>
                        </div>
                        <div class="col-6">
                            <p>{{ $det_reclamo->accion_tomar}}</p>
                        </div>
                    </div>   

                    <div class="row">
                        <div class="col-6">
                            <h4>Personal encargado: </h4>
                        </div>
                        <div class="col-6">
                            <p>{{ $det_reclamo->personal->nombres}}</p>
                        </div>
                    </div>   

                    <div class="row">
                        <div class="col-6">
                            <h4>Fecha compromiso: </h4>
                        </div>
                        <div class="col-6">
                            <p>{{ $det_reclamo->fecha_compromiso}}</p>
                        </div>
                    </div>   

                    <div class="row">
                        <div class="col-6">
                            <h4>Fecha solucion: </h4>
                        </div>
                        <div class="col-6">
                            <p>{{ $det_reclamo->fecha_solucion}}</p>
                        </div>
                    </div>   

                    <div class="row">
                        <div class="col-6">
                            <h4>Solucion(minutos): </h4>
                        </div>
                        <div class="col-6">
                            <p>{{ $det_reclamo->solucion_minutos}}</p>
                        </div>
                    </div>   

                    <div class="row">
                        <div class="col-6">
                            <h4>Solucion(dias): </h4>
                        </div>
                        <div class="col-6">
                            <p>{{ $det_reclamo->solucion_dias}}</p>
                        </div>
                    </div>   

                    <div class="row">
                        <div class="col-6">
                            <h4>Evidencia: </h4>
                        </div>
                        <div class="col-6">
                            <p>{{ $det_reclamo->evidencia}}</p>
                        </div>
                    </div>   

                    <div class="row">
                        <div class="col-6">
                            <h4>Accion: </h4>
                        </div>
                        <div class="col-6">
                            <p>{{ $det_reclamo->emite_accion}}</p>
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