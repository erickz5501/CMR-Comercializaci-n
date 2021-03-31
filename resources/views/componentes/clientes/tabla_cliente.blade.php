
<div class="table-responsive">
    <table class="table table-flush table-hover">
        <thead class="thead-light">
            <tr>
                {{-- <th>#</th> --}}
                <th>NOMBRES</th>
                <th>TIPO PERSONA</th>
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
                    {{-- <td class="align-middle">{{ $count+1}}</td> --}}

                    <td class="align-middle">
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <a href="#">
                                    <img src="/img/default_img.png" class="avatar">
                                </a>
                                <div class="mx-3">
                                    <span class="text-dark font-weight-600 text-sm">

                                        {{Str::limit($cliente->nombres_razon_social.' '.$cliente->apellidos_nombre_comercial, 20, '...')}}
                                    </a>
                                    <small class="d-block text-muted text-sm">{{ $cliente->nro_documento}}</small>
                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="align-middle">
                        @if ($cliente->tipo_persona == 1)
                            <span class="badge badge-primary badge-lg">INTERESADO</span>
                        @else
                            <span class="badge badge-info badge-lg">CLIENTE</span>
                        @endif
                    </td>

                    <td class="align-middle">{{ $cliente->telefono_empresa}}</td>

                    <td class="align-middle">{{ $cliente->correo_1}}</td>

                    <td class="align-middle">
                        @if ($cliente->estado == 0)
                            <span class="badge badge-success badge-lg">Activo</span>
                        @else
                            <span class="badge badge-danger badge-lg">Inactivo</span>
                        @endif
                    </td>
                    <td class="align-middle">
                        <button onclick="mostrar_one_cliente_interesado({{ $cliente->idclientes }})"  type="button" class="btn btn-outline-warning px-2 py-2" data-toggle="tooltip" data-original-title="Editar">
                            <i class="fas fa-pencil-alt"></i>
                        </button>

                        <button onclick="detalle_cliente_interesado({{ $cliente->idclientes }})"  type="button" class="btn btn-outline-info px-2 py-2" data-toggle="tooltip" data-original-title="Ver detalle">
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
        <div class="d-none {{ $clientes->total() / $clientes->perPage() > 5 ? 'd-md-none d-lg-none d-xl-none' : ' d-md-block' }} col-xs-12 col-ms-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            Mostrando {{ count($clientes) }} de {{ $clientes->total() }} registros.
        </div>
        <div class=" col-xs-12 col-sm-12 {{ $clientes->total() / $clientes->perPage() > 10 ? 'col-md-12 col-lg-12 col-xl-12' : 'col-md-6 col-lg-6 col-xl-6' }} " style="overflow-x: auto;">
            <div class="d-flex flex-row-reverse " style="padding-left: 20px !important;">
                {!! $clientes->links() !!}
            </div>
        </div>
    </div>
</div>
