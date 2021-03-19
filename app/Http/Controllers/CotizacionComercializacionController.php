<?php

namespace App\Http\Controllers;

use App\Http\Requests\CotizacionComercializacionRequest;
use App\Models\CorrelativoModel;
use App\Models\CotizacionComercializacionModel;
use App\Models\CotizacionesModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CotizacionComercializacionController extends Controller
{
    public function generar_correlativo($increment = false){//en caso sea falso muestar el siguiente correlativo, pero no lo aumente a nivel de BD

        $correlativo = CorrelativoModel::first();

        $nro_cotizacion = $correlativo->serie . '-' . sprintf("%03d", $correlativo->correlativo) . '-' . Carbon::now()->format('Y');

        if ($increment) {

            $correlativo->correlativo++;

            $correlativo->save();

            return $nro_cotizacion; //Guarda el siguiente correlativo
        }

        return json_encode($nro_cotizacion);//muestra el siguiente correlativo
    }

    // ::::::::: AGREGAR O MODIFICAR COTIZACION COMERCIALIZACION :::::::
    public function agregar_modificar_cotiza(CotizacionComercializacionRequest $request)
    {
        $doc_ruta = "";

        $idcotizaciones                 = $request->input('idcotiza');

        $idcotizacion_comercializacion  = $request->input('idcotizacion_comercializacion');

        $nombre_cotiza                  = $request->input('nombre_cotiza');

        $validez                  = $request->input('validez_cotiza');

        $doc_cotiza_antiguo             = $request->input('doc_cotiza_antiguo');

        $ruta_cotiza                    = $request->file('ruta_cotiza');

        if(empty($idcotizaciones)){

            if (!empty($ruta_cotiza)) {

                $doc_cotizacion_nombre =  $ruta_cotiza->getClientOriginalName() . '-' . rand() . '.' . $ruta_cotiza->getClientOriginalExtension();

                $doc_ruta = '/docs';

                $doc_ruta = Storage::disk('public')->put($doc_ruta ,  $ruta_cotiza);
            }

            $usuario = CotizacionesModel::firstOrCreate(
                [
                    'nombre' => CotizacionComercializacionController::generar_correlativo($increment = true),
                ],
                [
                    'validez' => $validez,
                    'ruta'=>$doc_ruta
                ]
            );

            $cotiza_comerci = CotizacionComercializacionModel::firstOrCreate(
                [
                    'idcotizaciones' => $usuario->idcotizaciones,
                    'idcomercializacion'=>$idcotizacion_comercializacion
                ],
                [

                ]
            );
            return json_encode(['status' => true, 'message' => 'NUEVA CREACION COTIZACION EXITOSAMENTE',$usuario]);

        }else{
            $cotizacion = CotizacionesModel::where('idcotizaciones', $idcotizaciones)->first();

            if ($ruta_cotiza) {
                // borramos doc
                $cotizacion_ruta_delete = '/' . $cotizacion->ruta;
                Storage::disk('public')->delete($cotizacion_ruta_delete);
                // insetamos nuevo doc
                $doc_cotizacion_nombre =  $ruta_cotiza->getClientOriginalName() . '-' . rand() . '.' . $ruta_cotiza->getClientOriginalExtension();
                $doc_ruta = '/docs';
                $doc_ruta = Storage::disk('public')->put($doc_ruta ,  $ruta_cotiza);
            }else{
                $doc_ruta = $doc_cotiza_antiguo;
            }

            $cotizacion->nombre = $nombre_cotiza;

            $cotizacion->validez = $validez;

            $cotizacion->ruta = $doc_ruta;

            $cotizacion->save();

            return json_encode(['status' => true, 'message' => 'ACTUALIZACION DEL LA COTIZACION EXITOSAMENTE']);
        }

    }
}
