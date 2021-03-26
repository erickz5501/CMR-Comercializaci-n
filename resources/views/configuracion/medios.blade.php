@extends('layout')
@section('title', 'Medios de contacto')
@section('pagina', 'MEDIOS')
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
                            <select  name="filtro_estado" id="filtro_estado" class="form-control" onchange="lista_tabla_medios(1);" style="color: black !important; " data-minimum-results-for-search="Infinity">
                                <option value="0">ACTIVO</option>
                                <option value="1">INACTIVO</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-10 text-right">
                            <button onclick="limpiar_form_medio();" type="button"  data-toggle="modal" data-target="#modal_medios" class="btn btn-outline-primary px-3 py-2" style="margin: 0px 0px 10px !important;" >
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
                                <select name="filtro_cant" id="filtro_cant" onchange="lista_tabla_medios(1);" aria-controls="datatable-basic" class="form-control form-control-sm"  style="color: black !important; font-weight: bold !important; display: inline-block;" >
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
                                <input id="filtro_search" name="filtro_search" class="form-control form-control-sm" placeholder="Buscar..." type="search" >
                            </div>
                        </div>
                    </div>
                    <!-- TABLA LISTA DE MEDIOS DE CONTACTO-->
                    <div   id="lista_tabla_medios" >
                    </div>
                </div>
                <div class="card-footer py-4"></div>
            </div>
        </div>
    </div>
    @include('componentes/modals/medios/modal_medios')

@endsection

@section('js')
    <script src="{{ asset('funciones/crud.js')}}"></script>
    <script src="{{ asset('ajax/configuracion/ajaxmedios.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('css/search.css')}}" type="text/css">
@endsection

