@extends('layout')

@section('title', 'Dashboard')
@section('pagina', 'Dashboard')
    
@section('content')
  <div class="card-header">
    <div class="row align-items-center">
      <div class="col-12">
        Lista de tareas
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <div class="card-body">
        <div class="row my-2">
          
          <div class="col-md-2">
            <h4 class="text-primary">
                            Tareas realizadas
            </h4>
            <div class="checklist-item checklist-item-primary my-1">
                            <div class="checklist-info">
                              <h5 class="checklist-title mb-0">Modelo base de datos</h5>
                            </div>
            </div>
            <div class="checklist-item checklist-item-primary my-1">
                            <div class="checklist-info">
                              <h5 class="checklist-title mb-0">Interfaz lista de interesados</h5>
                            </div>
            </div>
            <div class="checklist-item checklist-item-primary my-1">
                            <div class="checklist-info">
                              <h5 class="checklist-title mb-0">interfaz registro de interesados</h5>
                            </div>
            </div>           
          </div>

          <div class="col-md-2">
                        <h4 class="text-danger">
                            Tareas pendientes
                        </h4>
                        <div class="checklist-item checklist-item-danger my-1">
                            <div class="checklist-info">
                              <h5 class="checklist-title mb-0">Interfaz de listado de Historial</h5>
                            </div>
                        </div>
                        <div class="checklist-item checklist-item-danger my-1">
                            <div class="checklist-info">
                              <h5 class="checklist-title mb-0">Interfaz registro de Historial</h5>
                            </div>
                        </div>
                        <div class="checklist-item checklist-item-danger my-1">
                            <div class="checklist-info">
                              <h5 class="checklist-title mb-0">Crear Modelos</h5>
                            </div>
                        </div>
                        <div class="checklist-item checklist-item-danger my-1">
                          <div class="checklist-info">
                            <h5 class="checklist-title mb-0">Crear Controladores</h5>
                          </div>
                        </div>
                        <div class="checklist-item checklist-item-danger my-1">
                          <div class="checklist-info">
                            <h5 class="checklist-title mb-0">Crear conexión a Base de Datos</h5>
                          </div>
                        </div>
                        
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection