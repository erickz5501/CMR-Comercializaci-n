@if (count($historial)>0)
    @foreach ($historial as $count => $registro)
        <tr>
            <td>{{ $count+1 }}</td>
            <td>{{ $registro->persona_contacto}}</td>
            <td>{{ $registro->idmodulos}}</td>
            <td>{{ $registro->detalle_llamada}}</td>
            <td>{{ $registro->fecha_evento}}</td>
            <td>{{ $registro->ideventos }}</td>
            <td>{{ $registro->calificacion_encuesta}} Estrellas</td>
            <td>
                <button style="background-color: #e8875d !important;" type="button" class="btn btn-google-plus btn-icon-only" onclick="mostrar_one_registro({{  $registro->idhistorial_comercializacion }});">
                    <span class="btn-inner--icon"><i class="fas fa-pencil-alt"></i></span>
                </button>

                <button class="btn btn-icon-only btn-info" type="button" onclick="mostrar_modalRegistro({{ $registro->idhistorial_comercializacion }});">
                    <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
                </button>
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