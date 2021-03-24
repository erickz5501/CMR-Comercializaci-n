
    <div class="table-responsive">
        <table class="table table-flush table-hover">
            <thead class="thead-light">
                <tr>
                    <th>NOMBRES</th>
                    <th>DESCRIPCIÓN</th>
                    <th>ESTADO</th>
                    <th>OPCIONES</th>
                </tr>
            </thead>
            <tbody>
                @if (count($etiquetas) > 0)
                    @foreach ($etiquetas as $count => $etiqueta)
                    <tr>
                        {{-- <td class="align-middle">{{ $count+1}}</td> --}}

                        <td class="align-middle">
                            <span class="text-dark font-weight-600 text-sm">
                                {{Str::limit($etiqueta->nombre, 30, '...')}}
                            </span>
                        </td>

                        <td class="align-middle">
                            {{Str::limit($etiqueta->descripcion, 40, '...')}}
                        </td>

                        <td class="align-middle">
                            @if ($etiqueta->estado == 0)
                                <span class="badge badge-success badge-lg">Activo</span>
                            @else
                                <span class="badge badge-danger badge-lg">Inactivo</span>
                            @endif
                        </td>
                        <td class="align-middle">
                            <button onclick="mostrar_one_etiqueta({{ $etiqueta->idetiquetas}})"  type="button" class="btn btn-outline-warning px-2 py-2" data-toggle="tooltip" data-original-title="Editar">
                                <i class="fas fa-pencil-alt"></i>
                            </button>

                            {{-- <button onclick="mostrar_modal({{ $etiqueta->idetiquetas }})"  type="button" class="btn btn-outline-info px-2 py-2" data-toggle="tooltip" data-original-title="Ver detalle">
                                <i class="fas fa-eye"></i>
                            </button> --}}

                            @if ($etiqueta->estado == 0)
                                <button onclick="desactivar_etiqueta({{ $etiqueta->idetiquetas }});"  type="button" class="btn btn-outline-danger px-2 py-2" data-toggle="tooltip" data-original-title="Desactivar">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            @else
                                <button onclick="activar_etiqueta({{ $etiqueta->idetiquetas }});"  type="button" class="btn btn-outline-success px-2 py-2" data-toggle="tooltip" data-original-title="Activar">
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
        <div class="d-none {{ $etiquetas->total() / $etiquetas->perPage() > 5 ? 'd-md-none d-lg-none d-xl-none' : ' d-md-block' }} col-xs-12 col-ms-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            Mostrando {{ count($etiquetas) }} de {{ $etiquetas->total() }} registros.
        </div>
        <div class=" col-xs-12 col-sm-12 {{ $etiquetas->total() / $etiquetas->perPage() > 10 ? 'col-md-12 col-lg-12 col-xl-12' : 'col-md-6 col-lg-6 col-xl-6' }} " style="overflow-x: auto;">
            <div class="d-flex flex-row-reverse " style="padding-left: 20px !important;">
                {!! $etiquetas->links() !!}
            </div>
        </div>
    </div>
</div>