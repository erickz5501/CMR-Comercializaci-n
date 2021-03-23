<div class="modal-header">
    <h5  class="modal-title" id="exampleModalLabel">
        {{ $one_documento->ModeloCliente->nombres_razon_social}} {{ $one_documento->ModeloCliente->apellidos_nombre_comercial}}
    </h5>

        <button onclick="modal_cotizacion_comercializacion();" type="button" class=" btn btn-outline-primary px-3 py-2" data-toggle="tooltip" data-html="true" title="Agregar Documento">
            <i class="fas fa-plus-circle"></i>
        </button>

        {{-- <button  type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"> <i class="far fa-times-circle" style="color: red;"></i> </span>
        </button> --}}

</div>

<!-- ::::: MODAL BODY ::::: -->
<div class="modal-body" style="padding-top: 0px !important; padding-bottom: 0px !important;">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6" style="overflow-x: auto;">
            <table class="table table-flush table-hover" >
                <thead class="thead-light">
                    <tr>
                        <th>N° CORRELATIVO</th>
                        <th>FECHA</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>

                <tbody>
                    @if ($one_documento)
                        @if (count($one_documento->ModeloCotizacionComercializaciones) > 0)
                            @foreach($one_documento->ModeloCotizacionComercializaciones as $key => $doc)
                                @if ($doc->ModeloCotizacion)
                                    <tr>
                                        <td class="align-middle">
                                            {{ $doc->ModeloCotizacion->nombre}}
                                        </td>

                                        <td class="align-middle">
                                            {{ \Carbon\Carbon::parse($doc->ModeloCotizacion->created_at)->format('Y-m-d') }}
                                        </td>

                                        <td class="align-middle">
                                            @if ($doc->ModeloCotizacion->estado == 0)
                                                @if ( \Carbon\Carbon::parse($doc->ModeloCotizacion->created_at)->addDay($doc->ModeloCotizacion->validez) <= now() )
                                                    <span class="badge badge-warning badge-lg">Vencido</span>
                                                @else
                                                    <span class="badge badge-success badge-lg">Activo</span>
                                                @endif
                                            @else
                                                <span class="badge badge-danger badge-lg">Inactivo</span>
                                            @endif
                                        </td>

                                        <td class="align-middle">
                                            <button onclick="ver_documento_comercializacion('{{$doc->ModeloCotizacion->idcotizaciones}}');"  type="button" class="btn btn-outline-info px-2 py-2" data-toggle="tooltip" data-html="true" title="Vizualizar documento.">
                                                <i class="fas fa-eye"></i>
                                            </button>

                                            <button onclick="ver_editar_cotizacion_comercializacion('{{$doc->ModeloCotizacion->idcotizaciones}}');"  type="button" class="btn btn-outline-warning px-2 py-2" data-toggle="tooltip" data-html="true" title="Editar registro">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>

                                            @if ($doc->ModeloCotizacion->estado == 0)
                                                <button onclick="desactivar_cotizacion('{{$doc->ModeloCotizacion->idcotizaciones}}');" type="button" class="btn btn-outline-danger px-2 py-2" data-toggle="tooltip" data-html="true" title="Desactivar">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>
                                            @else
                                                <button onclick="activar_cotizacion('{{$doc->ModeloCotizacion->idcotizaciones}}' );" type="button" class="btn btn-outline-success px-2 py-2" data-toggle="tooltip" data-html="true" title="Activar">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            @endif

                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center ">
                                    <span class="badge badge-danger badge-lg">Sin registros</span>
                                </td>
                            </tr>
                        @endif
                    @endif
                </tbody>
            </table>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6" id="ver_documento_comercializacion">
            <div class="alert alert-default alert-dismissible fade show" role="alert">
                <span class="alert-text">
                    </span><strong>Comunicado!</strong>
                    Pulse el boton
                    <span class="badge badge-info badge-lg">
                        <i class="fa fa-eye align-middle"></i>
                    </span> para vizualizar el documento..
                </span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>



</div>

<!-- MODAL FOOTER -->
<div class="modal-footer" style="padding-top: 0px !important;">

</div>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    })
</script>
