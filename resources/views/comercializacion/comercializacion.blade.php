@extends('layout')
@section('title', 'Comercializacion')
@section('pagina', 'COMERCIALIZACION')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/search.css')}}" type="text/css">
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header" style="padding-bottom: 10px !important;">
                    <div class="row ">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6  text-right" >
                            <button onclick="limpiar_comercializacion(); modal_comercializacion();"   type="button" class="btn btn-outline-primary px-3 py-2" data-toggle="tooltip" data-html="true" title="Agregar una nueva comercialización." >
                                <i class="fas fa-plus-circle"></i>
                                <span > Agregar Comercialización</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- LISTAMOS LA TABLA COMERCIALIZACION-->
                <div class="card-body" style="padding-top: 10px !important;" >
                    <div class="row" >
                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3 " >
                            <label class="media align-items-center">
                                <span style="padding-right: 10px;">Ver </span>
                                <select name="filtro_cant" id="filtro_cant" onchange="lista_comercializacion(1);" aria-controls="datatable-basic" class="form-control form-control-sm"  style="color: black !important; font-weight: bold !important; display: inline-block;" >
                                    <option value="3">3</option>
                                    <option selected value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                </select>
                                <span style="padding: 0px 30px 0px 10px;"> registros</span>
                            </label>
                        </div>

                        <div class="col-sm-12 col-md-4 col-lg-6 col-xl-5 ">
                        </div>

                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-4 ">
                            <div class="input-group input-group-merge"">

                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding: 2px 8px 2px 8px !important;"><i  class="fas fa-search"></i></span>
                                </div>
                                <input id="filtro_search" name="filtro_search" class="form-control form-control-sm" placeholder="Buscar cliente..." type="search" >
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive " id="lista_tabla_comercializacion" >
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- :::::: MODAL DETALLE COMERCIALIZACION :::::: -->
    <div class="modal fade" id="ModalDetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document" id="registro_modal">
            <!-- Contenido del modal /  -->

        </div>
    </div>

    <!-- :::::: MODAL Registro :::::: -->
    {{-- @include('componentes/modals/comercializacion/modal_comercializacion') --}}

    <!-- ::::::: MODAL COMERCIALIZACION::::::: -->
    <div class="modal fade" id="modal_comercializacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <!-- :::::: MODAL HEADER :::::: -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar comercialización</h5>
                    <button onclick="limpiar_comercializacion();" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red;"></i> </span>
                    </button>
                </div>

                <!-- :::::: MODAL BODY :::::: -->
                <div class="modal-body" style="padding-top: 0px !important; padding-bottom: 0px !important;">
                    <form id="formulario_comercializacion">
                        @csrf
                        <!-- ::::::: INPUT ID COMERCIALIZACION ::::::::: -->
                        <input type="hidden" id="idcomercializacion" name="idcomercializacion" />

                        <!-- ::::::: INPUT ID USUARIO LOGGEADO ::::::::: -->
                        <input type="hidden" id="idusers" name="idusers" value="1" />

                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="btn_arriba_1" href="#" data-toggle="tab" role="tab" aria-controls="tabs-icons-text-1" aria-selected="false">
                                        <i class="fas fa-digital-tachograph"></i> Datos generales
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 disabled" id="btn_arriba_2" href="#" data-toggle="tab" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">
                                        <i class="fas fa-paperclip"></i> Datos del registro
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                <div class="row">
                                    <!-- ::::::: INPUT CLIENTE ::::::::: -->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label for="select_modal_clientes"><sup class="text-danger font-weight-bold">*</sup> Cliente</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <select class="form-control" id="select_modal_clientes" name="select_modal_clientes" onclick="copiar_a_contacto();"> </select>
                                                <span class="input-group-addon input-group-append">
                                                    <button class="btn btn-default" type="button" onclick="modal_interesado();" data-toggle="tooltip" data-html="true" title="Agregar un cliente/interesado">
                                                        <i class="fas fa-plus-circle"></i>
                                                    </button>
                                                </span>
                                                <!-- MENSAJE DE ERROR -->
                                                <div id="invlid_cliente" class="invalid-feedback">Por favor Seleccione un CLIENTE</div>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- ::::::: INPUT PERSONA DE CONTACTO ::::::::: -->
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4 ">
                                        <div class="form-group">
                                            <label for="">Persona contacto</label>
                                            <input  class="form-control" type="text" id="persona_contacto_input" name="persona_contacto_input" placeholder="Persona Contacto" autocomplete="off" style="color: black !important; font-weight: bold !important;"/>
                                        </div>
                                    </div>

                                    <!-- ::::::: INPUT ACTIVIDAD ::::::::: -->
                                    {{-- <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4 ">
                                        <label for="select_modal_clientes"> <sup class="text-danger font-weight-bold">*</sup> Actividad </label>
                                        <div class="form-group">
                                            <div class="input-group" id="datetimepicker1">
                                                <select style="color: rgb(0, 0, 0) !important; font-weight: bold !important;" class="form-control" id="select_modal_actividad" name="select_modal_actividad" data-toggle="" required> </select>
                                                <span class="input-group-addon input-group-append">
                                                    <button class="btn btn-default" type="button" onclick="modal_actividad();" data-toggle="tooltip" data-html="true" title="Agregar una actividad.">
                                                        <i class="fas fa-plus-circle"></i>
                                                    </button>
                                                </span>
                                            </div>
                                            <!-- MENSAJE DE ERROR -->
                                            <div id="invlid_actividad" class="invalid-feedback">Por favor Seleccione una ACTIVIDAD</div>
                                        </div>
                                    </div> --}}

                                    <!-- ::::::: INPUT MEDIO DE CONTACTO ::::::::: -->
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                        <label for="select_modal_clientes"><sup class="text-danger font-weight-bold">*</sup> Medio de contacto</label>
                                        <div class="form-group">
                                            <div class="input-group" >
                                                <select style="color: rgb(0, 0, 0) !important; font-weight: bold !important;" class="form-control" id="select_modal_medios" name="select_modal_medios" data-toggle="" required> </select>
                                                <span class="input-group-addon input-group-append">
                                                    <button class="btn btn-default" type="button" onclick="modal_medios();" data-toggle="tooltip" data-html="true" title="Agregar un medio.">
                                                        <i class="fas fa-plus-circle"></i>
                                                    </button>
                                                </span>
                                                <!-- MENSAJE DE ERROR -->
                                                <div id="invlid_medio" class="invalid-feedback">Por favor Seleccione un MEDIO</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                        <label for="select_modal_clientes">Próxima Llamada </label>
                                        <div class="form-group">
                                            <div class="input-group" >
                                                <input class="form-control" type="datetime-local"  id="proxima_llamada" name="proxima_llamada"  >
                                                {{-- <input type="text"   id="proxima_llamada"> --}}
                                                <!-- MENSAJE DE ERROR -->
                                                <div id="invlid_medio" class="invalid-feedback">Por favor Seleccione proxima LLAMADA.</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class=" col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div style="margin-bottom: 10px; padding: 20px; border-radius: 10px; border: 1px solid #000000 !important;">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                    <div class="row">
                                                        <!-- ::::::: INPUT SELECT MODULOS ::::::::: -->
                                                        <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                            <label for="modulos"> Modulos</label>
                                                            <div class="form-group">
                                                                <div class="input-group" >
                                                                    <select style="color: rgb(0, 0, 0) !important; font-weight: bold !important;" class="form-control" id="select_modal_modulos" name="select_modal_modulos" data-toggle="">
                                                                    </select>
                                                                    <span class="input-group-addon input-group-append">
                                                                        <button class="btn btn-default" type="button" onclick="detalle_modulo();" data-toggle="tooltip" data-html="true" title="Ver detalle módulo.">
                                                                            <i style="font-size: 13px;" class="fas fa-eye"></i>
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                                <div id="invlid_actividad" class="invalid-feedback">Por favor Seleccione un modulo</div>
                                                            </div>
                                                        </div>
                                                        <!-- ::::::: INPUT LICENCIAS ::::::::: -->
                                                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                            <div class="form-group">
                                                                <label class="form-control-label" for="cant_licencias">Licencias</label>
                                                                <input class="form-control numero_valor" placeholder="licencias" type="number" name="cant_licencias" id="cant_licencias" min="1" pattern="^[0-9]+" />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                            <a href="javascript:void(0)" type="button" class="btn btn-default btn-sm btn-block" onclick="add_detalle()" data-toggle="tooltip" data-html="true" title="Insertar modulo a la tabla.">
                                                                <i class="fas fa-arrow-right"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ::::::: TABLA: MODULOS SELECIONADOS ::::::::: -->
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                    <div class="row my-2">
                                                        <div class="col-md-12" style="overflow-x: auto;">
                                                            <sup class="text-success font-weight-bold">* Estos son los modulos a registrar:</sup>
                                                            <table class="table align-items-center">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th scope="col" class="sort">Modulo</th>
                                                                        <th scope="col" class="sort">Licencias</th>
                                                                        <th scope="col" class="sort">Accion</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="list" id="tabla_detalle_modulos"></tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ::::::: INPUT DETALLE DE LA LLAMADA ::::::::: -->
                                    <div class=" col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                            <label for="llamadaDetTextarea"><sup class="text-danger font-weight-bold">*</sup>Detalle llamada</label>
                                            <div class="input-group" >
                                                <textarea class="form-control" id="llamadaDetTextarea" name="llamadaDetTextarea" rows="3" style="color: black !important; font-weight: bold !important;"></textarea>
                                                <!-- MENSAJE DE ERROR -->
                                                <div id="invlid_medio" class="invalid-feedback">Por favor Seleccione un MEDIO</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                <div class="row">
                                    <!-- ::::::: INPUT SELECT EVENTOS ::::::::: -->
                                    <div class=" col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                        <label for="select_modal_clientes">Evento</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <select class="form-control" id="select_modal_evento" name="select_modal_evento" data-toggle="" required style="color: black !important; font-weight: bold !important;"> </select>
                                                <span class="input-group-addon input-group-append">
                                                    <button class="btn btn-default" type="button" onclick="modal_evento();" data-toggle="tooltip" data-html="true" title="Agregar un evento.">
                                                        <i class="fas fa-plus-circle"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ::::::: INPUT DETALLE DEL EVENTO ::::::::: -->
                                    <div class=" col-sm-12 col-md-12 col-lg-12 col-xl-8">
                                        <div class="form-group">
                                            <label for="eventoTextarea">Detalle evento</label>
                                            <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="evento_input" name="evento_input" placeholder="Detalle evento" required />
                                            {{-- <textarea class="form-control" id="eventoTextarea" name="eventoTextarea" rows="3" style="color: black !important; font-weight: bold !important;"></textarea> --}}
                                        </div>
                                    </div>

                                    <!-- ::::::: INPUT AVANCE ::::::::: -->
                                    <div class=" col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                        <div class="form-group">
                                            <label for="eventoTextarea">Avance</label>
                                            <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="avance_input" name="avance_input" placeholder="Avance evento" />
                                        </div>
                                    </div>

                                    <!-- ::::::: INPUT SELECT COTIZACIÓN ::::::::: -->
                                    <div class=" col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                        <label for="select_modal_clientes">Cotización</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <select class="form-control" id="select_modal_cotizacion" name="select_modal_cotizacion" required style="color: black !important; font-weight: bold !important;"> </select>
                                                <span class="input-group-addon input-group-append">
                                                    <button class="btn btn-default" type="button" data-toggle="tooltip" data-html="true" title="Agregar nueva cotización." onclick="modal_cotizacion();">
                                                        <i class="fas fa-plus-circle"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ::::::: INPUT PERSONAL ::::::::: -->
                                    <div class=" col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                        <label for="select_modal_clientes">Personal</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <select class="form-control" id="select_modal_personal" name="select_modal_personal" data-toggle="" required style="color: black !important; font-weight: bold !important;"> </select>
                                                <span class="input-group-addon input-group-append">
                                                    <button class="btn btn-default" type="button" onclick="modal_personal();" data-toggle="tooltip" data-html="true" title="Agregar nuevo personal.">
                                                        <i class="fas fa-plus-circle"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ::::::: INPUT OPSEVACIONES ::::::::: -->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                            <label for="">Observaciones</label>
                                            <textarea class="form-control" id="conclusionessTextarea" name="conclusionessTextarea" rows="3" style="color: black !important; font-weight: bold !important;">Observaciones</textarea>
                                        </div>
                                    </div>

                                    <!-- ::::::: BARRA DE PROGRESO ::::::::: -->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                            <div class="progress" id="div_barra_progress_comercializacion">
                                                <div id="barra_progress_comercializacion" class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ::::::: CONTENEDOR DE ERRORES ::::::::: -->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div id="contenedor_de_errores_comercializacion"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- MODAL FOOTER -->
                <div class="modal-footer" >

                    <button class="btn btn-primary" id="sgt_form" aria-selected="false"><i class="fas fa-paperclip"></i> Siguiente</button>

                    <button class="btn btn-primary" id="ant_form" aria-selected="false"><i class="fas fa-paperclip"></i> Anterior</button>

                    <button   class="btn btn-warning" id="generar_n_comercializacion" style="align-items: left !important;"><i class="fas fa-plus"> </i> Generar registro</button>

                    <button   class="btn btn-success" id="guardar_registro"><i class="far fa-save"> </i> Guardar registro</button>

                </div>
            </div>
        </div>
    </div>

    <!-- :::::: MODAL DETALLE MODULO :::::: -->
    <div class="modal fade" id="modal_detalle_modulo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document" >
            <div class="modal-content" id="html_modulo_detalle" >
            <!-- Contenido del modal /  -->
            </div>
        </div>
    </div>

    <!-- :::::: MODAL DOCS DE COTIZACION :::::: -->
    <div class="modal fade" id="modal_detalle_doc_cotizacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document" >
            <div class="modal-content" id="html_doc_cotizacion" >
            <!-- Contenido del modal /  -->
            </div>
        </div>
    </div>

    <!-- ::::::: MODAL INTERESADO (CLIENTE) ::::::: -->
    <div class="modal fade" id="modal_clientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content" >
                <!-- ::::: MODAL TITULO ::::: -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Agregar Interesado
                    </h5>
                    <button onclick="limpiar_interesado_comercializacion();" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red;"></i> </span>
                    </button>
                </div>

                <!-- ::::: MODAL BODY ::::: -->
                <div class="modal-body" >
                    <form id="formulario_clientes" method="POST">
                        @csrf
                        <div class="row">
                            <input type="hidden" id="idclientes" name="idclientes" />
                            <input type="hidden" id="select_modal_tipoPersona" name="select_modal_tipoPersona" value="1" />
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="select_modal_tipo_doc">
                                        <sup class="text-danger font-weight-bold">*</sup>
                                        Tipo documento
                                    </label>
                                    <select style="color: black !important; font-weight: bold !important;" class="form-control" id="select_modal_tipo_doc" name="select_modal_tipo_doc" data-toggle=""  >

                                        <option value="1">DNI</option>
                                        <option value="2">RUC</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="nro_documento">
                                        <sup class="text-danger font-weight-bold">*</sup>
                                        Numero documento
                                    </label>
                                    <div class="input-group  ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-id-badge"></i></span>
                                        </div>
                                        <input style="color: black !important; font-weight: bold !important;" type="number" class="form-control" id="nro_documento" name="nro_documento" placeholder="numero"   />
                                        <span class="input-group-addon input-group-append">
                                            <button class="btn btn-default" type="button"  onclick="cunsulta_sunat();" data-toggle="tooltip" data-placement="top" title="Consulta RENIEC/SUNAT">
                                                <i class="fas fa-angle-right" id="cargado_sunat"></i>
                                                <i style="font-size: 20px; display: none;" class="fas fa-spinner fa-pulse fa-2x" id="cargando_sunat"></i>
                                            </button>
                                        </span>
                                        <div class="invalid-feedback">Por Favor escriba un N° Doc. valido</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label for="nombre_razon_social_input" class="form-control-label">Nombres/Razon social</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input style="color: black !important; font-weight: bold !important;" type="text" class="form-control" id="nombre_razon_social_input" name="nombre_razon_social_input" placeholder="Erick" autocomplete="off"/>
                                        <div class="invalid-feedback">Por Favor escriba un nombre valido</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="nombre_comercial_input">Apellidos/Nombre comercial</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input style="color: black !important; font-weight: bold !important;" type="text" class="form-control" id="nombre_comercial_input" name="nombre_comercial_input" placeholder="Zumaeta" autocomplete="off" />
                                        <div class="invalid-feedback">Por Favor escriba un apellido valido</div>
                                    </div>
                                </div>
                            </div>
                            <!-- .::::::: INPUT GIRO NEGOCIO ::::::. -->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <label class="form-control-label" for="select_modal_giroNegocio">Giro de negocio</label>
                                <div class="input-group">
                                    <select style="color: black !important; font-weight: bold !important;" class="form-control" data-toggle="" id="select_modal_giro_negocio" name="select_modal_giro_negocio"  >
                                        {{-- AQUI VAN LOS "OPTIONS" --}}
                                    </select>
                                    <span class="input-group-addon input-group-append" data-toggle="tooltip" data-placement="top" title="Crear nuevo giro negocio">
                                        <button class="btn btn-default" type="button"  onclick="" data-toggle="modal" data-target="#modal_giro_negocio" >
                                            <i class="fas fa-plus-circle"></i>
                                        </button>
                                    </span>
                                    <div class="invalid-feedback">Por Favor selecione un giro de negocio</div>
                                </div>
                            </div>
                            <!-- .::::::: INPUT TELEFONO ::::::. -->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="number-empresa-input">Telefono empresa</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input  class="form-control" type="number" id="number_empresa_input" name="number_empresa_input" autocomplete="off" style="color: black !important; font-weight: bold !important;"/>
                                        <div class="invalid-feedback">Por Favor escriba un numero valido</div>
                                    </div>
                                </div>
                            </div>
                            <!-- .::::::: INPUT CORREO ::::::. -->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="number-empresa-input">Correo 1</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                                        </div>
                                        <input  class="form-control" type="email" id="InputCorreo1" name="InputCorreo1" autocomplete="off" style="color: black !important; font-weight: bold !important;"/>
                                        <div class="invalid-feedback">Por Favor escriba un email valido</div>
                                    </div>
                                </div>
                            </div>
                            <!-- .::::::: INPUT DIRECCIÓN ::::::. -->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Dirección</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        <input  type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" style="color: black !important; font-weight: bold !important;" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- .::::::: FORM OPCIONAL ::::::. -->
                        <div class="accordion" id="accordion_opcional" style="padding-top: 10px !important;">
                            <div class="card ">
                                <div class="card-header bg-gradient-default text-white " id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <h5 class="mb-0 text-white">DATOS OPCIONALES</h5>
                                </div>
                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion_opcional">
                                    <div class="card-body" style="border: 1px solid #191d4d !important; border-radius: 0 0 10px 10px !important;">
                                        <div class="row">
                                            <!-- ::::::::::: SELECT PROVINCIA ::::::::::::-->
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <div class="form-group">
                                                    <label for="select_modal_provincia">Provincia</label>
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                                        </div>
                                                        <input  type="text" class="form-control" id="select_modal_provincia" name="select_modal_provincia" placeholder="Provincia" style="color: black !important; font-weight: bold !important;" autocomplete="off" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ::::::::::: SELECT GRADO DE INTERES ::::::::::::-->
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <div class="form-group">
                                                    <label for="select_modal_grado_interes">Grado de interés</label>
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                                        </div>
                                                        <input  type="text" class="form-control" id="select_modal_grado_interes" name="select_modal_grado_interes" placeholder="Grado de interes" style="color: black !important; font-weight: bold !important;" autocomplete="off" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ::::::::::: SELECT TAMAÑO DE EMPRESA ::::::::::::-->
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <div class="form-group">
                                                    <label for="select_modal_tamano_empresa">Tamaño de empresa</label>
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                                        </div>
                                                        <input  type="text" class="form-control" id="select_modal_tamano_empresa" name="select_modal_tamano_empresa" placeholder="Tamaño de empresa" style="color: black !important; font-weight: bold !important;" autocomplete="off" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- ::::::::::: SELECT A QUE TE DEDICAS ::::::::::::-->
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <div class="form-group">
                                                    <label for="select_modal_a_que_dedicas">A que te dedicas</label>
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                                        </div>
                                                        <input  type="text" class="form-control" id="select_modal_a_que_dedicas" name="select_modal_a_que_dedicas" placeholder="A que te dedicas" style="color: black !important; font-weight: bold !important;" autocomplete="off" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- ::::::::::: INPUT CORREO 2 ::::::::::::-->
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput2">Correo 2 </label>
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                        </div>
                                                        <input  type="email" class="form-control" id="InputCorreo2" name="InputCorreo2" placeholder="name@example2.com" style="color: black !important; font-weight: bold !important;" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ::::::::::: INPUT CORREO 3 ::::::::::::-->
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput3">Correo 3 </label>
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                        </div>
                                                        <input  type="email" class="form-control" id="InputCorreo3" name="InputCorreo3" placeholder="name@example3.com" style="color: black !important; font-weight: bold !important;"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ::::::::::: INPUT TELEFONO CONTACTO ::::::::::::-->
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <div class="form-group">
                                                    <label for="number-contacto-input">Telefono contacto</label>
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                                        </div>
                                                        <input  class="form-control" type="number" id="number_contacto_input" name="number_contacto_input" style="color: black !important; font-weight: bold !important;" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ::::::::::: INPUT TELEFONO OTRO::::::::::::-->
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <div class="form-group">
                                                    <label for="number-otro-input">Telefono otro</label>
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-phone-square"></i></span>
                                                        </div>
                                                        <input  class="form-control" type="number" id="number_otro_input" name="number_otro_input" style="color: black !important; font-weight: bold !important;" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- :::::::: BARRA DE PROGRESO ::::::::-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" >
                                <div class="form-group">
                                    <div class="progress" id="div_barra_progress_clientes" style="height: 12px !important;">
                                        <div id="barra_progress_clientes" class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- :::::::: CONTENEDOR DE ERRORES ::::::::-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div id="contenedor_de_errores_clientes"></div>
                            </div>
                        </div>
                        <button type="submit" style="display: none;"></button>
                    </form>
                </div>

                <!-- MODAL FOOTER -->
                <div class="modal-footer" style="padding-top: 0px !important;">
                    <button id="guardar_registro_interesado" type="button" class="btn btn-outline-success" >
                        <i class="far fa-save"> </i>
                         Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ::::::: MODAL  COTIZACION::::::: -->
    <div class="modal fade " id="modal_cotizacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content" >
                <!-- ::::::: MODAL HEADER ::::::: -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar cotizacion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red;"></i> </span>
                    </button>
                </div>

                <!-- ::::::: MODAL BODY ::::::: -->
                <div class="modal-body" style="padding-top: 0px !important; padding-bottom:0px !important;">
                    <form id="formulario_cotizacion" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="idcotizaciones" name="idcotizaciones"/>
                        <div class="row ">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input  class="form-control" type="text" id="nombre_cotizacion" readonly name="nombre_cotizacion" style="color: black !important; font-weight: bold !important;">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="">Válido por (días)</label>
                                    <input  class="form-control" type="text" id="validez_cotizacion" name="validez_cotizacion" value="7" style="color: black !important; font-weight: bold !important;">
                                </div>
                            </div>

                            <div class="col-sm-12" style="padding-bottom: 20px !important;">
                                <div class="custom-file">
                                    <label class="custom-file-label" for="customFileLang">Select file</label>
                                    <input  type="file" class="custom-file-input" id="ruta_cotizacion" name="ruta_cotizacion" lang="en" >
                                    <input  type="hidden" id="doc_cotizacion_antiguo" name="doc_cotizacion_antiguo" >
                                </div>
                            </div>

                            <!-- :::::::: BARRA DE PROGRESO ::::::::-->
                            <div class="col-sm-12 col-md-12 col-xl-12" >
                                <div class="form-group">
                                    <div class="progress" id="div_barra_progress_cotizacion" style="height: 12px !important;">
                                        <div id="barra_progress_cotizacion" class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- :::::::: CONTENEDOR DE ERRORES ::::::::-->
                            <div class="col-sm-12 col-md-12 col-xl-12">
                                <div id="contenedor_de_errores_cotizacion"></div>
                            </div>
                        </div>
                        <button type="submit" style="display: none;"></button>
                    </form>
                </div>

                <!-- MODAL FOOTER -->
                <div class="modal-footer" style="padding-top: 0px !important;">
                    <button id="guardar_registro_cotizacion" type="button" class="btn btn-outline-success" >
                        <i class="far fa-save"> </i>
                         Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- :::::: MODAL MEDIOS :::::: -->
    <div class="modal fade" id="modal_medios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content" >
                <!-- :::::: MODAL HEADER :::::::: -->
                <div class="modal-header">
                    <h5  class="modal-title" id="exampleModalLabel">
                         Agregar Medio de Contacto
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red"></i> </span>
                    </button>
                </div>

                <!-- ::::: MODAL BODY ::::: -->
                <div class="modal-body" style="padding-top: 0px !important; padding-bottom: 0px !important;">
                    <form id="formulario_medios" >
                        @csrf
                        <input type="hidden" id="idmedios" name="idmedios" />
                        <div class="row">
                            <!-- :::::::: NOMBRE MEDIOS ::::::::-->
                            <div class="col-sm-12 col-md-12 col-xl-12">
                                <label for="nombre_razon_social_input">Nombre</label>
                                <div class="form-group">
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                        </div>
                                        <input  type="text" class="form-control" id="nombre_medio" name="nombre_medio" placeholder="Medio de contacto" style="color: black !important; font-weight: bold !important;" />
                                        <div class="invalid-feedback"> Rellene el campo por favor. </div>
                                    </div>
                                </div>
                            </div>
                            <!-- :::::::: BARRA DE PROGRESO ::::::::-->
                            <div class="col-sm-12 col-md-12 col-xl-12" >
                                <div class="form-group">
                                    <div class="progress" id="div_barra_progress_medios" style="height: 12px !important;">
                                        <div id="barra_progress_medios" class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- :::::::: CONTENEDOR DE ERRORES ::::::::-->
                            <div class="col-sm-12 col-md-12 col-xl-12">
                                <div id="contenedor_de_errores_medios"></div>
                            </div>
                        </div>
                        <button type="submit" style="display: none;"></button>
                    </form>
                </div>

                <!-- MODAL FOOTER -->
                <div class="modal-footer" style="padding-top: 0px !important;">
                    <button id="guardar_registro_medio" type="button" class="btn btn-outline-success" >
                        <i class="far fa-save"> </i>
                         Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- :::::: MODAL PERSONAL :::::: -->
    <div class="modal fade" id="modal_personal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content" >
                <!-- :::::: MODAL HEADER :::::: -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Personal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red"></i> </span>
                    </button>
                </div>

                <!-- :::::: MODAL BODY :::::: -->
                <div class="modal-body">
                    <form id="formulario_personal" >
                        @csrf
                        <input type="hidden" id="idpersonal" name="idpersonal" />
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="nombre_input">Nombres</label>
                                <div class="form-group">
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                        </div>
                                        <input  type="text" class="form-control" id="nombre_personal" name="nombre_personal" placeholder="Nombre" style="color: black !important; font-weight: bold !important;" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <label for="apellido_input">Apellidos</label>
                                <div class="form-group">
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                        </div>
                                        <input  type="text" class="form-control" id="apellido_personal" name="apellido_personal" placeholder="Apellido" style="color: black !important; font-weight: bold !important;" />
                                    </div>
                                </div>
                            </div>
                            <!-- :::::::: BARRA DE PROGRESO ::::::::-->
                            <div class="col-sm-12 col-md-12 col-xl-12" >
                                <div class="form-group">
                                    <div class="progress" id="div_barra_progress_personal" style="height: 12px !important;">
                                        <div id="barra_progress_personal" class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- :::::::: CONTENEDOR DE ERRORES ::::::::-->
                            <div class="col-sm-12 col-md-12 col-xl-12">
                                <div id="contenedor_de_errores_personal"></div>
                            </div>
                        </div>
                        <button type="submit" style="display: none;"></button>
                    </form>
                </div>

                <!-- MODAL FOOTER -->
                <div class="modal-footer" style="padding-top: 0px !important;">
                    <button id="guardar_registro_personal" type="button" class="btn btn-outline-success px-2 py-2" >
                        <i class="far fa-save"> </i>
                        Guardar evento
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- :::::: MODAL EVENTO :::::: -->
    <div class="modal fade" id="modal_evento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content" >
                <!-- ::::::: MODAL HEADER ::::::: -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Agregar evento
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red"></i> </span>
                    </button>
                </div>

                <!-- :::::::: MODAL BODY :::::::: -->
                <div class="modal-body" style="padding-top: 0px !important; padding-bottom: 0px !important;">
                    <form id="formulario_evento" >
                        @csrf
                        <input type="hidden" id="ideventos" name="ideventos" />

                        <div class="row">
                            <!-- :::::::: INPUT NOMBRE ::::::::-->
                            <div class="col-sm-12 col-md-12 col-xl-12">
                                <label for="nombre_evento">Nombre</label>
                                <div class="form-group">
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                        </div>
                                        <input  type="text" class="form-control" id="nombre_evento" name="nombre_evento" placeholder="Cotizacion"  style="color: black !important; font-weight: bold !important;"/>
                                        <div class="invalid-feedback"> Rellene el campo por favor. </div>
                                    </div>
                                </div>
                            </div>
                            <!-- :::::::: INPUT DESCRIPCION ::::::::-->
                            <div class="col-sm-12 col-md-12 col-xl-12">
                                <div class="form-group">
                                    <label for="nombre_comercial_input">Descripción</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-audio-description"></i></span>
                                        </div>
                                        <input  type="text" class="form-control" id="descripcion_input" name="descripcion_input" placeholder="Descripción" style="color: black !important; font-weight: bold !important;" />
                                    </div>
                                </div>
                            </div>
                            <!-- :::::::: BARRA DE PROGRESO ::::::::-->
                            <div class="col-sm-12 col-md-12 col-xl-12" >
                                <div class="form-group">
                                    <div class="progress" id="div_barra_progress_evento" style="height: 12px !important;">
                                        <div id="barra_progress_evento" class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- :::::::: CONTENEDOR DE ERRORES ::::::::-->
                            <div class="col-sm-12 col-md-12 col-xl-12">
                                <div id="contenedor_de_errores_evento"></div>
                            </div>
                        </div>
                        <button type="submit" style="display: none;"></button>
                    </form>
                </div>
                <!-- MODAL FOOTER -->
                <div class="modal-footer" style="padding-top: 0px !important;">
                    <button id="guardar_registro_evento" type="button" class="btn btn-outline-success px-2 py-2" >
                        <i class="far fa-save"> </i>
                        Guardar evento
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ::::: MODAL ATIVIDAD :::: -->
    <div class="modal fade" id="modal_actividad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
            <div class="modal-content" >
                <!-- :::::::: MODAL HEADER :::::::: -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Agregar Actividad
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red"></i> </span>
                    </button>
                </div>
                <!-- :::::::: MODAL BODY :::::::: -->
                <div class="modal-body" style="padding-top: 0px !important; padding-bottom: 0px !important;">
                    <form id="formulario_actividad" >
                        @csrf
                        <input type="hidden" id="idactividad" name="idactividad" />
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-xl-12">
                                <label for="nombre_atividad">Nombre</label>
                                <div class="form-group ">
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                        </div>
                                        <input  type="text" class="form-control" id="nombre_actividad" name="nombre_actividad" placeholder="Actividad" style="color: black !important; font-weight: bold !important;" />
                                        <div class="invalid-feedback"> Rellene el campo por favor. </div>
                                    </div>
                                </div>
                            </div>
                            <!-- :::::::: BARRA DE PROGRESO ::::::::-->
                            <div class="col-sm-12 col-md-12 col-xl-12" >
                                <div class="form-group">
                                    <div class="progress" id="div_barra_progress_actividad" style="height: 12px !important;">
                                        <div id="barra_progress_actividad" class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- :::::::: CONTENEDOR DE ERRORES ::::::::-->
                            <div class="col-sm-12 col-md-12 col-xl-12">
                                <div id="contenedor_de_errores_actividad"></div>
                            </div>
                        </div>
                        <button style="display: none;" type="submit" class="btn btn-success"></button>
                    </form>
                </div>
                <!-- MODAL FOOTER -->
                <div class="modal-footer" style="padding-top: 0px !important;">
                    <button id="guardar_registro_actividad" type="button" class="btn btn-outline-success px-2 py-2" >
                        <i class="far fa-save"> </i>
                        Guardar actividad
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ::::::: MODAL GIRO NEGOCIO -->
    <div class="modal fade" id="modal_giro_negocio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content" >
                <!-- :::: MODAL HEADER :::: -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                          Agregar Giro Negocio
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red"></i> </span>
                    </button>
                </div>

                <!-- :::: MODAL BODY :::: -->
                <div class="modal-body" style="padding-top: 0px !important; padding-bottom: 0px !important;" >
                    <form id="formulario_giro_negocio" >
                        @csrf
                        <input type="hidden" id="idgiro_negocio" name="idgiro_negocio" />
                        <div class="row">
                            <!-- :::::::: BARRA DE PROGRESO ::::::::-->
                            <div class="col-sm-12 col-md-12 col-xl-12">
                                <label for="nombre_razon_social_input">Nombre</label>
                                <div class="form-group">
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                        </div>
                                        <input  type="text" class="form-control" id="nombre_giro_negocio" name="nombre_giro_negocio" placeholder="Giro de negocio" style="color: black !important; font-weight: bold !important;" />
                                        <div class="invalid-feedback"> Rellene el campo por favor. </div>
                                    </div>
                                </div>
                            </div>
                            <!-- :::::::: BARRA DE PROGRESO ::::::::-->
                            <div class="col-sm-12 col-md-12 col-xl-12" >
                                <div class="form-group">
                                    <div class="progress" id="div_barra_progress_giro_negocio" style="height: 12px !important;">
                                        <div id="barra_progress_giro_negocio" class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- :::::::: CONTENEDOR DE ERRORES ::::::::-->
                            <div class="col-sm-12 col-md-12 col-xl-12">
                                <div id="contenedor_de_errores_giro_negocio"></div>
                            </div>
                        </div>
                        <button type="submit" style="display: none;"></button>
                    </form>
                </div>
                <!-- MODAL FOOTER -->
                <div class="modal-footer" style="padding-top: 0px !important;">
                    <button id="guardar_registro_giro_negocio" type="button" class="btn btn-outline-success" >
                        <i class="far fa-save"> </i>
                        Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ::::::: MODAL  COTIZACION-COMERCIALIZACION::::::: -->
    <div class="modal fade " id="modal_cotizacion_comercializacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content"  >
                <!-- ::::::: MODAL HEADER ::::::: -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar cotizacion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red;"></i> </span>
                    </button>
                </div>

                <!-- ::::::: MODAL BODY ::::::: -->
                <div class="modal-body" style="padding-top: 0px !important; padding-bottom:0px !important;">
                    <form id="formulario_cotizacion_comercializacion" enctype="multipart/form-data">
                        @csrf
                        <input type="text" id="idcotiza" name="idcotiza"/>
                        <input type="text" id="idcotizacion_comercializacion" name="idcotizacion_comercializacion"/>
                        <div class="row ">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input  class="form-control" type="text" id="nombre_cotiza" readonly name="nombre_cotiza" style="color: black !important; font-weight: bold !important;">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="">Valido por (días)</label>
                                    <input  class="form-control" type="text" id="validez_cotiza" value="7" name="validez_cotiza" style="color: black !important; font-weight: bold !important;">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="padding-bottom: 20px !important;">
                                <div class="custom-file">
                                    <label class="custom-file-label" for="customFileLang">Select file</label>
                                    <input  type="file" class="custom-file-input" id="ruta_cotiza" name="ruta_cotiza" lang="en" >
                                    <input  type="hidden" id="doc_cotiza_antiguo" name="doc_cotiza_antiguo" >
                                </div>
                            </div>

                            <!-- :::::::: BARRA DE PROGRESO ::::::::-->
                            <div class="col-sm-12 col-md-12 col-xl-12" >
                                <div class="form-group">
                                    <div class="progress" id="div_barra_progress_cotizacion_comercializacion" style="height: 12px !important;">
                                        <div id="barra_progress_cotizacion_comercializacion" class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- :::::::: CONTENEDOR DE ERRORES ::::::::-->
                            <div class="col-sm-12 col-md-12 col-xl-12">
                                <div id="contenedor_de_errores_cotizacion_comercializacion"></div>
                            </div>
                        </div>
                        <button type="submit" style="display: none;"></button>
                    </form>
                </div>

                <!-- MODAL FOOTER -->
                <div class="modal-footer" style="padding-top: 0px !important;">
                    <button id="guardar_registro_cotiza_comercia" type="button" class="btn btn-outline-success" >
                        <i class="far fa-save"> </i>
                         Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .select2-results__options {
            height: 150px;
            overflow-y: auto;
        }
    </style>
@endsection



@section('js')
<script src="{{ asset('funciones/create.js')}}"></script>
<script src="{{ asset('funciones/crud.js')}}"></script>
<script src="{{ asset('ajax/componentes/ajaxmodals.js')}}"></script>
<script src="{{ asset('ajax/ajaxcomercializacion.js')}}"></script>
{{-- <script>
    <script type="text/javascript">
    $(function() {
      $('#proxima_llamada').datetimepicker({
        icons: {
          time: "fa fa-clock",
          date: "fa fa-calendar-day",
          up: "fa fa-chevron-up",
          down: "fa fa-chevron-down",
          previous: 'fa fa-chevron-left',
          next: 'fa fa-chevron-right',
          today: 'fa fa-screenshot',
          clear: 'fa fa-trash',
          close: 'fa fa-remove'
        }
      });
    });
  </script>
</script> --}}
@endsection
