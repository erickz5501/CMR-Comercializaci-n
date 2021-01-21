@if (count($clientes) > 0)
      @foreach ($clientes as $count => $cliente)
      <tr>

        <td>{{ $count+1}}</td>
        <td>
            @if ($cliente->tipo_documento == 3)
                DNI
            @else
                RUC
            @endif
        </td>
        <td>{{ $cliente->nombres_razon_social}}</td>
        <td>{{ $cliente->apellidos_nombre_comercial}}</td>
        <td>{{ $cliente->telefono_empresa}}</td>
        <td>{{ $cliente->correo_1}}</td>

        @if ($cliente->estado == 0)
            <td>
                <span class="badge badge-success badge-lg">Activo</span>
            </td>
            <td>
                <button style="background-color: #e8875d !important;" type="button" class="btn btn-google-plus btn-icon-only" data-toggle="modal" data-target="#registroModal">
                    <span class="btn-inner--icon"><i class="fas fa-pencil-alt"></i></span>
                </button>
                {{-- <button class="btn btn-icon btn-warning" type="button" data-toggle="modal" data-target="#registroModal">
                    <span class="btn-inner--icon"><i class="fas fa-pencil-alt"></i></span>
                </button> --}}
                <button class="btn btn-icon btn-info" type="button" onclick="mostrar_modal({{ $cliente->idclientes }})" >
                    <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
                </button>
                {{-- <button class="btn btn-icon btn-danger" type="button" onclick="desactivar_cliente({{ $cliente->idclientes }});"   >
                    <span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>
                </button> --}}
                <button type="button" class="btn btn-youtube btn-icon-only" onclick="desactivar_cliente({{ $cliente->idclientes }});">
                    <span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>
                </button>
            </td>
        @else
            <td>
                <span class="badge badge-danger badge-lg">Inactivo</span>
            </td>
            <td>
                <button style="background-color: #e8875d !important;" type="button" class="btn btn-google-plus btn-icon-only" data-toggle="modal" data-target="#registroModal">
                    <span class="btn-inner--icon"><i class="fas fa-pencil-alt"></i></span>
                </button>
                <button class="btn btn-icon btn-info" type="button" onclick="mostrar_modal({{ $cliente->idclientes }})" >
                    <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
                </button>
                {{-- <button class="btn btn-icon btn-success" type="button" onclick="activar_cliente({{ $cliente->idclientes }});"   >
                    <span class="btn-inner--icon"><i class="fas fa-check"></i></span>
                </button> --}}
                <button type="button" class="btn btn-slack btn-icon-only" onclick="activar_cliente({{ $cliente->idclientes }});">
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
