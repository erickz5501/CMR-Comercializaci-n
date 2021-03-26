<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GiroNegocioModel;
use App\Http\Requests\EventosRequest;
use App\Http\Requests\GiroNegocioRequest;
use Exception;

class GiroNegocioController extends Controller
{

    public function index(){
        return view('configuracion.giro_negocio');
    }

    public function indexLista( Request $request ){

        $filtro_estado = $request->filtro_estado;

        $filtro_cant   = $request->filtro_cant;

        $filtro_search = ($request->filtro_search === "null")? '' : $request->filtro_search;

        $negocios = GiroNegocioModel::when($filtro_estado == '0' , function ($query) { return $query->activos();  })
                                    ->when($filtro_estado == '1' , function ($query) { return $query->inactivos();  })
                                    ->where(function ($query) use ($filtro_search){
                                        return $query->orWhere('nombre', 'like', "%{$filtro_search}%")
                                                    ->orWhere('created_at', 'like', "%{$filtro_search}%");
                                    })
                                    ->orderBy('idgiro_negocio', 'DESC')
                                    ->paginate($filtro_cant);
        //return json_encode($eventos);
        return view('componentes.configuracion.tabla_giro_negocio', compact('negocios'));
    }

    public function indexGiroNegocio()
    {
        $negocio = GiroNegocioModel::select('idgiro_negocio as id', 'nombre as nombre')->get();

        return json_encode($negocio);
    }

    public function desactivar($idgiro){
        $evento = GiroNegocioModel::where('idgiro_negocio', $idgiro)->first();
        $evento->estado = 1;
        $evento->save();
        return json_encode(['status' => true, 'message' => 'Se ah desactivado el giro de negocio']);
    }

    public function activar($idgiro){
        $evento = GiroNegocioModel::where('idgiro_negocio', $idgiro)->first();
        $evento->estado = 0;
        $evento->save();
        return json_encode(['status' => true, 'message' => 'Se ah activado el giro de negocio']);
    }

    public function createNegocio(GiroNegocioRequest $request){
        $idgiro_negocio        = $request->input('idgiro_negocio');
        $nombre_giro_negocio   = $request->input('nombre_giro_negocio');

        if ($idgiro_negocio != "") {
            $negocio = GiroNegocioModel::find($idgiro_negocio);

            try{
                $negocio->nombre = $nombre_giro_negocio;

                $negocio->save();
            }
            catch(Exception $e){
                return json_encode($e->getMessage());
            }

            return json_encode(['status' => true, 'message' => 'Éxito se actualizo el giro de negocio']);

        } else {
            $giro_negocio = GiroNegocioModel::create(
                [
                'nombre' => $nombre_giro_negocio,
                ]);

            return json_encode(['status' => true, 'message' => 'Éxito se registro el giro de negocio', 'id'=>$giro_negocio->idgiro_negocio]);
        }

    }

    public function DetalleNegocio($idgiro){

        $evento = GiroNegocioModel::where('idgiro_negocio', $idgiro)->first();

        return json_encode($evento);
    }

}
