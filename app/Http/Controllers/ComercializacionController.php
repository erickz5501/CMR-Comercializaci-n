<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ComercializacionModel;
use App\Models\comercializacion\ModuloComercializacionModel;
use App\Http\Requests\ComercializacionRequest;
class ComercializacionController extends Controller
{
    public function index(){
        return view('comercializacion.comercializacion');
    }

    public function indexLista(){
        $comercio = ComercializacionModel::get();
        //return json_encode($comercio);
        return view('componentes.comercializacion.tabla_comercializacion', compact('comercio'));
    }

    public function createComercio(ComercializacionRequest $request){

        $idcomercializacion             = $request->input('idcomercializacion');
        $idusers                        = 2;
        $select_modal_clientes          = $request->input('select_modal_clientes');
        $persona_contacto_input         = $request->input('persona_contacto_input');
        $actividad_input                = $request->input('actividad_input');
        $select_modal_medios            = $request->input('select_modal_medios');
        $select_modal_modulos           = $request->input('select_modal_modulos');//Este campo no esta en la tabla comercializacion
        $persona_atencion_input         = $request->input('persona_atencion_input');//Este campo no esta en la tabla comercializacion
        $llamadaDetTextarea             = $request->input('llamadaDetTextarea');
        $select_modal_eventos           = $request->input('select_modal_eventos');
        $example_date_input             = $request->input('example_date_input');//fecha evento 
        $evento_input                   = $request->input('evento_input');
        $numero_cotizacion              = $request->input('numero_cotizacion');
        $select_modal_personal          = $request->input('select_modal_personal');
        $calificacionSelect             = $request->input('calificacionSelect');
        $avance_input                   = $request->input('avance_input');
        $cobrar_input                   = $request->input('cobrar_input');
        $conclusionessTextarea          = $request->input('conclusionessTextarea');

        if ($idcomercializacion != "") {
            $registro = ComercializacionModel::find($idcomercializacion);
            $modulo = ModuloComercializacionModel::where('idcomercializacion', $idcomercializacion )->first();

            try{
                $registro->idusers              = $idusers;
                $registro->idclientes           = $select_modal_clientes;
                $registro->persona_contacto     = $persona_contacto_input;
                $registro->actividad            = $actividad_input;
                $registro->idmedios             = $select_modal_medios;
                $registro->detalla_llamada      = $llamadaDetTextarea;
                $registro->ideventos            = $select_modal_eventos;
                $registro->fecha_evento         = $example_date_input;
                $registro->descripcion_evento   = $evento_input;
                $registro->nro_cotizacion       = $numero_cotizacion;
                $registro->idpersonal           = $select_modal_personal;
                $registro->calificacion         = $calificacionSelect;
                $registro->avance               = $avance_input;
                $registro->por_cobrar           = $cobrar_input;
                $registro->observacion          = $conclusionessTextarea;
                $modulo->idmodulos              = $select_modal_modulos;

                $registro->save();
                $modulo->save();
            }
            catch(Exception $e){
                return json_encode($e->getMessage());
            }

            return json_encode(['status' => true, 'message' => 'Éxito se actuasizo el evento']);
            
        } else {
            $registro = ComercializacionModel::create(
                [
                'idusers' => $idusers,
                'idclientes' => $select_modal_clientes,
                'persona_contacto' => $persona_contacto_input,
                'actividad' => $actividad_input,
                'idmedios' => $select_modal_medios,
                'detalla_llamada' => $llamadaDetTextarea,
                'ideventos' => $select_modal_eventos,
                'fecha_evento' => $example_date_input,
                'descripcion_evento' => $evento_input,
                'nro_cotizacion' => $numero_cotizacion,
                'idpersonal' => $select_modal_personal,
                'calificacion' => $calificacionSelect,
                'avance' => $avance_input,
                'por_cobrar' => $cobrar_input,
                'observacion' => $conclusionessTextarea
                ]);
            //Registro en la tabla modulo_comercializacion
            $registros = ComercializacionModel::all();
            $ultimo_registro = $registros->last();
            $ultimo_registro = json_encode($ultimo_registro);
            $ultimo_registro = json_decode($ultimo_registro);
            //dd($ultimo_registro);
            
            $modulo_comercializacion = ModuloComercializacionModel::create([
                'idcomercializacion' => $ultimo_registro->idcomercializacion,
                'idmodulos' => $select_modal_modulos
            ]);
            
            return json_encode(['status' => true, 'message' => 'Éxito se registro la comercializacion']);
        }
        

    }

    public function activar($idcomercializacion){
        $registro = ComercializacionModel::where('idcomercializacion', $idcomercializacion)->first();
        $registro->estado = 0;
        $registro->save();
        return json_encode(['status' => true, 'message' => 'Se ah activado el registro']);
    }
    
    public function desactivar($idcomercializacion){
        $registro = ComercializacionModel::where('idcomercializacion', $idcomercializacion)->first();
        $registro->estado = 1;
        $registro->save();
        return json_encode(['status' => true, 'message' => 'Se ah desactivado el registro']);
    }

    public function DetalleRegistro($idcomercializacion){
        $det_registro = ComercializacionModel::where('idcomercializacion', $idcomercializacion)->first();
        $det_modulo = ModuloComercializacionModel::where('idcomercializacion', $idcomercializacion)->first();
        return json_encode(['registro' => $det_registro,'modulo'=> $det_modulo ]);
        //return json_encode(['modulo'=> $det_modulo]);
    }

    public function detalle_registro($idcomercializacion){
        $det_registro = ComercializacionModel::with('clientes', 'medio', 'evento', 'personal')->where('idcomercializacion', $idcomercializacion)->first();
        //return json_encode(['registro'=>$det_registro]);
        return view('comercializacion.modal_detalle_comercializacion', compact('det_registro'));
    }

}
