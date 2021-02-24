@extends('layout')

@section('title', 'Lista de interesados')
@section('pagina', 'Interesados')

@section('content')
    <div class="card-header">
        <div class="row align-items-center">
        <div class="col-8">
            <form>
                <input class="form-control" placeholder="Buscar interesado..." type="text" id="searchTerm" onkeyup="doSearch()">
            </form>
        </div>
        <div class="col-4 text-right">
            <a type="button" href="#" onclick="limpiar_interesado();" class="btn btn btn-primary" data-toggle="modal" data-target="#registroModalInteresado"><i class="fas fa-plus-circle"></i> Agregar interesado</a>
        </div>
        </div>
    </div>

    <!-- ================================= MODAL det interesado ================================= -->
    <div class="modal fade" id="ModalDetalleInteresado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document" id="interesado_modal">
            
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
                        <input type="hidden" id="select_modal_tipoPersona" name="select_modal_tipoPersona" value="1"/>  

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
                                {{-- <div class="col-4">
                                    <div class="form-group">
                                        <label for="select_modal_tipoPersona">Tipo persona</label>
                                        <select style="color: black !important; font-weight: bold !important;" class="form-control" id="select_modal_tipoPersona" name="select_modal_tipoPersona" data-toggle="select" required>
                                            <option>Seleccione</option>
                                            <option style="color: green !important; font-weight: bold !important;" value="1">Interesado</option>
                                            <option value="2">Cliente</option>
                                        </select>
                                    </div>
                                </div> --}}
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

    <!-- ================================= MODAL REGISTRO HISTORIAL COMERCIALIZACIÓN ================================= -->
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
                                        <button type="button" class="btn btn-secondary" onclick=" generarDocumento(); ">Generar Doc.</button>
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

    <div class="modal fade" id="ModalDetalleHistorial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal" role="document" id="historial_reg_modal">
            
        </div>
    </div>

    <div class="table-responsive">
        <div>
            <table class="table align-items-center" id="datos">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Tipo Doc.</th>
                        <th>Nombre/Razon Social</th>
                        <th>Apellidos/Nombre comercial</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody class="list" id="lista_interesados">
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer py-4">

    </div>
    
@endsection

@section('js')
    <script src="{{ asset('funciones/crud.js')}}"></script>
    <script src="{{ asset('ajax/ajaxcliente.js')}}"></script>
    <script src="{{ asset('ajax/ajaxhistorial.js')}}"></script>
@endsection
<link rel="stylesheet" href="{{ asset('css/search.css')}}" type="text/css">    