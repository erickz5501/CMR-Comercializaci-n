<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GiroNegocioModel;
use App\Http\Requests\EventosRequest;
use Exception;

class GiroNegocioController extends Controller
{

    public function index(){
        return view('configuracion.giro_negocio');
    }

    public function indexLista(){
        $negocios = GiroNegocioModel::get();
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

    public function createNegocio(EventosRequest $request){
        $idgiro_negocio           = $request->input('idgiro_negocio');
        $nombre_input             = $request->input('nombre_input');

        if ($idgiro_negocio != "") {
            $negocio = GiroNegocioModel::find($idgiro_negocio);

            try{
                $negocio->nombre = $nombre_input;

                $negocio->save();
            }
            catch(Exception $e){
                return json_encode($e->getMessage());
            }

            return json_encode(['status' => true, 'message' => 'Éxito se actuasizo el giro de negocio']);

        } else {
            $giro_negocio = GiroNegocioModel::create(
                [
                'nombre' => $nombre_input,
                ]);

            return json_encode(['status' => true, 'message' => 'Éxito se registro el giro de negocio', 'id'=>$giro_negocio->idgiro_negocio]);
        }

    }

    public function DetalleNegocio($idgiro){
        $det_evento = GiroNegocioModel::where('idgiro_negocio', $idgiro)->first();

        return json_encode(['evento' => $det_evento]);
    }

}
