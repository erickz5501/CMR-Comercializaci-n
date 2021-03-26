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
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2" style="padding-bottom: 10px !important;">
                            <select  name="filtro_estado" id="filtro_estado" class="form-control" onchange="lista_reclamos();" data-minimum-results-for-search="Infinity"  >
                                <option value="0">ACTIVO</option>
                                <option value="1">INACTIVO</option>
                            </select>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-10 text-right">
                            <button onclick="limpiar_reclamo();" type="button"  data-toggle="modal" data-target="#modal_reclamo" class="btn btn-outline-primary px-3 py-2" style="margin: 0px 0px 10px !important;" >
                                <i class="fas fa-plus-circle"></i>
                                <span >Agregar evento</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="padding-top: 10px !important;" >
                    <div class="row" >
                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3 " >
                            <label class="media align-items-center">
                                <span style="padding-right: 10px;">Ver </span>
                                <select name="filtro_cant" id="filtro_cant" onchange="lista_reclamos();" aria-controls="datatable-basic" class="form-control form-control-sm"   >
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
                    <div  id="lista_reclamos" >
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
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Reclamo</h5>
                    <button onclick="limpiar_comercializacion();" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red;"></i> </span>
                    </button>
                </div>

                <!-- :::::: MODAL BODY :::::: -->
                <div class="modal-body" style="padding-top: 0px !important; padding-bottom: 0px !important;">
                    <form id="formulario_reclamo">
                        @csrf
                        <!-- ::::::: INPUT ID COMERCIALIZACION ::::::::: -->
                        <input type="hidden" id="idcomercializacion" name="idcomercializacion" />

                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="btn_arriba_1" href="#" data-toggle="tab" role="tab" aria-controls="tabs-icons-text-1" aria-selected="false">
                                        <i class="fas fa-digital-tachograph"></i> Datos del Cliente
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="btn_arriba_2" href="#" data-toggle="tab" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">
                                        <i class="fas fa-paperclip"></i> Datos del Reclamo
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                <div class="row">
                                    <!-- :::: SELECT CLIENTE :::: -->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                        <div class="form-group">
                                            <label for="">Cliente</label>
                                            <div class="input-group">
                                                <select class="form-control" name="select_modal_clientes" id="select_modal_clientes" autocomplete="off" >
                                                </select>
                                                <div class="invalid-feedback">Selecione un cliente por favor.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- :::: INPUT PERSONA DE CONTACTO :::: -->
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group">
                                            <label for="">Persona Contacto</label>
                                            <input class="form-control" type="text" id="persona_contacto" name="persona_contacto" placeholder="Persona Contacto"  >
                                            <div class="invalid-feedback">Escriba una persona de contacto por favor.</div>
                                        </div>
                                    </div>
                                    <!-- :::: INPUT RUC / DNI :::: -->
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                        <div class="form-group">
                                            <label for="">RUC o DNI</label>
                                            <input class="form-control" type="text" id="ruc_dni_input" name="ruc_dni_input" placeholder="RUC O DNI" >
                                        </div>
                                    </div>
                                    <!-- :::: SELECT MEDIO DE CONTACTO :::: -->
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                        <div class="form-group">
                                            <label for="">Medio de contacto</label>
                                            <div class="input-group">
                                                <select class="form-control" id="select_modal_medios" name="select_modal_medios"  >
                                                </select>
                                                <div class="invalid-feedback">Selecione un medio de contacto por favor.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- :::: SELECT MODULOS :::: -->
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                        <div class="form-group">
                                            <label for="">Modulos</label>
                                            <div class="input-group">
                                                <select name="select_modal_modulos" id="select_modal_modulos" class="form-control multi_select"  >
                                                </select>
                                                <div class="invalid-feedback">Selecione un modulo por favor.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- :::: TEXT-AREA DETALLE RECLAMO :::: -->
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                            <label for="llamadaDetTextarea">Detalle reclamo</label>
                                            <textarea class="form-control" id="descripcion_reclamo" name="descripcion_reclamo" rows="3"></textarea>
                                            <div class="invalid-feedback">Escriba un detalle por favor.</div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                <div class="row">
                                    <!-- :::: INPUT SOLUCION :::: -->
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="">Solucion</label>
                                            <input class="form-control" type="text" id="solucion_input" name="solucion_input" placeholder="Tipo solución" >
                                        </div>
                                    </div>
                                    <!-- :::: INPUT CAUSA :::: -->
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="">Causa</label>
                                            <input class="form-control" type="text" id="causa_input" name="causa_input" placeholder="Causa" >
                                        </div>
                                    </div>
                                    <!-- :::: INPUT RECLAMO PROCEDE :::: -->
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label  for="reclamo_procede">Reclamo procede?</label>
                                            <div class="input-group ">
                                                <label class="custom-toggle custom-toggle-info">
                                                    <input type="checkbox" id="reclamo_procede" name="reclamo_procede" value="0">
                                                    <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Si"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- :::: INPUT ACCION :::: -->
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="">Accion</label>
                                            <input class="form-control" type="text" id="accion_tomar_input" name="accion_tomar_input" placeholder="Acción a tomar" >
                                        </div>
                                    </div>
                                    <!-- :::: SELECT PERSONAL :::: -->
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="">Personal responsable</label>
                                            <select class="form-control" id="select_modal_personal" name="select_modal_personal"  >
                                                <option>Personal Responsable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- :::: INPUT FECHA DE COMPROMISO :::: -->
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Fecha compromiso</label>
                                            <input class="form-control" type="date" value="2018-11-23" id="fecha_compromiso" name="fecha_compromiso" >
                                        </div>
                                    </div>
                                    <!-- :::: INPUT FECHA DE SOLUCION :::: -->
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Fecha solucion</label>
                                            <input class="form-control" type="date" value="2018-11-23" id="fecha_solucion" name="fecha_solucion" >
                                        </div>
                                    </div>
                                    <!-- :::: INPUT MINUTOS :::: -->
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Solucion(minutos)</label>
                                            <input class="form-control" type="number" id="solucion_minutos_input" name="solucion_minutos_input" placeholder="Solucion(Minutos)" >
                                        </div>
                                    </div>
                                    <!-- :::: INOUT DIAS :::: -->
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Solucion(dias)</label>
                                            <input class="form-control" type="number" id="solucion_dias_input" name="solucion_dias_input" placeholder="Solucion(Dias)" >
                                        </div>
                                    </div>
                                    <!-- :::: INPUT EVIDENCIA DE VERIFICACION :::: -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Evidencia de verificacion</label>
                                            <textarea class="form-control" id="evidenciaTextarea" name="evidenciaTextarea" rows="2" ></textarea>
                                        </div>
                                    </div>
                                    <!-- :::: INPUT SE EMITE CORRECTIVO :::: -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">¿Se emite correctivo?</label>
                                            <input  class="form-control" type="text" id="emite_correctivo_input" name="emite_correctivo_input" placeholder="¿Se emite correctivo?" >
                                        </div>
                                    </div>
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
                            </div>
                        </div>
                    </form>
                </div>

                <!-- MODAL FOOTER -->
                <div class="modal-footer" >
                    <button class="btn btn-primary" id="sgt_form" aria-selected="false"><i class="fas fa-paperclip"></i> Siguiente</button>

                    <button class="btn btn-primary" id="ant_form" aria-selected="false"><i class="fas fa-paperclip"></i> Anterior</button>

                    <button   class="btn btn-success" id="guardar_registro"><i class="far fa-save"> </i> GUARDAR</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ================================= MODAL Detalle================================= -->
    <div class="modal fade" id="ModalDetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document" id="reclamo_modal">
            <!-- Contenido del modal /  -->

        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('funciones/crud.js')}}"></script>
    <script src="{{ asset('ajax/ajaxreclamos.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('css/search.css')}}" type="text/css">
@endsection

