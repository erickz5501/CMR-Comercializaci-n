@if (count($historial)>0)
    @foreach ($historial as $count => $registro)
        <tr>
            <td>{{ $count+1 }}</td>
            <td>
                @if ($registro->tipo_documento == 3)
                    Natural
                @else
                    Juridica
                @endif
            </td>
            <td>{{ $registro->persona_contacto}}</td>
            <td>{{ $registro->detalle_llamada}}</td>
            <td>{{ $registro->fecha_evento}}</td>
            <td>{{ $registro->calificacion_encuesta}}</td>
            @if ($registro->estado == 0)
                <td>
                    <span class="badge badge-success badge-lg">Activo</span>
                </td>
                <td>
                    <button style="background-color: #e8875d !important;" type="button" class="btn btn-google-plus btn-icon-only">
                        <span class="btn-inner--icon"><i class="fas fa-pencil-alt"></i></span>
                    </button>
                    
                    <button class="btn btn-icon btn-info" type="button">
                        <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
                    </button>
                    
                    <button type="button" class="btn btn-youtube btn-icon-only" >
                        <span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>
                    </button>
                </td>
            @else
                <td>
                    <span class="badge badge-danger badge-lg">Inactivo</span>
                </td>
                <td>
                    <button style="background-color: #e8875d !important;" type="button" class="btn btn-google-plus btn-icon-only">
                        <span class="btn-inner--icon"><i class="fas fa-pencil-alt"></i></span>
                    </button>
                    <button class="btn btn-icon btn-info" type="button" >
                        <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
                    </button>
                    {{-- <button class="btn btn-icon btn-success" type="button" onclick="activar_cliente({{ $cliente->idclientes }});"   >
                        <span class="btn-inner--icon"><i class="fas fa-check"></i></span>
                    </button> --}}
                    <button type="button" class="btn btn-slack btn-icon-only">
                        <span class="btn-inner--icon"><i class="fas fa-check"></i></span>
                    </button>
                </td>
            @endif
        </tr>
    @endforeach
    <tr class='noSearch hide'>
        <td colspan="5"></td>
    </tr>
@else
<tr>
    <td colspan="7">No hay registros</td>
</tr>
@endif