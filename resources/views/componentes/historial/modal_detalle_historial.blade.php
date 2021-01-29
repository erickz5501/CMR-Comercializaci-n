<div class="modal-content">
    <!-- ================================= MODAL TITULO ================================= -->
    <div class="modal-header">
      <center style="text-align: -webkit-center !important;">
        <h5 class="modal-title" id="exampleModalLabel">Detalle registro</h5>
      </center>

      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <!-- ================================= MODAL CUERPO ================================= -->
    <div class="modal-body">
        <div class="row col-12">
          <div class="mb-12 col-12">
              
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="persona-contacto-input" class="form-control-label">Persona Contacto</label>
                            <p>{{ $det_registro->persona_contacto }}</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="modulos-input">Modulos</label><br>
                            <p>{{ $det_registro->idmodulos }}</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="mediosSelect">Medios</label>
                            <p> {{ $det_registro->idmedios }} </p>
                            </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="eventosSelect">Eventos</label>
                            <p> {{ $det_registro->ideventos }} </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label for="example-date-input" class="form-control-label">Detalle llamada: </label>
                    <div class="col">
                        <p>{{ $det_registro->detalle_llamada}}</p>
                    </div>
                </div>
                <div class="row">
                    <label for="example-date-input" class="form-control-label">Detalle evento: </label>
                    <div class="col">
                        <p>
                            @if ($det_registro->descripcion_evento == "")
                                Ninguno
                            @else
                                {{$det_registro->descripcion_evento}} 
                            @endif
                            
                        </p>
                    </div>
                </div>
                <div class="row">
                    <label for="example-date-input" class="form-control-label">Solucion Temporal: </label>
                    <div class="col">
                        <p>{{$det_registro->solucion_temporal}}  </p>
                    </div>
                </div>
                <div class="row">
                    <label for="example-date-input" class="form-control-label">Observaciones: </label>
                    <div class="col">
                        <p>{{$det_registro->observaciones}} </p>
                    </div>
                </div>
                <div class="row">
                    <label for="example-date-input" class="form-control-label">Conclusiones: </label>
                    <div class="col">
                        <p>{{$det_registro->conclusiones}} </p>
                    </div>
                </div>
              
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="example-date-input" class="form-control-label">Fecha evento</label>
                            <p>{{$det_registro->fecha_evento}}</p>
                        </div>                                    
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="example-date-input" class="form-control-label">Personal </label>
                            <p>{{$det_registro->idpersonal}}</p>
                        </div>                                    
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="example-date-input" class="form-control-label">Calificacion </label>
                            <p>{{$det_registro->calificacion_encuesta}} estrellas</p>
                        </div>                                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="calificacionSelect">Cotización</label><br>
                            <button type="button" class="btn btn-info">Ver  Doc.</button>
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
      <button type="button" class="btn btn-primary">Guardar registro</button>
    </div>
    <!-- FIN-MODAL-FOOTER -->
  </div>