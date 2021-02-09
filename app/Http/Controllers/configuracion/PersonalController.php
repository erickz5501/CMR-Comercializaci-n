<?php

namespace App\Http\Controllers\configuracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\historial\PersonalModel;
use App\Http\Requests\PersonalRequest;
class PersonalController extends Controller
{
    public function index()
    {
        return view('configuracion.personal');
    }

    public function indexLista(){
        $personal = PersonalModel::get();
        //return json_encode($eventos);
        return view('componentes.configuracion.tabla_personal', compact('personal'));
    }

    public function indexPersonal()
    {
        $personal = PersonalModel::select('idpersonal as id', 'nombres as nombre')->get();

        return json_encode($personal);
    }

    public function activar($idpersonal){
        $personal = PersonalModel::where('idpersonal', $idpersonal)->first();
        $personal->estado = 0;
        $personal->save();
        return json_encode(['status' => true, 'message' => 'Se ah activado el personal']);
    }
    
    public function desactivar($idpersonal){
        $personal = PersonalModel::where('idpersonal', $idpersonal)->first();
        $personal->estado = 1;
        $personal->save();
        return json_encode(['status' => true, 'message' => 'Se ah desactivado el personal']);
    }

    public function createPersonal(PersonalRequest $request){
        $idpersonal                 = $request->input('idpersonal');
        $nombre_input               = $request->input('nombre_input');
        $apellido_input             = $request->input('apellido_input');
       
        if ($idpersonal != "") {
            $personal = PersonalModel::find($idpersonal);

            try{
                $personal->nombres = $nombre_input;
                $personal->apellidos = $apellido_input;

                $personal->save();
            }
            catch(Exception $e){
                return json_encode($e->getMessage());
            }

            return json_encode(['status' => true, 'message' => 'Éxito se actuasizo el personal']);
            
        } else {
            $personal = PersonalModel::create(
                [
                'nombres' => $nombre_input,
                'apellidos' => $apellido_input,
                ]);
            
            return json_encode(['status' => true, 'message' => 'Éxito se registro el personal']);
        }
        
    }

    public function DetallePersonal($idpersonal){
        $det_personal = PersonalModel::where('idpersonal', $idpersonal)->first();

        return json_encode(['personal' => $det_personal]);
    }

}
