
<div class="table-responsive">
    <table class="table table-flush table-hover"  >
        <thead class="thead-light">
            <tr>
                <th>NOMBRE</th>
                <th>FECHA</th>
                <th>VÁLIDO</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
        </thead>

        <tbody>
            @if (count($cotizaciones) > 0)
                @foreach ($cotizaciones as $count => $cotizacion)
                    <tr>
                        <td class="align-middle">{{ $cotizacion->nombre}}</td>

                        <td class="align-middle">
                            {{ \Carbon\Carbon::parse($cotizacion->created_at)->format('Y-m-d / g:i a') }}
                        </td>

                        <td class="align-middle">
                            @if ( $cotizacion->validez == 1 )
                                {{ $cotizacion->validez}} día.
                            @else
                                {{ $cotizacion->validez}} días.
                            @endif
                        </td>


                        <td class="align-middle">
                            @if ($cotizacion->estado == 0)
                                @if ( \Carbon\Carbon::parse($cotizacion->created_at)->addDay($cotizacion->validez) <= now() )
                                    <span class="badge badge-warning badge-lg">Vencido</span>
                                @else
                                    <span class="badge badge-success badge-lg">Activo</span>
                                @endif
                            @else
                                <span class="badge badge-danger badge-lg">Inactivo</span>
                            @endif
                        </td>

                        <td class="align-middle">
                            @if ($cotizacion->ruta)
                                <button  onclick="ver_documento( {{$cotizacion->idcotizaciones}} );" type="button" class="btn btn-outline-default px-2 py-2" data-toggle="tooltip" data-original-title="Ver Documento.">
                                    <i style="font-size: 17px !important;" class="far fa-file-pdf"></i>
                                </button>
                            @else
                                <button type="button" class="btn btn-outline-default px-2 py-2" data-toggle="tooltip" data-original-title="Sin documento.">
                                    <i style="font-size: 15px !important;" class="far fa-file-pdf"></i>
                                </button>
                            @endif

                            <button onclick="mostrar_one_cotizacion({{ $cotizacion->idcotizaciones }});" type="button" class="btn btn-outline-warning px-2 py-2" data-toggle="tooltip"   data-original-title="Editar registro.">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            @if ($cotizacion->estado == 0)
                                <button onclick="desactivar({{ $cotizacion->idcotizaciones }});" type="button" class="btn btn-outline-danger px-2 py-2" data-toggle="tooltip"   data-original-title="Desactivar">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            @else
                                <button onclick="activar({{ $cotizacion->idcotizaciones }});" type="button" class="btn btn-outline-success px-2 py-2" data-toggle="tooltip"   data-original-title="Activar">
                                    <i class="fas fa-check"></i>
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" class="text-center"><span class="badge badge-danger badge-lg">NO HAY REGISTROS...</span></td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

<div class="card-footer py-4">
    <div class="row"  >
        <div class="d-none {{ $cotizaciones->total() / $cotizaciones->perPage() > 5 ? 'd-md-none d-lg-none d-xl-none' : ' d-md-block' }} col-xs-12 col-ms-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            Mostrando {{ count($cotizaciones) }} de {{ $cotizaciones->total() }} registros.
        </div>
        <div class=" col-xs-12 col-sm-12 {{ $cotizaciones->total() / $cotizaciones->perPage() > 10 ? 'col-md-12 col-lg-12 col-xl-12' : 'col-md-6 col-lg-6 col-xl-6' }} " style="overflow-x: auto;">
            <div class="d-flex flex-row-reverse " style="padding-left: 20px !important;">
                {!! $cotizaciones->links() !!}
            </div>
        </div>
    </div>
</div>

<script>
     $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    })
</script>
