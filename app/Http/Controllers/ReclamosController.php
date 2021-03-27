<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReclamosModel;
use App\Http\Requests\ReclamosRequest;
use Exception;

class ReclamosController extends Controller
{
    public function index(){
        return view('reclamos.reclamos');
    }

    public function lista_tabla( Request $request )
    {


        $filtro_estado = $request->filtro_estado;

        $filtro_cant   = $request->filtro_cant;

        $filtro_search = ($request->filtro_search === "null")? '' : $request->filtro_search;

        if ( !empty( $request->fecha_inicio ) &&  !empty( $request->fecha_fin ) ) {

            $fecha_inicio = \Carbon\Carbon::parse($request->fecha_inicio)->format('Y-m-d H:i:s');

            $fecha_fin = \Carbon\Carbon::parse($request->fecha_fin)->format('Y-m-d H:i:s');

            $reclamos = ReclamosModel::with('clientes')
                                    ->when($filtro_estado == '0' , function ($query) { return $query->activos();  })
                                    ->when($filtro_estado == '1' , function ($query) { return $query->inactivos();  })
                                    ->whereBetween('created_at', [$fecha_inicio, $fecha_fin])
                                    ->where(function ($query) use ($filtro_search){
                                        return $query->orWhere('causa', 'like', "%{$filtro_search}%")
                                                    ->orWhere('procede', 'like', "%{$filtro_search}%");
                                    })
                                    ->orderBy('idreclamos', 'DESC')
                                    ->paginate($filtro_cant);
        }else{
            $reclamos = ReclamosModel::with('clientes')
                                    ->when($filtro_estado == '0' , function ($query) { return $query->activos();  })
                                    ->when($filtro_estado == '1' , function ($query) { return $query->inactivos();  })
                                    ->where(function ($query) use ($filtro_search){
                                        return $query->orWhere('causa', 'like', "%{$filtro_search}%")
                                                    ->orWhere('procede', 'like', "%{$filtro_search}%");
                                    })
                                    ->orderBy('idreclamos', 'DESC')
                                    ->paginate($filtro_cant);
        }
        // return json_encode($reclamos);
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

    public function crear_editar_reclamo(ReclamosRequest $request){

        $idreclamos             = $request->input('idreclamos');
        $select_modal_clientes  = $request->input('select_modal_clientes');
        $persona_contacto       = $request->input('persona_contacto');
        $ruc_dni_input          = $request->input('ruc_dni_input');
        $select_modal_medios    = $request->input('select_modal_medios');
        $select_modal_modulos   = $request->input('select_modal_modulos');
        $descripcion_reclamo    = $request->input('descripcion_reclamo');
        $tipo_solucion         = $request->input('tipo_solucion');
        $causa            = $request->input('causa');
        $reclamo_procede        = $request->input('reclamo_procede') == 'on' ? '0' : '1' ;
        $accion_tomar           = $request->input('accion_tomar');
        $select_modal_personal  = $request->input('select_modal_personal');
        $fecha_compromiso       = $request->input('fecha_compromiso');
        $fecha_solucion         = $request->input('fecha_solucion');
        $solucion_minutos       = $request->input('solucion_minutos');
        $solucion_dias          = $request->input('solucion_dias');
        $evidenciaTextarea      = $request->input('evidenciaTextarea');
        $emite_correctivo       = $request->input('emite_correctivo');

        if ( empty( $idreclamos ) ) {

            $registro = ReclamosModel::create(
                [
                'idclientes' => $select_modal_clientes,
                'persona_contacto' => $persona_contacto,
                'Ruc_nro_contrato' => $ruc_dni_input,
                'idmedios' => $select_modal_medios,
                'idmodulos' => $select_modal_modulos,
                'descripcion_reclamo' => $descripcion_reclamo,
                'tipo_solucion' => $tipo_solucion,
                'causa' => $causa,
                'procede' => $reclamo_procede,
                'accion_tomar' => $accion_tomar,
                'idpersonal' => $select_modal_personal,
                'fecha_compromiso' => $fecha_compromiso,
                'fecha_solucion' => $fecha_solucion,
                'solucion_minutos' => $solucion_minutos,
                'solucion_dias' => $solucion_dias,
                'evidencia' => $evidenciaTextarea,
                'emite_accion' => $emite_correctivo
                ]
            );

            return json_encode(['status' => true, 'message' => 'Se registro un nuevo reclamo']);

        } else {
            $registro = ReclamosModel::find($idreclamos);

            try{
                $registro->idclientes               = $select_modal_clientes;
                $registro->persona_contacto         = $persona_contacto;
                $registro->Ruc_nro_contrato         = $ruc_dni_input;
                $registro->idmedios                 = $select_modal_medios;
                $registro->idmodulos                = $select_modal_modulos;
                $registro->descripcion_reclamo      = $descripcion_reclamo;
                $registro->tipo_solucion            = $tipo_solucion;
                $registro->causa                    = $causa;
                $registro->procede                  = $reclamo_procede;
                $registro->accion_tomar             = $accion_tomar;
                $registro->idpersonal               = $select_modal_personal;
                $registro->fecha_compromiso         = $fecha_compromiso;
                $registro->fecha_solucion           = $fecha_solucion;
                $registro->solucion_minutos         = $solucion_minutos;
                $registro->solucion_dias            = $solucion_dias;
                $registro->evidencia                = $evidenciaTextarea;
                $registro->emite_accion             = $emite_correctivo;

                $registro->save();
            }
            catch(Exception $e){
                return json_encode($e->getMessage());
            }

            return json_encode(['status' => true, 'message' => 'Se actualizo el reclamo']);
        }
    }

    public function ver_one_reclamo($idreclamo){ //muestra datos para editar

        $reclamo = ReclamosModel::where('idreclamos', $idreclamo)->first();

        return json_encode($reclamo);
    }

    public function detalle_reclamo($idreclamo){ //muestra datos para vizualizar

        $reclamo = ReclamosModel::with('clientes', 'medio', 'evento', 'personal', 'modulo')->where('idreclamos', $idreclamo)->first();

        return view('componentes.reclamos.detalle_reclamo', compact('reclamo'));
    }

}
