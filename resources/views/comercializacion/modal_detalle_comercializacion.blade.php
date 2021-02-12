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
                <div class="row">
                    <div class="col-6">
                        <h4>Cliente: </h4>
                    </div>
                    <div class="col-6">
                        <p>{{ $det_registro->clientes->nombres_razon_social}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <h4>Persona contacto: </h4>
                    </div>
                    <div class="col-6">
                        <p>{{ $det_registro->persona_contacto}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <h4>Actividad: </h4>
                    </div>
                    <div class="col-6">
                        <p>{{ $det_registro->actividad}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <h4>Medio: </h4>
                    </div>
                    <div class="col-6">
                        <p>{{ $det_registro->medio->nombre}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <h4>Detalle llamada: </h4>
                    </div>
                    <div class="col-6">
                        <p>{{ $det_registro->detalla_llamada}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <h4>Eventos: </h4>
                    </div>
                    <div class="col-6">
                        <p>{{ $det_registro->evento->nombre}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <h4>Fecha evento: </h4>
                    </div>
                    <div class="col-6">
                        <p>{{ $det_registro->fecha_evento}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <h4>Descripcion evento: </h4>
                    </div>
                    <div class="col-6">
                        <p>{{ $det_registro->descripcion_evento}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <h4>Personal Encargado: </h4>
                    </div>
                    <div class="col-6">
                        <p>{{ $det_registro->personal->nombres}}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <h4>Calificacion: </h4>
                    </div>
                    <div class="col-6">
                        <p>{{ $det_registro->calificacion}} estrellas</p>
                    </div>
                </div>  

                <div class="row">
                    <div class="col-6">
                        <h4>Avanze: </h4>
                    </div>
                    <div class="col-6">
                        <p>{{ $det_registro->avance}}</p>
                    </div>
                </div> 

                <div class="row">
                    <div class="col-6">
                        <h4>Por cobrar: </h4>
                    </div>
                    <div class="col-6">
                        <p>{{ $det_registro->por_cobrar}}</p>
                    </div>
                </div> 
                                
                <div class="row">
                    <div class="col-6">
                        <h4>Observaciones: </h4>
                    </div>
                    <div class="col-6">
                        <p>{{ $det_registro->observacion}}</p>
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