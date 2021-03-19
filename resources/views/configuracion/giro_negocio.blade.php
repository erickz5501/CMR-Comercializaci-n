@extends('layout')
@section('title', 'Giro de negocio')
@section('pagina', 'GIRO DE NEGOCIO')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            {{-- <form>
                                <input class="form-control" placeholder="Buscar evento..." type="text" id="searchTerm" onkeyup="doSearch()" />
                            </form> --}}
                        </div>
                        <div class="col-sm-12 text-right">
                            <a type="button" href="#" onclick="limpiar_form_giro_negocio()" class="btn btn btn-primary" data-toggle="modal" data-target="#modal_giro_negocio"><i class="fas fa-plus-circle"></i> Agregar registro</a>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="padding-top: 0px !important;" >
                    <!-- TABLA LISTA DE MEDIOS DE CONTACTO-->
                    <div class="table-responsive py-4" id="lista_tabla_giro_negocio" >
                    </div>
                </div>
                <div class="card-footer py-4"></div>
            </div>
        </div>
    </div>

    <!-- ::::: MODAL AGREGAR GIRO NEGOCIO ::::: -->
    <div class="modal fade" id="modal_giro_negocio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content" >
                <!-- :::: MODAL HEADER :::: -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <span id="titulo_modal"> Agregar Medio de Contacto </span>
                        <i style="font-size: 20px !important; display: none;" class="fas fa-spinner fa-pulse" id="cargando_edit"></i>
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
                    <button id="guardar_registro" type="button" class="btn btn-outline-success" >
                        <i class="far fa-save"> </i>
                        <span id="btn_footer_modal"> Guardar</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('funciones/crud.js')}}"></script>
    <script src="{{ asset('ajax/configuracion/ajaxgironegocio.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('css/search.css')}}" type="text/css">
@endsection

