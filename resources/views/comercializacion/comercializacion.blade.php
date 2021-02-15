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
            <a type="button" href="#" onclick="limpiar_comercializacion();" class="btn btn btn-primary" data-toggle="modal" data-target="#registroModalComercializacion"><i class="fas fa-plus-circle"></i> Agregar registro</a>
        </div>
    </div>
</div>

<!-- ================================= MODAL Detalle================================= -->
<div class="modal fade" id="ModalDetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal" role="document" id="registro_modal">
        <!-- Contenido del modal /  -->
        
    </div>
</div>
<!-- FIN-MODAL -->

<!-- ================================= MODAL Registro ================================= -->
<div class="modal fade" id="registroModalComercializacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <!-- ================================= MODAL TITULO ================================= -->
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar registro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red;"></i> </span>
            </button>
        </div>

        <!-- ================================= MODAL CUERPO ================================= -->
        <form id="formulario_comercializacion">
            @csrf
            <div class="modal-body" style="padding-top: 0px !important; padding-bottom:0px !important; padding-right: 0px !important">
                {{-- input ID oculto --}}
                <input type="hidden" id="idcomercializacion" name="idcomercializacion"/>
                <input type="hidden" id="idusers" name="idusers" value="2"/>
                <div class="row col-12">
                    
                    <div class="card-body mb-12 col-12" style="padding-top: 0px !important; padding-bottom:0px !important; ">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h5 class="mb-0">#1</h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-10">
                                                <div class="form-group">
                                                    <label for="select_modal_medios">Cliente</label>
                                                    <select style="color: rgb(0, 0, 0) !important; font-weight: bold !important;" class="form-control" id="select_modal_clientes" name="select_modal_clientes" data-toggle="select" required>
                                                        <option selected="selected" value="0">Cliente</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="" style="color: white">.</label><br>
                                                    <button type="button" class="btn btn-success">Agregar</button>
                                                </div>
                                            </div>

                                            {{-- <div class="col-12">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <select style="color: rgb(0, 0, 0) !important; font-weight: bold !important;" class="form-control" id="select_modal_clientes" name="select_modal_clientes" data-toggle="select" required>
                                                            <option selected="selected" value="0">Cliente</option>
                                                        </select>
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-success"><i class="fas fa-plus"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}

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
                                                    <input style="color: rgb(0, 0, 0) !important; font-weight: bold !important;" class="form-control" type="text" id="actividad_input" name="actividad_input" placeholder="Actividad" required>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="select_modal_medios">Medios</label>
                                                    <select style="color: rgb(0, 0, 0) !important; font-weight: bold !important;" class="form-control" id="select_modal_medios" name="select_modal_medios" data-toggle="select" required>
                                                        <option selected="selected" value="0">Medios</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="select_modal_modulos-input">Modulos</label>
                                                    <select style="color: black !important; font-weight: bold !important;" multiple name="select_modal_modulos" id="select_modal_modulos" class="form-control multi_select" data-toggle="select" required>
                                                        
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
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="">Numero Cotizacion</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="numero_cotizacion" name="numero_cotizacion" placeholder="123456" required>
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
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="">Observaciones</label>
                                                    <textarea class="form-control" id="conclusionessTextarea" name="conclusionessTextarea" rows="3" style="color: black !important; font-weight: bold !important;">Observaciones</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        {{-- <div class="row">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFileLang" lang="en">
                                 <label class="custom-file-label" for="customFileLang">Select file</label>
                            </div>
                        </div> --}}

                    </div>
                </div>
            <!-- ================================= FIN-CUADRO-BRODER ================================= -->
            </div>
            <!-- FIN-MODAL-BODY -->

            <!-- MODAL FOOTER -->
            <div class="modal-footer" style="padding-right: 1.5rem !important"">
                <button type="submit" class="btn btn-success"><i class="far fa-save"> </i> Guardar registro</button>
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
                    <th>Persona Contacto</th>
                    <th>Actividad</th>
                    <th>Fecha evento</th>
                    <th>Calificacion</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody class="list" id="lista_comercializacion"></tbody>
        </table>
    </div>
</div>
    
@endsection

@section('js')
<script src="{{ asset('funciones/crud.js')}}"></script>
<script src="{{ asset('ajax/ajaxcomercializacion.js')}}"></script>
@endsection
<link rel="stylesheet" href="{{ asset('css/search.css')}}" type="text/css">                 