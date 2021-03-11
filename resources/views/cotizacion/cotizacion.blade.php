@extends('layout')
@section('title', 'Cotizacion')
@section('pagina', 'COTIZACION')

@section('content')
<div class="card-header">
    <div class="row align-items-center">
        <div class="col-8">
            <form>
                <input class="form-control" placeholder="Buscar cotizacion..." type="text" id="searchTerm" onkeyup="doSearch()" />
            </form>
        </div>
        <div class="col-4 text-right">
            <a type="button" href="#" onclick="limpiar_cotizacion();" class="btn btn btn-primary" data-toggle="modal" data-target="#modal_cotizacion"><i class="fas fa-plus-circle"></i> Agregar Cotizacion</a>
        </div>
    </div>
</div>

<!-- ================================= MODAL Registro COTIZACION================================= -->
@include('componentes/modals/cotizacion/modal_cotizacion')

<div class="table-responsive">
    <div>
        <table class="table align-items-center" id="datos">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Cotizacion</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody class="list" id="lista_cotizaciones"></tbody>
        </table>
    </div>
</div>

<div class="card-footer py-4"></div>
@endsection

@section('js')
    <script src="{{ asset('funciones/crud.js')}}"></script>
    <script src="{{ asset('ajax/ajaxcotizacion.js')}}"></script>
@endsection
<link rel="stylesheet" href="{{ asset('css/search.css')}}" type="text/css">
