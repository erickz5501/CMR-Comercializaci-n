@extends('layout')
@section('title', 'Comercializacion (seguimiento)')
@section('pagina', 'COMERCIALIZACION')

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card">
            <div class="card-header" style="padding-bottom: 0px !important;">
                <div class="row ">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4  ">
                        <div class="row input-daterange datepicker   ">
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6  ">
                                <div class="form-group">
                                    <input type="text" name="fecha_inicio" id="fecha_inicio" onchange="recargar_tabla_seguimiento()" autocomplete="off" class="form-control form-control-md" placeholder="Fecha inicio" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6  ">
                                <div class="form-group  ">
                                    <input type="text" name="fecha_fin" id="fecha_fin" onchange="recargar_tabla_seguimiento()" autocomplete="off" class="form-control form-control-md  " placeholder="Fecha fin"   />
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col ">
                        {<form>
                            <input class="form-control form-control-md" placeholder="Buscar registro..." type="text" id="searchTerm" onkeyup="doSearch()" />
                        </form>
                    </div> --}}
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-8  text-right" >
                        <a type="button" href="#" id="agregar_comercializacion_seguimiento" onclick="limpiar_comercializacion(); modal_comercializacion_seguimiento();"  class="btn btn btn-primary btn-md" data-toggle="tooltip" data-html="true" title="Agregar una nueva comercialización.">
                            <i class="fas fa-plus-circle"></i> Agregar registro
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body" style="padding-top: 0px !important;">
                <input type="hidden" id="id_idclientes" name="id_idclientes" value="{{$seguimientos->first()->idclientes}}">
                <div class="table-responsive py-4" id="tabla_seguimiento_comercializacion" >
                    <table class="table table-flush table-hover" id="datatable-seguimiento-comercializacion">
                        <thead class="thead-light">
                            <tr>
                                <th>PERSONA CONTACTO</th>
                                <th>MEDIO CONTACTO</th>
                                <th>DETALLE LLAMADA</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if ( count($seguimientos) > 0 )
                                @foreach ($seguimientos as $count => $seguimiento)
                                    <tr>
                                        <td class="align-middle">
                                            <span class="text-dark font-weight-600 text-sm">

                                                {{Str::limit($seguimiento->persona_contacto, 20, '...')}}
                                            </span>
                                        </td>

                                        <td class="align-middle">

                                            {{Str::limit($seguimiento->medio->nombre, 20, '...')}}
                                        </td>

                                        <td class="align-middle">
                                            {{Str::limit($seguimiento->detalla_llamada, 20, '...')}}
                                        </td>

                                        <td class="align-middle">
                                            {{ \Carbon\Carbon::parse($seguimiento->fecha_evento)->format('Y-m-d / g:i a') }}
                                        </td>

                                        <td class="align-middle">
                                            @if ($seguimiento->estado == 0)
                                                <span class="badge badge-success badge-lg">Activo</span>
                                            @else
                                                <span class="badge badge-danger badge-lg">Inactivo</span>
                                            @endif
                                        </td>

                                        <td class="align-middle">
                                            <button  onclick="mostrar_docs_cotizacion( '{{$seguimiento->idcomercializacion}}' );" type="button" class="btn btn-outline-default px-2 py-2" data-toggle="tooltip" data-original-title="Ver Docs. de Cotización">
                                                <i style="font-size: 17px !important" class="far fa-file-pdf"></i>
                                            </button>

                                            <button onclick="mostrar_one_registro( '{{$seguimiento->idcomercializacion}}' ); modal_comercializacion_seguimiento();" type="button" class="btn btn-outline-warning px-2 py-2" data-toggle="tooltip" data-html="true" title="Editar o duplicar registro.">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>

                                            <button onclick="detalle_registro('{{$seguimiento->idcomercializacion}}');" type="button" class="btn btn-outline-info px-2 py-2" data-toggle="tooltip" data-html="true" title="Ver detalle registro.">
                                                <i class="fas fa-eye"></i>
                                            </button>

                                            @if ($seguimiento->estado == 0)

                                                <button onclick="desactivar_registro( '{{$seguimiento->idcomercializacion}}', '{{$seguimiento->idclientes}}' );" type="button" class="btn btn-outline-danger px-2 py-2" data-toggle="tooltip" data-html="true" title="Desactivar">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            @else

                                                <button onclick="activar_registro( '{{$seguimiento->idcomercializacion}}', '{{$seguimiento->idclientes}}' );" type="button" class="btn btn-outline-success px-2 py-2" data-toggle="tooltip" data-html="true" title="Activar">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-4">
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
<div class="modal fade" id="modal_comercializacion_seguimiento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <!-- :::::: MODAL HEADER :::::: -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <span id="titulo_modal"> Agregar comercialización</span>
                    <i style="font-size: 20px !important; display: none;" class="fas fa-spinner fa-pulse" id="cargando_edit"></i>
                </h5>
                <button onclick="limpiar_comercializacion();" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red;"></i> </span>
                </button>
            </div>

            <!-- :::::: MODAL BODY :::::: -->
            <div class="modal-body" style="padding-top: 0px !important; padding-bottom: 0px !important;">
                <form id="formulario_comercializacion_seguimiento">
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
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 ">
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
                                            <select style="color: rgb(0, 0, 0) !important; font-weight: bold !important;" class="form-control" id="select_modal_actividad" name="select_modal_actividad" data-toggle="" > </select>
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
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <label for="select_modal_medios"><sup class="text-danger font-weight-bold">*</sup> Medio de contacto</label>
                                    <div class="form-group">
                                        <div class="input-group" >
                                            <select style="color: rgb(0, 0, 0) !important; font-weight: bold !important;" class="form-control" id="select_modal_medios" name="select_modal_medios" data-toggle="" > </select>
                                            <span class="input-group-addon input-group-append">
                                                <button class="btn btn-default" type="button" onclick="modal_medios();" data-toggle="tooltip" data-html="true" title="Agregar un medio.">
                                                    <i class="fas fa-plus-circle"></i>
                                                </button>
                                            </span>
                                            <!-- MENSAJE DE ERROR -->
                                            <div   class="invalid-feedback">Por favor Seleccione un MEDIO</div>
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
                                                            <div class="input-group" id="datetimepicker1">
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
                                        <label for="llamadaDetTextarea">Detalle llamada</label>
                                        <div class="input-group">
                                            <textarea class="form-control" id="llamadaDetTextarea" name="llamadaDetTextarea" rows="3" style="color: black !important; font-weight: bold !important;"></textarea>
                                            <!-- MENSAJE DE ERROR -->
                                            <div id="invlid_medio" class="invalid-feedback">Por favor escriba un detalle de llamada</div>
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
                                            <select class="form-control" id="select_modal_evento" name="select_modal_evento" data-toggle=""  style="color: black !important; font-weight: bold !important;"> </select>
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
                                        <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="evento_input" name="evento_input" placeholder="Detalle evento"  />
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
                                            <select class="form-control" id="select_modal_cotizacion" name="select_modal_cotizacion"  style="color: black !important; font-weight: bold !important;"> </select>
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
                                            <select class="form-control" id="select_modal_personal" name="select_modal_personal" data-toggle=""  style="color: black !important; font-weight: bold !important;"> </select>
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
                                        <div class="progress" id="div_barra_progress_comercializacion_seguimiento">
                                            <div id="barra_progress_comercializacion_seguimiento" class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- ::::::: CONTENEDOR DE ERRORES ::::::::: -->
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div id="contenedor_de_errores_comercializacion_seguimiento"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <button type="submit" style="display: none;"></button> --}}

                </form>
            </div>

            <!-- MODAL FOOTER -->
            <div class="modal-footer" >

                <button class="btn btn-primary" id="sgt_form" aria-selected="false"><i class="fas fa-paperclip"></i> Siguiente</button>

                <button class="btn btn-primary" id="ant_form" aria-selected="false"><i class="fas fa-paperclip"></i> Anterior</button>

                <button  class="btn btn-warning" id="generar_n_comercializacion" style="align-items: left !important;"><i class="fas fa-plus"> </i> Generar registro</button>

                <button  class="btn btn-success" id="guardar_registro_seguimiento"><i class="far fa-save"> </i> Guardar registro</button>

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

                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
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
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                            <div class="form-group">
                                <label class="form-control-label" for="number-empresa-input">Correo 2</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                    </div>
                                    <input  class="form-control" type="email" id="InputCorreo2" name="InputCorreo2" autocomplete="off" style="color: black !important; font-weight: bold !important;"/>
                                    <div class="invalid-feedback">Por Favor escriba un email valido</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                            <div class="form-group">
                                <label class="form-control-label" for="number-empresa-input">Correo 3</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                    </div>
                                    <input  class="form-control" type="email" id="InputCorreo3" name="InputCorreo3" autocomplete="off" style="color: black !important; font-weight: bold !important;"/>
                                    <div class="invalid-feedback">Por Favor escriba un email valido</div>
                                </div>
                            </div>
                        </div>

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
                    <input type="hidden" id="idcotiza" name="idcotiza"/>
                    <input type="hidden" id="idcotizacion_comercializacion" name="idcotizacion_comercializacion"/>
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
<script src="{{ asset('ajax/ajaxcomercializacion.js')}}"></script>
<script src="{{ asset('ajax/componentes/ajaxmodals.js')}}"></script>
<link rel="stylesheet" href="{{ asset('css/search.css')}}" type="text/css">

<script>
    $('#migaja_de_pan').html(''+
        '<div class="col-lg-6 col-7">'+
            '<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">'+
                '<ol class="breadcrumb breadcrumb-links breadcrumb-dark">'+
                    '<li class="breadcrumb-item">'+
                        '<a href="{{ url("/dashboard/comercializacion") }} "  ><i class="fas fa-home"></i> Home</a>'+
                    '</li>'+
                    '<li class="breadcrumb-item active" aria-current="page">{{$seguimiento->ModeloCliente->nro_documento}} - {{$seguimiento->ModeloCliente->nombres_razon_social}} {{$seguimiento->ModeloCliente->apellidos_nombre_comercial}}</li>'+
                    '<li class="breadcrumb-item active" aria-current="page">Lista</li>'+
                '</ol>'+
            '</nav>'+
        '</div>'+
    '');
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection
