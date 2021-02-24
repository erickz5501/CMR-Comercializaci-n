@extends('layout')
@section('title', 'Comercializacion')
@section('pagina', 'COMERCIALIZACION')

@section('content')

<div class="card-header">
    <div class="row align-items-center">
        <div class="col-8">
            <form>
                <input class="form-control" placeholder="Buscar registro..." type="text" id="searchTerm" onkeyup="doSearch()" />
            </form>
        </div>
        <div class="col-4 text-right">
            <a type="button" href="#" onclick="limpiar_comercializacion();" class="btn btn btn-primary" data-toggle="modal" data-target="#registroModalComercializacion"><i class="fas fa-plus-circle"></i> Agregar registro</a>
        </div>
    </div>
</div>

<!-- ================================= MODAL Detalle================================= -->
<div class="modal fade" id="ModalDetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" id="registro_modal">
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
                                                    <button type="button" class="btn btn-success">Agregar</button>
                                                </div>
                                            </div> --}}
                                            <div class="col-12">
                                                <div class="input-group form-group" id="">
                                                    <select class="form-control" name="select_modal_clientes" id="select_modal_clientes" autocomplete="off" required data-toggle="">
                                                        
                                                    </select>
                                                    <span class="input-group-addon input-group-append">
                                                        {{-- <button class="btn btn-success" type="button" id="button-addon2">
                                                            <i class="fas fa-plus-circle"></i>
                                                        </button> --}}
                                                        <a type="button" href="#" class="btn btn-success" onclick="limpiar_interesado();" data-toggle="modal" data-target="#registroModalInteresado">
                                                            <i class="fas fa-plus-circle"></i>
                                                        </a>
                                                    </span>
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
                                                    <input style="color: rgb(0, 0, 0) !important; font-weight: bold !important;" class="form-control" type="text" id="actividad_input" name="actividad_input" placeholder="Actividad" required>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="select_modal_medios">Medios</label>
                                                    <select style="color: rgb(0, 0, 0) !important; font-weight: bold !important;" class="form-control" id="select_modal_medios" name="select_modal_medios" data-toggle="select" required>
                                                        <option selected="selected" value="0">Medios</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                {{-- <div class="form-group">
                                                    <label for="select_modal_modulos-input">Modulos</label>
                                                    <select style="color: black !important; font-weight: bold !important;" multiple name="select_modal_modulos" id="select_modal_modulos" class="form-control multi_select" data-toggle="select" required>
                                                        
                                                    </select>
                                                </div> --}}
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="turno">Modulos</label>
                                                            <select style="color: black !important; font-weight: bold !important;" name="select_modal_modulos" id="select_modal_modulos" class="form-control multi_select" data-toggle="select" required>
                                                        
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="cant_licencias">Licencias</label>
                                                            <input class="form-control numero_valor" placeholder="licencias" type="number" name="cant_licencias"
                                                                id="cant_licencias">
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
                                                    <a type="button" href="#" class="btn btn btn-success" onclick="limpiar_cotizacion();" data-toggle="modal" data-target="#registroModalCotizacion">Agregar</a>
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
                    </div>
                </div>
            <!-- ================================= FIN-CUADRO-BRODER ================================= -->
            </div>
            <!-- FIN-MODAL-BODY -->

            <!-- MODAL FOOTER -->
            <div class="modal-footer" style="padding-right: 1.5rem !important;">
                <button type="submit" class="btn btn-success"><i class="far fa-save"> </i> Guardar registro</button>
            </div>
        </form>
        <!-- FIN-MODAL-FOOTER -->
      </div>
    </div>
</div>
<!-- FIN-MODAL -->

<!-- ================================= MODAL Registro COTIZACION================================= -->
<div class="modal fade border" id="registroModalCotizacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal" role="document">
      <div class="modal-content">
        <!-- ================================= MODAL TITULO ================================= -->
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar cotizacion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red;"></i> </span>
            </button>
        </div>

        <!-- ================================= MODAL CUERPO ================================= -->
        <form id="formulario_cotizacion">
            @csrf
            <div class="modal-body" style="padding-top: 0px !important; padding-bottom:0px !important; padding-right: 0px !important">
                {{-- input ID oculto --}}
                <input type="hidden" id="idcotizaciones" name="idcotizaciones"/>
                <div class="row col-12">
                    <div class="card-body mb-12 col-12" style="padding-top: 0px !important; padding-bottom:0px !important; ">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="nombre_cotizacion" name="nombre_cotizacion" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Ruta</label>
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="ruta_cotizacion" name="ruta_cotizacion" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- ================================= FIN-CUADRO-BRODER ================================= -->
            </div>
            <!-- FIN-MODAL-BODY -->

            <!-- MODAL FOOTER -->
            <div class="modal-footer" style="padding-right: 1.5rem !important"">
                <button type="submit" class="btn btn-success"><i class="far fa-save"> </i> Guardar cotizaion</button>
            </div>
        </form>
        <!-- FIN-MODAL-FOOTER -->
      </div>
    </div>
