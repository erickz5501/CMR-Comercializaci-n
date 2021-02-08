@extends('layout')
@section('title', 'Comercializacion')
@section('pagina', 'COMERCIALIZACION')

@section('content')

<div class="card-header">
    <div class="row align-items-center">
        <div class="col-8">
            <form>
                <input class="form-control" placeholder="Buscar evento..." type="text" id="searchTerm" onkeyup="doSearch()" />
            </form>
        </div>
        <div class="col-4 text-right">
            <a type="button" href="#" onclick="" class="btn btn btn-primary" data-toggle="modal" data-target="#registroModalComercializacion"><i class="fas fa-plus-circle"></i> Agregar registro</a>
        </div>
    </div>
</div>
<!-- ================================= MODAL Registro ================================= -->
<div class="modal fade" id="registroModalComercializacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <form id="formulario_comercializacion">
            @csrf
            <div class="modal-body">
                {{-- input ID oculto --}}
                <input type="hidden" id="idhistorial_comercializacion" name="idhistorial_comercializacion" />
                <input type="hidden" id="idcotizacion" name="idcotizacion" value="3" />
                <div class="row col-12">
                    <div class="card-body mb-12 col-12 border">

                        <div class="row">
                            <div class="col-10">
                                <div class="form-group">
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="persona_buscar_input" name="persona_buscar_input" placeholder="Buscar persona" >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <button type="button" class="btn btn-success">Agregar</button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="persona_contacto_input" name="persona_contacto_input" placeholder="Persona Contacto" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="">Actividad</label>
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="actividad_input" name="actividad_input" placeholder="Actividad" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="select_modal_medios">Medios</label>
                                    <select style="color: black !important; font-weight: bold !important;" class="form-control" id="select_modal_medios" name="select_modal_medios" data-toggle="select" required>
                                    
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="select_modal_modulos-input">Modulos</label>
                                    <select style="color: black !important; font-weight: bold !important;" name="select_modal_modulos" id="select_modal_modulos" class="form-control multi_select" data-toggle="select" required>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="persona_atencion_input" name="persona_atencion_input" placeholder="Persona Atencion" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="llamadaDetTextarea">Detalle llamada</label>
                                    <textarea class="form-control" id="llamadaDetTextarea" name="llamadaDetTextarea" rows="3" style="color: black !important; font-weight: bold !important;"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="eventosSelect">Evento</label>
                                    <select class="form-control" id="select_modal_eventos" name="select_modal_eventos" data-toggle="select" required style="color: black !important; font-weight: bold !important;">
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="example-date-input" class="form-control-label">Fecha evento</label>
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="date" value="2018-11-23" id="example_date_input" name="example_date_input" required>
                                </div>                                    
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="eventoTextarea">Detalle evento</label>
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="evento_input" name="evento_input" placeholder="Detalle evento" required>
                                    {{-- <textarea class="form-control" id="eventoTextarea" name="eventoTextarea" rows="3" style="color: black !important; font-weight: bold !important;"></textarea> --}}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
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
                                    <label for="eventoTextarea">Avance</label>
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="avance_input" name="avance_input" placeholder="Detalle evento" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="eventoTextarea">Por Cobrar</label>
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="cobrar_input" name="cobrar_input" placeholder="Detalle evento" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <form>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFileLang" lang="en">
                                    <label class="custom-file-label" for="customFileLang">Select file</label>
                                </div>
                            </form>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for=""></label>
                                    <textarea class="form-control" id="conclusionessTextarea" name="conclusionessTextarea" rows="3" style="color: black !important; font-weight: bold !important;">Observaciones</textarea>
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
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Nickname</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody class="list" id="lista_comercializacion"></tbody>
        </table>
    </div>
</div>

<div class="card-footer py-4"></div>
    
@endsection

<script language="javascript">
    function doSearch(){
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
            const cellsOfRow = tableReg.rows[i].getElementsByTagName("td");
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
                tableReg.rows[i].style.display = "";
            } else {
                // si no ha encontrado ninguna coincidencia, esconde la
                // fila de la tabla
                tableReg.rows[i].style.display = "none";
            }
        }

        // mostramos las coincidencias
        const lastTR = tableReg.rows[tableReg.rows.length - 1];
        const td = lastTR.querySelector("td");
        lastTR.classList.remove("hide", "red");
        if (searchText == "") {
            lastTR.classList.add("hide");
        } else if (total) {
            td.innerHTML = "Se ha encontrado " + total + " coincidencia" + (total > 1 ? "s" : "");
        } else {
            lastTR.classList.add("red");
            td.innerHTML = "No se han encontrado coincidencias";
        }
    }
</script>

@section('js')
<script src="{{ asset('funciones/crud.js')}}"></script>
<script src="{{ asset('ajax/ajaxcomercializacion.js')}}"></script>
@endsection