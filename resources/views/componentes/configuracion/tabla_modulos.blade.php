
<table class="table table-flush table-hover" id="datatable-modulo">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>NOMBRE</th>
            <th>DESCRIPCIÓN</th>
            <th>ACTUALIZACIÓN</th>
            <th>ESTADO</th>
            <th>OPCIONES</th>
        </tr>
    </thead>

    <tbody>
        @if (count($modulos) > 0)
            @foreach ($modulos as $count => $modulo)
                <tr>
                    <td>{{ $count+1}}</td>

                    <td>{{ $modulo->nombre}}</td>

                    <td>{!! Str::limit(strip_tags($modulo->caracteristicas), 30, ' ...'); !!}</td>

                    <td>
                        @if ($modulo->updated_at)
                            {{ \Carbon\Carbon::parse($modulo->updated_at)->format('Y-m-d / g:i a') }}
                        @else
                            --/--/-- --:-- --
                        @endif
                    </td>

                    <td>
                        @if ($modulo->estado == 0)
                            <span class="badge badge-success badge-lg">Activo</span>
                        @else
                            <span class="badge badge-danger badge-lg">Inactivo</span>
                        @endif
                    </td>

                    <td>
                        <button onclick="mostrar_one_modulo( {{$modulo->idmodulos}} )"  type="button" class="btn btn-outline-warning px-2 py-2">
                            <i class="fas fa-pencil-alt"></i>
                        </button>

                        <button onclick="detalle_modulo( {{$modulo->idmodulos}} );"  type="button" class="btn btn-outline-info px-2 py-2">
                            <i class="fas fa-eye"></i>
                        </button>

                        @if ($modulo->estado == 0)

                            <button onclick="desactivar_modulos( {{$modulo->idmodulos}} );"  type="button" class="btn btn-outline-danger px-2 py-2">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        @else
                            <button onclick="activar_modulos( {{$modulo->idmodulos}} );"  type="button" class="btn btn-outline-success px-2 py-2">
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

        var $dtBasic = $('#datatable-modulo');

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
