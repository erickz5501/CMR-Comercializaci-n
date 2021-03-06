@if (count($modulos) > 0)
      @foreach ($modulos as $count => $modulo)
      <tr>

        <td>{{ $count+1}}</td>
        <td>{{ $modulo->nombre}}</td>
        <td>{!! Str::limit(strip_tags($modulo->caracteristicas), 30, ' ...'); !!}</td>
        {{-- <td> {{ $modulo->caracteristicas}} </td> --}}
        @if ($modulo->estado == 0)
            <td>
                <span class="badge badge-success badge-lg">Activo</span>
            </td>
            <td>
                {{-- <div  class="btn-group" role="group" aria-label="Basic mixed styles example"> --}}
                    <button style="background-color: #e8875d !important;" type="button" class="btn btn-google-plus btn-icon-only" onclick="mostrar_one_modulo( {{$modulo->idmodulos}} )">
                        <span class="btn-inner--icon"><i class="fas fa-pencil-alt"></i></span>
                    </button>
                    <button class="btn btn-icon-only btn-info" type="button" onclick="detalle_modulo( {{$modulo->idmodulos}} );" >
                        <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
                    </button>
                    <button type="button" class="btn btn-youtube btn-icon-only" onclick="desactivar_modulos( {{$modulo->idmodulos}} );">
                        <span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>
                    </button>
                    
                    
                    {{-- </div> --}}
                </td>
                @else
                <td>
                    <span class="badge badge-danger badge-lg">Inactivo</span>
                </td>
                <td>
                    <button style="background-color: #e8875d !important;" type="button" class="btn btn-google-plus btn-icon-only" onclick="mostrar_one_modulo( {{$modulo->idmodulos}} )">
                        <span class="btn-inner--icon"><i class="fas fa-pencil-alt"></i></span>
                    </button>
                    <button class="btn btn-icon-only btn-info" type="button" onclick="detalle_modulo( {{$modulo->idmodulos}} );" >
                        <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
                    </button>
                    <button type="button" class="btn btn-slack btn-icon-only" onclick="activar_modulos( {{$modulo->idmodulos}} );">
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
        <td colspan="6">No hay registros</td>
    </tr>
@endif
