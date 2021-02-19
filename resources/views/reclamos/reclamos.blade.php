@extends('layout')
@section('title', 'Reclamos')
@section('pagina', 'RECLAMOS')

@section('content')
<div class="card-header">
    <div class="row align-items-center">
        <div class="col-8">
            <form>
                <input class="form-control" placeholder="Buscar reclamo..." type="text" id="searchTerm" onkeyup="doSearch()" />
            </form>
        </div>
        <div class="col-4 text-right">
            <a type="button" href="#" onclick="limpiar_reclamo();" class="btn btn btn-primary" data-toggle="modal" data-target="#registroModalReclamo"><i class="fas fa-plus-circle"></i> Agregar reclamo</a>
        </div>
    </div>
</div>

<!-- ================================= MODAL Detalle================================= -->
<div class="modal fade" id="ModalDetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" id="reclamo_modal">
        <!-- Contenido del modal /  -->
        
    </div>
</div>
<!-- FIN-MODAL -->

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
            <div class="modal-body" style="padding-top: 0px !important; padding-bottom:0px !important; padding-right: 0px !important">
                {{-- input ID oculto --}}
                <input type="hidden" id="idreclamos" name="idreclamos" />
                <div class="row col-12">
                    <div class="card-body mb-12 col-12"  style="padding-top: 0px !important; padding-bottom:0px !important; padding-right: 0px !important" >
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h5 class="mb-0">#1</h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="row">
                                            {{-- <div class="col-10">
                                                <div class="form-group">
                                                    <label for="select_modal_medios">Cliente</label>
                                                    <select style="color: rgb(0, 0, 0) !important; font-weight: bold !important;" class="form-control" id="select_modal_clientes" name="select_modal_clientes" data-toggle="select" required>
                                                        <option selected="selected" value="0">Cliente</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="">.</label><br>
                                                    <button type="button" class="btn btn-success">Agregar</button>
                                                </div>
                                            </div> --}}
                                            <div class="col-12">
                                                <div class="input-group form-group" id="">
                                                    <select class="form-control" name="select_modal_clientes" id="select_modal_clientes" autocomplete="off" required data-toggle="">
                                                        
                                                    </select>
                                                    <span class="input-group-addon input-group-append">
                                                        <button class="btn btn-success" type="button" id="button-addon2">
                                                            <i class="fas fa-plus-circle"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Persona Contacto</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="persona_contacto_input" name="persona_contacto_input" placeholder="Persona Contacto" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">RUC o DNI</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="ruc_dni_input" name="ruc_dni_input" placeholder="RUC O DNI" required>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Medios</label>
                                                    <select style="color: black !important; font-weight: bold !important;" class="form-control" id="select_modal_medios" name="select_modal_medios" data-toggle="select" required>
                                                    <option>Medios</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Modulos</label>
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
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <h5 class="mb-0">#2</h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Solucion</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="solucion_input" name="solucion_input" placeholder="Tipo solución" >
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Causa</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="causa_input" name="causa_input" placeholder="Causa" >
                                                </div>                                    
                                            </div>
                                            <div class="col-4">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="reclamo_procede" name="reclamo_procede">
                                                    <label class="custom-control-label" for="reclamo_procede">Reclamo procede?</label>
                                                  </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-8">
                                                <div class="form-group">
                                                    <label for="">Accion</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="accion_tomar_input" name="accion_tomar_input" placeholder="Acción a tomar" required>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Personal responsable</label>
                                                    <select class="form-control" id="select_modal_personal_responsable" name="select_modal_personal_responsable" data-toggle="select" required style="color: black !important; font-weight: bold !important;">
                                                        <option>Personal Responsable</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Fecha compromiso</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="date" value="2018-11-23" id="fecha_compromiso" name="fecha_compromiso" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Fecha solucion</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="date" value="2018-11-23" id="fecha_solucion" name="fecha_solucion" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Solucion(minutos)</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="solucion_minutos_input" name="solucion_minutos_input" placeholder="Solucion(Minutos)" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Solucion(dias)</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="solucion_dias_input" name="solucion_dias_input" placeholder="Solucion(Dias)" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="">Evidencia de verificacion</label>
                                                    <textarea class="form-control" id="evidenciaTextarea" name="evidenciaTextarea" rows="2" style="color: black !important; font-weight: bold !important;"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="">¿Se emite correctivo?</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="emite_correctivo_input" name="emite_correctivo_input" placeholder="¿Se emite correctivo?" required>
                                                </div>
                                            </div>
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
                    <th>Cliente</th>
                    <th>Persona contacto</th>
                    <th>Fecha compromiso</th>
                    <th>Fecha solucion</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody class="list" id="lista_reclamos"></tbody>
        </table>
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('funciones/crud.js')}}"></script>
<script src="{{ asset('ajax/ajaxreclamos.js')}}"></script>
@endsection
<link rel="stylesheet" href="{{ asset('css/search.css')}}" type="text/css">