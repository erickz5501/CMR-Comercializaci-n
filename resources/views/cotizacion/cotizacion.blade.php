@extends('layout')
@section('title', 'Cotizacion')
@section('pagina', 'COTIZACION')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            {{-- <form>
                                <input class="form-control" placeholder="Buscar cotizacion..." type="text" id="searchTerm" onkeyup="doSearch()" />
                            </form> --}}
                        </div>
                        <div class="col-sm-12 text-right">
                            <a type="button" href="#" onclick="limpiar_cotizacion();" class="btn btn btn-primary" data-toggle="modal" data-target="#modal_cotizacion"><i class="fas fa-plus-circle"></i> Agregar Cotizacion</a>
                        </div>
                    </div>
                </div>
                <!-- LISTAMOS LA TABLA COTIZACION-->
                <div class="card-body" style="padding-top: 0px !important;" >
                    <div class="table-responsive py-4" id="lista_tabla_cotizaciones" >
                    </div>
                </div>

                <div class="card-footer py-4"></div>
            </div>
        </div>
    </div>

    <!-- ::::: MODAL AGREGAR COTIZACION::::: -->
    <div class="modal fade " id="modal_cotizacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content" >

                <!-- :::::: MODAL HEADER :::::: -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <span id="titulo_modal"> Agregar Cotización </span>
                        <i style="font-size: 20px !important; display: none;" class="fas fa-spinner fa-pulse" id="cargando_edit"></i>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red;"></i> </span>
                    </button>
                </div>

                <!-- :::::: MODAL BODY :::::: -->
                <div class="modal-body" style="padding-top: 0px !important; padding-bottom:0px !important; ">
                    <form id="formulario_cotizacion" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="idcotizaciones" name="idcotizaciones"/>
                        <div class="row">
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

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="padding-bottom: 20px;">
                                <div class="custom-file">
                                    <input type="file" id="ruta_cotizacion" name="ruta_cotizacion" lang="en"   class="custom-file-input">
                                    <label class="custom-file-label" for="customFileLang"></label>
                                    <input  type="hidden" id="doc_cotizacion_antiguo" name="doc_cotizacion_antiguo" >
                                </div>
                            </div>

                            <!-- :::::::: BARRA DE PROGRESO ::::::::-->
                            <div class="col-sm-12 col-md-12 col-xl-12" >
                                <div class="form-group">
                                    <div  class="progress" id="div_barra_progress_cotizacion" style="height: 12px !important;">
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
                    <button id="guardar_registro" type="button" class="btn btn-outline-success" >
                        <i class="far fa-save"> </i>
                        <span id="btn_footer_modal"> Guardar</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ::::: MODAL VER DOCUMENTO::::: -->
    <div class="modal fade " id="modal_ver_doc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content" >

                <!-- :::::: MODAL HEADER :::::: -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <span id="titulo_modal_doc"> </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red;"></i> </span>
                    </button>
                </div>

                <!-- :::::: MODAL BODY :::::: -->
                <div class="modal-body" style="padding-top: 0px !important; padding-bottom:0px !important; ">
                    <div  id="visualizar_pdf">
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
    <script src="{{ asset('ajax/ajaxcotizacion.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('css/search.css')}}" type="text/css">
@endsection

