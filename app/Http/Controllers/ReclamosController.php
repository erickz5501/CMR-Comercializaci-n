<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReclamosModel;
use App\Http\Requests\ReclamosRequest;
class ReclamosController extends Controller
{
    public function index(){
        return view('reclamos.reclamos');
    }

    public function indexLista()
    {
        $reclamos = ReclamosModel::get();
        //return json_encode($comercio);
        return view('componentes.reclamos.tabla_reclamos', compact('reclamos'));
    }

    public function activar($idreclamos){
        $reclamo = ReclamosModel::where('idreclamos', $idreclamos)->first();
        $reclamo->estado = 0;
        $reclamo->save();
        return json_encode(['status' => true, 'message' => 'Se ah activado el reclamo']);
    }
    
    public function desactivar($idreclamos){
        $reclamo = ReclamosModel::where('idreclamos', $idreclamos)->first();
        $reclamo->estado = 1;
        $reclamo->save();
        return json_encode(['status' => true, 'message' => 'Se ah desactivado el reclamo']);
    }

    public function createReclamo(ReclamosRequest $request){
        
        $idreclamos                                 = $request->input('idreclamos');
        $select_modal_clientes                      = $request->input('select_modal_clientes');
        $persona_contacto_input                     = $request->input('persona_contacto_input');
        $ruc_dni_input                              = $request->input('ruc_dni_input');
        $select_modal_medios                        = $request->input('select_modal_medios');
        $select_modal_modulos                       = $request->input('select_modal_modulos');
        $reclamoDetTextarea                         = $request->input('reclamoDetTextarea');
        $solucion_input                             = $request->input('solucion_input');
        $causa_input                                = $request->input('causa_input');
        $reclamo_procede                            = $request->input('reclamo_procede');
        $accion_tomar_input                         = $request->input('accion_tomar_input');
        $select_modal_personal_responsable          = $request->input('select_modal_personal_responsable');
        $fecha_compromiso                           = $request->input('fecha_compromiso');
        $fecha_solucion                             = $request->input('fecha_solucion');
        $solucion_minutos_input                     = $request->input('solucion_minutos_input');
        $solucion_dias_input                        = $request->input('solucion_dias_input');
        $evidenciaTextarea                          = $request->input('evidenciaTextarea');
        $emite_correctivo_input                     = $request->input('emite_correctivo_input');

        if ($idreclamos != "") {
            $registro = ReclamosModel::find($idreclamos);

            try{
                $registro->idclientes               = $select_modal_clientes;
                $registro->persona_contacto         = $persona_contacto_input;
                $registro->Ruc_nro_contrato         = $ruc_dni_input;
                $registro->idmedios                 = $select_modal_medios;
                $registro->idmodulos                = $select_modal_modulos;
                $registro->descripcion_reclamo      = $reclamoDetTextarea;
                $registro->tipo_solucion            = $solucion_input;
                $registro->causa                    = $causa_input;
                $registro->procede                  = $reclamo_procede;
                $registro->accion_tomar             = $accion_tomar_input;
                $registro->idpersonal               = $select_modal_personal_responsable;
                $registro->fecha_compromiso         = $fecha_compromiso;
                $registro->fecha_solucion           = $fecha_solucion;
                $registro->solucion_minutos         = $solucion_minutos_input;
                $registro->solucion_dias            = $solucion_dias_input;
                $registro->evidencia                = $evidenciaTextarea;
                $registro->emite_accion             = $emite_correctivo_input;

                $registro->save();
            }
            catch(Exception $e){
                return json_encode($e->getMessage());
            }

            return json_encode(['status' => true, 'message' => 'Éxito se actuasizo el reclamo']);
            
        } else {
            $registro = ReclamosModel::create(
                [
                'idclientes' => $select_modal_clientes,
                'persona_contacto' => $persona_contacto_input,
                'Ruc_nro_contrato' => $ruc_dni_input,
                'idmedios' => $select_modal_medios,
                'idmodulos' => $select_modal_modulos,
                'descripcion_reclamo' => $reclamoDetTextarea,
                'tipo_solucion' => $solucion_input,
                'causa' => $causa_input,
                'procede' => $reclamo_procede,
                'accion_tomar' => $accion_tomar_input,
                'idpersonal' => $select_modal_personal_responsable,
                'fecha_compromiso' => $fecha_compromiso,
                'fecha_solucion' => $fecha_solucion,
                'solucion_minutos' => $solucion_minutos_input,
                'solucion_dias' => $solucion_dias_input,
                'evidencia' => $evidenciaTextarea,
                'emite_accion' => $emite_correctivo_input
                ]);

            
            return json_encode(['status' => true, 'message' => 'Éxito se registro el reclamo']);
        }
        
    }

    public function DetalleReclamo($idreclamo){
        $det_reclamo = ReclamosModel::where('idreclamos', $idreclamo)->first();

        return json_encode(['reclamo' => $det_reclamo]);
    }

    public function detalle_reclamo($idreclamo){
        $det_reclamo = ReclamosModel::where('idreclamos', $idreclamo)->first();
        //var_dump($det_registro);
        return view('reclamos.modal_detalle_reclamo', compact('det_reclamo'));
    }

}
