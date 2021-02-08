@extends('layout')
@section('title', 'Reclamos')
@section('pagina', 'RECLAMOS')

@section('content')
<div class="card-header">
    <div class="row align-items-center">
        <div class="col-8">
            <form>
                <input class="form-control" placeholder="Buscar evento..." type="text" id="searchTerm" onkeyup="doSearch()" />
            </form>
        </div>
        <div class="col-4 text-right">
            <a type="button" href="#" onclick="" class="btn btn btn-primary" data-toggle="modal" data-target="#registroModalReclamo"><i class="fas fa-plus-circle"></i> Agregar reclamo</a>
        </div>
    </div>
</div>
<!-- ================================= MODAL Registro ================================= -->
<div class="modal fade" id="registroModalReclamo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <!-- ================================= MODAL TITULO ================================= -->
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar reclamo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"> <i class="far fa-times-circle"></i> </span>
            </button>
        </div>

        <!-- ================================= MODAL CUERPO ================================= -->
        <form id="formulario_reclamo">
            @csrf
            <div class="modal-body">
                {{-- input ID oculto --}}
                <input type="hidden" id="idhistorial_comercializacion" name="idhistorial_comercializacion" />
                <div class="row col-12">
                    <div class="card-body mb-12 col-12">

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
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="ruc_dni_input" name="ruc_dni_input" placeholder="RUC O DNI" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <select style="color: black !important; font-weight: bold !important;" class="form-control" id="select_modal_medios" name="select_modal_medios" data-toggle="select" required>
                                    <option>Medios</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <select style="color: black !important; font-weight: bold !important;" name="select_modal_modulos" id="select_modal_modulos" class="form-control multi_select" data-toggle="select" required>
                                        <option>Modulos</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="llamadaDetTextarea">Detalle reclamo</label>
                                    <textarea class="form-control" id="reclamoDetTextarea" name="reclamoDetTextarea" rows="3" style="color: black !important; font-weight: bold !important;"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="solucion_input" name="solucion_input" placeholder="Tipo solución" >
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="causa_input" name="causa_input" placeholder="Causa" >
                                </div>                                    
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div class="custom-control custom-radio mb-3">
                                        <input type="radio" id="reclamo_procede" name="reclamo_procede" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio1">Reclamo procede?</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="accion_tomar_input" name="accion_tomar_input" placeholder="Acción a tomar" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <select class="form-control" id="select_modal_personal_responsable" name="select_modal_personal_responsable" data-toggle="select" required style="color: black !important; font-weight: bold !important;">
                                        <option>Personal Responsable</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="date" value="2018-11-23" id="date_input" name="date_input" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="date" value="2018-11-23" id="date_input2" name="date_input2" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="solucion_minutos_input" name="solucion_minutos_input" placeholder="Solucion(Minutos)" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="solucion_dias_input" name="solucion_dias_input" placeholder="Solucion(Dias)" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for=""></label>
                                    <textarea class="form-control" id="EvidenciaTextarea" name="EvidenciaTextarea" rows="3" style="color: black !important; font-weight: bold !important;">Evidencia de la verificacion de conformidad de accion tomada
                                    </textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="emite_correctivo_input" name="emite_correctivo_input" placeholder="¿Se emite correctivo?" required>
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
            <tbody class="list" id="lista_reclamos"></tbody>
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
