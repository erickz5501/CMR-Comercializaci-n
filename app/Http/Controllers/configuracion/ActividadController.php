<?php

namespace App\Http\Controllers\configuracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ActividadRequest;
use App\Models\ActividadModel;
use Exception;

class ActividadController extends Controller
{
    public function index(){
        return view('configuracion.actividad');
    }

    public function indexLista(){
        $actividades = ActividadModel::orderBy('created_at', 'DESC')->get();
        return view('componentes.configuracion.tabla_actividad', compact('actividades'));
    }

    public function indexActvidad(){
        $actividades = ActividadModel::select('idactividad as id', 'nombre as nombre')->where('estado', 0)->get();

        return json_encode($actividades);
    }

    public function desactivar($idactividad){
        $actividad = ActividadModel::where('idactividad', $idactividad)->first();
        $actividad->estado = 1;
        $actividad->save();
        return json_encode(['status' => true, 'message' => 'Se ah desactivado la actividad']);
    }

    public function activar($idactividad){
        $actividad = ActividadModel::where('idactividad', $idactividad)->first();
        $actividad->estado = 0;
        $actividad->save();
        return json_encode(['status' => true, 'message' => 'Se ah activado la actividad']);
    }

    public function DetalleActividad($idactividad){
        $actividad = ActividadModel::where('idactividad', $idactividad)->first();
        return json_encode($actividad);
    }

    public function createActividad(ActividadRequest $request){
        $idactividad              = $request->input('idactividad');
        $nombre_input             = $request->input('nombre_actividad');

        if ($idactividad != "") {
            $actividad = ActividadModel::find($idactividad);

            try{
                $actividad->nombre = $nombre_input;

                $actividad->save();
            }
            catch(Exception $e){
                return json_encode($e->getMessage());
            }

            return json_encode(['status' => true, 'message' => 'Éxito se actuasizo la actividad']);

        } else {
            $actividad = ActividadModel::create(
                [
                'nombre' => $nombre_input,
                ]);

            return json_encode(['status' => true, 'message' => 'Éxito se registro la actividad','id'=>$actividad->idactividad]);
        }
    }

}
