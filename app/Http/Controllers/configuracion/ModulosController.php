<?php

namespace App\Http\Controllers\configuracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\historial\ModulosModel;
use App\Http\Requests\ModulosRequest;
class ModulosController extends Controller
{
    
    public function index()
    {
        return view('configuracion.modulos');
    }

    public function indexLista(){
        $modulos = ModulosModel::get();
        //return json_encode($eventos);
        return view('componentes.configuracion.tabla_modulos', compact('modulos'));
    }

    public function indexModulos()
    {
        $modulos = ModulosModel::select('idmodulos as id', 'nombre as nombre')->where('estado', 0)->get();

        return json_encode($modulos);
    }

    public function activar($idmodulos){
        $modulo = ModulosModel::where('idmodulos', $idmodulos)->first();
        $modulo->estado = 0;
        $modulo->save();
        return json_encode(['status' => true, 'message' => 'Se ah activado el modulo']);
    }
    
    public function desactivar($idmodulos){
        $modulo = ModulosModel::where('idmodulos', $idmodulos)->first();
        $modulo->estado = 1;
        $modulo->save();
        return json_encode(['status' => true, 'message' => 'Se ah desactivado el modulo']);
    }

    public function createModulos(ModulosRequest $request){
        $idmodulos                = $request->input('idmodulos');
        $nombre_input             = $request->input('nombre_input');
        $caracteristicas          = $request->input('caracteristicas_modulo');
       
        if ($idmodulos != "") {
            $modulos = ModulosModel::find($idmodulos);

            try{
                $modulos->nombre = $nombre_input;
                $modulos->caracteristicas = $caracteristicas;
                $modulos->save();
            }
            catch(Exception $e){
                return json_encode($e->getMessage());
            }

            return json_encode(['status' => true, 'message' => 'Éxito se actuasizo el modulo']);
            
        } else {
            $modulo = ModulosModel::create(
                [
                'nombre' => $nombre_input,
                'caracteristicas' => $caracteristicas
                ]);
            
            return json_encode(['status' => true, 'message' => 'Éxito se registro el modulo']);
        }
        
    }

    public function DetalleModulo($idmodulos){
        $det_modulo = ModulosModel::where('idmodulos', $idmodulos)->first();

        return json_encode(['modulo' => $det_modulo]);
    }

    public function InformacionModulo($idmodulos){
        $info_modulo = ModulosModel::where('idmodulos', $idmodulos)->first();

        return \view('componentes.modals.modulos.modulo_detalle', compact('info_modulo'));
    }
    
}
