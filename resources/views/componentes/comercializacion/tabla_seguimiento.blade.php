
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
                        {{Str::limit($seguimiento->persona_contacto, 20, '...')}}
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
        @else
            <tr>
                <td colspan="6" class="text-center"><span class="badge badge-danger badge-lg">NO HAY REGISTROS...</span></td>
            </tr>
        @endif
    </tbody>
</table>
<div class="card-footer py-4">
    <div class="row"  >
        <div class="d-none {{ $seguimientos->total() / $seguimientos->perPage() > 5 ? 'd-md-none d-lg-none d-xl-none' : ' d-md-block' }} col-xs-12 col-ms-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            Mostrando {{ count($seguimientos) }} de {{ $seguimientos->total() }} registros.
        </div>
        <div class=" col-xs-12 col-sm-12 {{ $seguimientos->total() / $seguimientos->perPage() > 10 ? 'col-md-12 col-lg-12 col-xl-12' : 'col-md-6 col-lg-6 col-xl-6' }} " style="overflow-x: auto;">
            <div class="d-flex flex-row-reverse " style="padding-left: 20px !important;" id="paginacion_tabla_seguimiento">
                {!! $seguimientos->links() !!}
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
