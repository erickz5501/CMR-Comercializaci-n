@extends('layout')
@section('title', 'Lista de etiquetas')
@section('pagina', 'Etiqueta')

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
                            <select  name="filtro_estado" id="filtro_estado" class="form-control" onchange="lista_tabla_etiqueta(1);" style="color: black !important;" data-minimum-results-for-search="Infinity">
                                <option value="2">TODOS</option>
                                <option value="0">ACTIVO</option>
                                <option value="1">INACTIVO</option>
                            </select>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-10 text-right" style="padding-bottom: 10px !important;">
                            <button onclick="limpiar_form_etiqueta()" data-toggle="modal" data-target="#modal_etiqueta" type="button" class="btn btn-outline-primary px-3 py-2" style="margin: 0px 0px 10px !important;" >
                                <i class="fas fa-plus-circle"></i>
                                <span > Agregar Etiqueta</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body" style="padding-top: 15px !important; padding-bottom: 0px !important;" >
                    <div class="row" >
                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3 " >
                            <label class="media align-items-center">
                                <span style="padding-right: 10px;">Ver </span>
                                <select name="filtro_cant" id="filtro_cant" onchange="lista_tabla_etiqueta(1);" aria-controls="datatable-basic" class="form-control form-control-sm"  style="color: black !important; font-weight: bold !important; display: inline-block;" >
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
                            <div class="input-group input-group-merge"">

                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding: 2px 8px 2px 8px !important;"><i  class="fas fa-search"></i></span>
                                </div>
                                <input id="filtro_search" name="filtro_search" class="form-control form-control-sm" placeholder="Buscar cliente..." type="search" >
                            </div>
                        </div>
                    </div>

                    <div id="lista_tabla_etiquetas"  style="padding-top: 0px !important;">
                    </div>
                    <!-- TABLA LISTA DE ETIQUETA-->
                </div>
            </div>
        </div>
    </div>

    <!-- ::::::: MODAL REGISTRO  DE ETIQUETA ::::::: -->
    <div class="modal fade" id="modal_etiqueta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <!-- ::::::: MODAL HEADER ::::::: -->
                <div class="modal-header" style="padding-bottom: 10px !important;">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <span id="titulo_modal_etiqueta"> Agregar Etiqueta </span>
                        <i style="font-size: 20px !important; display: none;" class="fas fa-spinner fa-pulse" id="cargando_edit_etiqueta"></i>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red;"></i> </span>
                    </button>
                </div>
                <!-- ::::::: MODAL BODY ::::::: -->
                <div class="modal-body" style="padding-top: 0px !important; padding-bottom: 0px !important;  ">
                    <form id="formulario_etiqueta" >
                        @csrf
                        <input type="hidden" id="idetiquetas" name="idetiquetas" />
                        <div class="row">
                            <!-- ::::::::::: INPUT APELLIDOS NOMBRE COMERCIAL ::::::::::::-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="nombre_etiqueta">
                                        Nombre
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input  type="text" class="form-control" id="nombre_etiqueta" name="nombre_etiqueta" placeholder="Nombre"   style="color: black !important; font-weight: bold !important;" autocomplete="off" />
                                        <div class="invalid-feedback">Por Favor escriba un nombre</div>
                                    </div>
                                </div>
                            </div>
                            <!-- ::::::::::: INPUT APELLIDOS NOMBRE COMERCIAL ::::::::::::-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="descripcion_etiqueta">
                                        Descripción
                                    </label>
                                    <div class="input-group">
                                        <textarea type="text"  id="descripcion_etiqueta" name="descripcion_etiqueta" cols="30" rows="4" placeholder="Descripción"  class="form-control" style="color: black !important; font-weight: bold !important;" autocomplete="off"></textarea>
                                        <div class="invalid-feedback">Por Favor escriba un nombre</div>
                                    </div>
                                </div>
                            </div>
                            <!-- ::::::::::: BARRA DE PROGRESO :::::::::::::::::::-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <div class="progress" id="div_barra_progress_etiqueta" style="height: 12px !important;">
                                        <div id="barra_progress_etiqueta" class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- ::::::::::::::::  CONTENEDOR DE ERRORES ::::::::::-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div id="contenedor_de_errores_etiqueta"></div>
                            </div>
                        </div>
                        <button type="submit" style="display: none;"></button>
                    </form>
                </div>

                <!-- MODAL FOOTER -->
                <div class="modal-footer" style="padding-top: 0px !important;">
                    <button id="guardar_registro" type="button" class="btn btn-outline-primary px-3 py-2" >
                        <i class="far fa-save"> </i>
                        <span id="btn_footer_modal_etiqueta">GUARDAR</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- :::: MODAL Detalle:::: -->
    <div class="modal fade" id="modal_detalle_etiqueta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document" id="cliente_modal">
            <!-- Contenido del modal /  -->
        </div>
    </div>

@endsection

@section('js')
<script src="{{ asset('funciones/create.js')}}"></script>
<script src="{{ asset('funciones/crud.js')}}"></script>
<script src="{{ asset('ajax/ajaxEtiqueta.js')}}"></script>
{{-- <script src="{{ asset('ajax/ajaxhistorial.js') }}"></script> --}}
@endsection

