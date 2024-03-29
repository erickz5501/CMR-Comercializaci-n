@extends('layout')
@section('title', 'Eventos')
@section('pagina', 'EVENTOS')
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
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header" style="padding-bottom: 10px !important;">
                    <div class="row align-middle">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2" style="padding-bottom: 10px !important;">
                            <select  name="filtro_estado" id="filtro_estado" class="form-control" onchange="lista_tabla_eventos(1);" style="color: black !important; " data-minimum-results-for-search="Infinity">
                                <option value="0">ACTIVO</option>
                                <option value="1">INACTIVO</option>
                            </select>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-10 text-right">
                            <button onclick="limpiar_evento();" type="button"  data-toggle="modal" data-target="#modal_evento" class="btn btn-outline-primary px-3 py-2" style="margin: 0px 0px 10px !important;" >
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
                                <select name="filtro_cant" id="filtro_cant" onchange="lista_tabla_eventos(1);" aria-controls="datatable-basic" class="form-control form-control-sm"  style="color: black !important; font-weight: bold !important; display: inline-block;" >
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
                                <input id="filtro_search" name="filtro_search" class="form-control form-control-sm" placeholder="Buscar evento..." type="search" >
                            </div>
                        </div>
                    </div>
                    <!-- TABLA LISTA DE ACTIVIDADES-->
                    <div  id="lista_tabla_eventos" >
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- :::::: MODAL REGISTRO UN EVENTO :::::: -->
    <div class="modal fade" id="modal_evento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content"  >
                <!-- ::::::: MODAL HEADER ::::::: -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <span id="titulo_modal"> Agregar evento </span>
                        <i style="font-size: 20px !important; display: none;" class="fas fa-spinner fa-pulse" id="cargando_edit"></i>
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
                    <button id="guardar_registro" type="button" class="btn btn-outline-success px-2 py-2" >
                        <i class="far fa-save"> </i>
                        <span id="btn_footer_modal">Guardar evento</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ::::: MODAL VER DOCUMENTO::::: -->
    <div class="modal fade " id="modal_detalle_evento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable" role="document">
            <div class="modal-content" >

                <!-- :::::: MODAL HEADER :::::: -->
                <div class="modal-header" style="padding-top: 10px !important; padding-bottom:0px !important;">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <span id="titulo_modal_doc"> </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red;"></i> </span>
                    </button>
                </div>

                <!-- :::::: MODAL BODY :::::: -->
                <div class="modal-body" style="padding-top: 0px !important; padding-bottom:0px !important; ">
                    <div  id="ver_detalle_evento">
                    </div>
                </div>

                <!-- MODAL FOOTER -->
                <div class="modal-footer" id="download_doc">
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script src="{{ asset('funciones/crud.js')}}"></script>

    <script src="{{ asset('ajax/configuracion/ajaxeventos.js')}}"></script>

    <link rel="stylesheet" href="{{ asset('css/search.css')}}" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
@endsection


