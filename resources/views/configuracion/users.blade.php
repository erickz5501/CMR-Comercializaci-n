@extends('layout')
@section('title', 'Users')
@section('title', 'USERS')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">

                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            {{-- <form>
                                <input class="form-control" placeholder="Buscar usuario..." type="text" id="searchTerm" onkeyup="doSearch()" />
                            </form> --}}
                        </div>
                        <div class="col-sm-12 text-right">
                            <a type="button" href="#" onclick="limpiar_form_users();" class="btn btn btn-primary" data-toggle="modal" data-target="#modal_users"><i class="fas fa-plus-circle"></i> Agregar usuario</a>
                        </div>
                    </div>
                </div>

                <div class="card-body" style="padding-top: 0px !important;" >
                    <!-- TABLA LISTA DE MEDIOS DE CONTACTO-->
                    <div class="table-responsive py-4" id="lista_tabla_users" >
                    </div>
                </div>

                <div class="card-footer py-4"></div>
            </div>
        </div>
    </div>
    <!-- ::::::: MODAL Registro ::::::: -->
    <div class="modal fade" id="modal_users" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <!-- ::::::: MODAL HEADER ::::::: -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <span id="titulo_modal"> Agregar Usuario </span>
                        <i style="font-size: 24px !important; display: none;" class="fas fa-spinner fa-pulse" id="cargando_edit"></i>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red"></i> </span>
                    </button>
                </div>

                <!-- ::::::: MODAL BODY ::::::: -->
                <div class="modal-body" style="padding-top: 0px; padding-bottom: 0px !important;">
                    <form id="formulario_users" >
                        @csrf
                        <input type="hidden" id="idusers" name="idusers" />


                        <div class="row">
                            <div class="ccol-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="numDocumentoInput">
                                        <sup class="text-danger font-weight-bold">*</sup>
                                        Numero documento
                                    </label>
                                    <div class="input-group  ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-id-badge"></i></span>
                                        </div>
                                        <input  type="number" class="form-control" id="dni_users" name="dni_users" placeholder="numero"  style="color: black !important; font-weight: bold !important;" />
                                        <span class="input-group-addon input-group-append">
                                            <button class="btn btn-default" type="button" id="button-addon2" onclick="cunsulta_sunat();" data-toggle="tooltip" data-original-title="Consulta RENIEC/SUNAT">
                                                <i class="fas fa-angle-right" id="cargado_sunat"></i>
                                                <i style="font-size: 20px; display: none;" class="fas fa-spinner fa-pulse fa-2x" id="cargando_sunat"></i>
                                            </button>
                                        </span>
                                        <div class="invalid-feedback">Por Favor escriba un N° Doc. valido</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <label for="nombre_razon_social_input">Nombre</label>
                                <div class="form-group">
                                    <div class="input-group  ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                        </div>
                                        <input  type="text" class="form-control" id="nombre_users" name="nombre_users" placeholder="Nombres" style="color: black !important; font-weight: bold !important;" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <label for="nombre_razon_social_input">Apellidos</label>
                                <div class="form-group">
                                    <div class="input-group  ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="apellido_users" name="apellido_users" placeholder="Apellidos" style="color: black !important; font-weight: bold !important;" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <label for="nombre_razon_social_input">Email</label>
                                <div class="form-group">
                                    <div class="input-group  ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                        </div>
                                        <input  type="email" class="form-control" id="email_users" name="email_users" placeholder="correo@gmail.com" style="color: black !important; font-weight: bold !important;" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <label for="nombre_razon_social_input">Contraseña</label>
                                <div class="form-group">
                                    <div class="input-group  ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                        </div>
                                        <input  type="password" class="form-control" id="password" name="password" style="color: black !important; font-weight: bold !important;" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <label for="nombre_razon_social_input">Confirmar Contraseña</label>
                                <div class="form-group">
                                    <div class="input-group  ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                        </div>
                                        <input  type="password" class="form-control" id="password_confirmation" name="password_confirmation" style="color: black !important; font-weight: bold !important;" />
                                    </div>
                                </div>
                            </div>
                            <!-- ::::::::::: BARRA DE PROGRESO :::::::::::::::::::-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="progress" id="div_barra_progress_users" style="height: 12px !important;">
                                        <div id="barra_progress_users" class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- ::::::::::::::::  CONTENEDOR DE ERRORES ::::::::::-->
                            <div class="col-md-12">
                                <div id="contenedor_de_errores_users"></div>
                            </div>
                        </div>
                        <button type="submit" style="display: none;"></button>
                    </form>
                </div>
                    <!-- MODAL FOOTER -->
                <div class="modal-footer" style="padding-top: 0px !important;">
                    <button id="guardar_registro" type="button" class="btn btn-outline-success px-2 py-2" >
                        <i class="far fa-save"> </i>
                        <span id="btn_footer_modal">Guardar usuario</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('funciones/crud.js')}}"></script>
    <script src="{{ asset('ajax/configuracion/ajaxusers.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('css/search.css')}}" type="text/css">
@endsection

