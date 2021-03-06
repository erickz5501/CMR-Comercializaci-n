@extends('layout')
@section('title', 'Actualizaciones')
@section('pagina', 'ACTUALIZACIONES')
@section('content')
<div class="card-header">
    <div class="row align-items-center">
        <div class="col-8">
            <form>
                <input class="form-control" placeholder="Buscar actualizacion..." type="text" id="searchTerm" onkeyup="doSearch()" />
            </form>
        </div>
        <div class="col-4 text-right">
            <a type="button" href="#" onclick="" class="btn btn btn-primary" data-toggle="modal" data-target="#registroModalActualizaciones"><i class="fas fa-plus-circle"></i> Agregar registro</a>
        </div>
        {{-- <div class="col-4 text-right">
            <a type="button" href="#" onclick="" class="btn btn btn-primary" data-toggle="modal" data-target="#registroModalListaActualizaciones"><i class="fas fa-plus-circle"></i> Ver actualizaciones</a>
        </div>
        <div class="col-4 text-right">
            <a type="button" href="#" onclick="" class="btn btn btn-primary" data-toggle="modal" data-target="#registroModalCliente"><i class="fas fa-plus-circle"></i> Editar CLiente</a>
        </div> --}}
    </div>
</div>

<!-- ================================= MODAL Registro ================================= -->
<div class="modal fade" id="registroModalActualizaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      <div class="modal-content">
        <!-- ================================= MODAL TITULO ================================= -->
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Registro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"> <i class="far fa-times-circle"></i> </span>
            </button>
        </div>

        <!-- ================================= MODAL CUERPO ================================= -->
        <form id="formulario_actualizacion">
            @csrf
            <div class="modal-body"style="padding-top: 0px !important; padding-bottom:0px !important; padding-right: 0px !important">
                {{-- input ID oculto --}}
                <input type="hidden" id="idactualizaciones" name="idactualizaciones" />
                <input type="hidden" id="idcompras" name="idcompras" />
                <div class="row col-12">
                    <div class="card-body mb-12 col-12" style="padding-top: 0px !important; padding-bottom:0px !important; padding-right: 0px !important">
                        
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h5 class="mb-0">#Compras</h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="row">
                                            {{-- <div class="col-10">
                                                <div class="form-group">
                                                    <label for="select_modal_medios">Cliente</label>
                                                    <select style="color: rgb(0, 0, 0) !important; font-weight: bold !important;" class="form-control" id="select_modal_clientes" name="select_modal_clientes" data-toggle="select" required>
                                                        <option selected="selected" value="0">Cliente</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="" style="color: white">.</label><br>
                                                    <button type="button" class="btn btn-success">Agregar</button>
                                                </div>
                                            </div> --}}
                                            <div class="col-12">
                                                <div class="input-group form-group" id="">
                                                    <select class="form-control" name="select_modal_clientes" id="select_modal_clientes" autocomplete="off" required data-toggle="">
                                                        
                                                    </select>
                                                    <span class="input-group-addon input-group-append">
                                                        <button class="btn btn-success" type="button" id="button-addon2">
                                                            <i class="fas fa-plus-circle"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Modulo</label>
                                                    <select style="color: black !important; font-weight: bold !important;" name="select_modal_modulos" id="select_modal_modulos" class="form-control multi_select" data-toggle="select" required>
                                                        <option>Modulos</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Cotizacion</label>
                                                    <select style="color: black !important; font-weight: bold !important;" class="form-control" id="select_modal_cotizacion" name="select_modal_cotizacion" data-toggle="select" required>
                                                        <option>Cotizacion</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Fecha cotizacion</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="date" id="fecha_cotizacion" name="fecha_cotizacion" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Nro. contrato</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="nro_contrato_input" name="nro_contrato_input" placeholder="Nro Contrato" >
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Nro. factura</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="nro_factura_input" name="nro_factura_input" placeholder="Nro factura" >
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Cantidad licencias</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="cant_licencias_input" name="cant_licencias_input" placeholder="Cantidad licencias" >
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Fecha instalacion</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="date" id="fecha_instalacion" name="fecha_instalacion" required>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Fecha entrega</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="date" id="fecha_entrega" name="fecha_entrega" required>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="">Fecha renovacion</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="date" id="fecha_renovacion" name="fecha_renovacion" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <h5 class="mb-0">#Actualizaciones</h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-10">
                                                <div class="form-group">
                                                    <label for="">Codigo licencia</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="licencia_input" name="licencia_input" placeholder="Buscar persona" >
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-success">Generar</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Tipo</label>
                                                    <select style="color: black !important; font-weight: bold !important;" class="form-control" id="select_modal_tipo" name="select_modal_tipo" data-toggle="select" required>
                                                        <option value="1">Tipo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Version</label>
                                                    <select style="color: black !important; font-weight: bold !important;" class="form-control" id="select_modal_version" name="select_modal_version" data-toggle="select" required>
                                                        <option value="1">Version</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Tipo licencia</label>
                                                    <select style="color: black !important; font-weight: bold !important;" class="form-control" id="select_modal_tiempo_licencia" name="select_modal_tiempo_licencia" data-toggle="select" required>
                                                        <option value="1">Tiempo Licencia</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Cantidad licencia</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="licencias_cantidad_input" name="licencias_cantidad_input" placeholder="Cantidad Licencia" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Precio</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="precio_input" name="precio_input" placeholder="Precio" >
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Acta</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="acto_input" name="acto_input" placeholder="Acto" >
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Saldo</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="salida_input" name="salida_input" placeholder="Salida" >
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Fecha instalacion</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="date" id="fecha_instalacion_actualizacion" name="fecha_instalacion_actualizacion" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">fecha entrega</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="date" id="fecha_entrega_actualizacion" name="fecha_entrega_actualizacion" required>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Fecha fin</label>
                                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="date" id="fecha_fin_actualizacion" name="fecha_fin_actualizacion" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for=""></label>
                                                    <textarea class="form-control" id="procedimientoTextarea" name="procedimientoTextarea" rows="3" style="color: black !important; font-weight: bold !important;">Procedimiento</textarea>
                                                </div>
                                            </div>
                                        </div>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-times-circle"> </i> Cerrar</button>
                <button type="submit" class="btn btn-success"><i class="far fa-save"> </i> Guardar registro</button>
            </div>
        </form>
        <!-- FIN-MODAL-FOOTER -->
      </div>
    </div>
