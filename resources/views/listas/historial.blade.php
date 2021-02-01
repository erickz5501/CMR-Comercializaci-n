@extends('layout')
@section('title', 'Historial de comercialización')
@section('pagina', 'DASHBOARD')
@section('content')
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <form>
                            <input class="form-control" placeholder="Buscar registro..." type="text" id="searchTerm" onkeyup="doSearch()">
                        </form>
                    </div>
                    {{-- <div class="col-4 text-right">
                        <a type="button" href="#" class="btn btn btn-primary" data-toggle="modal" data-target="#registroModal"><i class="fas fa-plus-circle"></i> Agregar registro</a>
                    </div> --}}
                </div>
            </div>

            <!-- ================================= MODAL Detalle ================================= -->
            <div class="modal fade" id="detalle_registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document" id="modal_registro">
                    {{-- Contenido del modal --}}
                  </div>
            </div>
            <!-- FIN-MODAL -->

            <!-- ================================= MODAL Registro ================================= -->
            <div class="modal fade" id="registroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                  <div class="modal-content">
                    <!-- ================================= MODAL TITULO ================================= -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar registro</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"> <i class="far fa-times-circle"></i> </span>
                        </button>
                    </div>

                    <!-- ================================= MODAL CUERPO ================================= -->
                    <form id="formulario_historial">
                        @csrf
                        <div class="modal-body">
                            {{-- input ID oculto --}}
                            <input type="hidden" id="idhistorial_comercializacion" name="idhistorial_comercializacion" />
                            <input type="hidden" id="idcotizacion" name="idcotizacion" value="3" />
                            <div class="row col-12">
                                <div class="card-body mb-12 col-12 border">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="persona-contacto-input" class="form-control-label">Persona Contacto</label>
                                                <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="persona_contacto_input" name="persona_contacto_input" placeholder="Nombres" required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="select_modal_modulos-input">Modulos</label>
                                                <select style="color: black !important; font-weight: bold !important;" name="select_modal_modulos" id="select_modal_modulos" class="form-control multi_select" data-toggle="select" required>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="select_modal_medios">Medios</label>
                                                <select style="color: black !important; font-weight: bold !important;" class="form-control" id="select_modal_medios" name="select_modal_medios" data-toggle="select" required>
                                                
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="llamadaDetTextarea">Detalle llamada</label>
                                                <textarea class="form-control" id="llamadaDetTextarea" name="llamadaDetTextarea" rows="3" style="color: black !important; font-weight: bold !important;"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="eventosSelect">Eventos</label>
                                                <select class="form-control" id="select_modal_eventos" name="select_modal_eventos" data-toggle="select" required style="color: black !important; font-weight: bold !important;">
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="example-date-input" class="form-control-label">Fecha evento</label>
                                                <input style="color: black !important; font-weight: bold !important;" class="form-control" type="date" value="2018-11-23" id="example_date_input" name="example_date_input" required>
                                            </div>                                    
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="eventoTextarea">Detalle evento</label>
                                                <textarea class="form-control" id="eventoTextarea" name="eventoTextarea" rows="3" style="color: black !important; font-weight: bold !important;"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="personalInput">Personal</label>
                                                <select class="form-control" id="select_modal_personal" name="select_modal_personal" data-toggle="select" required style="color: black !important; font-weight: bold !important;">
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="calificacionSelect">Calificacion</label>
                                                <select class="form-control" id="calificacionSelect" name="calificacionSelect" style="color: black !important; font-weight: bold !important;">
                                                <option value="1">1 estrella</option>
                                                <option value="2">2 estrella</option>
                                                <option value="3">3 estrella</option>
                                                <option value="4">4 estrella</option>
                                                <option value="5">5 estrella</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="solucionInput">Solución temporal</label>
                                                <input type="text" class="form-control" id="solucionInput" name="solucionInput" placeholder="Solucion" style="color: black !important; font-weight: bold !important;">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="calificacionSelect">Cotización</label><br>
                                                <button type="button" class="btn btn-secondary">Generar Doc.</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="observacionesTextarea">Observaciones</label>
                                                <textarea class="form-control" id="observacionesTextarea" name="observacionesTextarea" rows="3" style="color: black !important; font-weight: bold !important;"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="conclusionesTextarea">Conclusiones</label>
                                                <textarea class="form-control" id="conclusionesTextarea" name="conclusionesTextarea" rows="3" style="color: black !important; font-weight: bold !important;"></textarea>
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-times-circle"> </i> Cerrar</button>
                            <button type="submit" class="btn btn-success"><i class="far fa-save"> </i> Guardar cliente</button>
                        </div>
                    </form>
                    <!-- FIN-MODAL-FOOTER -->
                  </div>
                </div>
            </div>
            <!-- FIN-MODAL -->

            <div class="table-responsive">
                <div>
                    <table class="table align-items-center" id="datos">
                        <thead class="thead-light">
                            <tr>
                                <th>N°</th>
                                <th>persona contacto</th>
                                <th>Modulos</th>
                                <th>Det.llamada</th>
                                <th>Fecha evento</th>
                                <th>Eventos</th>
                                <th>Calificación</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody class="list" id="lista_historial"></tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer py-4">

            </div>            
@endsection

@section('js')
<script src="{{ asset('funciones/crud.js')}}"></script>
<script src="{{ asset('ajax/ajaxhistorial.js') }}"></script>
@endsection

<style>
    #datos tr.noSearch {background:White;font-size:0.8em;}
    #datos tr.noSearch td {padding-top:10px;text-align:right;}
    .hide {display:none;}
    .red {color:Red;}
</style>