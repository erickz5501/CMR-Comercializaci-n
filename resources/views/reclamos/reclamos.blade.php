@extends('layout')
@section('title', 'Reclamos')
@section('pagina', 'RECLAMOS')
@section('extra-css')
    <!--  Extra CSS search-->
    <link rel="stylesheet" href="{{ asset('css/search.css')}}" type="text/css">
    <style>
        .select2-selection__rendered{
            font-size: 14px !important;
        }
        .select2-results__options {
            height: 150px;
            overflow-y: auto;
        }
        input,textarea{
            color: black !important;
            font-weight: bold !important;
        }
    </style>
@endsection
@section('content')

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header" style="padding-bottom: 10px !important;">
                    <div class="row align-middle">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4  ">
                            <div class="row input-daterange datepicker   ">
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6  ">
                                    <div class="form-group">
                                        <input type="text" name="fecha_inicio" id="fecha_inicio" onchange="lista_tabla_reclamos(1)" autocomplete="off" class="form-control form-control-md" placeholder="Filtrar fecha inicio" />
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6  ">
                                    <div class="form-group  ">
                                        <input type="text" name="fecha_fin" id="fecha_fin" onchange="lista_tabla_reclamos(1)" autocomplete="off" class="form-control form-control-md  " placeholder="Filtrar fecha fin"   />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2" style="padding-bottom: 10px !important;">
                            <select  name="filtro_estado" id="filtro_estado" class="form-control" onchange="lista_tabla_reclamos(1);" data-minimum-results-for-search="Infinity"  >
                                <option value="3">TODOS</option>
                                <option value="0">PENDIENTE</option>
                                <option selected value="1">EN PROCESO</option>
                                <option value="2">TERMINADO</option>
                            </select>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-right">
                            <button onclick="limpiar_form_reclamo();" type="button"  data-toggle="modal" data-target="#modal_reclamo" class="btn btn-outline-primary px-3 py-2" style="margin: 0px 0px 10px !important;" >
                                <i class="fas fa-plus-circle"></i>
                                <span >Agregar reclamo</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="padding-top: 10px !important;" >
                    <div class="row" >
                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3 " >
                            <label class="media align-items-center">
                                <span style="padding-right: 10px;">Ver </span>
                                <select name="filtro_cant" id="filtro_cant" onchange="lista_tabla_reclamos(1);" aria-controls="datatable-basic" class="form-control form-control-sm"   >
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

                        <div class="col-sm-12 col-md-4 col-lg-6 col-xl-6 ">
                        </div>

                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3 ">
                            <div class="input-group input-group-merge">

                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding: 2px 8px 2px 8px !important;"><i  class="fas fa-search"></i></span>
                                </div>
                                <input id="filtro_search" name="filtro_search" class="form-control form-control-sm" placeholder="Buscar personal..." type="search" >
                            </div>
                        </div>
                    </div>
                    <!-- TABLA LISTA DE MEDIOS DE CONTACTO-->
                    <div  id="lista_tabla_reclamos" >
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- :::::: MODAL REGISTRO RECLAMO :::::: -->
    <div class="modal fade" id="modal_reclamo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <!-- :::::: MODAL HEADER :::::: -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <span id="titulo_modal_reclamo"> Agregar Reclamo </span>
                        <i style="font-size: 20px !important; display: none;" class="fas fa-spinner fa-pulse" id="cargando_edit_reclamo"></i>
                    </h5>
                    <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red;"></i> </span>
                    </button>
                </div>

                <!-- :::::: MODAL BODY :::::: -->
                <div class="modal-body" style="padding-top: 0px !important; padding-bottom: 0px !important;">
                    <form id="formulario_reclamo">
                        @csrf
                        <!-- ::::::: INPUT ID RECLAMOS ::::::::: -->
                        <input type="hidden" id="idreclamos" name="idreclamos" />

                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="btn_arriba_1" href="#" data-toggle="tab" role="tab" aria-controls="contenedor_form_1" aria-selected="false">
                                        <i class="fas fa-digital-tachograph"></i> Datos del Cliente
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="btn_arriba_2" href="#" data-toggle="tab" role="tab" aria-controls="contenedor_form_2" aria-selected="false">
                                        <i class="fas fa-paperclip"></i> Datos del Reclamo
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="contenedor_form_1" role="tabpanel" aria-labelledby="contenedor_form_1-tab">
                                <div class="row">
                                    <!-- :::: SELECT CLIENTE :::: -->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                        <div class="form-group">
                                            <label for=""> <sup class="text-danger font-weight-bold">*</sup> Cliente</label>
                                            <div class="input-group">
                                                <select class="form-control" name="select_modal_clientes" id="select_modal_clientes" autocomplete="off" >
                                                </select>
                                                <span class="input-group-addon input-group-append">
                                                    <button disabled class="btn btn-default" type="button" >
                                                        <i class="fas fa-plus-circle"></i>
                                                    </button>
                                                </span>
                                                <div class="invalid-feedback">Selecione un cliente por favor.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- :::: INPUT PERSONA DE CONTACTO :::: -->
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for=""> <sup class="text-danger font-weight-bold">*</sup> Persona Contacto</label>
                                            <input class="form-control" type="text" id="persona_contacto" name="persona_contacto" placeholder="Persona Contacto"  >
                                            <div class="invalid-feedback">Escriba una persona de contacto por favor.</div>
                                        </div>
                                    </div>
                                    <!-- :::: INPUT RUC / DNI :::: -->
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                        <div class="form-group">
                                            <label for="">RUC o DNI</label>
                                            <input class="form-control" type="number" id="ruc_dni_input" name="ruc_dni_input" placeholder="RUC O DNI" >
                                        </div>
                                    </div>
                                    <!-- :::: SELECT MEDIO DE CONTACTO :::: -->
                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
                                        <label for="select_modal_clientes"><sup class="text-danger font-weight-bold">*</sup> Medio de contacto</label>
                                        <div class="form-group">
                                            <div class="input-group" >
                                                <select   class="form-control" id="select_modal_medios" name="select_modal_medios" > </select>
                                                <span class="input-group-addon input-group-append">
                                                    <button class="btn btn-default" type="button" onclick="abrir_modal_medios();" data-toggle="tooltip" data-html="true" title="Agregar un medio de contacto.">
                                                        <i class="fas fa-plus-circle"></i>
                                                    </button>
                                                </span>
                                                <!-- MENSAJE DE ERROR -->
                                                <div id="invlid_medio" class="invalid-feedback">Selecione un medio de contacto por favor.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- :::: SELECT MODULOS :::: -->
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                        <div class="form-group">
                                            <label for=""> <sup class="text-danger font-weight-bold">*</sup> Modulos</label>
                                            <div class="input-group">
                                                <select name="select_modal_modulos" id="select_modal_modulos" class="form-control"  >
                                                </select>
                                                <span class="input-group-addon input-group-append">
                                                    <button disabled class="btn btn-default" type="button" >
                                                        <i class="fas fa-plus-circle"></i>
                                                    </button>
                                                </span>
                                                <div class="invalid-feedback">Selecione un modulo por favor.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- :::: TEXT-AREA DETALLE RECLAMO :::: -->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                            <label for="llamadaDetTextarea"> <sup class="text-danger font-weight-bold">*</sup> Detalle reclamo</label>
                                            <textarea class="form-control" id="descripcion_reclamo" name="descripcion_reclamo" rows="3"></textarea>
                                            <div class="invalid-feedback">Escriba un detalle por favor.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="contenedor_form_2" role="tabpanel" aria-labelledby="contenedor_form_2-tab">
                                <div class="row">
                                    <!-- :::: INPUT RECLAMO PROCEDE :::: -->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                            <label  for="reclamo_procede">Reclamo procede?</label>
                                            <div class="input-group ">
                                                <label class="custom-toggle custom-toggle-info">
                                                    <input type="checkbox" id="reclamo_procede" name="reclamo_procede"   onclick="deshabilitar_inputs();" onchange="deshabilitar_inputs();" checked>
                                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Si"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- :::: INPUT SOLUCION :::: -->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                        <div class="form-group">
                                            <label for=""><sup class="text-danger font-weight-bold">*</sup> Tipo de solución</label>
                                            <input class="form-control" type="text" id="tipo_solucion" name="tipo_solucion" placeholder="Tipo solución" >
                                        </div>
                                    </div>
                                    <!-- :::: SELECT PERSONAL :::: -->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                        <div class="form-group">
                                            <label for=""> Personal responsable</label>
                                            <div class="input-group ">
                                                <select class="form-control" id="select_modal_personal" name="select_modal_personal"  >

                                                </select>
                                                <span class="input-group-addon input-group-append">
                                                    <button class="btn btn-default" type="button" onclick="abrir_modal_personal();" data-toggle="tooltip" data-html="true" title="Agregar un personal.">
                                                        <i class="fas fa-plus-circle"></i>
                                                    </button>
                                                </span>
                                                <div class="invalid-feedback">Selecione un personal por favor.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- :::: INPUT CAUSA :::: -->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                        <div class="form-group">
                                            <label for=""> <sup class="text-danger font-weight-bold">*</sup> Causa</label>
                                            <textarea class="form-control" type="text" id="causa" name="causa" placeholder="Causa" ></textarea>
                                        </div>
                                    </div>

                                    <!-- :::: INPUT ACCION :::: -->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                        <div class="form-group">
                                            <label for=""> <sup class="text-danger font-weight-bold">*</sup> Accion a tomar</label>
                                            <textarea class="form-control" type="text" id="accion_tomar" name="accion_tomar" placeholder="Acción a tomar" ></textarea>
                                        </div>
                                    </div>

                                    <!-- :::: INPUT FECHA DE COMPROMISO :::: -->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                        <div class="form-group">
                                            <label for="">Fecha compromiso</label>
                                            <input class="form-control" type="date"   id="fecha_compromiso" name="fecha_compromiso" >
                                        </div>
                                    </div>
                                    <!-- :::: INPUT FECHA DE SOLUCION :::: -->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                        <div class="form-group">
                                            <label for=""><sup class="text-danger font-weight-bold">*</sup> Fecha solucion</label>
                                            <div class="input-group ">
                                                <input class="form-control" type="date"   id="fecha_solucion" name="fecha_solucion" >
                                                <div class="invalid-feedback">Selecione una fecha de solución.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- :::: INPUT MINUTOS :::: -->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-2">
                                        <div class="form-group">
                                            <label for=""> <sup class="text-danger font-weight-bold">*</sup> Solucion(minutos)</label>
                                            <div class="input-group ">
                                                <input class="form-control" type="number" id="solucion_minutos" name="solucion_minutos" placeholder="Minutos" onkeyup="calcular_dias();" onchange="calcular_dias();" >
                                                <div class="invalid-feedback">Este campo es requerido</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- :::: INOUT DIAS :::: -->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-2">
                                        <div class="form-group">
                                            <label for=""><sup class="text-danger font-weight-bold">*</sup> Solucion(dias)</label>
                                            <div class="input-group ">
                                                <input class="form-control" type="number" id="solucion_dias" name="solucion_dias" placeholder="Días" step="0.01" readonly >
                                                <div class="invalid-feedback">Este campo es requerido.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- :::: INPUT EVIDENCIA DE VERIFICACION :::: -->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
                                        <div class="form-group">
                                            <label for=""> Evidencia de verificacion</label>
                                            <textarea class="form-control" id="evidenciaTextarea" name="evidenciaTextarea" rows="2" ></textarea>
                                        </div>
                                    </div>
                                    <!-- :::: INPUT SE EMITE CORRECTIVO :::: -->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
                                        <div class="form-group">
                                            <label for="">¿Se emite correctivo?</label>
                                            <input  class="form-control" type="text" id="emite_correctivo" name="emite_correctivo" placeholder="¿Se emite correctivo?" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- ::::::: BARRA DE PROGRESO ::::::::: -->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <div class="progress" id="div_barra_progress_reclamo">
                                        <div id="barra_progress_reclamo" class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- ::::::: CONTENEDOR DE ERRORES ::::::::: -->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div id="contenedor_de_errores_reclamo"></div>
                            </div>
                        </div>
                        <button type="submit" style="display: none;"></button>
                    </form>
                </div>

                <!-- MODAL FOOTER -->
                <div class="modal-footer" >
                    <button class="btn btn-primary" id="sgt_form" aria-selected="false"><i class="fas fa-paperclip"></i> Siguiente</button>

                    <button class="btn btn-primary" id="ant_form" aria-selected="false"><i class="fas fa-paperclip"></i> Anterior</button>

                    <button   class="btn btn-success" id="guardar_registro_reclamos"><i class="far fa-save"> </i> GUARDAR</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ::::: MODAL VER DETALLE DE RECLAMOS::::: -->
    <div class="modal fade" id="modal_detalle_reclamo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document" id="detalle_reclamo_modal">
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
                                        <input  type="text" class="form-control" id="nombre_medio" name="nombre_medio" placeholder="Medio de contacto"  />
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
                         GUARDAR
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
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="dni_personal">
                                        Numero documento
                                    </label>
                                    <div class="input-group  ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-id-badge"></i></span>
                                        </div>
                                        <input  type="number" class="form-control" id="dni_personal" name="dni_personal" placeholder="numero"   style="color: black !important; font-weight: bold !important;"/>
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

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                <label for="nombre_input"> <sup class="text-danger font-weight-bold">*</sup> Nombres</label>
                                <div class="form-group">
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                        </div>
                                        <input  type="text" class="form-control" id="nombre_personal" name="nombre_personal" placeholder="Nombres"  />
                                        <div id="invlid_medio" class="invalid-feedback">Escriba un nombre.</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label for="apellido_input"> <sup class="text-danger font-weight-bold">*</sup> Apellidos</label>
                                <div class="form-group">
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                        </div>
                                        <input  type="text" class="form-control" id="apellido_personal" name="apellido_personal" placeholder="Apellido"  />
                                        <div id="invlid_medio" class="invalid-feedback">Escriba un apellido.</div>
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
                <div class="modal-footer" style="padding-top: 10px !important;">
                    <button id="guardar_registro_personal" type="button" class="btn btn-outline-success px-2 py-2" >
                        <i class="far fa-save"> </i>
                        GUARDAR
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('funciones/crud.js')}}"></script>
    <script src="{{ asset('ajax/ajaxreclamos.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('css/search.css')}}" type="text/css">
@endsection

