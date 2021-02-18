@if ( count($actualizaciones) > 0 )
    
    @foreach ($actualizaciones as $count => $actualizacion)
        <tr>
            <td>{{ $count+1 }}</td>
            <td>{{ $actualizacion->compras->idclientes }}</td>
            <td>{{ $actualizacion->tipo}}</td>
            <td>{{ $actualizacion->version}}</td>
            <td>{{ $actualizacion->tiempo_licencia}}</td>
            <td>{{ $actualizacion->compras->fecha_instalacion }}</td>
            @if ($actualizacion->estado == 0)
                <td>
                    <span class="badge badge-success badge-lg">Activo</span>
                </td>
                <td>
                    <button class="btn btn-google-plus btn-icon-only" style="background-color: #e8875d !important;" type="button" onclick="editar_actualizacion( {{ $actualizacion->idactualizacion }} );">
                        <span class="btn-inner--icon"><i class="fas fa-pencil-alt"></i></span>
                    </button>
                    <button class="btn btn-icon-only btn-info" type="button" onclick="detalle_actualizacion({{ $actualizacion->idactualizacion }});">
                        <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
                    </button>
                    <button class="btn btn-youtube btn-icon-only" type="button" onclick="desactivar_actualizacion({{ $actualizacion->idactualizaciones }});">
                        <span class="btn-inner--icon"><i class="far fa-trash-alt"></i></span>
                    </button>
                </td>

            @else
                <td>
                    <span class="badge badge-danger badge-lg">Inactivo</span>
                </td>
                <td>
                    <button class="btn btn-google-plus btn-icon-only" style="background-color: #e8875d !important;" type="button" onclick="editar_actualizacion( {{ $actualizacion->idactualizacion }} );">
                        <span class="btn-inner--icon"><i class="fas fa-pencil-alt"></i></span>
                    </button>
                    <button class="btn btn-icon-only btn-info" type="button" onclick="detalle_actualizacion({{ $actualizacion->idactualizacion }});">
                        <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
                    </button>
                    <button type="button" class="btn btn-slack btn-icon-only" onclick="activar_actualizacion({{ $actualizacion->idactualizaciones }});">
                        <span class="btn-inner--icon"><i class="fas fa-check"></i></span>
                    </button>
                </td>
            @endif
        </tr>
    @endforeach
    <tr class='noSearch hide'>
        <td colspan="6"></td>
    </tr>
@endif                    