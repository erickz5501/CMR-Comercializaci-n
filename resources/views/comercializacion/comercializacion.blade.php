@extends('layout')
@section('title', 'Comercializacion')
@section('pagina', 'COMERCIALIZACION')

@section('content')

<div class="card-header">
    <div class="row align-items-center">
        <div class="col-8">
            <form>
                <input class="form-control" placeholder="Buscar registro..." type="text" id="searchTerm" onkeyup="doSearch()" />
            </form>
        </div>
        <div class="col-4 text-right">
            <a type="button" href="#" onclick="limpiar_comercializacion();" class="btn btn btn-primary" data-toggle="modal" data-target="#registroModalComercializacion"><i class="fas fa-plus-circle"></i> Agregar registro</a>
        </div>
        <div class="col-4 text-left">
            <a type="button" href="#" onclick="lista_comercializacion();" class="btn btn btn-primary" id="filtro"><i class="fas fa-list-alt"></i> Mostrar lista original</a>
        </div>
    </div>
</div>

<!-- ================================= MODAL Detalle================================= -->
<div class="modal fade" id="ModalDetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" id="registro_modal">
        <!-- Contenido del modal /  -->
        
    </div>
</div>
<!-- FIN-MODAL -->

<!-- ================================= MODAL Registro ================================= -->
@include('componentes/modals/comercializacion/modal_comercializacion')

<!-- ================================= MODAL Registro COTIZACION================================= -->
@include('componentes/modals/cotizacion/modal_cotizacion')

<!-- ================================= MODAL Registro Interesado ================================= -->
@include('componentes/modals/comercializacion/modal_interesado_comercializacion')

<!-- ================================= MODAL Registro Medio ================================= -->
@include('componentes/modals/medios/modal_medios')

<!-- ================================= MODAL Registro Evento ================================= -->
@include('componentes/modals/evento/modal_evento')

<!-- ================================= MODAL Registro Personal ================================= -->
@include('componentes/modals/personal/modal_personal')

<!-- ================================= MODAL Registro Actividad ================================= -->
@include('componentes/modals/actividad/modal_actividad')

<div class="table-responsive">
    <div>
        <table class="table align-items-center" id="datos">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Cliente</th>
                    <th>Nro. Documento</th>
                    <th>Telefono</th>
                    <th>Persona Contacto</th>
                    <th>Actividad</th>
                    <th>Observaciones</th>
                    <th>Fecha evento</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody class="list" id="lista_comercializacion"></tbody>
        </table>
    </div>
</div>
    
@endsection

@section('js')
<script src="{{ asset('funciones/create.js')}}"></script>
<script src="{{ asset('funciones/crud.js')}}"></script>
<script src="{{ asset('ajax/componentes/ajaxmodals.js')}}"></script>
<script src="{{ asset('ajax/ajaxcomercializacion.js')}}"></script>
<script src="{{ asset('ajax/configuracion/ajaxmedios.js')}}"></script>
<script src="{{ asset('ajax/ajaxcotizacion.js')}}"></script>
<script src="{{ asset('ajax/ajaxcliente.js')}}"></script>
<script src="{{ asset('ajax/configuracion/ajaxactividad.js')}}"></script>
<script src="{{ asset('ajax/configuracion/ajaxeventos.js')}}"></script>
<script src="{{ asset('ajax/configuracion/ajaxpersonal.js')}}"></script>

@endsection
<link rel="stylesheet" href="{{ asset('css/search.css')}}" type="text/css">