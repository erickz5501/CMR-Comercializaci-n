@extends('layout')
@section('title', 'Modulos')
@section('title', 'MODULOS')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            {{-- <form>
                                <input class="form-control" placeholder="Buscar modulo..." type="text" id="searchTerm" onkeyup="doSearch()" />
                            </form> --}}
                        </div>
                        <div class="col-sm-12 text-right">
                            <a type="button" href="#" onclick="limpiar_form_modulos();" class="btn btn btn-primary" data-toggle="modal" data-target="#modal_modulos"><i class="fas fa-plus-circle"></i> Agregar medio</a>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="padding-top: 0px !important;" >
                    <!-- TABLA LISTA DE MEDIOS DE CONTACTO-->
                    <div class="table-responsive py-4" id="lista_tabla_modulos" >
                    </div>
                </div>
                <div class="card-footer py-4"></div>
            </div>
        </div>
    </div>


    <!-- ::::: MODAL Registro ::::: -->
    <div class="modal fade" id="modal_modulos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <!-- ::::: MODAL HEADER ::::: -->
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">
                        <span id="titulo_modal"> Agregar Modulo </span>
                        <i style="font-size: 20px !important; display: none;" class="fas fa-spinner fa-pulse" id="cargando_edit"></i>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red"></i> </span>
                    </button>
                </div>

                <!-- ::::: MODAL BODY ::::: -->
                <div class="modal-body" style="padding-top: 0px; padding-bottom: 0px !important;" >
                    <form id="formulario_modulos" >
                        @csrf
                        <input type="hidden" id="idmodulos" name="idmodulos" />
                        <div class="row">
                            <div class="col-12">
                                <label for="nombre_razon_social_input">Nombre</label>
                                <div class="form-group">
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                        </div>
                                        <input style="color: black !important; font-weight: bold !important;" type="text" class="form-control" id="nombre_input" name="nombre_input" placeholder="Cotizacion" />
                                        <div class="invalid-feedback">Escriba un nombre por favor.</div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion" class="control-label">Descripción <label id="icon_descripcion_termino"> </label></label>
                                    <textarea name="caracteristicas_modulo" id="caracteristicas_modulo" class="form-control" rows="8" placeholder="Ingrese Titulo ..."></textarea>
                                </div>
                            </div>
                            <!-- ::::::::::: BARRA DE PROGRESO :::::::::::::::::::-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="progress" id="div_barra_progress_modulos" style="height: 12px !important;">
                                        <div id="barra_progress_modulos" class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- ::::::::::::::::  CONTENEDOR DE ERRORES ::::::::::-->
                            <div class="col-md-12">
                                <div id="contenedor_de_errores_modulos"></div>
                            </div>
                        </div>
                        <button type="submit" style="display: none;"></button>
                    </form>
                </div>

                <!-- MODAL FOOTER -->
                <div class="modal-footer" style="padding-top: 0px !important;">
                    <button id="guardar_registro" type="button" class="btn btn-outline-success px-2 py-2" >
                        <i class="far fa-save"> </i>
                        <span id="btn_footer_modal">Guardar modulo</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- :::::::: MODAL DETALLE :::::::: -->
    <div class="modal fade" id="modal_detalle_one_modulo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document" >
            <div class="modal-content" id="detalle_one_modulo">
            <!-- Contenido del modal /  -->
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('funciones/crud.js')}}"></script>
    <script src="{{ asset('ajax/configuracion/ajaxmodulos.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('css/search.css')}}" type="text/css">
@endsection

