<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ComercializacionModel;
use App\Models\CorrelativoModel;
use App\Models\CotizacionesModel;
use App\Models\CotizacionComercializacionModel;
use App\Models\ClientesModel;
use App\Models\comercializacion\ModuloComercializacionModel;
use App\Http\Requests\ComercializacionRequest;
use App\Http\Requests\CotizacionRequest;
class ComercializacionController extends Controller
{
    public function index(){
        return view('comercializacion.comercializacion');
    }

    public function indexLista(){
        $comercio = ComercializacionModel::with('clientes')->get()->groupBy('idclientes');
        //$comercio = $comercios->groupBy('idclientes');
        //return json_encode($comercio);
        return view('componentes.comercializacion.tabla_comercializacion', compact('comercio'));
    }

    // public function indexregistro(){
    //     return view('comercializacion.comercializacion_historial');
    // }

    public function indexlistaregistro($idcliente){//Lista de comercializacion de un cliente/iteresado
        $comercio = ComercializacionModel::with('clientes')->where('idclientes', $idcliente)->get();
        //return json_encode($comercio);
        return view('componentes.comercializacion.tabla_comercializacion_historial', compact('comercio'));
    }

    public function indexCotizacion(){
        $cotizacion = CotizacionesModel::select('idcotizaciones as id', 'nombre as nombre')->get();

        return json_encode($cotizacion);
    }

