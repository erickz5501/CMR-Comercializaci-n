@extends('layout')
@section('title', 'Personal')
@section('pagina', 'PERSONAL')
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
                            <select  name="filtro_estado" id="filtro_estado" class="form-control" onchange="lista_tabla_personal(1);" style="color: black !important; " data-minimum-results-for-search="Infinity">
                                <option value="2">TODOS</option>
                                <option value="0">ACTIVO</option>
                                <option value="1">INACTIVO</option>
                            </select>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-10 text-right">
                            <button onclick="limpiar_form_personal();" type="button"  data-toggle="modal" data-target="#modal_personal" class="btn btn-outline-primary px-3 py-2" style="margin: 0px 0px 10px !important;" >
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
                                <select name="filtro_cant" id="filtro_cant" onchange="lista_tabla_personal(1);" aria-controls="datatable-basic" class="form-control form-control-sm"  style="color: black !important; font-weight: bold !important; display: inline-block;" >

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
                    <div  id="lista_tabla_personal" >
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ::: MODAL Registro ::: -->
    <div class="modal fade" id="modal_personal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
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
                    <form id="formulario_personal" enctype="multipart/form-data">
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
                                        <input  type="number" class="form-control" id="dni_personal" name="dni_personal" placeholder="numero" min="1"   />
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
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="padding-bottom: 20px !important;">
                                <label for="apellido_input"> Imagen</label>
                                <div>
                                    <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="avatar_personal" name="avatar_personal" lang="en">
                                    <label class="custom-file-label" for="avatar_personal"></label>
                                    </div>
                                </div>
                                <input type="hidden" id="avatar_personal_antiguo" name="avatar_personal_antiguo">
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
    <script src="{{ asset('ajax/configuracion/ajaxpersonal.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('css/search.css')}}" type="text/css">
@endsection

