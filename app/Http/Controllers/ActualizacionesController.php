<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ActualizacionesModel;
use App\Http\Requests\ActualizacionesRequest;
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
        $select_modal_modulos               = $request->input('select_modal_modulos');//Este campo no esta en la tabla comercializacion
        $select_modal_cotizacion            = $request->input('select_modal_cotizacion');
        $date_input                         = $request->input('date_input');
        $nro_contrato_input                 = $request->input('nro_contrato_input');
        $nro_factura_input                  = $request->input('nro_factura_input');//Este campo no esta en la tabla comercializacion
        $cant_licencias_input               = $request->input('cant_licencias_input');
        $date_input2                        = $request->input('date_input2');
        $date_input3                        = $request->input('date_input3');//fecha evento 
        $date_input4                        = $request->input('date_input4');
        $licencia_input                     = $request->input('licencia_input');
        $select_modal_tipo                  = $request->input('select_modal_tipo');
        $select_modal_version               = $request->input('select_modal_version');
        $select_modal_tiempo_licencia       = $request->input('select_modal_tiempo_licencia');
        $licencias_cantidad_input           = $request->input('licencias_cantidad_input');
        $precio_input                       = $request->input('precio_input');
        $acto_input                         = $request->input('acto_input');
        $salida_input                       = $request->input('salida_input');
        $date_input5                        = $request->input('date_input5');
        $date_input6                        = $request->input('date_input6');
        $date_input7                        = $request->input('date_input7');
        $procedimientoTextarea              = $request->input('procedimientoTextarea');
    }

}
