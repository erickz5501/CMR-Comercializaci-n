<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CotizacionesModel;
use App\Http\Requests\ComercializacionRequest;
use Carbon\Carbon;
class CotizacionController extends Controller
{
   
    public function index(){
        return view('cotizacion.cotizacion');
    }

    public function indexLista(){
        $cotizaciones = CotizacionesModel::get();
        //return json_encode($eventos);
        return view('componentes.cotizacion.tabla_cotizacion', compact('cotizaciones'));
    }

    public function desactivar($idcotizaciones){
        $cotizacion = CotizacionesModel::where('idcotizaciones', $idcotizaciones)->first();
        $cotizacion->estado = 1;
        $cotizacion->save();
        return json_encode(['status' => true, 'message' => 'Se ah desactivado la cotizacion']);
    }

    public function activar($idcotizaciones){
        $cotizacion = CotizacionesModel::where('idcotizaciones', $idcotizaciones)->first();
        $cotizacion->estado = 0;
        $cotizacion->save();
        return json_encode(['status' => true, 'message' => 'Se ah desactivado la cotizacion']);
    }

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
        $codigo                     = $request->input('nombre_cotizacion');
        $ruta_cotizacion            = $request->file('ruta_cotizacion');
        $archivo                    = $_FILES["ruta_cotizacion"];
        //$nombre_archivo             = $ruta_cotizacion->getClientOriginalName(); //obtenemos el nombre del archivo

        //move_uploaded_file($archivo["tmp_name"], "storage/uploads/".$archivo["name"]   );

        if ($idcotizaciones != "") {
            $evento = CotizacionesModel::find($idcotizaciones);

            try{
                $evento->nombre = $codigo;
                $evento->ruta = $ruta_cotizacion;

                $evento->save();
            }
            catch(Exception $e){
                return json_encode($e->getMessage());
            }

            return json_encode(['status' => true, 'message' => 'Éxito se actuasizo el evento']);
        } else {
            $cotizacion = CotizacionesModel::create([
                'nombre' => CotizacionController::generar_correlativo($increment = true),//llamamos a la funcion para generar su correlativo
                'ruta' => $ruta_cotizacion
            ]);
            
            return json_encode(['status' => true, 'message' => 'Éxito se registro la cotizacion', 'id' => $cotizacion->idcotizaciones]);
        }
        
    }

    public function detalle_actualizacion($idcotizacion){
        $det_cotizacion = CotizacionesModel::where('idcotizaciones', $idcotizacion)->first();

        return json_encode(['evento' => $det_cotizacion]);
    }

}
