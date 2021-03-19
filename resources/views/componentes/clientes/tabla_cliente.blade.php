
<table class="table table-flush table-hover" id="datatable-cliente-interesado">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>NOMBRES</th>
            <th>TIPO DOC</th>
            <th>TELÉFONO</th>
            <th>CORREO</th>
            <th>Estado</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        @if (count($clientes) > 0)
            @foreach ($clientes as $count => $cliente)
            <tr>
                <td>{{ $count+1}}</td>

                <td>
                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center">
                            <a href="#">
                                <img src="/argon/assets/img/theme/team-4.jpg" class="avatar">
                            </a>
                            <div class="mx-3">
                                <a href="#" class="text-dark font-weight-600 text-sm">{{ $cliente->nombres_razon_social}} {{ $cliente->apellidos_nombre_comercial}}</a>
                                <small class="d-block text-muted text-sm">{{ $cliente->nro_documento}}</small>
                            </div>
                        </div>
                    </div>
                </td>

                <td>
                    @if ($cliente->tipo_documento == 1)
                        DNI
                    @else
                        RUC
                    @endif
                </td>

                <td>{{ $cliente->telefono_empresa}}</td>

                <td>{{ $cliente->correo_1}}</td>

                <td>
                    @if ($cliente->estado == 0)
                        <span class="badge badge-success badge-lg">Activo</span>
                    @else
                        <span class="badge badge-danger badge-lg">Inactivo</span>
                    @endif
                </td>
                <td>
                    <button onclick="mostrar_one_cliente({{ $cliente->idclientes }})"  type="button" class="btn btn-outline-warning px-2 py-2" data-toggle="tooltip" data-original-title="Editar">
                        <i class="fas fa-pencil-alt"></i>
                    </button>

                    <button onclick="mostrar_modal({{ $cliente->idclientes }})"  type="button" class="btn btn-outline-info px-2 py-2" data-toggle="tooltip" data-original-title="Ver detalle">
                        <i class="fas fa-eye"></i>
                    </button>

                    @if ($cliente->estado == 0)
                        <button onclick="desactivar_cliente({{ $cliente->idclientes }});"  type="button" class="btn btn-outline-danger px-2 py-2" data-toggle="tooltip" data-original-title="Desactivar">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    @else
                        <button onclick="activar_cliente({{ $cliente->idclientes }});"  type="button" class="btn btn-outline-success px-2 py-2" data-toggle="tooltip" data-original-title="Activar">
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

        var $dtBasic = $('#datatable-cliente-interesado');

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
