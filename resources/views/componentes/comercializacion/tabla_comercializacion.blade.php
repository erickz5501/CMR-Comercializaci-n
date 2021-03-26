

<table class="table table-flush table-hover" id="datatable-comercializacion">
    {{-- id="datatable-comercializacion" --}}
    <thead class="thead-light">
        <tr>
            <th>CLIENTE</th>
            <th>GIRO DE NEGOCIO</th>
            <th>TELÉFONO</th>
            <th>CORREO</th>
            <th>OPCIONES</th>
        </tr>
    </thead>

    <tbody>
        @if ( count($comercializaciones) > 0 )

            @foreach ($comercializaciones as $key => $comercializacion)
                <tr>
                    <td class="align-middle">

                        <div class="d-flex align-items-center">
                            <div class="mx-3">
                                <span class="text-dark font-weight-600 text-sm">{{ $comercializacion->nro_documento}}</span>
                                <small class="d-block text-muted text-sm">
                                    {{Str::limit($comercializacion->nombres_razon_social.' '.$comercializacion->apellidos_nombre_comercial, 25, '...')}}

                                </small>
                            </div>
                        </div>

                    </td>

                    <td class="align-middle">
                        {{ $comercializacion->gironegocio->nombre}}
                    </td>

                    <td class="align-middle">
                        {{ $comercializacion->telefono_empresa}}
                    </td>

                    <td class="align-middle">
                        @if ($comercializacion->correo_1)
                            {{ $comercializacion->correo_1}}
                        @else
                            -- no defindo --
                        @endif
                    </td>

                    {{-- <td class="align-middle">
                        @if ($comercializacion->estado == 0)
                            <span class="badge badge-success badge-lg">Activo</span>
                        @else
                            <span class="badge badge-danger badge-lg">Inactivo</span>
                        @endif

                    </td> --}}

                    <td class="align-middle">
                        <button disabled onclick="mostrar_docs_cotizacion( {{$comercializacion->idcomercializacion}} );" type="button" class="btn btn-outline-info px-2 py-2" data-toggle="tooltip" data-original-title="Ver Docs. de Cotización">
                            <i class="far fa-eye"></i>
                        </button>

                        {{-- <button onclick="mostrar_seguimiento( {{$comercializacion->idclientes}}, '{{ $comercializacion->nombres_razon_social}} {{ $comercializacion->apellidos_nombre_comercial}}-{{ $comercializacion->nro_documento}}' );" type="button" class="btn btn-outline-default px-3 py-2" data-toggle="tooltip" data-original-title="Ver Seguimiento del cliente">
                            <i class="fas fa-book"></i>
                        </button> --}}
                        <a href="{{ url('dashboard/comercializacion/mostrar-seguimiento/lista/'.$comercializacion->idclientes)}}"  type="button" class="btn btn-outline-default px-3 py-2" data-toggle="tooltip" data-original-title="Ver Seguimiento del cliente">
                            <i class="fas fa-book"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="6" class="text-center"><span class="badge badge-danger badge-lg">NO HAY REGISTROS...</span></td>
            </tr>
        @endif
    </tbody>
</table>

<div class="card-footer py-4">
    <div class="row"  >
        <div class="d-none {{ $comercializaciones->total() / $comercializaciones->perPage() > 5 ? 'd-md-none d-lg-none d-xl-none' : ' d-md-block' }} col-xs-12 col-ms-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            Mostrando {{ count($comercializaciones) }} de {{ $comercializaciones->total() }} registros.
        </div>
        <div class=" col-xs-12 col-sm-12 {{ $comercializaciones->total() / $comercializaciones->perPage() > 10 ? 'col-md-12 col-lg-12 col-xl-12' : 'col-md-6 col-lg-6 col-xl-6' }} " style="overflow-x: auto;">
            <div class="d-flex flex-row-reverse " style="padding-left: 20px !important;">
                {!! $comercializaciones->links() !!}
            </div>
        </div>
    </div>
</div>

<script>



    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
