@extends('layout')

@section('title', 'Historial de comercialización')
@section('pagina', 'Historial')
@section('content')
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <form>
                            <input class="form-control" placeholder="Buscar registro..." type="text" id="searchTerm" onkeyup="doSearch()">
                        </form>
                    </div>
                    <div class="col-4 text-right">
                        <a type="button" href="#" class="btn btn btn-primary" data-toggle="modal" data-target="#registroModal"><i class="fas fa-plus-circle"></i> Agregar registro</a>
                    </div>
                </div>
            </div>

            <!-- ================================= MODAL Detalle ================================= -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
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
                            <div class="card-body mb-12 col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="persona-contacto-input" class="form-control-label">Persona Contacto</label>
                                            <input class="form-control" type="text" value="John Snow" id="persona-contacto-input" readonly>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="modulos-input">Modulos</label><br>
                                            <input type="text" class="form-control" value="CeaConta, CeaFinanzas, CeaPlantillas" data-toggle="tags" id="modulos-input" disabled/>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="mediosSelect">Medios</label>
                                            <select class="form-control" id="mediosSelect" disabled>
                                              <option>Medio 1</option>
                                              <option>Medio 2</option>
                                              <option>Medio 3</option>
                                              <option>Otro</option>
                                            </select>
                                          </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="llamadaDetTextarea">Detalle llamada</label>
                                            <textarea class="form-control" id="llamadaDetTextarea" rows="3" disabled></textarea>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="eventosSelect">Eventos</label>
                                            <select class="form-control" id="eventosSelect" disabled>
                                                <option>Evento 1</option>
                                                <option>Evento 2</option>
                                                <option>Evento 3</option>
                                                <option>Otro</option>
                                            </select>
                                          </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="example-date-input" class="form-control-label">Fecha evento</label>
                                            <input class="form-control" type="date" value="2018-11-23" id="example-date-input" readonly>
                                        </div>                                    
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="eventoTextarea">Detalle evento</label>
                                            <textarea class="form-control" id="eventoTextarea" rows="3" disabled></textarea>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="personalInput">Personal</label>
                                            <input type="text" class="form-control" id="personalInput" placeholder="Personal 1" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="calificacionSelect">Calificacion</label>
                                            <select class="form-control" id="calificacionSelect" disabled>
                                              <option>1 estrella</option>
                                              <option>2 estrella</option>
                                              <option>3 estrella</option>
                                              <option>4 estrella</option>
                                              <option>5 estrella</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="solucionInput">Solución temporal</label>
                                            <input type="text" class="form-control" id="solucionInput" placeholder="solucion" readonly>
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
                                            <textarea class="form-control" id="observacionesTextarea" rows="3" disabled></textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="conclusionesTextarea">Conclusiones</label>
                                            <textarea class="form-control" id="conclusionesTextarea" rows="3" disabled></textarea>
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
                        <button type="button" class="btn btn-primary">Guardar producto</button>
                      </div>
                      <!-- FIN-MODAL-FOOTER -->
                    </div>
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
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <!-- ================================= MODAL CUERPO ================================= -->
                    <div class="modal-body">
                        <div class="row col-12">
                            <div class="card-body mb-12 col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="persona-contacto-input" class="form-control-label">Persona Contacto</label>
                                            <input class="form-control" type="text" value="John Snow" id="persona-contacto-input">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="modulos-input">Modulos</label><br>
                                            <input type="text" class="form-control" value="CeaConta, CeaFinanzas, CeaPlantillas" data-toggle="tags" id="modulos-input" />
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="mediosSelect">Medios</label>
                                            <select class="form-control" id="mediosSelect">
                                              <option>Medio 1</option>
                                              <option>Medio 2</option>
                                              <option>Medio 3</option>
                                              <option>Otro</option>
                                            </select>
                                          </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="llamadaDetTextarea">Detalle llamada</label>
                                            <textarea class="form-control" id="llamadaDetTextarea" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="eventosSelect">Eventos</label>
                                            <select class="form-control" id="eventosSelect">
                                                <option>Evento 1</option>
                                                <option>Evento 2</option>
                                                <option>Evento 3</option>
                                                <option>Otro</option>
                                            </select>
                                          </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="example-date-input" class="form-control-label">Fecha evento</label>
                                            <input class="form-control" type="date" value="2018-11-23" id="example-date-input">
                                        </div>                                    
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="eventoTextarea">Detalle evento</label>
                                            <textarea class="form-control" id="eventoTextarea" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="personalInput">Personal</label>
                                            <input type="text" class="form-control" id="personalInput" placeholder="Personal 1">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="calificacionSelect">Calificacion</label>
                                            <select class="form-control" id="calificacionSelect">
                                              <option>1 estrella</option>
                                              <option>2 estrella</option>
                                              <option>3 estrella</option>
                                              <option>4 estrella</option>
                                              <option>5 estrella</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="solucionInput">Solución temporal</label>
                                            <input type="text" class="form-control" id="solucionInput" placeholder="solucion">
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
                                            <textarea class="form-control" id="observacionesTextarea" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="conclusionesTextarea">Conclusiones</label>
                                            <textarea class="form-control" id="conclusionesTextarea" rows="3"></textarea>
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
                      <button type="button" class="btn btn-primary">Guardar producto</button>
                    </div>
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
                                <th>Tipo Persona</th>
                                <th>Perona contacto</th>
                                <th>Det.llamada</th>
                                <th>Fecha llamada</th>
                                <th>Calificación</th>
                                <th>Estado</th>
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
<script src="{{ asset('ajax/ajaxhistorial.js') }}"></script>
@endsection

<script language="javascript">
    function doSearch()
    {
        const tableReg = document.getElementById('datos');
        const searchText = document.getElementById('searchTerm').value.toLowerCase();
        let total = 0;

        // Recorremos todas las filas con contenido de la tabla
        for (let i = 1; i < tableReg.rows.length; i++) {
            // Si el td tiene la clase "noSearch" no se busca en su cntenido
            if (tableReg.rows[i].classList.contains("noSearch")) {
                continue;
            }

            let found = false;
            const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
            // Recorremos todas las celdas
            for (let j = 0; j < cellsOfRow.length && !found; j++) {
                const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                // Buscamos el texto en el contenido de la celda
                if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
                    found = true;
                    total++;
                }
            }
            if (found) {
                tableReg.rows[i].style.display = '';
            } else {
                // si no ha encontrado ninguna coincidencia, esconde la
                // fila de la tabla
                tableReg.rows[i].style.display = 'none';
            }
        }

        // mostramos las coincidencias
        const lastTR=tableReg.rows[tableReg.rows.length-1];
        const td=lastTR.querySelector("td");
        lastTR.classList.remove("hide", "red");
        if (searchText == "") {
            lastTR.classList.add("hide");
        } else if (total) {
            td.innerHTML="Se ha encontrado "+total+" coincidencia"+((total>1)?"s":"");
        } else {
            lastTR.classList.add("red");
            td.innerHTML="No se han encontrado coincidencias";
        }
    }
</script>

<style>
    #datos tr.noSearch {background:White;font-size:0.8em;}
    #datos tr.noSearch td {padding-top:10px;text-align:right;}
    .hide {display:none;}
    .red {color:Red;}
</style>