@extends('layout')
@section('title', 'Giro de negocio')
@section('pagina', 'GIRO DE NEGOCIO')

@section('content')
<div class="card-header">
    <div class="row align-items-center">
        <div class="col-8">
            <form>
                <input class="form-control" placeholder="Buscar evento..." type="text" id="searchTerm" onkeyup="doSearch()" />
            </form>
        </div>
        <div class="col-4 text-right">
            <a type="button" href="#" onclick="limpiar_evento()" class="btn btn btn-primary" data-toggle="modal" data-target="#registroModalGiroNegocio"><i class="fas fa-plus-circle"></i> Agregar registro</a>
        </div>
    </div>
</div>

<!-- ================================= MODAL Registro ================================= -->
<div class="modal fade" id="registroModalGiroNegocio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <!-- ================================= MODAL TITULO ================================= -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red"></i> </span>
                </button>
            </div>

            <!-- ================================= MODAL CUERPO ================================= -->
            <form id="formulario_negocio" >
                @csrf
                <div class="modal-body" >
                    {{-- input ID oculto --}}
                    <input type="hidden" id="idgiro_negocio" name="idgiro_negocio" />
                    <div class="card-body mb-12 col-12" style="padding: 0px; margin: 0px !important; padding-top: 0px !important; padding-bottom:0px !important;">
                        
                        <div class="row">
                            <div class="col">
                                <label for="nombre_razon_social_input">Nombre</label>
                                <div class="form-group">
                                    <div class="input-group input-group-merge">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-signature"></i></span>
                                        </div>
                                        <input style="color: black !important; font-weight: bold !important;" type="text" class="form-control" id="nombre_input" name="nombre_input" placeholder="Giro de negocio" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ================================= FIN-CUADRO-BRODER ================================= -->
                </div>
                <!-- FIN-MODAL-BODY -->

                <!-- MODAL FOOTER -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="far fa-save"> </i> Guardar Giro de negocio</button>
                </div>
            </form>
            <!-- FIN-MODAL-FOOTER -->
        </div>
    </div>
</div>
<!-- FIN-MODAL -->

<div class="table-responsive">
    <div>
        <table class="table align-items-center" id="datos">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody class="list" id="lista_negocios"></tbody>
        </table>
    </div>
</div>

<div class="card-footer py-4"></div>
@endsection

@section('js')
    <script src="{{ asset('funciones/crud.js')}}"></script>
    <script src="{{ asset('ajax/configuracion/ajaxgironegocio.js')}}"></script>
@endsection
<link rel="stylesheet" href="{{ asset('css/search.css')}}" type="text/css">