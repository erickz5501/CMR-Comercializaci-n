



<table class="table table-flush table-hover" id="datatable-medios">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>NOMBRE</th>
            <th>ACTUALIZACIÓN</th>
            <th>ESTADO</th>
            <th>OPCIONES</th>
        </tr>
    </thead>

    <tbody>
        @if (count($medios) > 0)
            @foreach ($medios as $count => $medio)
            <tr>

                <td>{{ $count+1}}</td>
                <td>{{ $medio->nombre}}</td>
                <td>
                    @if ($medio->updated_at)
                        {{ \Carbon\Carbon::parse($medio->updated_at)->format('Y-m-d / g:i a') }}
                    @else
                        --/--/-- --:-- --
                    @endif
                </td>
                <td>
                    @if ($medio->estado == 0)

                        <span class="badge badge-success badge-lg">Activo</span>
                    @else
                        <span class="badge badge-danger badge-lg">Inactivo</span>
                    @endif
                </td>
                <td>
                    <button onclick="mostrar_one_medio( {{$medio->idmedios}} )" type="button" class="btn btn-outline-warning px-2 py-2" data-toggle="tooltip" data-original-title="Editar">
                        <i class="fas fa-pencil-alt"></i>
                    </button>

                    @if ($medio->estado == 0)
                        <button onclick="desactivar_medio( {{ $medio->idmedios }} );" type="button" class="btn btn-outline-danger px-2 py-2" data-toggle="tooltip" data-original-title="Desactivar">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    @else
                        <button  onclick="activar_medio( {{ $medio->idmedios }} );" type="button" class="btn btn-outline-success px-2 py-2" data-toggle="tooltip" data-original-title="Activar">
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

        var $dtBasic = $('#datatable-medios');

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
