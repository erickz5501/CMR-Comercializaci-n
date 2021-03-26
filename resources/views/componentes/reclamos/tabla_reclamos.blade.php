
<div class="table-responsive">
    <table class="table table-flush table-hover"  >
        <thead class="thead-light">
            <tr>
                <th>Cliente</th>
                <th>Persona contacto</th>
                <th>Fecha compromiso</th>
                <th>Fecha solucion</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @if ( count($reclamos) > 0 )

                @foreach ($reclamos as $count => $reclamo)
                    <tr>
                        <td>{{ $reclamo->clientes->nombres_razon_social}}</td>
                        <td>{{ $reclamo->persona_contacto}}</td>
                        <td>{{ $reclamo->fecha_compromiso}}</td>
                        <td>{{ $reclamo->fecha_solucion}}</td>
                        <td>
                            @if ($reclamo->estado == 0)
                                <span class="badge badge-success badge-lg">Activo</span>
                            @else
                                <span class="badge badge-danger badge-lg">Inactivo</span>
                            @endif
                        </td>
                        <td>
                            <button onclick="detalle_reclamo({{ $reclamo->idreclamos}})" type="button" class="btn btn-outline-warning px-2 py-2" data-toggle="tooltip" data-original-title="Editar">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button onclick="desactivar_reclamo( {{$reclamo->idreclamos}} );"  type="button" class="btn btn-outline-info px-2 py-2" data-toggle="tooltip" data-original-title="Ver detalle">
                                <i class="fas fa-eye"></i>
                            </button>
                            @if ($reclamo->estado == 0)
                                <button onclick="desactivar_reclamo({{ $reclamo->idreclamos}});" type="button" class="btn btn-outline-danger px-2 py-2" data-toggle="tooltip" data-original-title="Desactivar">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            @else
                                <button  onclick="activar_reclamo({{ $reclamo->idreclamos}})" type="button" class="btn btn-outline-success px-2 py-2" data-toggle="tooltip" data-original-title="Activar">
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
</div>
<div class="card-footer py-4">
    <div class="row"  >
        <div class="d-none {{ $reclamos->total() / $reclamos->perPage() > 5 ? 'd-md-none d-lg-none d-xl-none' : ' d-md-block' }} col-xs-12 col-ms-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            Mostrando {{ count($reclamos) }} de {{ $reclamos->total() }} registros.
        </div>
        <div class=" col-xs-12 col-sm-12 {{ $reclamos->total() / $reclamos->perPage() > 10 ? 'col-md-12 col-lg-12 col-xl-12' : 'col-md-6 col-lg-6 col-xl-6' }} " style="overflow-x: auto;">
            <div class="d-flex flex-row-reverse " style="padding-left: 20px !important;">
                {!! $reclamos->links() !!}
            </div>
        </div>
    </div>
</div>

<script>

    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    })
</script>
