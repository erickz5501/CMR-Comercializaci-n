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
                    <div class="col-4">
                        <div class="form-group">
                            <label for="example-date-input" class="form-control-label">Fecha evento</label>
                            <input class="form-control" type="date" value="{{$det_registro->fecha_evento}}" id="example-date-input" readonly>
                        </div>                                    
                    </div>
                    <div class="col-8">
                        <div class="form-group">
                            <label for="llamadaDetTextarea">Detalle llamada</label>
                            <textarea class="form-control" id="llamadaDetTextarea" rows="3" disabled> {{ $det_registro->detalle_llamada}} </textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="eventoTextarea">Detalle evento</label>
                            <textarea class="form-control" id="eventoTextarea" rows="3" disabled> {{$det_registro->descripcion_evento}} </textarea>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="personalInput">Personal</label>
                            <p> {{$det_registro->idpersonal}} </p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="solucionInput">Solución temporal</label>
                            <p> {{$det_registro->solucion_temporal}} </p>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="calificacionSelect">Calificacion</label>
                            <p> {{$det_registro->calificacion_encuesta}} </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="observacionesTextarea">Observaciones</label>
                            <textarea class="form-control" id="observacionesTextarea" rows="3" disabled> {{$det_registro->observaciones}} </textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="conclusionesTextarea">Conclusiones</label>
                            <textarea class="form-control" id="conclusionesTextarea" rows="3" disabled> {{$det_registro->conclusiones}} </textarea>
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="calificacionSelect">Cotización</label><br>
                            <button type="button" class="btn btn-secondary">Ver  Doc.</button>
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