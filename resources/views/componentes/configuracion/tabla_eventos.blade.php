@if (count($eventos) > 0)
      @foreach ($eventos as $count => $evento)
      <tr>

        <td>{{ $count+1}}</td>
        <td>{{ $evento->nombre}}</td>
        <td>{{ $evento->descrripcion}}</td>
        
        @if ($evento->estado == 0)
            <td>
                <span class="badge badge-success badge-lg">Activo</span>
            </td>
            <td>
                {{-- <div  class="btn-group" role="group" aria-label="Basic mixed styles example"> --}}
                    <button style="background-color: #e8875d !important;" type="button" class="btn btn-google-plus btn-icon-only" onclick="mostrar_one_evento( {{ $evento->ideventos }} )">
                        <span class="btn-inner--icon"><i class="fas fa-pencil-alt"></i></span>
                    </button>
                
                    <button type="button" class="btn btn-youtube btn-icon-only" onclick="desactivar_evento( {{ $evento->ideventos }} );">
                        <span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>
                    </button>
                {{-- </div> --}}
            </td>
        @else
            <td>
                <span class="badge badge-danger badge-lg">Inactivo</span>
            </td>
            <td>
                <button style="background-color: #e8875d !important;" type="button" class="btn btn-google-plus btn-icon-only" onclick="mostrar_one_evento( {{ $evento->ideventos }} )">
                    <span class="btn-inner--icon"><i class="fas fa-pencil-alt"></i></span>
                </button>
                <button type="button" class="btn btn-slack btn-icon-only" onclick="activar_evento( {{ $evento->ideventos }} );">
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