</div>
<!-- FIN-MODAL -->

<!-- ================================= MODAL Actualizar cliente ================================= -->
<div class="modal fade" id="registroModalCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <!-- ================================= MODAL TITULO ================================= -->
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modificar Cliente</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"> <i class="far fa-times-circle"></i> </span>
            </button>
        </div>

        <!-- ================================= MODAL CUERPO ================================= -->
        <form id="formulario_editar_cliente">
            @csrf
            <div class="modal-body">
                {{-- input ID oculto --}}
                <input type="hidden" id="idhistorial_comercializacion" name="idhistorial_comercializacion" />
                <div class="row col-12">
                    <div class="card-body mb-12 col-12">

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="ruc_dni_input" name="ruc_dni_input" placeholder="RUC o DNI" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="razon_social_input" name="razon_social_input" placeholder="Razon Social" >
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="representante_legal__input" name="representante_legal__input" placeholder="Representante legal" >
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <select class="form-control" id="select_modal_giro_negocio" name="select_modal_giro_negocio" data-toggle="select" required style="color: black !important; font-weight: bold !important;">
                                        <option>Negocio</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="ciudad_input" name="ciudad_input" placeholder="Ciudad" >
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="correo_input" name="correo_input" placeholder="Correo" >
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="correo2_input" name="correo2_input" placeholder="Correo 2" >
                                </div>                    
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="correo3_input" name="correo3_input" placeholder="Correo 3" >
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="direccion_input" name="direccion_input" placeholder="Direccion" >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="telefono_input" name="telefono_input" placeholder="Telefono Empresa" >
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="telefono2_input" name="telefono2_input" placeholder="Telefono contacto" >
                                </div>                    
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="number" id="telefono3_input" name="telefono3_input" placeholder="Otro contacto" >
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
                <button type="submit" class="btn btn-success"><i class="far fa-save"> </i> Guardar registro</button>
            </div>
        </form>
        <!-- FIN-MODAL-FOOTER -->
      </div>
    </div>
</div>
<!-- FIN-MODAL -->

