
<table class="table table-flush table-hover" id="datatable-seguimiento-comercializacion">
    <thead class="thead-light">
        <tr>
            <th>PERSONA CONTACTO</th>
            <th>MEDIO CONTACTO</th>
            <th>DETALLE LLAMADA</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Opciones</th>
        </tr>
    </thead>

    <tbody>
        @if ( count($seguimientos) > 0 )
            @foreach ($seguimientos as $count => $seguimiento)

                <tr>
                    <td class="align-middle">
                        <span class="text-dark font-weight-600 text-sm">
                            {{Str::limit($seguimiento->persona_contacto, 20, '...')}}
                        </span>
                    </td>

                    <td class="align-middle">

                        {{Str::limit($seguimiento->medio->nombre, 20, '...')}}
                    </td>

                    <td class="align-middle">
                        {{Str::limit($seguimiento->detalla_llamada, 20, '...')}}
                    </td>

                    <td class="align-middle">
                        {{ \Carbon\Carbon::parse($seguimiento->fecha_evento)->format('Y-m-d / g:i a') }}
                    </td>

                    <td class="align-middle">
                        @if ($seguimiento->estado == 0)
                            <span class="badge badge-success badge-lg">Activo</span>
                        @else
                            <span class="badge badge-danger badge-lg">Inactivo</span>
                        @endif
                    </td>

                    <td class="align-middle">
                        <button  onclick="mostrar_docs_cotizacion( '{{$seguimiento->idcomercializacion}}' );" type="button" class="btn btn-outline-default px-2 py-2" data-toggle="tooltip" data-original-title="Ver Docs. de Cotización">
                            <i style="font-size: 17px !important" class="far fa-file-pdf"></i>
                        </button>

                        <button onclick="mostrar_one_registro( '{{$seguimiento->idcomercializacion}}' );" type="button" class="btn btn-outline-warning px-2 py-2" data-toggle="tooltip" data-html="true" title="Editar o duplicar registro.">
                            <i class="fas fa-pencil-alt"></i>
                        </button>

                        <button onclick="detalle_registro('{{$seguimiento->idcomercializacion}}');" type="button" class="btn btn-outline-info px-2 py-2" data-toggle="tooltip" data-html="true" title="Ver detalle registro.">
                            <i class="fas fa-eye"></i>
                        </button>

                        @if ($seguimiento->estado == 0)

                            <button onclick="desactivar_registro( '{{$seguimiento->idcomercializacion}}', '{{$seguimiento->idclientes}}' );" type="button" class="btn btn-outline-danger px-2 py-2" data-toggle="tooltip" data-html="true" title="Desactivar">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        @else

                            <button onclick="activar_registro( '{{$seguimiento->idcomercializacion}}', '{{$seguimiento->idclientes}}' );" type="button" class="btn btn-outline-success px-2 py-2" data-toggle="tooltip" data-html="true" title="Activar">
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

        var $dtBasic = $('#datatable-seguimiento-comercializacion');

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
