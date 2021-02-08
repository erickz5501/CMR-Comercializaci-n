<?php

namespace App\Http\Controllers\configuracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\historial\EventosModel;
use App\Http\Requests\EventosRequest;

class EventosController extends Controller
{
    
    public function index(){
        return view('configuracion.eventos');
    }

    public function indexLista(){
        $eventos = EventosModel::get();
        //return json_encode($eventos);
        return view('componentes.configuracion.tabla_eventos', compact('eventos'));
    }

    public function indexEventos()
    {
        $eventos = EventosModel::select('ideventos as id', 'nombre as nombre')->get();

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
        $nombre_input             = $request->input('nombre_input');
        $descripcion_input        = $request->input('descripcion_input');

        if ($ideventos != "") {
            $evento = EventosModel::find($ideventos);

            try{
                $evento->nombre = $nombre_input;
                $evento->descrripcion = $descripcion_input;

                $evento->save();
            }
            catch(Exception $e){
                return json_encode($e->getMessage());
            }

            return json_encode(['status' => true, 'message' => 'Éxito se actuasizo el evento']);
            
        } else {
            $evento = EventosModel::create(
                [
                'nombre' => $nombre_input,
                'descrripcion' => $descripcion_input
                ]);
            
            return json_encode(['status' => true, 'message' => 'Éxito se registro el evento']);
        }
        
    }

    public function DetalleEvento($idevento){
        $det_evento = EventosModel::where('ideventos', $idevento)->first();

        return json_encode(['evento' => $det_evento]);
    }

}
