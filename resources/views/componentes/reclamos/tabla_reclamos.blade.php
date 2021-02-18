@if ( count($reclamos) > 0 )
    
    @foreach ($reclamos as $count => $reclamo)
        <tr>
            <td>{{ $count+1 }}</td>
            <td>{{ $reclamo->clientes->nombres_razon_social}}</td>
            <td>{{ $reclamo->persona_contacto}}</td>
            <td>{{ $reclamo->fecha_compromiso}}</td>
            <td>{{ $reclamo->fecha_solucion}}</td>

            @if ($reclamo->estado == 0)
                <td>
                    <span class="badge badge-success badge-lg">Activo</span>
                </td>
                <td>
                    <button class="btn btn-google-plus btn-icon-only" style="background-color: #e8875d !important;" type="button" onclick="detalle_reclamo( {{$reclamo->idreclamos}} );">
                        <span class="btn-inner--icon"><i class="fas fa-pencil-alt"></i></span>
                    </button>
                    <button class="btn btn-icon-only btn-info" type="button" onclick="detalle_reclamo_ver( {{$reclamo->idreclamos}} );">
                        <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
                    </button>
                    <button class="btn btn-youtube btn-icon-only" type="button" onclick="desactivar_reclamo({{$reclamo->idreclamos}});">
                        <span class="btn-inner--icon"><i class="far fa-trash-alt"></i></span>
                    </button>
                </td>

            @else
                <td>
                    <span class="badge badge-danger badge-lg">Inactivo</span>
                </td>
                <td>
                    <button class="btn btn-google-plus btn-icon-only" style="background-color: #e8875d !important;" type="button" onclick="detalle_reclamo( {{$reclamo->idreclamos}} );">
                        <span class="btn-inner--icon"><i class="fas fa-pencil-alt"></i></span>
                    </button>
                    <button class="btn btn-icon-only btn-info" type="button" onclick="_ver( {{$reclamo->idreclamos}} );">
                        <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
                    </button>
                    <button type="button" class="btn btn-slack btn-icon-only" onclick="activar_reclamo({{ $reclamo->idreclamos }});">
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