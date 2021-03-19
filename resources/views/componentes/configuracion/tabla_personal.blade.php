
<table class="table table-flush table-hover" id="datatable-personal">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>NOMBRES</th>
            <th>FECHA</th>
            <th>ESTADO</th>
            <th>OPCIONES</th>
        </tr>
    </thead>

    <tbody>
        @if (count($personal) > 0)
            @foreach ($personal as $count => $persona)
                <tr>
                    <td>{{ $count+1}}</td>

                    <td>{{ $persona->nombres}} {{ $persona->apellidos}}</td>

                    <td>
                        @if ($persona->updated_at)
                            {{ \Carbon\Carbon::parse($persona->updated_at)->format('Y-m-d / g:i a') }}
                        @else
                            --/--/-- --:-- --
                        @endif
                    </td>

                    <td>
                        @if ($persona->estado == 0)
                            <span class="badge badge-success badge-lg">Activo</span>
                        @else
                            <span class="badge badge-danger badge-lg">Inactivo</span>
                        @endif

                    </td>
                    <td>
                        <button onclick="mostrar_one_personal( {{$persona->idpersonal }} )" type="button" class="btn btn-outline-warning px-2 py-2" data-toggle="tooltip" data-original-title="Editar">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                        @if ($persona->estado == 0)
                            <button onclick="desactivar_personal( {{$persona->idpersonal}} );" type="button" class="btn btn-outline-danger px-2 py-2" data-toggle="tooltip" data-original-title="Desactivar">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        @else
                            <button  onclick="activar_personal( {{$persona->idpersonal}} );" type="button" class="btn btn-outline-success px-2 py-2" data-toggle="tooltip" data-original-title="Activar">
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

        var $dtBasic = $('#datatable-personal');

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
