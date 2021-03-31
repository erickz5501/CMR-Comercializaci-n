
<div class="table-responsive">
    <table class="table table-flush table-hover"  >
        <thead class="thead-light">
            <tr>
                <tr>
                    <th>NOMBRES</th>
                    <th>E-MAIL</th>
                    <th>ACTUALIZACIÓN</th>
                    <th>ESTADO</th>
                    <th>OPCIONES</th>
                </tr>
            </tr>
        </thead>

        <tbody>
            @if (count($users) > 0)
                @foreach ($users as $count => $user)
                    <tr>
                        <td class="align-middle">
                            <div class="d-flex align-items-center">

                                @if ($user->ModeloPersonal->avatar)
                                    <img src="{{asset('/docs/' . $user->ModeloPersonal->avatar)}}" class="avatar rounded-circle" onerror="this.src=''"  >
                                @else
                                    <img src="{{asset('/img/user-default.svg')}}" class="avatar rounded-circle " >
                                @endif

                                <div class="mx-3">
                                    <a href="#" class="text-dark font-weight-600 text-sm">{{ $user->ModeloPersonal->nombres}} {{ $user->ModeloPersonal->apellidos}}</a>
                                    <small class="d-block text-muted text-sm">{{ $user->ModeloPersonal->dni}}</small>
                                </div>
                            </div>
                        </td>

                        <td class="align-middle">{{ $user->email}}</td>

                        <td class="align-middle">
                            @if ($user->updated_at)
                                {{ \Carbon\Carbon::parse($user->updated_at)->format('Y-m-d / g:i a') }}
                            @else
                                --/--/-- --:-- --
                            @endif
                        </td>

                        <td class="align-middle">
                            @if ($user->estado == 0)
                                <span class="badge badge-success badge-lg">Activo</span>
                            @else
                                <span class="badge badge-danger badge-lg">Inactivo</span>
                            @endif
                        </td>

                        <td class="align-middle">
                            <button onclick="mostrar_one_user( {{$user->id}})"  type="button" class="btn btn-outline-warning px-2 py-2" data-toggle="tooltip" data-original-title="Editar">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            @if ($user->estado == 0)
                                <button onclick="desactivar_user( {{$user->id}} );"  type="button" class="btn btn-outline-danger px-2 py-2" data-toggle="tooltip" data-original-title="Desactivar">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            @else
                                <button onclick="activar_user( {{$user->id}} );"  type="button" class="btn btn-outline-success px-2 py-2" data-toggle="tooltip" data-original-title="Activar">
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
        <div class="d-none {{ $users->total() / $users->perPage() > 5 ? 'd-md-none d-lg-none d-xl-none' : ' d-md-block' }} col-xs-12 col-ms-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
            Mostrando {{ count($users) }} de {{ $users->total() }} registros.
        </div>
        <div class=" col-xs-12 col-sm-12 {{ $users->total() / $users->perPage() > 10 ? 'col-md-12 col-lg-12 col-xl-12' : 'col-md-6 col-lg-6 col-xl-6' }} " style="overflow-x: auto;">
            <div class="d-flex flex-row-reverse " style="padding-left: 20px !important;">
                {!! $users->links() !!}
            </div>
        </div>
    </div>
</div>
<script>

    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    })
</script>
