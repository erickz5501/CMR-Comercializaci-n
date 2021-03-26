<?php

namespace App\Http\Controllers\configuracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventosRequest;
use App\Models\EventosModel;
use Exception;

class EventosController extends Controller
{

    public function index(){

        return view('configuracion.eventos');
    }

    public function indexLista( Request $request ){

        $filtro_estado = $request->filtro_estado;

        $filtro_cant   = $request->filtro_cant;

        $filtro_search = ($request->filtro_search === "null")? '' : $request->filtro_search;

        $eventos = EventosModel::when($filtro_estado == '0' , function ($query) { return $query->activos();  })
                                ->when($filtro_estado == '1' , function ($query) { return $query->inactivos();  })
                                ->where(function ($query) use ($filtro_search){
                                    return $query->orWhere('nombre', 'like', "%{$filtro_search}%")
                                                ->orWhere('descrripcion', 'like', "%{$filtro_search}%");
                                })
                                ->orderBy('ideventos', 'DESC')
                                ->paginate($filtro_cant);
        //return json_encode($eventos);
        return view('componentes.configuracion.tabla_eventos', compact('eventos'));
    }

    public function indexEventos()
    {
        $eventos = EventosModel::select('ideventos as id', 'nombre as nombre')->where('estado', 0)->get();

        return json_encode($eventos);
    }

    public function activar($ideventos){

        $evento = EventosModel::where('ideventos', $ideventos)->first();

        $evento->estado = 0;

        $evento->save();

        return json_encode(['status' => true, 'message' => 'Se ah activado el evento']);
    }

    public function desactivar($ideventos){

        $evento = EventosModel::where('ideventos', $ideventos)->first();

        $evento->estado = 1;

        $evento->save();

        return json_encode(['status' => true, 'message' => 'Se ah desactivado el evento']);
    }

    public function createEvento(EventosRequest $request){
        $ideventos                = $request->input('ideventos');
        $nombre_evento             = $request->input('nombre_evento');
        $descripcion_input        = $request->input('descripcion_input');

        if ($ideventos != "") {

            $evento = EventosModel::find($ideventos);

            try{
                $evento->nombre = $nombre_evento;
                $evento->descrripcion = $descripcion_input;

                $evento->save();
            }
            catch(Exception $e){
                return json_encode($e->getMessage());
            }

            return json_encode(['status' => true, 'message' => 'Éxito se actualizo el evento']);

        } else {

            $evento = EventosModel::create(
                [
                'nombre' => $nombre_evento,
                'descrripcion' => $descripcion_input
                ]);

            return json_encode(['status' => true, 'message' => 'Éxito se registro el evento', 'id' => $evento->ideventos ]);
        }

    }

    public function DetalleEvento($idevento){

        $evento = EventosModel::where('ideventos', $idevento)->first();

        return json_encode($evento);
    }

}
