@if ( count($comercio) > 0 )

    @foreach ($comercio as $count => $comerci)

        <tr>
            <td>{{ $count+1 }}</td>
            <td>{{ $comerci->clientes->nombres_razon_social}}</td>
            <td>{{ $comerci->clientes->nro_documento}}</td>
            <td>{{ $comerci->clientes->telefono_empresa}}</td>
            <td>{{ $comerci->persona_contacto}}</td>
            <td>{{ $comerci->actividad->nombre}}</td>
            <td>{{ $comerci->observacion}}</td>
            <td>{{ $comerci->fecha_evento}}</td>
            <td>
                @if ($comerci->estado == 0)
                    <span class="badge badge-success badge-lg">Activo</span>
                @else
                    <span class="badge badge-danger badge-lg">Inactivo</span>
                @endif
            </td>

            <td>
                <button class="btn btn-google-plus btn-icon-only" style="background-color: #e8875d !important;" title="Editar" type="button" onclick="mostrar_one_registro( {{$comerci->idcomercializacion}} );">
                    <span class="btn-inner--icon"><i class="fas fa-pencil-alt"></i></span>
                </button>

                <button class="btn btn-icon-only btn-info" type="button" title="Ver" onclick="detalle_registro({{$comerci->idcomercializacion}});">
                    <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
                </button>

                @if ($comerci->estado == 0)
                    <button class="btn btn-youtube btn-icon-only" type="button" title="Desactivar" onclick="desactivar_registro( {{$comerci->idcomercializacion}}, {{$comerci->idclientes}} );">
                        <span class="btn-inner--icon"><i class="far fa-trash-alt"></i></span>
                    </button>
                @else
                    <button type="button" class="btn btn-slack btn-icon-only" title="Activar" onclick="activar_registro( {{$comerci->idcomercializacion}}, {{$comerci->idclientes}} );">
                        <span class="btn-inner--icon"><i class="fas fa-check"></i></span>
                    </button>
                @endif
            </td>
        </tr>

    @endforeach
    <tr class='noSearch hide'>
        <td colspan="7"></td>
    </tr>
    @else
    <tr>
        <td colspan="7">No hay registros</td>
    </tr>
@endif