<!-- ================================= MODAL mostrar actualizaciones ================================= -->
<div class="modal fade" id="registroModalListaActualizaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <!-- ================================= MODAL TITULO ================================= -->
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Lista de actualizaciones</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"> <i class="far fa-times-circle"></i> </span>
            </button>
        </div>

        <!-- ================================= MODAL CUERPO ================================= -->
            <div class="modal-body">
                {{-- input ID oculto --}}
                <input type="hidden" id="idhistorial_comercializacion" name="idhistorial_comercializacion" />
                <div class="row col-12">
                    <div class="card-body mb-12 col-12 ">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <a type="button" href="#" onclick="" class="btn btn btn-primary" data-toggle="modal" data-target="#registroModalActualizacionesCliente"><i class="fas fa-plus-circle"></i> Agregar actualizacion</a>
                                </div>
                            </div>
                        </div>

                        <div class="row"> 
                            <div class="table-responsive">
                                <div>
                                    <table class="table align-items-center" id="datos">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Edad</th>
                                                <th>Nickname</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody class="list" id="lista_actualizaciones_cliente"></tbody>
                                        <tr>
                                            <th scope="row">
                                                1
                                            </th>
                                            <td class="budget">
                                                Erick
                                            </td>
                                            <td>
                                                19
                                            </td>
                                            <td>
                                                VperER
                                            </td>
                                        </tr>
                                        
                                    </table>
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
            </div>
        
        <!-- FIN-MODAL-FOOTER -->
      </div>
    </div>
</div>
<!-- FIN-MODAL -->

<!-- ================================= MODAL registro actualizaciones ================================= -->
<div class="modal fade" id="registroModalActualizacionesCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <!-- ================================= MODAL TITULO ================================= -->
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Registrar actualizaciones</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"> <i class="far fa-times-circle"></i> </span>
            </button>
        </div>

        <!-- ================================= MODAL CUERPO ================================= -->
        <form id="formulario_registrar_actualizaciones">
            @csrf
            <div class="modal-body">
                {{-- input ID oculto --}}
                <input type="hidden" id="idhistorial_comercializacion" name="idhistorial_comercializacion" />
                <div class="row col-12">
                    <div class="card-body mb-12 col-12 ">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="eventosSelect">Tipo</label>
                                    <select class="form-control" id="select_modal_tipo" name="select_modal_tipo" data-toggle="select" required style="color: black !important; font-weight: bold !important;">
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="eventosSelect">Version sistema</label>
                                    <select class="form-control" id="select_modal_sistema" name="select_modal_sistema" data-toggle="select" required style="color: black !important; font-weight: bold !important;">
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="eventosSelect">Tiempo Lcencias</label>
                                    <select class="form-control" id="select_modal_tiempo" name="select_modal_tiempo" data-toggle="select" required style="color: black !important; font-weight: bold !important;">
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="example-date-input" class="form-control-label">Cantidad licencia</label>
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="cantidad_licencia_input" name="cantidad_licencia_input" required>
                                </div>    
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="example-date-input" class="form-control-label">Precio</label>
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="precio_input" name="precio_input" required>
                                </div>   
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="example-date-input" class="form-control-label">Acta</label>
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="acta_input" name="acta_input" required>
                                </div>   
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="example-date-input" class="form-control-label">Salido</label>
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="text" id="salido_input" name="salido_input" required>
                                </div>   
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="date" value="2018-11-23" id="example_date_input" name="example_date_input" required>
                                </div>   
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="date" value="2018-11-23" id="example_date_input2" name="example_date_input2" required>
                                </div>   
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input style="color: black !important; font-weight: bold !important;" class="form-control" type="date" value="2018-11-23" id="example_date_input3" name="example_date_input3" required>
                                </div>   
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for=""></label>
                                    <textarea class="form-control" id="procedimientoTextarea" name="conclusionessTextarea" rows="3" style="color: black !important; font-weight: bold !important;">Procedimiento</textarea>
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
                <button type="submit" class="btn btn-success"><i class="far fa-save"> </i> Guardar registro</button>
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
                    <th>Cliente</th>
                    <th>Tipo</th>
                    <th>Version</th>
                    <th>Tiempo</th>
                    <th>Cotizacion</th>
                    <th>fecha instalacion</th>
                    <th>estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody class="list" id="lista_actualizaciones">
            
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('funciones/crud.js')}}"></script>
<script src="{{ asset('ajax/ajaxactualizaciones.js')}}"></script>
@endsection
<link rel="stylesheet" href="{{ asset('css/search.css')}}" type="text/css">