@extends('layout')
@section('title', 'Eventos')
@section('pagina', 'EVENTOS')

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
                            <a type="button" href="#" onclick="limpiar_evento();" class="btn btn btn-primary" data-toggle="modal" data-target="#modal_evento"><i class="fas fa-plus-circle"></i> Agregar evento</a>
                        </div>
                    </div>
                </div>

                <div class="card-body" style="padding-top: 0px !important;" >
                    <!-- TABLA LISTA DE ACTIVIDADES-->
                    <div class="table-responsive py-4" id="lista_tabla_eventos" >
                    </div>
                </div>
                <div class="card-footer py-4"></div>
            </div>
        </div>
    </div>
    <!-- :::::: MODAL Registro :::::: -->
    @include('componentes/modals/evento/modal_evento')
@endsection

@section('js')

    <script src="{{ asset('funciones/crud.js')}}"></script>

    <script src="{{ asset('ajax/configuracion/ajaxeventos.js')}}"></script>

    <link rel="stylesheet" href="{{ asset('css/search.css')}}" type="text/css">
@endsection


