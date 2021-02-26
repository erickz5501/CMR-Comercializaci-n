@if ( count($comercio) > 0 )
    
    @foreach ($comercio as $count => $comerci)
    
        <tr>
            <td>{{ $count+1 }}</td>
            <td>{{ $comerci->clientes->nombres_razon_social}}</td>
            <td>{{ $comerci->clientes->nro_documento}}</td>
            <td>{{ $comerci->persona_contacto}}</td>
            <td>{{ $comerci->actividad}}</td>
            <td>{{ $comerci->fecha_evento}}</td>
            @if ($comerci->calificacion == 1)
            <td>
                <i class="fas fa-star text-yellow"></i>
                <i class="fas fa-star text-black"></i>
                <i class="fas fa-star text-black"></i>
                <i class="fas fa-star text-black"></i>
                <i class="fas fa-star text-black"></i>
            </td>
            @else
                @if ( $comerci->calificacion == 2)
                    <td>
                        <i class="fas fa-star text-yellow"></i>
                        <i class="fas fa-star text-yellow"></i>
                        <i class="fas fa-star text-black"></i>
                        <i class="fas fa-star text-black"></i>
                        <i class="fas fa-star text-black"></i>
                    </td>
                @else
                    @if ($comerci->calificacion == 3)
                        <td>
                            <i class="fas fa-star text-yellow"></i>
                            <i class="fas fa-star text-yellow"></i>
                            <i class="fas fa-star text-yellow"></i>
                            <i class="fas fa-star text-black"></i>
                            <i class="fas fa-star text-black"></i>
                        </td>
                    @else
                        @if ($comerci->calificacion == 4)
                            <td>
                                <i class="fas fa-star text-yellow"></i>
                                <i class="fas fa-star text-yellow"></i>
                                <i class="fas fa-star text-yellow"></i>
                                <i class="fas fa-star text-yellow"></i>
                                <i class="fas fa-star text-black"></i>
                            </td>
                        @else
                            <td>
                                <i class="fas fa-star text-yellow"></i>
                                <i class="fas fa-star text-yellow"></i>
                                <i class="fas fa-star text-yellow"></i>
                                <i class="fas fa-star text-yellow"></i>
                                <i class="fas fa-star text-yellow"></i>
                            </td>
                      @endif
                  @endif 
               @endif 
            @endif

            @if ($comerci->estado == 0)
                <td>
                    <span class="badge badge-success badge-lg">Activo</span>
                </td>
                <td>
                    <button class="btn btn-google-plus btn-icon-only" style="background-color: #e8875d !important;" type="button" onclick="mostrar_one_registro( {{$comerci->idcomercializacion}} );">
                        <span class="btn-inner--icon"><i class="fas fa-pencil-alt"></i></span>
                    </button>
                    <button class="btn btn-icon-only btn-info" type="button" onclick="detalle_registro({{$comerci->idcomercializacion}});">
                        <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
                    </button>
                    <button class="btn btn-youtube btn-icon-only" type="button" onclick="desactivar_registro( {{$comerci->idcomercializacion}} );">
                        <span class="btn-inner--icon"><i class="far fa-trash-alt"></i></span>
                    </button>
                    <button class="btn btn-default btn-icon-only" type="button" onclick="mostrar_seguimiento( {{$comerci->clientes->idclientes}} );">
                        <span class="btn-inner--icon"><i class="fas fa-book"></i></span>
                    </button>
                </td>

            @else
                <td>
                    <span class="badge badge-danger badge-lg">Inactivo</span>
                </td>
                <td>
                    <button class="btn btn-google-plus btn-icon-only" style="background-color: #e8875d !important;" type="button" onclick="mostrar_one_registro( {{$comerci->idcomercializacion}} );">
                        <span class="btn-inner--icon"><i class="fas fa-pencil-alt"></i></span>
                    </button>
                    <button class="btn btn-icon-only btn-info" type="button" onclick="detalle_registro({{$comerci->idcomercializacion}});">
                        <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
                    </button>
                    <button type="button" class="btn btn-slack btn-icon-only" onclick="activar_registro( {{$comerci->idcomercializacion}} );">
                        <span class="btn-inner--icon"><i class="fas fa-check"></i></span>
                    </button>
                </td>
            @endif
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