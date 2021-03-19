@extends('layout')
@section('title', 'Lista de clientes')
@section('pagina', 'Clientes')

@section('extra-css')
    <!--  Extra CSS search-->
    <link rel="stylesheet" href="{{ asset('css/search.css')}}" type="text/css">
    <style>
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
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                            <select  name="filtrar_por" id="filtrar_por" class="form-control"  style="color: black !important; font-weight: bold !important;">
                                <option value="0">TODOS</option>
                                <option value="1">INTERESADO</option>
                                <option value="2">CLIENTE</option>
                            </select>
                        </div>
                        {{-- <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <form>
                                <input class="form-control" placeholder="Buscar evento..." type="text" id="searchTerm" onkeyup="doSearch()" />
                            </form>
                        </div> --}}
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-10 text-right">
                            <a type="button" href="#" onclick="limpiar_form_interesado();" class="btn btn btn-primary" data-toggle="modal" data-target="#modal_interesado"><i class="fas fa-plus-circle"></i> Agregar Interesado</a>
                            <a type="button" href="#" onclick="limpiar_form_cliente();" class="btn btn btn-primary" data-toggle="modal" data-target="#modal_cliente_interesado"><i class="fas fa-plus-circle"></i> Agregar Cliente</a>
                        </div>
                    </div>
                </div>

                <div class="card-body" style="padding-top: 0px !important;" >
                    <!-- TABLA LISTA DE ACTIVIDADES-->
                    <div class="table-responsive py-4" id="lista_tabla_clientes_interesados" >
                    </div>
                </div>
                <div class="card-footer py-4"></div>
            </div>
        </div>
    </div>

    <!-- ::::::: MODAL REGISTRO CLIENTE ::::::: -->
    <div class="modal fade" id="modal_cliente_interesado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <!-- ::::::: MODAL HEADER ::::::: -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <span id="titulo_modal_cliente"> Agregar Cliente </span>
                        <i style="font-size: 20px !important; display: none;" class="fas fa-spinner fa-pulse" id="cargando_edit_cliente"></i>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red;"></i> </span>
                    </button>
                </div>
                <!-- ::::::: MODAL BODY ::::::: -->
                <div class="modal-body" style="padding-top: 0px !important; padding-bottom: 0px !important;">
                    <form id="formulario_cliente_interesado" >
                        @csrf
                        <input type="hidden" id="idclientes" name="idclientes" />
                        <div class="card-body border" style="border-radius: 10px !important; padding-bottom: 0px !important;">
                            <div class="row">
                                <!-- ::::::::::: BARRA DE PROGRESO :::::::::::::::::::-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="select_modal_tipo_doc">
                                            <sup class="text-danger font-weight-bold">*</sup>
                                            Tipo documento
                                        </label>
                                        <select  class="form-control" id="select_modal_tipo_doc" name="select_modal_tipo_doc" data-toggle="" style="color: black !important; font-weight: bold !important;" >

                                            <option value="1">DNI</option>
                                            <option value="2">RUC</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- ::::::::::: BARRA DE PROGRESO :::::::::::::::::::-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="nro_documento">
                                            <sup class="text-danger font-weight-bold">*</sup>
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
                                <!-- ::::::::::: SELECT TIPO PERSONA:::::::::::-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                    <label class="form-control-label" for="select_modal_tipoPersona">Tipo persona</label>
                                    <div class="input-group">
                                        <select  class="form-control" data-toggle="" id="select_modal_tipoPersona" name="select_modal_tipoPersona"  style="color: black !important; font-weight: bold !important;">
                                            <option value="1" >Interesado</option>
                                            <option value="2" >Cliente</option>
                                        </select>
                                        <span class="input-group-addon input-group-append" data-toggle="tooltip" data-placement="top" title="Deshabilitado">
                                            <button disabled class="btn btn-default" type="button">
                                                <i class="fas fa-plus-circle"></i>
                                            </button>
                                        </span>
                                        <div class="invalid-feedback">Selecione un tipo persona por favor.</div>
                                    </div>
                                </div>
                                <!-- ::::::::::: INPUT NOMBRE RAZON SOCIAL ::::::::::::-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                    <label for="nombre_razon_social_input" class="form-control-label">Nombres/Razon social</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input  type="text" class="form-control" id="nombre_razon_social_input" name="nombre_razon_social_input" placeholder="Erick" autocomplete="off" style="color: black !important; font-weight: bold !important;"/>
                                            <div class="invalid-feedback">Por Favor escriba un nombre valido</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ::::::::::: INPUT APELLIDOS NOMBRE COMERCIAL ::::::::::::-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-8">
                                    <div class="form-group">
                                        <label class="form-control-label" for="nombre_comercial_input">Apellidos/Nombre comercial</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input  type="text" class="form-control" id="nombre_comercial_input" name="nombre_comercial_input" placeholder="Zumaeta" autocomplete="off" style="color: black !important; font-weight: bold !important;" />
                                            <div class="invalid-feedback">Por Favor escriba un apellido valido</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ::::::::::: SELECT GIRO NEGOCIO ::::::::::::-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                    <label class="form-control-label" for="select_modal_giroNegocio">Giro de negocio</label>
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

                                <!-- ::::::::::: INPUT NOMBRE RAZON SOCIAL ::::::::::::-->
                                {{-- <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="select_modal_tipoDocumento">Tipo documento</label>
                                        <div class="input-group ">
                                            <select class="form-control" id="select_modal_tipoDocumento" name="select_modal_tipoDocumento" data-toggle="select" >
                                                <option>Seleccione</option>
                                                <option value="3">DNI</option>
                                                <option value="6">RUC</option>
                                            </select>
                                            <div class="invalid-feedback">Seleccione un tipo documento por favor.</div>
                                        </div>
                                    </div>
                                </div> --}}
                                <!-- ::::::::::: BARRA DE PROGRESO :::::::::::::::::::-->
                                {{-- <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="numDocumentoInput">Numero documento</label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-id-badge"></i></span>
                                            </div>
                                            <input  type="number" class="form-control" id="numDocumentoInput" name="numDocumentoInput"  style="color: black !important; font-weight: bold !important;" />
                                            <div class="invalid-feedback">Escriba un numero de documento por favor.</div>
                                        </div>
                                    </div>
                                </div> --}}
                                <!-- ::::::::::: INPUT CORREO 1 ::::::::::::-->
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Correo 1 </label>
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                                            </div>
                                            <input  type="email" class="form-control" id="InputCorreo1" name="InputCorreo1" placeholder="name@example.com" style="color: black !important; font-weight: bold !important;" />
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
                                            <input  class="form-control" type="number" id="number_empresa_input" name="number_empresa_input" style="color: black !important; font-weight: bold !important;" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="accordion" id="accordion_opcional" style="padding-top: 10px !important;">
                            <div class="card">
                                <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <h5 class="mb-0">FORM OPCIONAL</h5>
                                </div>
                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion_opcional">
                                    <div class="card-body">
                                        <div class="row">
                                            <!-- ::::::::::: INPUT CORREO 2 ::::::::::::-->
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
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
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
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
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
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
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
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
                    <button id="guardar_registro_cliente" type="button" class="btn btn-outline-success px-2 py-2" >
                        <i class="far fa-save"> </i>
                        <span id="btn_footer_modal_cliente">Guardar</span>
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
                    <button onclick="limpiar_interesado();" type="button" class="close" data-dismiss="modal" aria-label="Close">
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


@endsection

@section('js')
<script src="{{ asset('funciones/create.js')}}"></script>
<script src="{{ asset('funciones/crud.js')}}"></script>
<script src="{{ asset('ajax/ajaxcliente.js')}}"></script>
{{-- <script src="{{ asset('ajax/ajaxhistorial.js') }}"></script> --}}
@endsection