    public function createComercio(ComercializacionRequest $request){

        $idcomercializacion             = $request->input('idcomercializacion');
        $idusers                        = 2;
        $select_modal_clientes          = $request->input('select_modal_clientes');
        $persona_contacto_input         = $request->input('persona_contacto_input');
        $actividad_input                = $request->input('actividad_input');
        $select_modal_medios            = $request->input('select_modal_medios');
        $select_modal_modulos           = $request->input('modulo');//Trae los valores de los modulos
        $cant_licencias_modulo          = $request->input('licencias');
        $persona_atencion_input         = $request->input('persona_atencion_input');//Este campo no esta en la tabla comercializacion
        $llamadaDetTextarea             = $request->input('llamadaDetTextarea');
        $select_modal_eventos           = $request->input('select_modal_eventos');
        $example_date_input             = $request->input('example_date_input');//fecha evento 
        $evento_input                   = $request->input('evento_input');
        $select_modal_cotizacion        = $request->input('select_modal_cotizacion');
        $select_modal_personal          = $request->input('select_modal_personal');
        $calificacionSelect             = $request->input('calificacionSelect');
        $avance_input                   = $request->input('avance_input');
        $cobrar_input                   = $request->input('cobrar_input');
        $conclusionessTextarea          = $request->input('conclusionessTextarea');

        //return json_encode($cant_licencias_modulo);

        if ($idcomercializacion != "") {
            $registro = ComercializacionModel::find($idcomercializacion);
            $modulo = ModuloComercializacionModel::where('idcomercializacion', $idcomercializacion )->get();
            $cant_modulos = count($modulo);
            // return json_encode($modulo);

            foreach ($modulo as $i => $value) {
                $modulo[$i]->estado = 1;
                $modulo[$i]->save();     
            }

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
                $registro->idpersonal           = $select_modal_personal;
                $registro->calificacion         = $calificacionSelect;
                $registro->avance               = $avance_input;
                $registro->por_cobrar           = $cobrar_input;
                $registro->observacion          = $conclusionessTextarea;
                
                //Registra los modulos en la tabla modulo_comercializacion
                foreach ($select_modal_modulos as $i => $value) {
                    $modulo_comercializacion = ModuloComercializacionModel::create([
                    'idcomercializacion' => $idcomercializacion,
                    'idmodulos' => $select_modal_modulos[$i],
                    'cant_licencias' => $cant_licencias_modulo[$i]
                    ]);    
                }
                $registro->save();

            }
            catch(Exception $e){
                return json_encode($e->getMessage());
            }

            return json_encode(['status' => true, 'message' => 'Éxito se actualizo el evento']);
            
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
                'fecha_evento' => Carbon::now()->format('Y-m-d H:i:s'),
                'descripcion_evento' => $evento_input,
                'idpersonal' => $select_modal_personal,
                //'calificacion' => $calificacionSelect,
                'avance' => $avance_input,
                //'por_cobrar' => $cobrar_input,
                'observacion' => $conclusionessTextarea
                ]);

            //Registro en la tabla modulo_comercializacion
            $registros = ComercializacionModel::all();
            $ultimo_registro = $registros->last();
            $ultimo_registro = json_encode($ultimo_registro);
            $ultimo_registro = json_decode($ultimo_registro);
            //dd($ultimo_registro);
            
            //Registra los modulos en la tabla modulo_comercializacion
            foreach ($select_modal_modulos as $i => $value) {
                $modulo_comercializacion = ModuloComercializacionModel::create([
                    'idcomercializacion' => $ultimo_registro->idcomercializacion,
                    'idmodulos' => $select_modal_modulos[$i],
                    'cant_licencias' => $cant_licencias_modulo[$i]
                ]);    
            }
            
            $cotizacion_comercializacion = CotizacionComercializacionModel::create([
                'idcomercializacion' => $ultimo_registro->idcomercializacion,
                'idcotizaciones' => $select_modal_cotizacion
            ]);
            
            return json_encode(['status' => true, 'message' => 'Éxito se registro la comercializacion']);
        }
    }

    public function createComercioNuevo(ComercializacionRequest $request){
        //$idcomercializacion             = $request->input('idcomercializacion');
        $idusers                        = 2;
        $select_modal_clientes          = $request->input('select_modal_clientes');
        $persona_contacto_input         = $request->input('persona_contacto_input');
        $actividad_input                = $request->input('actividad_input');
        $select_modal_medios            = $request->input('select_modal_medios');
        $select_modal_modulos           = $request->input('modulo');//Trae los valores de los modulos
        $cant_licencias_modulo          = $request->input('licencias');
        $persona_atencion_input         = $request->input('persona_atencion_input');//Este campo no esta en la tabla comercializacion
        $llamadaDetTextarea             = $request->input('llamadaDetTextarea');
        $select_modal_eventos           = $request->input('select_modal_eventos');
        $example_date_input             = $request->input('example_date_input');//fecha evento 
        $evento_input                   = $request->input('evento_input');
        $select_modal_cotizacion        = $request->input('select_modal_cotizacion');
        $select_modal_personal          = $request->input('select_modal_personal');
        $calificacionSelect             = $request->input('calificacionSelect');
        $avance_input                   = $request->input('avance_input');
        $cobrar_input                   = $request->input('cobrar_input');
        $conclusionessTextarea          = $request->input('conclusionessTextarea');

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
            'idpersonal' => $select_modal_personal,
            //'calificacion' => $calificacionSelect,
            'avance' => $avance_input,
            //'por_cobrar' => $cobrar_input,
            'observacion' => $conclusionessTextarea
            ]);

        //Registro en la tabla modulo_comercializacion
        $registros = ComercializacionModel::all();
        $ultimo_registro = $registros->last();
        $ultimo_registro = json_encode($ultimo_registro);
        $ultimo_registro = json_decode($ultimo_registro);
        //dd($ultimo_registro);
        
        //Registra los modulos en la tabla modulo_comercializacion
        foreach ($select_modal_modulos as $i => $value) {
            $modulo_comercializacion = ModuloComercializacionModel::create([
                'idcomercializacion' => $ultimo_registro->idcomercializacion,
                'idmodulos' => $select_modal_modulos[$i],
                'cant_licencias' => $cant_licencias_modulo[$i]
            ]);    
        }
        
        $cotizacion_comercializacion = CotizacionComercializacionModel::create([
            'idcomercializacion' => $ultimo_registro->idcomercializacion,
            'idcotizaciones' => $select_modal_cotizacion
        ]);
        
        return json_encode(['status' => true, 'message' => 'Éxito se registro la comercializacion']);
    }   

    //generamos el codigo de la cotizacion
    public function generar_correlativo($increment = false){//en caso sea falso muestar el siguiente correlativo, pero no lo aumente a nivel de BD
        $correlativo = CorrelativoModel::first();

        //$nro_cotizacion = $correlativo;
        // $nro_cotizacion->serie              = $correlativo->serie;
        // $nro_cotizacion->correlativo        = sprintf("%03d", $correlativo->correlativo);
        // $nro_cotizacion->year               = Carbon::now()->format('Y');
        $nro_cotizacion = $correlativo->serie . '-' . sprintf("%03d", $correlativo->correlativo) . '-' . Carbon::now()->format('Y');

        if ($increment) {
            $correlativo->correlativo++;
            $correlativo->save();

            return $nro_cotizacion; //Guarda el siguiente correlativo
        }

        return json_encode($nro_cotizacion);//muestra el siguiente correlativo
    }

    public function createCotizacion(CotizacionRequest $request){
        $idcotizaciones             = $request->input('idcotizaciones');
        $ruta_cotizacion            = $request->file('ruta_cotizacion');
        $archivo                    = $_FILES["ruta_cotizacion"];
        //$nombre_archivo             = $ruta_cotizacion->getClientOriginalName(); //obtenemos el nombre del archivo

        //move_uploaded_file($archivo["tmp_name"], "storage/uploads/".$archivo["name"]   );

        $cotizacion = CotizacionesModel::create([
            'nombre' => ComercializacionController::generar_correlativo($increment = true),//llamamos a la funcion para generar su correlativo
            'ruta' => $ruta_cotizacion
        ]);
        
        return json_encode(['status' => true, 'message' => 'Éxito se registro la cotizacion']);
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

    public function DetalleRegistro($idcomercializacion){//Para editar
        $det_registro = ComercializacionModel::where('idcomercializacion', $idcomercializacion)->first();
        $det_modulo = ModuloComercializacionModel::with('modulo')->where('idcomercializacion', '=', $idcomercializacion)->where('estado', '=', 0)->get();
        $cotizacion = CotizacionComercializacionModel::where('idcomercializacion', $idcomercializacion)->first();
        $cant_modulos = \count($det_modulo);
        return json_encode(['registro' => $det_registro,'modulo'=> $det_modulo, 'cant_modulos'=>$cant_modulos, 'cotizacion'=>$cotizacion]);
        //return json_encode(['modulo'=> $det_modulo]); 
    }

    public function detalle_registro($idcomercializacion){
        $det_registro = ComercializacionModel::with('clientes', 'medio', 'evento', 'personal')->where('idcomercializacion', $idcomercializacion)->first();
        $det_modulo = ModuloComercializacionModel::with('modulo')->where('idcomercializacion', $idcomercializacion)->where('estado', '=', 0)->get(); 
        $cant_modulos = \count($det_modulo);
        
        //$modulos = $det_modulo;
        //$modulos = ['registro'=>$det_modulo];
        //return \json_encode($cant_modulos);
        return view('comercializacion.modal_detalle_comercializacion', compact('det_registro','det_modulo','cant_modulos') );
    }

    public function ultimo_cliente(){
        $ultimo = ClientesModel::get()->last();
        return json_encode(['ultimo' => $ultimo]);
    }

}
