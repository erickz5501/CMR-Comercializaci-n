<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <h5 class="mb-0">#Datos generales</h5>
        </div>
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">
                            <sup class="text-danger font-weight-bold">*</sup>
                            Cliente
                        </label>
                        <div class="input-group">
                            <select class="form-control custom-select" name="select_modal_clientes" id="select_modal_clientes" autocomplete="off" required data-toggle="">
                                <option value="" selected disabled>Seleccione un cliente </option>
                            </select>
                            <div class="input-group-append" data-toggle="modal" data-target="#registroModalInteresado">
                                <button class="btn btn-default" type="button" id="button-addon2" onclick="limpiar_interesado();" data-toggle="tooltip" data-html="true" title="Agregar un cliente/interesado">
                                    <i class="fas fa-plus-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Persona contacto</label>
                            <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="persona_contacto_input" name="persona_contacto_input" placeholder="Persona Contacto" required>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">
                                <sup class="text-danger font-weight-bold">*</sup>
                                Actividad
                            </label>
                            <div class="input-group" id>
                                <select style="color: rgb(0, 0, 0) !important; font-weight: bold !important;" class="form-control" id="select_modal_actividad" name="select_modal_actividad" data-toggle="" required>
                                    <option selected="selected" value="0">Actividad</option>
                                </select>
                                <div class="input-group-append" data-toggle="modal" data-target="#registroModalActividad">
                                    <button class="btn btn-default" type="button" id="button-addon2" data-toggle="tooltip" data-html="true" title="Agregar una actividad.">
                                        <i class="fas fa-plus-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <label for="select_modal_medios">
                            <sup class="text-danger font-weight-bold">*</sup>
                            Medios
                        </label>
                        <div class="input-group" id>
                            <select style="color: rgb(0, 0, 0) !important; font-weight: bold !important;" class="form-control" id="select_modal_medios" name="select_modal_medios" data-toggle="" required>
                                <option selected="selected" value="0">Medios</option>
                            </select>
                            <div class="input-group-append" onclick="modal_medios();">
                                <button class="btn btn-default" type="button" id="button-addon2" data-toggle="tooltip" data-html="true" title="Agregar un medio.">
                                    <i class="fas fa-plus-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row border" style="margin-bottom: 10px; padding: 20px; border-radius: 10px;">
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
                                <table class="table align-items-center" id="tabla_detalle_modulos">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="sort" >Modulo</th>
                                            <th scope="col" class="sort" >Licencias</th>
                                            <th scope="col" class="sort" >Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        
                                        
                                        
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
                        <label for="eventosSelect">
                            <sup class="text-danger font-weight-bold">*</sup>
                            Evento
                        </label>
                        <div class="input-group" id>
                            <select class="form-control" id="select_modal_eventos" name="select_modal_eventos" data-toggle="" required style="color: black !important; font-weight: bold !important;">
                                
                            </select>
                            <div class="input-group-append" data-toggle="modal" data-target="#registroModalEvento">
                                <button class="btn btn-default" type="button" id="button-addon2" onclick="limpiar_evento();" data-toggle="tooltip" data-html="true" title="Agregar un evento.">
                                    <i class="fas fa-plus-circle"></i>
                                </button>
                            </div>
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
                    <div class="col-4">
                        <div class="form-group">
                            <label for="eventoTextarea">Avance</label>
                            <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="avance_input" name="avance_input" placeholder="Avance evento">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-6">
                        <label for="Cotizacion">
                            <sup class="text-danger font-weight-bold">*</sup>
                            Cotización
                        </label>
                        <div class="input-group">
                            <select class="form-control" id="select_modal_cotizacion" name="select_modal_cotizacion" data-toggle="" required style="color: black !important; font-weight: bold !important;">
                                    
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-default" type="button" id="button-addon2" data-toggle="tooltip" data-html="true" title="Agregar nueva cotización." onclick="modal_cotizacion();">
                                    <i class="fas fa-plus-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="personalInput">
                            <sup class="text-danger font-weight-bold">*</sup>
                            Personal
                        </label>
                        <div class="input-group">
                            <select class="form-control" id="select_modal_personal" name="select_modal_personal" data-toggle="" required style="color: black !important; font-weight: bold !important;">
                                
                            </select>
                            <div class="input-group-append" data-toggle="modal" data-target="#registroModalPersonal">
                                <button class="btn btn-default" type="button" id="button-addon2" data-toggle="tooltip" data-html="true" title="Agregar nuevo personal.">
                                    <i class="fas fa-plus-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- <div class="row">
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
                            <label for="eventoTextarea">Por Cobrar</label>
                            <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="cobrar_input" name="cobrar_input" placeholder="Detalle evento" required>
                        </div>
                    </div>
                </div> --}}
                
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