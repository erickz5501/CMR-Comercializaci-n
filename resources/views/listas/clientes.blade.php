@extends('layout')

@section('title', 'Lista de clientes')
@section('pagina', 'Clientes')
@section('content')
    <div class="card-header">
        <div class="row align-items-center">
        <div class="col-8">
            <form>
                <input class="form-control" placeholder="Buscar cliente..." type="text" id="searchTerm" onkeyup="doSearch()">
            </form>
        </div>
        <div class="col-4 text-right">
            <a type="button"href="#" class="btn btn btn-primary" data-toggle="modal" data-target="#registroModal"><i class="fas fa-plus-circle"></i> Agregar Cliente</a>
        </div>
        </div>
    </div>

    <!-- ================================= MODAL ================================= -->
    <div class="modal fade" id="ModalDetalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal" role="document" id="cliente_modal">
            <!-- Contenido del modal /  -->
        </div>
    </div>
    <!-- FIN-MODAL -->

     <!-- ================================= MODAL Registro ================================= -->
     <div class="modal fade" id="registroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
          <div class="modal-content">
            <!-- ================================= MODAL TITULO ================================= -->
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- ================================= MODAL CUERPO ================================= -->
            <div class="modal-body">
                <div class="row col-12">
                    <div class="card-body mb-12 col-12">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="nombre_razon_social_input">Nombres/Razon social</label>
                                    <input type="text" class="form-control" id="nombre_razon_social_input" placeholder="Erick">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="nombre_comercial_input">Apellidos/Nombre comercial</label>
                                    <input type="text" class="form-control" id="nombre_comercial_input" placeholder="Zumaeta">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="tipoPersonaSelect">Giro de negocio</label>
                                    <select class="form-control" id="tipoPersonaSelect">
                                    <option>Ventas</option>
                                    <option>Empresa</option>
                                    <option>Otro</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="tipoPersonaSelect">Tipo persona</label>
                                    <select class="form-control" id="tipoPersonaSelect">
                                    <option>Natural</option>
                                    <option>Juridica</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="tipodocSelect">Tipo documento</label>
                                    <select class="form-control" id="tipodocSelect">
                                    <option>DNI</option>
                                    <option>RUC</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="numDocumentoInput">Numero documento</label>
                                    <input type="number" class="form-control" id="numDocumentoInput" placeholder="76858587">
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Correo 1 </label>
                                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput2">Correo 2 </label>
                                    <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example2.com">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleFormControlInput3">Correo 3 </label>
                                    <input type="email" class="form-control" id="exampleFormControlInput3" placeholder="name@example3.com">
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="number-empresa-input">Telefono empresa</label>
                                    <input class="form-control" type="number" value="987654321" id="number-empresa-input">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="number-contacto-input">Telefono contacto</label>
                                    <input class="form-control" type="number" value="987654321" id="number-contacto-input">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="number-otro-input">Telefono otro</label>
                                    <input class="form-control" type="number" value="987654321" id="number-otro-input">
                                </div>
                            </div>
                        </div>
                        
                    </div> 
                </div>
              <!-- ================================= FIN-CUADRO-BRODER ================================= -->
            </div>
            <!-- FIN-MODAL-BODY -->

            <!-- MODAL FOOTER -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary">Guardar producto</button>
            </div>
            <!-- FIN-MODAL-FOOTER -->
          </div>
        </div>
    </div>
    <!-- FIN-MODAL -->

    <div class="table-responsive">
        <div>
            <table class="table align-items-center" id="datos">
                <thead class="thead-light">
                    <tr>
                        <th>Tipo Persona</th>
                        <th>Nombre/Razon Social</th>
                        <th>Apellidos/Nombre comercial</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody class="list">

                    @forelse ($clientes as $cliente)
                    @if($cliente->tipo_persona == 2)
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
                                <button class="btn btn-icon btn-danger" type="button" data-toggle="sweet-alert" data-sweet-alert="warning">
                                    <span class="btn-inner--icon"><i class="far fa-trash-alt"></i></span>
                                </button>
                            </td>
                        </tr>
                    @endif
                        
                    @empty
                        
                    @endforelse
                    <tr class='noSearch hide'>
                        <td colspan="5"></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-footer py-4">

    </div>

@endsection

<script language="javascript">
    function doSearch()
    {
        const tableReg = document.getElementById('datos');
        const searchText = document.getElementById('searchTerm').value.toLowerCase();
        let total = 0;

        // Recorremos todas las filas con contenido de la tabla
        for (let i = 1; i < tableReg.rows.length; i++) {
            // Si el td tiene la clase "noSearch" no se busca en su cntenido
            if (tableReg.rows[i].classList.contains("noSearch")) {
                continue;
            }

            let found = false;
            const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
            // Recorremos todas las celdas
            for (let j = 0; j < cellsOfRow.length && !found; j++) {
                const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                // Buscamos el texto en el contenido de la celda
                if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
                    found = true;
                    total++;
                }
            }
            if (found) {
                tableReg.rows[i].style.display = '';
            } else {
                // si no ha encontrado ninguna coincidencia, esconde la
                // fila de la tabla
                tableReg.rows[i].style.display = 'none';
            }
        }

        // mostramos las coincidencias
        const lastTR=tableReg.rows[tableReg.rows.length-1];
        const td=lastTR.querySelector("td");
        lastTR.classList.remove("hide", "red");
        if (searchText == "") {
            lastTR.classList.add("hide");
        } else if (total) {
            td.innerHTML="Se ha encontrado "+total+" coincidencia"+((total>1)?"s":"");
        } else {
            lastTR.classList.add("red");
            td.innerHTML="No se han encontrado coincidencias";
        }
    }
</script>

@section('js')
    <script src="{{ asset('ajax/ajaxcliente.js')}}"></script>
@endsection

<style>
    #datos tr.noSearch {background:White;font-size:0.8em;}
    #datos tr.noSearch td {padding-top:10px;text-align:right;}
    .hide {display:none;}
    .red {color:Red;}
</style>