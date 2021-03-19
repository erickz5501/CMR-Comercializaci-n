{{-- <div style="margin: 10px;">
    <table class="table align-items-center" id="datos">
        <thead class="thead-light">
            <tr>
                <th>Cliente</th>
                <th>Telefono</th>
                <th>Actividad</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="list">
            @if ( count($comercio) > 0 )

                @foreach ($comercio as $key => $comerci)

                    <tr class="odd" role="row">
                        <td >
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="mx-3">
                                        <span class="text-dark font-weight-600 text-sm">{{ $comercializacion->clientes->nro_documento}}</span>
                                        <small class="d-block text-muted">
                                            {{$comercializacion->clientes->nombres_razon_social}} {{ $comercializacion->clientes->apellidos_nombre_comercial}}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td>
                            {{ $comercializacion->clientes->telefono_empresa}}
                        </td>

                        <td>{{ $comercializacion->actividad->nombre}}</td>

                        <td>
                            {{ \Carbon\Carbon::parse($comercializacion->fecha_evento)->format('Y-m-d / g:i a') }}
                        </td>

                        <td>
                            @if ($comercializacion->estado == 0)
                                <span class="badge badge-success badge-lg">Activo</span>
                            @else
                                <span class="badge badge-danger badge-lg">Inactivo</span>
                            @endif

                        </td>

                        <td>
                            <button onclick="mostrar_seguimiento( {{$comercializacion->clientes->idclientes}}, '{{ $comercializacion->clientes->nombres_razon_social}} {{ $comercializacion->clientes->apellidos_nombre_comercial}}-{{ $comercializacion->clientes->nro_documento}}' );" type="button" class="btn btn-outline-info px-2 py-2" data-toggle="tooltip" data-html="true" title="Ver detalle">
                                <i class="far fa-eye"></i>
                            </button>

                            <button onclick="mostrar_seguimiento( {{$comercializacion->clientes->idclientes}}, '{{ $comercializacion->clientes->nombres_razon_social}} {{ $comercializacion->clientes->apellidos_nombre_comercial}}-{{ $comercializacion->clientes->nro_documento}}' );" type="button" class="btn btn-outline-default px-3 py-2" data-toggle="tooltip" data-html="true" title="Ver seguimiento.">
                                <i class="fas fa-book"></i>
                            </button>

                        </td>
                    </tr>

                @endforeach
                <tr class='noSearch hide'>
                    <td colspan="7"></td>
                </tr>
                @else
                <tr>
                    <td colspan="7">No hay registros</td>
                </tr>
            @endif
        </tbody>
    </table>
</div> --}}



<table class="table table-flush table-hover" id="datatable-comercializacion">
    {{-- id="datatable-comercializacion" --}}
    <thead class="thead-light">
        <tr>
            <th>CLIENTE</th>
            <th>GIRO DE NEGOCIO</th>
            <th>TELÉFONO</th>
            <th>CORREO</th>
            <th>ESTADO</th>
            <th>OPCIONES</th>
        </tr>
    </thead>

    <tbody>
        @if ( count($comercializaciones) > 0 )

            @foreach ($comercializaciones as $key => $comercializacion)
                <tr>
                    <td class="align-middle">
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="mx-3">
                                    <span class="text-dark font-weight-600 text-sm">{{ $comercializacion->nro_documento}}</span>
                                    <small class="d-block text-muted">
                                        {{$comercializacion->nombres_razon_social}} {{ $comercializacion->apellidos_nombre_comercial}}
                                    </small>
                                </div>
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

                    <td class="align-middle">
                        @if ($comercializacion->estado == 0)
                            <span class="badge badge-success badge-lg">Activo</span>
                        @else
                            <span class="badge badge-danger badge-lg">Inactivo</span>
                        @endif

                    </td>

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

        @endif
    </tbody>
</table>
{{-- <div class="row">
    <div class="d-none {{ $comercializaciones->total() / $comercializaciones->perPage() > 5 ? 'd-md-none d-lg-none d-xl-none' : ' d-md-block' }} col-xs-12 col-ms-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
        Mostrando {{ count($comercializaciones) }} de {{ $comercializaciones->total() }} registros.
    </div>

    <div class="col-xs-12 col-sm-12 {{ $comercializaciones->total() / $comercializaciones->perPage() > 5 ? 'col-md-12 col-lg-12 col-xl-12' : 'col-md-6 col-lg-6 col-xl-6' }} " style="overflow-x: auto;">
        <div class="row" style="padding-left: 20px !important;">
            {!! $comercializaciones->links() !!}
        </div>
    </div>
</div> --}}

<script>
    var DatatableBasic = (function() {

        var $dtBasic = $('#datatable-comercializacion');

        function init($this) {

            var options = {
                keys: !0,
                // select: {
                //     style: "multi"
                // },
                language: {
                    paginate: {
                        previous: "<i class='fas fa-angle-left'>",
                        next: "<i class='fas fa-angle-right'>"
                    }
                },
            };

            var table = $this.on( 'init.dt', function () {

                $('div.dataTables_length select').removeClass('custom-select custom-select-sm');

            }).DataTable(options);
        }

        if ($dtBasic.length) {

            init($dtBasic);
        }
    })();


    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
