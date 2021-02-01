@if ( count($interesados) > 0 )
    
    @foreach ($interesados as $count => $interesado)
        <tr>
            <td>{{ $count+1 }}</td>
            <td>
                @if ($interesado->tipo_documento == 3)
                    DNI
                @else
                    RUC
                @endif
            </td>
            <td>{{ $interesado->nombres_razon_social}}</td>
            <td>{{ $interesado->apellidos_nombre_comercial}}</td>
            <td>{{ $interesado->telefono_empresa}}</td>
            <td>{{ $interesado->correo_1}}</td>

            @if ($interesado->estado == 0)
                <td>
                    <span class="badge badge-success badge-lg">Activo</span>
                </td>
                <td>
                    <button class="btn btn-google-plus btn-icon-only" style="background-color: #e8875d !important;" type="button" onclick="mostrar_one_interesado({{ $interesado->idclientes }})">
                        <span class="btn-inner--icon"><i class="fas fa-pencil-alt"></i></span>
                    </button>
                    <button class="btn btn-icon-only btn-info" type="button" onclick="mostrar_modal_interesado({{ $interesado->idclientes }})">
                        <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
                    </button>
                    <button class="btn btn-youtube btn-icon-only" type="button" onclick="desactivar_cliente({{ $interesado->idclientes }})">
                        <span class="btn-inner--icon"><i class="far fa-trash-alt"></i></span>
                    </button>
                    <button class="btn btn-default btn-icon-only" type="button" onclick="registrar_historial();">
                        <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
                    </button>
                    <button class="btn btn-secondary btn-icon-only" type="button" onclick="mostrar_regHistorial( {{$interesado->idclientes}} );">
                        <span class="btn-inner--icon"><i class="fas fa-book"></i></span>
                    </button>
                </td>

            @else
                <td>
                    <span class="badge badge-danger badge-lg">Inactivo</span>
                </td>
                <td>
                    <button class="btn btn-google-plus btn-icon-only" style="background-color: #e8875d !important;" type="button" onclick="mostrar_one_cliente({{ $interesado->idclientes }})">
                        <span class="btn-inner--icon"><i class="fas fa-pencil-alt"></i></span>
                    </button>
                    <button class="btn btn-icon-only btn-info" type="button" onclick="mostrar_modal_interesado({{ $interesado->idclientes }})">
                        <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
                    </button>
                    <button type="button" class="btn btn-slack btn-icon-only" onclick="activar_cliente({{ $interesado->idclientes }});">
                        <span class="btn-inner--icon"><i class="fas fa-check"></i></span>
                    </button>
                </td>
            @endif
        </tr>
    @endforeach
    <tr class='noSearch hide'>
        <td colspan="5"></td>
    </tr>
@endif                    