</div>
<!-- FIN-MODAL -->

<!-- ================================= MODAL Registro Interesado ================================= -->
<div class="modal fade" id="registroModalInteresado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <!-- ================================= MODAL TITULO ================================= -->
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Interesado</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red;"></i> </span>
            </button>
        </div>

        <!-- ================================= MODAL CUERPO ================================= -->
        <form id="formulario_interesado" method="POST">
            @csrf            
            <div class="modal-body" style="padding-top: 0px !important; padding-bottom:0px !important; padding-right: 0px !important">
                <div class="card-body mb-12 col-12" style="padding-top: 0px !important; padding-bottom:0px !important; ">
                    {{-- input ID oculto --}}
                    <input type="hidden" id="idclientes" name="idclientes" />
                    <div class="border" style="margin-bottom: 10px; padding: 20px; border-radius: 10px;">
                        
                        <div class="form-row">
                            <div class="col-4">
                                <label for="nombre_razon_social_input" class="form-control-label">Nombres/Razon social</label>
                                <div class="form-group">
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input style="color: black !important; font-weight: bold !important;" type="text" class="form-control" id="nombre_razon_social_input" name="nombre_razon_social_input" placeholder="Erick" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="nombre_comercial_input">Apellidos/Nombre comercial</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input style="color: black !important; font-weight: bold !important;" type="text" class="form-control" id="nombre_comercial_input" name="nombre_comercial_input" placeholder="Zumaeta" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="select_modal_giroNegocio">Giro de negocio</label>
                                    <select style="color: black !important; font-weight: bold !important;"  class="form-control" data-toggle="select" id="select_modal_giroNegocio" name="select_modal_giroNegocio" required>
                                        {{-- AQUI VAN LOS "OPTIONS" --}}
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="select_modal_tipoPersona">Tipo persona</label>
                                    <select style="color: black !important; font-weight: bold !important;" class="form-control" id="select_modal_tipoPersona" name="select_modal_tipoPersona" data-toggle="select" required>
                                        <option>Seleccione</option>
                                        <option style="color: green !important; font-weight: bold !important;" value="1">Interesado</option>
                                        <option value="2">Cliente</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="select_modal_tipoDocumento">Tipo documento</label>
                                    <select class="form-control" id="select_modal_tipoDocumento" name="select_modal_tipoDocumento" data-toggle="select" required>
                                        <option>Seleccione</option>
                                        <option value="3">DNI</option>
                                        <option value="6">RUC</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="numDocumentoInput">Numero documento</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-id-badge"></i></span>
                                        </div>
                                        <input style="color: black !important; font-weight: bold !important;" type="number" class="form-control" id="numDocumentoInput" name="numDocumentoInput" placeholder="numero" required />
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="number-empresa-input">Telefono empresa</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="number_empresa_input" name="number_empresa_input" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Correo 1 </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                                        </div>
                                        <input style="color: black !important; font-weight: bold !important;" type="email" class="form-control" id="InputCorreo1" name="InputCorreo1" placeholder="name@example.com" required />
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput2">Correo 2 </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                                        </div>
                                        <input style="color: black !important; font-weight: bold !important;" type="email" class="form-control" id="InputCorreo2" name="InputCorreo2" placeholder="name@example2.com" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput3">Correo 3 </label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                                        </div>
                                        <input style="color: black !important; font-weight: bold !important;" type="email" class="form-control" id="InputCorreo3" name="InputCorreo3" placeholder="name@example3.com" />
                                    </div>
                                </div>
                            </div> --}}
                        </div>

                        <div class="row">
                            
                            {{-- <div class="col-4">
                                <div class="form-group">
                                    <label for="number-contacto-input">Telefono contacto</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                        </div>
                                        <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="number_contacto_input" name="number_contacto_input" required />
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="number-otro-input">Telefono otro</label>
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone-square"></i></span>
                                        </div>
                                        <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="number_otro_input" name="number_otro_input" />
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <!-- ================================= FIN-CUADRO-BRODER ================================= -->
            </div>
            <!-- FIN-MODAL-BODY -->

            <!-- MODAL FOOTER -->
            <div class="modal-footer">
            <button type="submit" class="btn btn-success"> <i class="far fa-save"> </i> Guardar Interesado</button>
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
<script src="{{ asset('funciones/create.js')}}"></script>
<script src="{{ asset('funciones/crud.js')}}"></script>
<script src="{{ asset('ajax/ajaxcomercializacion.js')}}"></script>

@endsection
<link rel="stylesheet" href="{{ asset('css/search.css')}}" type="text/css">