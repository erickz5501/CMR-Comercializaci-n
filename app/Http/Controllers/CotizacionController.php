<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CotizacionesModel;
use App\Http\Requests\ComercializacionRequest;
use App\Http\Requests\CotizacionRequest;
use App\Models\CorrelativoModel;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Storage;

class CotizacionController extends Controller
{

    public function index(){
        return view('cotizacion.cotizacion');
    }

    public function indexLista(Request $request){

        $filtro_estado = $request->filtro_estado;

        $filtro_cant   = $request->filtro_cant;

        $filtro_search = ($request->filtro_search === "null")? '' : $request->filtro_search;

        $cotizaciones = CotizacionesModel::when($filtro_estado == '0' , function ($query) { return $query->activos();  })
                                        ->when($filtro_estado == '1' , function ($query) { return $query->inactivos();  })
                                        ->where(function ($query) use ($filtro_search){
                                            return $query->orWhere('nombre', 'like', "%{$filtro_search}%")
                                                         ->orWhere('validez', 'like', "%{$filtro_search}%");
                                        })
                                        ->orderBy('idcotizaciones', 'DESC')
                                        ->paginate($filtro_cant);
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

        $doc_ruta = "";

        $idcotizaciones         = $request->input('idcotizaciones');

        $codigo                 = $request->input('nombre_cotizacion');

        $validez_cotizacion                 = $request->input('validez_cotizacion');

        $doc_cotizacion_antiguo = $request->input('doc_cotizacion_antiguo');

        $doc_cotizacion = $request->file('ruta_cotizacion');

        if (!empty( $idcotizaciones)) {

            $editar_cotizacion = CotizacionesModel::find($idcotizaciones);

            if ($doc_cotizacion) {
                // borramos doc
                $cotizacion_ruta_delete = '/' . $editar_cotizacion->ruta;
                Storage::disk('public')->delete($cotizacion_ruta_delete);
                // insetamos nuevo doc
                $doc_cotizacion_nombre =  $doc_cotizacion->getClientOriginalName() . '-' . rand() . '.' . $doc_cotizacion->getClientOriginalExtension();
                $doc_ruta = '/';
                $doc_ruta = Storage::disk('public')->put($doc_ruta ,  $doc_cotizacion);

                // $delete = CotizacionesModel::where('idcertificados', $editar_cotizacion->idcertificados)->delete();
            }else{
                $doc_ruta = $doc_cotizacion_antiguo;
            }

            try{
                $editar_cotizacion->nombre = $codigo;
                $editar_cotizacion->ruta = $doc_ruta;
                $editar_cotizacion->validez = $validez_cotizacion;

                $editar_cotizacion->save();
            }
            catch(Exception $e){
                return json_encode($e->getMessage());
            }

            return json_encode(['status' => true, 'message' => 'Se actualizó corectamente la cotizacion', $codigo]);
        } else {

            if (!empty($doc_cotizacion)) {
                $doc_cotizacion_nombre =  $doc_cotizacion->getClientOriginalName() . '-' . rand() . '.' . $doc_cotizacion->getClientOriginalExtension();
                $doc_ruta = '/';

                $doc_ruta = Storage::disk('public')->put($doc_ruta ,  $doc_cotizacion);
            }

            $cotizacion = CotizacionesModel::create([
                'nombre' => CotizacionController::generar_correlativo($increment = true),//llamamos a la funcion para generar su correlativo
                'ruta' => $doc_ruta,
                'validez' => $validez_cotizacion
            ]);

            return json_encode(['status' => true, 'message' => 'Se registró correctamente la cotizacion', 'id' => $cotizacion->idcotizaciones,$doc_ruta]);
        }

    }

    public function detalle_actualizacion($idcotizacion){

        $cotizacion = CotizacionesModel::where('idcotizaciones', $idcotizacion)->first();

        return json_encode($cotizacion);
    }

}
