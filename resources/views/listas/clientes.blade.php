@extends('layout')
@section('title', 'Lista de clientes / interesado')
@section('pagina', 'Clientes / interesado')

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
                            <select  name="filtro_tipo" id="filtro_tipo" class="form-control" onchange="lista_tabla_clientes(1);" style="color: black !important;" data-minimum-results-for-search="Infinity">
                                <option value="0">TODOS</option>
                                <option value="1">INTERESADO</option>
                                <option value="2">CLIENTE</option>
                            </select>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2" style="padding-bottom: 10px !important;">
                            <select  name="filtro_estado" id="filtro_estado" class="form-control" onchange="lista_tabla_clientes(1);" style="color: black !important; " data-minimum-results-for-search="Infinity">
                                <option selected value="2">TODOS</option>
                                <option value="0">ACTIVO</option>
                                <option value="1">INACTIVO</option>
                            </select>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3" style="padding-bottom: 10px !important;">
                            <select  name="select_modal_filtro_etiqueta" id="select_modal_filtro_etiqueta" class="form-control" onchange="lista_tabla_clientes(1);" style="color: black !important; font-size: 13px !important;">

                            </select>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-5 text-right" style="padding-bottom: 10px !important;">
                            <button id="interesado" type="button" class="btn btn-outline-primary px-3 py-2" style="margin: 0px 0px 10px !important;" >
                                <i class="fas fa-plus-circle"></i>
                                <span > Agregar Interesado</span>
                            </button>
                            <button id="cliente" type="button" class="btn btn-outline-primary px-3 py-2" style="margin: 0px 0px 10px !important;">
                                <i class="fas fa-plus-circle"></i>
                                <span > Agregar Cliente</span>
                            </button>
                        </div>

                        {{-- <div class="col-sm-12">
                            <div class="bootstrap-tagsinput">
                                <span  class="tag badge badge-primary">
                                    Interesado Potenciales
                                    <span onclick="eliminar_etiqueta()" data-role="remove" data-toggle="tooltip" data-original-title="Quitar"> </span>
                                </span>
                                <span  class="tag badge badge-primary">
                                     Interesado Indeciso
                                    <span onclick="eliminar_etiqueta()" data-role="remove" data-toggle="tooltip" data-original-title="Quitar"></span>
                                </span>
                                <span  class="tag badge badge-primary">
                                     Interesado potenciales
                                    <span onclick="eliminar_etiqueta()" data-role="remove" data-toggle="tooltip" data-original-title="Quitar"></span>
                                </span>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <div class="card-body" style="padding-top: 15px !important; padding-bottom: 0px !important;" >
                    <div class="row" >
                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3 " >
                            <label class="media align-items-center">
                                <span style="padding-right: 10px;">Ver </span>
                                <select name="filtro_cant" id="filtro_cant" onchange="lista_tabla_clientes(1);" aria-controls="datatable-basic" class="form-control form-control-sm"  style="color: black !important; font-weight: bold !important; display: inline-block;" >
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
                            <div class="input-group input-group-merge"">

                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="padding: 2px 8px 2px 8px !important;"><i  class="fas fa-search"></i></span>
                                </div>
                                <input id="filtro_search" name="filtro_search" class="form-control form-control-sm" placeholder="Buscar cliente..." type="search" >
                            </div>
                        </div>
                    </div>

                    <div id="lista_tabla_clientes_interesados"  style="padding-top: 0px !important;">
                    </div>
                    <!-- TABLA LISTA DE CLIENTES-->
                </div>
            </div>
        </div>
    </div>

    <!-- ::::::: MODAL REGISTRO CLIENTE ::::::: -->
    <div class="modal fade" id="modal_cliente_interesado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <!-- ::::::: MODAL HEADER ::::::: -->
                <div class="modal-header" style="padding-bottom: 10px !important;">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <span id="titulo_modal_cliente"> Agregar Cliente </span>
                        <i style="font-size: 20px !important; display: none;" class="fas fa-spinner fa-pulse" id="cargando_edit_cliente"></i>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red;"></i> </span>
                    </button>
                </div>
                <!-- ::::::: MODAL BODY ::::::: -->
                <div class="modal-body" style="padding-top: 0px !important; padding-bottom: 0px !important;  ">
                    <form id="formulario_cliente_interesado" >
                        @csrf
                        <input type="hidden" id="idclientes" name="idclientes" />
                        <input type="hidden" id="select_modal_tipoPersona" name="select_modal_tipoPersona" value="1" />
                        <div class="row">
                            <!-- ::::::::::: INPUT TIPO DOCUMENTO :::::::::::::::::::-->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="select_modal_tipo_doc">
                                        Tipo documento
                                    </label>
                                    <select  class="form-control" id="select_modal_tipo_doc" name="select_modal_tipo_doc" data-toggle="" style="color: black !important; font-weight: bold !important;" >

                                        <option value="1">DNI</option>
                                        <option value="2">RUC</option>
                                    </select>
                                </div>
                            </div>
                            <!-- ::::::::::: INPUT N° DE DOCUMENTO :::::::::::::::::::-->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="nro_documento">
                                        Numero documento
                                    </label>
                                    <div class="input-group  ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-id-badge"></i></span>
                                        </div>
                                        <input  type="number" class="form-control" id="nro_documento" name="nro_documento" placeholder="numero"   style="color: black !important; font-weight: bold !important;"/>
                                        <span class="input-group-addon input-group-append">
                                            <button class="btn btn-default" type="button"  onclick="cunsulta_sunat();" data-toggle="tooltip" data-placement="top" title="Consulta RENIEC/SUNAT">
                                                <i class="fas fa-angle-right" id="cargado_sunat"></i>
                                                <i style="font-size: 20px; display: none;" class="fas fa-spinner fa-pulse fa-2x" id="cargando_sunat"></i>
                                            </button>
                                        </span>
                                        <div class="invalid-feedback">Por Favor escriba un N° Doc. valido</div>
                                    </div>
                                </div>
                            </div>
                            <!-- ::::::::::: SELECT GIRO NEGOCIO ::::::::::::-->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="select_modal_giroNegocio">
                                        <sup class="text-danger font-weight-bold">*</sup>
                                        Giro de negocio
                                    </label>
                                    <div class="input-group">

                                        <select  class="form-control" data-toggle="" id="select_modal_giro_negocio" name="select_modal_giro_negocio"  style="color: black !important; font-weight: bold !important;">
                                            {{-- AQUI VAN LOS "OPTIONS" --}}
                                        </select>
                                        <span class="input-group-addon input-group-append" data-toggle="tooltip" data-placement="top" title="Crear nuevo giro negocio">
                                            <button class="btn btn-default" type="button"  onclick="" data-toggle="modal" data-target="#modal_giro_negocio" >
                                                <i class="fas fa-plus-circle"></i>
                                            </button>
                                        </span>
                                        <div class="invalid-feedback">Por Favor selecione un giro de negocio</div>
                                    </div>
                                </div>
                            </div>

                            <!-- ::::::::::: INPUT NOMBRE RAZON SOCIAL ::::::::::::-->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <label for="nombre_razon_social_input" class="form-control-label">
                                    <sup class="text-danger font-weight-bold">*</sup>
                                    Nombres/Razon social
                                </label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input  type="text" class="form-control" id="nombre_razon_social_input" name="nombre_razon_social_input" placeholder="Nombre / Razon Social"   style="color: black !important; font-weight: bold !important;" autocomplete="off" />
                                        <div class="invalid-feedback">Por Favor escriba un nombre valido</div>
                                    </div>
                                </div>
                            </div>
                            <!-- ::::::::::: INPUT APELLIDOS NOMBRE COMERCIAL ::::::::::::-->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="nombre_comercial_input">
                                        Apellidos/Nombre comercial
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input  type="text" class="form-control" id="nombre_comercial_input" name="nombre_comercial_input" placeholder="Apellidos / Nombre Comercial"   style="color: black !important; font-weight: bold !important;" autocomplete="off" />
                                        <div class="invalid-feedback">Por Favor escriba un apellido valido</div>
                                    </div>
                                </div>
                            </div>

                            <!-- ::::::::::: INPUT CORREO 1 ::::::::::::-->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Correo 1 </label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                                        </div>
                                        <input  type="email" class="form-control" id="InputCorreo1" name="InputCorreo1" placeholder="name@example.com" style="color: black !important; font-weight: bold !important;" autocomplete="off"/>
                                    </div>
                                </div>
                            </div>
                            <!-- ::::::::::: INPUT TELEFONO EMPRESA ::::::::::::-->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="form-group">
                                    <label for="number-empresa-input">Telefono empresa</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input  class="form-control" type="number" id="number_empresa_input" name="number_empresa_input" style="color: black !important; font-weight: bold !important;" autocomplete="off" />
                                    </div>
                                </div>
                            </div>
                            <!-- ::::::::::: INPUT DIRECCION ::::::::::::-->
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-8">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Dirección</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        <input  type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" style="color: black !important; font-weight: bold !important;" autocomplete="off" />
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="accordion" id="accordion_opcional" style="padding-top: 10px !important;">
                            <div class="card ">
                                <div class="card-header bg-gradient-default text-white " id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <h5 class="mb-0 text-white">DATOS OPCIONALES</h5>
                                </div>
                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion_opcional">
                                    <div class="card-body" style="border: 1px solid #191d4d !important; border-radius: 0 0 10px 10px !important;">
                                        <div class="row">
                                            <!-- ::::::::::: SELECT PROVINCIA ::::::::::::-->
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                <div class="form-group">
                                                    <label for="select_modal_provincia">Provincia</label>
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                                        </div>
                                                        <input  type="text" class="form-control" id="select_modal_provincia" name="select_modal_provincia" placeholder="Provincia" style="color: black !important; font-weight: bold !important;" autocomplete="off" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ::::::::::: SELECT GRADO DE INTERES ::::::::::::-->
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                <div class="form-group">
                                                    <label for="select_modal_grado_interes">Grado de interés</label>
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                                        </div>
                                                        <input  type="text" class="form-control" id="select_modal_grado_interes" name="select_modal_grado_interes" placeholder="Grado de interes" style="color: black !important; font-weight: bold !important;" autocomplete="off" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ::::::::::: SELECT ETIQUETA ::::::::::::-->
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="select_modal_etiquetas">
                                                        Etiqueta
                                                    </label>
                                                    <div class="input-group">

                                                        <select  class="form-control" data-toggle="" id="select_modal_etiquetas" name="select_modal_etiquetas"  style="color: black !important; font-weight: bold !important;">
                                                            {{-- AQUI VAN LOS "OPTIONS" --}}
                                                        </select>
                                                        <span class="input-group-addon input-group-append" data-toggle="tooltip" data-placement="top" title="Crear nueva etiqueta">
                                                            <button class="btn btn-default" type="button"  onclick="" data-toggle="modal" data-target="#modal_etiquetas" >
                                                                <i class="fas fa-plus-circle"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ::::::::::: SELECT TAMAÑO DE EMPRESA ::::::::::::-->
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                <div class="form-group">
                                                    <label for="select_modal_tamano_empresa">Tamaño de empresa</label>
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                                        </div>
                                                        <input  type="text" class="form-control" id="select_modal_tamano_empresa" name="select_modal_tamano_empresa" placeholder="Tamaño de empresa" style="color: black !important; font-weight: bold !important;" autocomplete="off" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- ::::::::::: SELECT A QUE TE DEDICAS ::::::::::::-->
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                <div class="form-group">
                                                    <label for="select_modal_a_que_dedicas">A que te dedicas</label>
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                                        </div>
                                                        <input  type="text" class="form-control" id="select_modal_a_que_dedicas" name="select_modal_a_que_dedicas" placeholder="A que te dedicas" style="color: black !important; font-weight: bold !important;" autocomplete="off" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- ::::::::::: INPUT CORREO 2 ::::::::::::-->
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput2">Correo 2 </label>
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                        </div>
                                                        <input  type="email" class="form-control" id="InputCorreo2" name="InputCorreo2" placeholder="name@example2.com" style="color: black !important; font-weight: bold !important;" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ::::::::::: INPUT CORREO 3 ::::::::::::-->
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput3">Correo 3 </label>
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                        </div>
                                                        <input  type="email" class="form-control" id="InputCorreo3" name="InputCorreo3" placeholder="name@example3.com" style="color: black !important; font-weight: bold !important;"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ::::::::::: INPUT TELEFONO CONTACTO ::::::::::::-->
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                <div class="form-group">
                                                    <label for="number-contacto-input">Telefono contacto</label>
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                                        </div>
                                                        <input  class="form-control" type="number" id="number_contacto_input" name="number_contacto_input" style="color: black !important; font-weight: bold !important;" />
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ::::::::::: INPUT TELEFONO OTRO::::::::::::-->
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                                <div class="form-group">
                                                    <label for="number-otro-input">Telefono otro</label>
                                                    <div class="input-group ">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-phone-square"></i></span>
                                                        </div>
                                                        <input  class="form-control" type="number" id="number_otro_input" name="number_otro_input" style="color: black !important; font-weight: bold !important;" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="padding-top: 5px !important;">
                            <!-- ::::::::::: BARRA DE PROGRESO :::::::::::::::::::-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <div class="progress" id="div_barra_progress_cliente_interesado" style="height: 12px !important;">
                                        <div id="barra_progress_cliente_interesado" class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- ::::::::::::::::  CONTENEDOR DE ERRORES ::::::::::-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div id="contenedor_de_errores_cliente_interesado"></div>
                            </div>
                        </div>
                        <button type="submit" style="display: none;"></button>
                    </form>
                </div>

                <!-- MODAL FOOTER -->
                <div class="modal-footer" style="padding-top: 0px !important;">
                    <button id="guardar_registro" type="button" class="btn btn-outline-primary px-3 py-2" >
                        <i class="far fa-save"> </i>
                        <span id="btn_footer_modal_cliente">GUARDAR</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ::::::: MODAL REGISTRO INTERESADO ::::::: -->
    {{-- <div class="modal fade" id="modal_interesado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <!-- ::::::: MODAL HEADER ::::::: -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Agregar Interesado
                        <i style="font-size: 24px; display: none;" class="fas fa-spinner fa-pulse fa-2x" id="cargando_edit"></i>
                    </h5>
                    <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red;"></i> </span>
                    </button>
                </div>

                <!-- ::::::: MODAL BODY ::::::: -->
                <div class="modal-body" style="padding-bottom: 0px !important;">
                    <form id="formulario_interesado" method="POST">
                        @csrf

                        <input type="hidden" id="idclientes" name="idclientes" />
                        <input type="hidden" id="select_modal_tipoPersona" name="select_modal_tipoPersona" value="1" />
                        <div class="card-body border" style=" padding-bottom: 0px !important; border-radius: 10px;">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="select_modal_tipoPersona">Tipo persona</label>
                                        <select style="color: black !important; font-weight: bold !important;" class="form-control" id="select_modal_tipoPersona" name="select_modal_tipoPersona" data-toggle="select" required>
                                            <option>Seleccione</option>
                                            <option style="color: green !important; font-weight: bold !important;" value="1">Interesado</option>
                                            <option value="2">Cliente</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="select_modal_tipoDocumento">Tipo documento</label>
                                        <select style="color: black !important; font-weight: bold !important;" class="form-control" id="select_modal_tipoDocumento" name="select_modal_tipoDocumento" data-toggle="" required>
                                            <option disabled>Seleccione</option>
                                            <option value="1">DNI</option>
                                            <option value="2">RUC</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="input-group form-group" id="">
                                        <select class="form-control" name="select_modal_clientes" id="select_modal_clientes" autocomplete="off" required data-toggle="">
                                        </select>
                                        <span class="input-group-addon input-group-append">
                                            <a type="button" href="#" class="btn btn-success" onclick="limpiar_interesado();" data-toggle="modal" data-target="#registroModalInteresado">
                                                <i class="fas fa-plus-circle"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="numDocumentoInput">Numero documento</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-id-badge"></i></span>
                                            </div>
                                            <input style="color: black !important; font-weight: bold !important;" type="number" class="form-control" id="numDocumentoInput" name="numDocumentoInput" placeholder="numero" required />
                                            <span class="input-group-addon input-group-append">
                                                <button class="btn btn-default" type="button" id="button-addon2" onclick="cunsulta_sunat();" data-toggle="tooltip" data-placement="top" title="Consulta SUNAT">
                                                    <i class="fas fa-angle-right" id="cargado_sunat"></i>
                                                    <i style="font-size: 24px; display: none;" class="fas fa-spinner fa-pulse fa-2x" id="cargando_sunat"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                    <label class="form-control-label" for="select_modal_giroNegocio">Giro de negocio</label>
                                    <div class="input-group">
                                        <select style="color: black !important; font-weight: bold !important;" class="form-control" data-toggle="" id="select_modal_giroNegocio" name="select_modal_giroNegocio" required>

                                        </select>
                                        <span class="input-group-addon input-group-append" data-toggle="tooltip" data-placement="top" title="Crear nuevo giro negocio">
                                            <button class="btn btn-default" type="button" id="button-addon2" onclick="limpiar_evento();" data-toggle="modal" data-target="#registroModalGiroNegocio" >
                                                <i class="fas fa-plus-circle"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                    <label for="nombre_razon_social_input" class="form-control-label">Nombres/Razon social</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input style="color: black !important; font-weight: bold !important;" type="text" class="form-control" id="nombre_razon_social_input" name="nombre_razon_social_input" placeholder="Erick" />
                                            <div class="invalid-feedback">Por Favor escriba un nombre valido</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-8">
                                    <div class="form-group">
                                        <label class="form-control-label" for="nombre_comercial_input">Apellidos/Nombre comercial</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input style="color: black !important; font-weight: bold !important;" type="text" class="form-control" id="nombre_comercial_input" name="nombre_comercial_input" placeholder="Zumaeta" />
                                            <div class="invalid-feedback">Por Favor escriba un apellido valido</div>
                                        </div>
                                    </div>
                                 </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="number-empresa-input">Telefono empresa</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="number_empresa_input" name="number_empresa_input" />
                                            <div class="invalid-feedback">Por Favor escriba un numero valido</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="exampleFormControlInput1">Correo 1 </label>
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

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="number-contacto-input">Telefono contacto</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                            </div>
                                            <input  class="form-control is-invalid" type="number" id="number_contacto_input" name="number_contacto_input" style="color: black !important; font-weight: bold !important;" />
                                            <div class="invalid-feedback">Escriba un numero de documento por favor.</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="number-otro-input">Telefono otro</label>
                                        <div class="input-group  ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone-square"></i></span>
                                            </div>
                                            <input  class="form-control is-invalid" type="number" id="number_otro_input" name="number_otro_input" style="color: black !important; font-weight: bold !important;"/>
                                            <div class="invalid-feedback">Escriba un numero de documento por favor.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="padding-top: 25px !important;">
                            <!-- ::::::::::: BARRA DE PROGRESO :::::::::::::::::::-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <div class="progress" id="div_barra_progress_modulos" style="height: 12px !important;">
                                        <div id="barra_progress_modulos" class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- ::::::::::::::::  CONTENEDOR DE ERRORES ::::::::::-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div id="contenedor_de_errores_modulos"></div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- MODAL FOOTER -->
                <div class="modal-footer" style="padding-top: 0px !important;">
                    <button id="guardar_registro" type="button" class="btn btn-outline-success px-2 py-2" >
                        <i class="far fa-save"> </i>
                        <span id="btn_footer_modal">Guardar</span>
                    </button>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- ================================= MODAL Detalle================================= -->
    <div class="modal fade" id="ModalDetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document" id="cliente_modal">
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
    <!-- ::::::: MODAL GIRO NEGOCIO -->
    <div class="modal fade" id="modal_giro_negocio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content" >
                <!-- :::: MODAL HEADER :::: -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                          Agregar Giro Negocio
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
                    <button id="guardar_registro_giro_negocio" type="button" class="btn btn-outline-success" >
                        <i class="far fa-save"> </i>
                        Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- ::::::: MODAL ETIQUETAS -->
    <div class="modal fade" id="modal_etiquetas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <!-- ::::::: MODAL HEADER ::::::: -->
                <div class="modal-header" style="padding-bottom: 10px !important;">
                    <h5 class="modal-title" id="exampleModalLabel">
                       Agregar Etiqueta
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red;"></i> </span>
                    </button>
                </div>
                <!-- ::::::: MODAL BODY ::::::: -->
                <div class="modal-body" style="padding-top: 0px !important; padding-bottom: 0px !important;  ">
                    <form id="formulario_etiquetas" >
                        @csrf
                        <input type="hidden" id="idetiquetas" name="idetiquetas" />
                        <div class="row">
                            <!-- ::::::::::: INPUT APELLIDOS NOMBRE COMERCIAL ::::::::::::-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="nombre_etiqueta">
                                        Nombre
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input  type="text" class="form-control" id="nombre_etiqueta" name="nombre_etiqueta" placeholder="Nombre"   style="color: black !important; font-weight: bold !important;" autocomplete="off" />
                                        <div class="invalid-feedback">Por Favor escriba un nombre</div>
                                    </div>
                                </div>
                            </div>
                            <!-- ::::::::::: INPUT APELLIDOS NOMBRE COMERCIAL ::::::::::::-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="descripcion_etiqueta">
                                        Descripción
                                    </label>
                                    <div class="input-group">
                                        <textarea type="text"  id="descripcion_etiqueta" name="descripcion_etiqueta" cols="30" rows="4" placeholder="Descripción"  class="form-control" style="color: black !important; font-weight: bold !important;" autocomplete="off"></textarea>
                                        <div class="invalid-feedback">Por Favor escriba un nombre</div>
                                    </div>
                                </div>
                            </div>
                            <!-- ::::::::::: BARRA DE PROGRESO :::::::::::::::::::-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <div class="progress" id="div_barra_progress_etiqueta" style="height: 12px !important;">
                                        <div id="barra_progress_etiqueta" class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- ::::::::::::::::  CONTENEDOR DE ERRORES ::::::::::-->
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div id="contenedor_de_errores_etiqueta"></div>
                            </div>
                        </div>
                        <button type="submit" style="display: none;"></button>
                    </form>
                </div>

                <!-- MODAL FOOTER -->
                <div class="modal-footer" style="padding-top: 0px !important;">
                    <button id="guardar_registro_etiquetas" type="button" class="btn btn-outline-primary px-3 py-2" >
                        <i class="far fa-save"> </i>
                         GUARDAR
                    </button>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')
<script src="{{ asset('funciones/create.js')}}"></script>
<script src="{{ asset('funciones/crud.js')}}"></script>
<script src="{{ asset('ajax/ajaxcliente.js')}}"></script>
{{-- <script src="{{ asset('ajax/ajaxhistorial.js') }}"></script> --}}
@endsection

