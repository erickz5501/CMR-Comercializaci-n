<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ActualizacionesModel;
use App\Http\Requests\ActualizacionesRequest;
use App\Models\ComprasModel;

class ActualizacionesController extends Controller
{
    public function index(){
        return view('actualizaciones.actualizaciones');
    }

    public function indexLista()
    {
        $actualizaciones = ActualizacionesModel::get();
        //return json_encode($comercio);
        return view('componentes.actualizaciones.tabla_actualizaciones', compact('actualizaciones'));
    }

    public function activar($idactualizacion){
        $actualizacion = ActualizacionesModel::where('idactualizaciones', $idactualizacion)->first();
        $actualizacion->estado = 0;
        $actualizacion->save();
        return json_encode(['status' => true, 'message' => 'Se ah activado la actualizacion']);
    }
    
    public function desactivar($idactualizacion){
        $actualizacion = ActualizacionesModel::where('idactualizaciones', $idactualizacion)->first();
        $actualizacion->estado = 1;
        $actualizacion->save();
        return json_encode(['status' => true, 'message' => 'Se ah desactivado la actualizacion']);
    }

    public function createActualizacion(ActualizacionesRequest $request){
        $idactualizaciones                  = $request->input('idactualizaciones');
        $select_modal_clientes              = $request->input('select_modal_clientes');
        $select_modal_modulos               = $request->input('select_modal_modulos');
        $select_modal_cotizacion            = $request->input('select_modal_cotizacion');
        $fecha_cotizacion                   = $request->input('fecha_cotizacion');
        $nro_contrato_input                 = $request->input('nro_contrato_input');
        $nro_factura_input                  = $request->input('nro_factura_input');
        $cant_licencias_input               = $request->input('cant_licencias_input');
        $fecha_instalacion                  = $request->input('fecha_instalacion');
        $fecha_entrega                      = $request->input('fecha_entrega');
        $fecha_renovacion                   = $request->input('fecha_renovacion');
        $licencia_input                     = $request->input('licencia_input');
        $select_modal_tipo                  = $request->input('select_modal_tipo');
        $select_modal_version               = $request->input('select_modal_version');
        $select_modal_tiempo_licencia       = $request->input('select_modal_tiempo_licencia');
        $licencias_cantidad_input           = $request->input('licencias_cantidad_input');
        $precio_input                       = $request->input('precio_input');
        $acto_input                         = $request->input('acto_input');
        $salida_input                       = $request->input('salida_input');
        $fecha_instalacion_actualizacion    = $request->input('fecha_instalacion_actualizacion');
        $fecha_entrega_actualizacion        = $request->input('fecha_entrega_actualizacion');
        $fecha_fin_actualizacion            = $request->input('fecha_fin_actualizacion');
        $procedimientoTextarea              = $request->input('procedimientoTextarea');

        if ($idactualizaciones != "") {
            # code...
        } else {
            $actualizacion = ActualizacionesModel::create([
                ''
            ]);
            $compra = ComprasModel::create([

            ]);
        }
        

    }

}
