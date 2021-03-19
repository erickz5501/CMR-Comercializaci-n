

<table class="table table-flush table-hover" id="datatable-cotizacion">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>NOMBRE</th>
            <th>FECHA</th>
            <th>Estado</th>
            <th>Opciones</th>
        </tr>
    </thead>

    <tbody>
        @if (count($cotizaciones) > 0)
            @foreach ($cotizaciones as $count => $cotizacion)
                <tr>
                    <td>{{ $count+1}}</td>

                    <td>{{ $cotizacion->nombre}}</td>

                    <td>
                        {{ \Carbon\Carbon::parse($cotizacion->created_at)->format('Y-m-d / g:i a') }}
                    </td>
                    <td>
                        @if ($cotizacion->estado == 0)
                            <span class="badge badge-success badge-lg">Activo</span>

                        @else
                            <span class="badge badge-danger badge-lg">Inactivo</span>
                        @endif
                    </td>

                    <td>
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
        @endif
    </tbody>
</table>


<script>
    var DatatableBasic = (function() {

        var $dtBasic = $('#datatable-cotizacion');

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
    })
</script>
