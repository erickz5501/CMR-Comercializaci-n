@extends('layout') @section('title', 'Lista de clientes') @section('pagina', 'Clientes') @section('content')
<div class="card-header">
    <div class="row align-items-center">
        <div class="col-8">
            <form>
                <input class="form-control" placeholder="Buscar cliente..." type="text" id="searchTerm" onkeyup="doSearch()" />
            </form>
        </div>
    </div>
</div>

<!-- ================================= MODAL Detalle================================= -->
<div class="modal fade" id="ModalDetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" id="cliente_modal">
        <!-- Contenido del modal /  -->
    </div>
</div>
<!-- FIN-MODAL -->

<!-- ================================= MODAL Licencia ================================= -->
<div class="modal fade" id="ModalRegistroLicencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" id="modal_licencia">
        <div class="modal-content">
            <!-- ================================= MODAL TITULO ================================= -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Licencia de Empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> <i class="far fa-times-circle"></i> </span>
                </button>
            </div>

            <!-- ================================= MODAL CUERPO ================================= -->
            <form id="" >
                @csrf
                <div class="modal-body">
                    {{-- input ID oculto --}}
                    <div class="card-body mb-12 col-12" style="padding: 0px; margin-left: 0px !important;">
                        <div class="border" style="margin-bottom: 10px; padding: 20px; border-radius: 10px;">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nombre_empresa" class="form-control-label">Nombre de la empresa</label>
                                        <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="nombre_empresa" name="nombre_empresa" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="ruc_empresa" class="form-control-label">RUC</label>
                                        <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="ruc_empresa" name="ruc_empresa"  readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="representante_legal" class="form-control-label">Representante Legal  </label>
                                        <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="representante_legal" name="representante_legal" placeholder="Roque Zumaeta" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="correo_empresa" class="form-control-label">Correo Electronico</label>
                                        <input style="color: black !important; font-weight: bold !important;" class="form-control" type="email" id="correo_empresa" name="correo_empresa" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="telefono_empresa" class="form-control-label">Telefono</label>
                                        <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="telefono_empresa" name="telefono_empresa" readonly >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="direccion_empresa" class="form-control-label">Direccion</label>
                                        <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="direccion_empresa" name="direccion_empresa" placeholder="" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="select_modal_modulos-input">Software</label>
                                        <select style="color: black !important; font-weight: bold !important;" name="select_modal_software" id="select_modal_software" class="form-control multi_select" data-toggle="select" required>
                                            {{-- Aqi van las opciones de modulos --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="select_modal_modulos-input">Periodo</label>
                                        <select style="color: black !important; font-weight: bold !important;" name="select_modal_periodo" id="select_modal_periodo" class="form-control multi_select" data-toggle="select" required>
                                            <option value="">Perido 1</option>
                                            <option value="">Periodo 2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="persona-contacto-input" class="form-control-label">Cantidad</label>
                                        <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="cantidad_input" name="cantidad_input" placeholder="" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="example-date-input" class="form-control-label">Fecha inicion</label>
                                        <input style="color: black !important; font-weight: bold !important;" class="form-control" type="date" value="2021-01-29" id="fecha_inicio_date" name="fecha_inicio_date" required>
                                    </div>  
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="example-date-input" class="form-control-label">Fecha fin</label>
                                        <input style="color: black !important; font-weight: bold !important;" class="form-control" type="date" value="2022-01-29" id="fecha_fin_date" name="fecha_fin_date" required>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-times-circle"> </i> Cerrar</button>
                    <button type="submit" class="btn btn-success"><i class="far fa-save"> </i> Generar Licencia</button>
                </div>
            </form>
            <!-- FIN-MODAL-FOOTER -->
        </div>
    </div>
</div>
<!-- FIN-MODAL -->

<!-- ================================= MODAL Registro ================================= -->
<div class="modal fade" id="registroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <!-- ================================= MODAL TITULO ================================= -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red;"></i> </span>
                </button>
            </div>

            <!-- ================================= MODAL CUERPO ================================= -->
            <form id="formulario_cliente" >
                @csrf
                <div class="modal-body">
                    {{-- input ID oculto --}}
                    <input type="hidden" id="idclientes" name="idclientes" />
                    <div class="card-body mb-12 col-12" style="padding: 0px; margin-left: 0px !important;">
                        <div class="border" style="margin-bottom: 10px; padding: 20px; border-radius: 10px;">
                            <div class="row">
                                <div class="col-4">
                                    <label for="nombre_razon_social_input">Nombres/Razon social</label>
                                    <div class="form-group">
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input style="color: black !important; font-weight: bold !important;" type="text" class="form-control" id="nombre_razon_social_input" name="nombre_razon_social_input" placeholder="Erick" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="nombre_comercial_input">Apellidos/Nombre comercial</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input style="color: black !important; font-weight: bold !important;" type="text" class="form-control" id="nombre_comercial_input" name="nombre_comercial_input" placeholder="Zumaeta" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="select_modal_giroNegocio">Giro de negocio</label>
                                        <select class="form-control" data-toggle="select" id="select_modal_giroNegocio" name="select_modal_giroNegocio" required>
                                            {{-- AQUI VAN LOS "OPTIONS" --}}
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="select_modal_tipoPersona">Tipo persona</label>
                                        <select  class="form-control" id="select_modal_tipoPersona" name="select_modal_tipoPersona" data-toggle="select" required style="color: black !important; font-weight: bold !important;">
                                            <option>Seleccione</option>
                                            <option value="1" style="color: black !important; font-weight: bold !important;">Interesado</option>
                                            <option value="2" style="color: black !important; font-weight: bold !important;">Cliente</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="select_modal_tipoDocumento">Tipo documento</label>
                                        <select class="form-control" id="select_modal_tipoDocumento" name="select_modal_tipoDocumento" data-toggle="select" required>
                                            <option>Seleccione</option>
                                            <option value="3">DNI</option>
                                            <option value="6">RUC</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="numDocumentoInput">Numero documento</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-id-badge"></i></span>
                                            </div>
                                            <input style="color: black !important; font-weight: bold !important;" type="number" class="form-control" id="numDocumentoInput" name="numDocumentoInput" placeholder="76858587" required />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Correo 1 </label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                            </div>
                                            <input style="color: black !important; font-weight: bold !important;" type="email" class="form-control" id="InputCorreo1" name="InputCorreo1" placeholder="name@example.com" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput2">Correo 2 </label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                            </div>
                                            <input style="color: black !important; font-weight: bold !important;" type="email" class="form-control" id="InputCorreo2" name="InputCorreo2" placeholder="name@example2.com" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput3">Correo 3 </label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                            </div>
                                            <input style="color: black !important; font-weight: bold !important;" type="email" class="form-control" id="InputCorreo3" name="InputCorreo3" placeholder="name@example3.com" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="number-empresa-input">Telefono empresa</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="number_empresa_input" name="number_empresa_input" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="number-contacto-input">Telefono contacto</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                            </div>
                                            <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="number_contacto_input" name="number_contacto_input" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="number-otro-input">Telefono otro</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone-square"></i></span>
                                            </div>
                                            <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="number_otro_input" name="number_otro_input" />
                                        </div>
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
                    <button type="submit" class="btn btn-success"><i class="far fa-save"> </i> Guardar cliente</button>
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
                    <th>Tipo Doc.</th>
                    <th>Nombre/Razon Social</th>
                    <th>Apellidos/Nombre comercial</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody class="list" id="lista_clientes"></tbody>
        </table>
    </div>
</div>

<div class="card-footer py-4"></div>

@endsection

@section('js')
<script src="{{ asset('funciones/tabla.js')}}"></script>
<script src="{{ asset('funciones/crud.js')}}"></script>
<script src="{{ asset('ajax/ajaxcliente.js')}}"></script>
{{-- <script src="{{ asset('ajax/ajaxhistorial.js') }}"></script> --}}
@endsection
<link rel="stylesheet" href="{{ asset('css/search.css')}}" type="text/css">