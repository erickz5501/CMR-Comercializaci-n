<div class="modal fade" id="registroModalComercializacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
            
                <div class="modal-content">
                    <!-- ================================= MODAL TITULO ================================= -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar comercialización</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red;"></i> </span>
                        </button>
                    </div>

                    <!-- ================================= MODAL CUERPO ================================= -->
                    
                        <div class="modal-body" style="padding-top: 0px !important; padding-bottom:0px !important; padding-right: 0px !important">
                            <form id="formulario_comercializacion">
                                @csrf
                            {{-- input ID oculto --}}
                            <input type="hidden" id="idcomercializacion" name="idcomercializacion"/>
                            <input type="hidden" id="idusers" name="idusers" value="2"/>
                            <div class="row col-12">
                                <div class="card-body mb-12 col-12" style="padding-top: 0px !important; padding-bottom:0px !important; ">

                                    <div class="nav-wrapper">
                                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link mb-sm-3 mb-md-0 active" id="btn_arriba_1"  href="#" data-toggle="tab" role="tab" aria-controls="tabs-icons-text-1" aria-selected="false">
                                                    <i class="fas fa-digital-tachograph"></i> Datos generales
                                                </a>
                                            </li>

                                            <li class="nav-item" >
                                                <a  class="nav-link mb-sm-3 mb-md-0 disabled" id="btn_arriba_2" href="#" data-toggle="tab"  role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">
                                                    <i class="fas fa-paperclip"></i> Datos de cotizacion
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="card shadow">
                                        <div class="card-body">
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="tabs-icons-text-1"  role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label for="select_modal_clientes"><sup class="text-danger font-weight-bold">*</sup> Cliente</label>
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <select class="form-control" id="select_modal_clientes" name="select_modal_clientes">
                                                                                    
                                                                    </select>
                                                                    <span class="input-group-addon input-group-append">
                                                                        <button class="btn btn-default" type="button"  onclick="modal_interesado();" data-toggle="tooltip" data-html="true" title="Agregar un cliente/interesado">
                                                                            <i class="fas fa-plus-circle"></i>
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                                <div id="invlid_cliente" class="invalid-feedback "> Por favor Seleccione un CLIENTE</div>
                                                            </div>
                                                        </div>
                                                    </div>
                            
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label for="">Persona contacto</label>
                                                                <input style="color: black !important; font-weight: bold !important;" class="form-control " type="text" id="persona_contacto_input" name="persona_contacto_input" placeholder="Persona Contacto" required>
                                                                 
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <label for="select_modal_clientes"><sup class="text-danger font-weight-bold">*</sup> Actividad</label>
                                                            <div class="form-group">
                                                                <div class="input-group" id="datetimepicker1">
                                                                    <select style="color: rgb(0, 0, 0) !important; font-weight: bold !important;" class="form-control" id="select_modal_actividad" name="select_modal_actividad" data-toggle="" required>
                                                                        
                                                                    </select>
                                                                    <span class="input-group-addon input-group-append">
                                                                        <button class="btn btn-default" type="button" onclick="modal_actividad();"   data-toggle="tooltip" data-html="true" title="Agregar una actividad.">
                                                                            <i class="fas fa-plus-circle"></i>
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                                <div id="invlid_actividad" class="invalid-feedback  "> Por favor Seleccione una ACTIVIDAD</div>
                                                            </div>
                                                        </div>

                                                        <div class="col-4">
                                                            <label for="select_modal_clientes"><sup class="text-danger font-weight-bold">*</sup> Medios</label>
                                                            <div class="form-group">
                                                                <div class="input-group" id="datetimepicker1">
                                                                    <select style="color: rgb(0, 0, 0) !important; font-weight: bold !important;" class="form-control" id="select_modal_medios" name="select_modal_medios" data-toggle="" required>
                                                                        <option selected="selected" value="0">Medios</option>
                                                                    </select>
                                                                    <span class="input-group-addon input-group-append">
                                                                        <button class="btn btn-default" type="button" onclick="modal_medios();"   data-toggle="tooltip" data-html="true" title="Agregar un medio.">
                                                                            <i class="fas fa-plus-circle"></i>
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                                <!-- MENSAJE DE ERROR -->
                                                                <div id="invlid_medio" class="invalid-feedback "> Por favor Seleccione un MEDIO</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row border" style="margin-bottom: 10px; padding: 20px; border-radius: 10px; border:1px solid #000000 !important">
                                                        <div class="col-6">
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="turno">Modulos</label>                                                                         
                                                                        <select style="color: black !important; font-weight: bold !important;" name="select_modal_modulos" id="select_modal_modulos" class="form-control">
                                                                
                                                                        </select>                                                                         
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="cant_licencias">Licencias</label>
                                                                        <input class="form-control numero_valor" placeholder="licencias" type="number" name="cant_licencias" id="cant_licencias" min="1" pattern="^[0-9]+">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <a href="javascript:void(0)" type="button" class="btn btn-default btn-sm btn-block " onclick="add_detalle()" data-toggle="tooltip" data-html="true" title="Insertar modulo a la tabla.">
                                                                        <i class="fas fa-arrow-right"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                    
                                                        <div class="col-6">
                                                            <div class="row my-2">
                                                                <div class="col-md-12">
                                                                    <sup class="text-success font-weight-bold">* Estos son los modulos a registrar:</sup>
                                                                    <table class="table align-items-center">
                                                                        <thead class="thead-light">
                                                                            <tr>
                                                                                <th scope="col" class="sort" >Modulo</th>
                                                                                <th scope="col" class="sort" >Licencias</th>
                                                                                <th scope="col" class="sort" >Accion</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody class="list" id="tabla_detalle_modulos">
                                                                            
                                                                        </tbody>
                                                                    </table>
                                                                </div>
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

                                                <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <label for="select_modal_clientes"><sup class="text-danger font-weight-bold">*</sup> Evento</label>
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <select class="form-control" id="select_modal_evento" name="select_modal_evento" data-toggle="" required style="color: black !important; font-weight: bold !important;">
                                                                    
                                                                    </select>
                                                                    <span class="input-group-addon input-group-append">
                                                                        <button class="btn btn-default" type="button"   onclick="modal_evento();" data-toggle="tooltip" data-html="true" title="Agregar un evento.">
                                                                            <i class="fas fa-plus-circle"></i>
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label for="eventoTextarea">Detalle evento</label>
                                                                <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="evento_input" name="evento_input" placeholder="Detalle evento" required>
                                                                {{-- <textarea class="form-control" id="eventoTextarea" name="eventoTextarea" rows="3" style="color: black !important; font-weight: bold !important;"></textarea> --}}
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label for="eventoTextarea">Avance</label>
                                                                <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="avance_input" name="avance_input" placeholder="Avance evento">
                                                            </div>
                                                        </div>
                                                    </div>
                                            
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label for="select_modal_clientes"><sup class="text-danger font-weight-bold">*</sup> Cotización</label>
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <select class="form-control" id="select_modal_cotizacion" name="select_modal_cotizacion" required style="color: black !important; font-weight: bold !important;">
                                                                        
                                                                    </select>
                                                                    <span class="input-group-addon input-group-append">
                                                                        <button class="btn btn-default" type="button"   data-toggle="tooltip" data-html="true" title="Agregar nueva cotización." onclick="modal_cotizacion();">
                                                                            <i class="fas fa-plus-circle"></i>
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <label for="select_modal_clientes"><sup class="text-danger font-weight-bold">*</sup> Personal</label>
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <select class="form-control" id="select_modal_personal" name="select_modal_personal" data-toggle="" required style="color: black !important; font-weight: bold !important;">
                                                                    
                                                                    </select>
                                                                    <span class="input-group-addon input-group-append">
                                                                        <button class="btn btn-default" type="button" onclick="modal_personal();"   data-toggle="tooltip" data-html="true" title="Agregar nuevo personal.">
                                                                            <i class="fas fa-plus-circle"></i>
                                                                        </button>
                                                                    </span>
                                                                </div>
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

                                </div>
                            </div>
                        <!-- ================================= FIN-CUADRO-BRODER ================================= -->
                        </form>
                        </div>
                        <!-- FIN-MODAL-BODY -->

                        <!-- MODAL FOOTER -->
                        <div class="modal-footer" style="padding-right: 1.5rem !important;">
                            <button class="btn btn-primary" id="sgt_form"     aria-selected="false">
                                <i class="fas fa-paperclip"></i> Siguiente
                            </button>

                            <button class="btn btn-primary" id="ant_form"     aria-selected="false">
                                <i class="fas fa-paperclip"></i> Anterior
                            </button>

                            <button type="submit" class="btn btn-warning" id="generar_n_comercializacion" style="align-items: left !important;">
                                <i class="fas fa-plus"> </i> Generar registro
                            </button>

                            <button type="submit" class="btn btn-success" id="guardar_registro">
                                <i class="far fa-save"> </i> Guardar registro
                            </button>
                        </div>
                    
                    <!-- FIN-MODAL-FOOTER -->
                </div>
            
    </div>
    
</div>
<!-- FIN-MODAL -->