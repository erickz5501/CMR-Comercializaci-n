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
                                    <h5 class="mb-0">#Datos generales</h5>
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
                                                    <label for="" style="color: white">.</label><br>
                                                    <a type="button" href="#" class="btn btn btn-success" onclick="limpiar_interesado();" data-toggle="modal" data-target="#registroModalInteresado">
                                                        <i class="fas fa-plus-circle"></i>
                                                    </a>
                                                </div>
                                            </div> --}}
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <select class="form-control custom-select" name="select_modal_clientes" id="select_modal_clientes" autocomplete="off" required data-toggle="">
                                                        
                                                    </select>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-default" type="button" id="button-addon2" onclick="limpiar_interesado();" data-toggle="modal" data-target="#registroModalInteresado">
                                                            <i class="fas fa-plus-circle"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Persona contacto</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="persona_contacto_input" name="persona_contacto_input" placeholder="Persona Contacto" required>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="">Actividad</label>
                                                    <div class="input-group" id>
                                                        <select style="color: rgb(0, 0, 0) !important; font-weight: bold !important;" class="form-control" id="select_modal_actividad" name="select_modal_actividad" data-toggle="" required>
                                                            <option selected="selected" value="0">Actividad</option>
                                                        </select>
                                                        <span class="input-group-addon input-group-append">
                                                            <button class="btn btn-default" type="button" id="button-addon2" data-toggle="modal" data-target="#registroModalActividad">
                                                                <i class="fas fa-plus-circle"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                    <label for="select_modal_medios">Medios</label>
                                                    <div class="input-group" id>
                                                        <select style="color: rgb(0, 0, 0) !important; font-weight: bold !important;" class="form-control" id="select_modal_medios" name="select_modal_medios" data-toggle="" required>
                                                            <option selected="selected" value="0">Medios</option>
                                                        </select>
                                                        <span class="input-group-addon input-group-append">
                                                            <button class="btn btn-default" type="button" id="button-addon2" onclick="modal_medios();">
                                                                <i class="fas fa-plus-circle"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="turno">Modulos</label>
                                                            <div class="input-group">
                                                                <select style="color: black !important; font-weight: bold !important;" name="select_modal_modulos" id="select_modal_modulos" class="form-control multi_select" data-toggle="select">
                                                        
                                                                </select>
                                                                {{-- <span class="input-group-addon input-group-append">
                                                                    <button class="btn btn-default" type="button" id="button-addon2" data-toggle="modal" data-target="#registroModalActividad">
                                                                        <i class="fas fa-plus-circle"></i>
                                                                    </button>
                                                                </span> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="cant_licencias">Licencias</label>
                                                            <input class="form-control numero_valor" placeholder="licencias" type="number" name="cant_licencias" id="cant_licencias">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <a href="javascript:void(0)" type="button" class="btn btn-default btn-sm btn-block " onclick="add_detalle()">
                                                            <i class="fas fa-arrow-down"></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="row my-2">
                                                    <div class="col-md-12">
                                                        <table class="table align-items-center table-flush table-sm" id="tabla_detalle_modulos">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th scope="col" class="sort" data-sort="name">Modulo</th>
                                                                    <th scope="col" class="sort" data-sort="budget">Licencias</th>
                                                                    <th scope="col" class="sort" data-sort="status">Accion</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="list">
                                                               
                                                                
                    
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                
                                        {{-- <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="persona_atencion_input" name="persona_atencion_input" placeholder="Persona Atencion" required>
                                                </div>
                                            </div>
                                        </div> --}}
                
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
                                    <h5 class="mb-0">#Datos de cotizacion</h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4">
                                                <label for="eventosSelect">Evento</label>
                                                <div class="input-group" id>
                                                    <select class="form-control" id="select_modal_eventos" name="select_modal_eventos" data-toggle="" required style="color: black !important; font-weight: bold !important;">
                                                        
                                                    </select>
                                                    <span class="input-group-addon input-group-append">
                                                        {{-- <a type="button" href="#" class="btn btn-success" id="button-addon2" onclick="limpiar_interesado();" data-toggle="modal" data-target="#registroModalInteresado">
                                                            <i class="fas fa-plus-circle"></i>
                                                        </a> --}}
                                                        <button class="btn btn-default" type="button" id="button-addon2" onclick="limpiar_evento();" data-toggle="modal" data-target="#registroModalEvento">
                                                            <i class="fas fa-plus-circle"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                            {{-- <div class="col-4">
                                                <div class="form-group">
                                                    <label for="example-date-input" class="form-control-label">Fecha evento</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="date" value="2018-11-23" id="example_date_input" name="example_date_input" required>
                                                </div>                                    
                                            </div> --}}
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="eventoTextarea">Detalle evento</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="evento_input" name="evento_input" placeholder="Detalle evento" required>
                                                    {{-- <textarea class="form-control" id="eventoTextarea" name="eventoTextarea" rows="3" style="color: black !important; font-weight: bold !important;"></textarea> --}}
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-10">
                                                <div class="form-group">
                                                    <label for="">Cotizacion</label>
                                                    <select class="form-control" id="select_modal_cotizacion" name="select_modal_cotizacion" data-toggle="select" required style="color: black !important; font-weight: bold !important;">
                                                        
                                                    </select>
                                                    {{-- <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="numero_cotizacion" name="numero_cotizacion" placeholder="123456" required> --}}
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="" style="color: white">.</label><br>
                                                    <a type="button" href="#" class="btn btn btn-success" onclick="modal_cotizacion();" data-toggle="modal" data-target="#registroModalCotizacion">Cotizacion</a>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label for="personalInput">Personal</label>
                                                <div class="input-group">
                                                    <select class="form-control" id="select_modal_personal" name="select_modal_personal" data-toggle="" required style="color: black !important; font-weight: bold !important;">
                                                        
                                                    </select>
                                                    <span class="input-group-addon input-group-append">
                                                        {{-- <a type="button" href="#" class="btn btn-success" id="button-addon2" onclick="limpiar_interesado();" data-toggle="modal" data-target="#registroModalInteresado">
                                                            <i class="fas fa-plus-circle"></i>
                                                        </a> --}}
                                                        <button class="btn btn-default" type="button" id="button-addon2" onclick="();" data-toggle="modal" data-target="#registroModalPersonal">
                                                            <i class="fas fa-plus-circle"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div class="row">
                                            {{-- <div class="col-4">
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
                                            </div> --}}

                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="eventoTextarea">Avance</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="avance_input" name="avance_input" placeholder="Avance evento">
                                                </div>
                                            </div>

                                            {{-- <div class="col-4">
                                                <div class="form-group">
                                                    <label for="eventoTextarea">Por Cobrar</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="cobrar_input" name="cobrar_input" placeholder="Detalle evento" required>
                                                </div>
                                            </div> --}}
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
            </div>
            <!-- FIN-MODAL-BODY -->

            <!-- MODAL FOOTER -->
            <div class="modal-footer" style="padding-right: 1.5rem !important;">
                <button type="submit" class="btn btn-warning" id="generar_n_comercializacion" style="align-items: left !important;"><i class="fas fa-plus"> </i> Generar registro</button>
                <button type="submit" class="btn btn-success"><i class="far fa-save"> </i> Editar registro</button>
            </div>
        </form>
        <!-- FIN-MODAL-FOOTER -->
      </div>
    </div>
</div>
<!-- FIN-MODAL -->