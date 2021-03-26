<div class="table-responsive">
    <table class="table table-flush table-hover"  >
        <thead class="thead-light">
            <tr>

                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Actualización</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
        </thead>

        <tbody>
            @if (count($eventos) > 0)
                @foreach ($eventos as $count => $evento)
                    <tr>
                        <td class="align-middle">
                            {{Str::limit($evento->nombre, 20, '...')}}
                        </td>

                        <td class="align-middle">
                            {{Str::limit($evento->descrripcion, 30, '...')}}
                        </td>

                        <td class="align-middle">
                            @if ($evento->updated_at)
                                {{ \Carbon\Carbon::parse($evento->updated_at)->format('Y-m-d / g:i a') }}
                            @else
                                --/--/-- --:-- --
                            @endif
                        </td>

                        <td class="align-middle">
                            @if ($evento->estado == 0)
                                <span class="badge badge-success badge-lg">Activo</span>
                            @else
                                <span class="badge badge-danger badge-lg">Inactivo</span>
                            @endif
                        </td>

                        <td class="align-middle">

                            <button onclick="mostrar_one_evento( {{ $evento->ideventos }} )" type="button" class="btn btn-outline-warning px-2 py-2" data-toggle="tooltip" data-original-title="Editar">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button  onclick="mostrar_detalle_evento( {{$evento->ideventos}} );" type="button" class="btn btn-outline-info px-2 py-2" data-toggle="tooltip" data-original-title="Ver Detalle">
                                <i class="far fa-eye"></i>
                            </button>
                            @if ($evento->estado == 0)
                                <button onclick="desactivar_evento( {{ $evento->ideventos }} );" type="button" class="btn btn-outline-danger px-2 py-2" data-toggle="tooltip" data-original-title="Desactivar">
                                    <i class="fas fa-trash-alt"></i>
                                </button>

                            @else
                                <button onclick="activar_evento( {{ $evento->ideventos }} );" type="button" class="btn btn-outline-success px-2 py-2" data-toggle="tooltip" data-original-title="Activar">
                                    <i class="fas fa-check"></i>
                                </button>

                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center"><span class="badge badge-danger badge-lg">NO HAY REGISTROS...</span></td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
<div class="card-footer py-4">
    <div class="row"  >
        <div class="d-none {{ $eventos->total() / $eventos->perPage() > 5 ? 'd-md-none d-lg-none d-xl-none' : ' d-md-block' }} col-xs-12 col-ms-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            Mostrando {{ count($eventos) }} de {{ $eventos->total() }} registros.
        </div>
        <div class=" col-xs-12 col-sm-12 {{ $eventos->total() / $eventos->perPage() > 10 ? 'col-md-12 col-lg-12 col-xl-12' : 'col-md-6 col-lg-6 col-xl-6' }} " style="overflow-x: auto;">
            <div class="d-flex flex-row-reverse " style="padding-left: 20px !important;">
                {!! $eventos->links() !!}
            </div>
        </div>
    </div>
</div>
<script>

    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    })

</script>
