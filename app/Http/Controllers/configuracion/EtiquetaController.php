<?php

namespace App\Http\Controllers\configuracion;

use App\Http\Controllers\Controller;
use App\Http\Requests\EtiquetaRequest;
use App\Models\ModelEtiqueta;
use Exception;
use Illuminate\Http\Request;

class EtiquetaController extends Controller
{
    public function index()
    {
        return view('configuracion.etiqueta');
    }

    public function tabla_etiqueta(Request $request){

        $filtro_cant   = $request->filtro_cant;
        $filtro_search = ($request->filtro_search === "null")? '' : $request->filtro_search;
        $filtro_estado = $request->filtro_estado;

        $etiquetas = ModelEtiqueta::
                    when($filtro_estado == '0' , function ($query) { return $query->activos();  })
                    ->when($filtro_estado == '1' , function ($query) { return $query->inactivos();  })
                    ->orderBy('idetiquetas', 'DESC')
                    ->where(function ($query) use ($filtro_search){
                        return $query->orWhere('nombre', 'like', "%{$filtro_search}%")
                                    ->orWhere('descripcion', 'like', "%{$filtro_search}%");
                    })
                    ->paginate($filtro_cant);

        // return json_encode($etiquetas);
        return view('componentes.etiqueta.tabla_etiqueta', compact('etiquetas'))->render();
    }

    public function lista_select2_etiqueta(){

        $etiquetas = ModelEtiqueta::select('idetiquetas as id','nombre')
                                    ->where('estado', 0)
                                    ->get();

        return json_encode($etiquetas);
    }

    public function crear_editar_etiqueta(EtiquetaRequest $request){ //CREA O EDITA UNA ETIQUETA

        $idetiquetas  = $request->input('idetiquetas');

        $nombre       = $request->input('nombre_etiqueta');

        $descripcion  = $request->input('descripcion_etiqueta');

        if ( empty( $idetiquetas ) ){

            $etiqueta = ModelEtiqueta::firstOrCreate(
                ['nombre' => $nombre],
                ['descripcion' => $descripcion]
            );

            return json_encode(['status' => true, 'message' => 'Se registró una etiqueta.', 'id' => $etiqueta->idetiquetas]);

        }else{

            $etiqueta = ModelEtiqueta::find($idetiquetas);

            try {
                $etiqueta->idetiquetas  = $idetiquetas;

                $etiqueta->nombre       = $nombre;

                $etiqueta->descripcion  = $descripcion;

                $etiqueta->save();

            } catch(Exception $e){

                return json_encode($e->getMessage());
            }

            return json_encode(['status' => true, 'message' => 'Se actualizó una etiqueta.']);
        }
    }

    public function mostrar_one_etiqueta($idetiquetas){

        $etiqueta = ModelEtiqueta::where('idetiquetas', $idetiquetas)->first();

        return json_encode($etiqueta);
    }

    public function activar($idetiquetas){

        $etiqueta = ModelEtiqueta::where('idetiquetas', $idetiquetas)->update(['estado' => 0]);

        return json_encode(['status' => true, 'message' => 'Se activo una etiqueta']);
    }

    public function desactivar($idetiquetas){

        $etiqueta = ModelEtiqueta::where('idetiquetas', $idetiquetas)->update(['estado' => 1]);

        return json_encode(['status' => true, 'message' => 'Se desactivo una etiqueta']);
    }
}
