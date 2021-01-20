@if (count($clientes) > 0)
      @foreach ($clientes as $count => $cliente)
      <tr>
        <td>{{ $cliente->tipo_documento}}</td>
        <td>{{ $cliente->nombres_razon_social}}</td>
        <td>{{ $cliente->apellidos_nombre_comercial}}</td>
        <td>{{ $cliente->telefono_empresa}}</td>
        <td>{{ $cliente->correo_1}}</td>
        <td>
            <button class="btn btn-icon btn-warning" type="button" data-toggle="modal" data-target="#registroModal">
                <span class="btn-inner--icon"><i class="fas fa-pencil-alt"></i></span>
            </button>
            <button class="btn btn-icon btn-info" type="button" onclick="mostrar_modal({{ $cliente->idclientes }})" >
                <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
            </button>
            <button class="btn btn-icon btn-danger" type="button" onclick="desactivar_cliente();"   >
                <span class="btn-inner--icon"><i class="far fa-trash-alt"></i></span>
            </button>
        </td>
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