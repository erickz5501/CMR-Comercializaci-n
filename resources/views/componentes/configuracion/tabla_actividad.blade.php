{{-- @if (count($actividades) > 0)
      @foreach ($actividades as $count => $actividad)
      <tr>

        <td>{{ $count+1}}</td>
        <td>{{ $actividad->nombre}}</td>

        @if ($actividad->estado == 0)
            <td>
                <span class="badge badge-success badge-lg">Activo</span>
            </td>
            <td>
                    <button style="background-color: #e8875d !important;" type="button" class="btn btn-google-plus btn-icon-only" onclick="mostrar_one_actividad({{ $actividad->idactividad }})">
                        <span class="btn-inner--icon"><i class="fas fa-pencil-alt"></i></span>
                    </button>

                    <button type="button" class="btn btn-youtube btn-icon-only" onclick="desactivar_actividad({{ $actividad->idactividad }});">
                        <span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>
                    </button>
            </td>
        @else
            <td>
                <span class="badge badge-danger badge-lg">Inactivo</span>
            </td>
            <td>
                <button style="background-color: #e8875d !important;" type="button" class="btn btn-google-plus btn-icon-only" onclick="mostrar_one_actividad({{ $actividad->idactividad }})">
                    <span class="btn-inner--icon"><i class="fas fa-pencil-alt"></i></span>
                </button>
                <button type="button" class="btn btn-slack btn-icon-only" onclick="activar_actividad({{ $actividad->idactividad }});">
                    <span class="btn-inner--icon"><i class="fas fa-check"></i></span>
                </button>
            </td>
        @endif



    </tr>
      @endforeach
    <tr class='noSearch hide'>
        <td colspan="5"></td>
    </tr>
  @else
    <tr>
        <td colspan="6">No hay registros</td>
    </tr>
@endif --}}



<table class="table table-flush table-hover" id="datatable-actividades">
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
        @if (count($actividades) > 0)
            @foreach ($actividades as $count => $actividad)
            <tr>
                <td>{{ $count+1}}</td>

                <td>{{ $actividad->nombre}}</td>

                <td>
                    @if ($actividad->updated_at)
                        {{ \Carbon\Carbon::parse($actividad->updated_at)->format('Y-m-d / g:i a') }}
                    @else
                        --/--/-- --:-- --
                    @endif
                </td>

                <td>
                    @if ($actividad->estado == 0)
                        <span class="badge badge-success badge-lg">Activo</span>
                    @else
                        <span class="badge badge-danger badge-lg">Inactivo</span>
                    @endif
                </td>

                <td>
                    <button onclick="mostrar_one_actividad({{ $actividad->idactividad }})" type="button" class="btn btn-outline-warning px-2 py-2" data-toggle="tooltip" data-original-title="Editar">
                        <i class="fas fa-pencil-alt"></i>
                    </button>

                    @if ($actividad->estado == 0)
                        <button onclick="desactivar_actividad({{ $actividad->idactividad }});" type="button" class="btn btn-outline-danger px-2 py-2" data-toggle="tooltip" data-original-title="Desactivar">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    @else
                        <button onclick="activar_actividad({{ $actividad->idactividad }});" type="button" class="btn btn-outline-success px-2 py-2" data-toggle="tooltip" data-original-title="Activar">
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

        var $dtBasic = $('#datatable-actividades');

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
