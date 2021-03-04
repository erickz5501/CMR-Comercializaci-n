@extends('layout')
@section('title', 'Eventos')
@section('pagina', 'EVENTOS')

@section('content')
<div class="card-header">
    <div class="row align-items-center">
        <div class="col-8">
            <form>
                <input class="form-control" placeholder="Buscar evento..." type="text" id="searchTerm" onkeyup="doSearch()" />
            </form>
        </div>
        <div class="col-4 text-right">
            <a type="button" href="#" onclick="limpiar_evento();" class="btn btn btn-primary" data-toggle="modal" data-target="#registroModalEvento"><i class="fas fa-plus-circle"></i> Agregar evento</a>
        </div>
    </div>
</div>

<!-- ================================= MODAL Registro ================================= -->
@include('componentes/modals/evento/modal_evento')

<div class="table-responsive">
    <div>
        <table class="table align-items-center" id="datos">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody class="list" id="lista_eventos"></tbody>
        </table>
    </div>
</div>

<div class="card-footer py-4"></div>
@endsection

@section('js')
    <script src="{{ asset('funciones/crud.js')}}"></script>
    <script src="{{ asset('ajax/configuracion/ajaxeventos.js')}}"></script>
@endsection
<link rel="stylesheet" href="{{ asset('css/search.css')}}" type="text/css">