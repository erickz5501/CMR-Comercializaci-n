<?php

namespace App\Http\Controllers\configuracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PersonalRequest;
use App\Models\PersonalModel;
use Exception;
use Illuminate\Support\Facades\DB;

class PersonalController extends Controller
{
    public function index()
    {
        return view('configuracion.personal');
    }

    public function indexLista( Request $request  ){

        $filtro_estado = $request->filtro_estado;

        $filtro_cant   = $request->filtro_cant;

        $filtro_search = ($request->filtro_search === "null")? '' : $request->filtro_search;

        $personal = PersonalModel::when($filtro_estado == '0' , function ($query) { return $query->activos();  })
                                    ->when($filtro_estado == '1' , function ($query) { return $query->inactivos();  })
                                    ->where(function ($query) use ($filtro_search){
                                        return $query->orWhere('nombres', 'like', "%{$filtro_search}%")
                                                    ->orWhere('apellidos', 'like', "%{$filtro_search}%");
                                    })
                                    ->orderBy('idpersonal', 'DESC')
                                    ->paginate($filtro_cant);
        //return json_encode($eventos);
        return view('componentes.configuracion.tabla_personal', compact('personal'));
    }

    public function indexPersonal()
    {
        $personal = PersonalModel::select(['idpersonal as id', DB::raw("CONCAT( personal.nombres, ' ' ,personal.apellidos) AS nombre")])->where('estado', 0)->get();

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
        $nombre_personal               = $request->input('nombre_personal');
        $apellido_personal             = $request->input('apellido_personal');

        if ($idpersonal != "") {
            $personal = PersonalModel::find($idpersonal);

            try{
                $personal->nombres = $nombre_personal;
                $personal->apellidos = $apellido_personal;

                $personal->save();
            }
            catch(Exception $e){
                return json_encode($e->getMessage());
            }

            return json_encode(['status' => true, 'message' => 'Éxito se actuasizo el personal']);

        } else {
            $personal = PersonalModel::create(
                [
                'nombres' => $nombre_personal,
                'apellidos' => $apellido_personal,
                ]);

            return json_encode(['status' => true, 'message' => 'Éxito se registro el personal', 'id' => $personal->idpersonal]);
        }

    }

    public function DetallePersonal($idpersonal){

        $personal = PersonalModel::where('idpersonal', $idpersonal)->first();

        return json_encode($personal);
    }

}
