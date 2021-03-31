<?php

namespace App\Http\Controllers\configuracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PersonalRequest;
use App\Models\PersonalModel;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $personal = PersonalModel::select(['idpersonal as id', DB::raw("CONCAT( personal.nombres, ' ' ,personal.apellidos) AS nombre")])->where('estado', 0)->orderBy('idpersonal', 'DESC')->get();

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
        $avatar_ruta = "";
        $idpersonal             = $request->input('idpersonal');
        $dni_personal           = $request->input('dni_personal');
        $nombre_personal        = $request->input('nombre_personal');
        $apellido_personal      = $request->input('apellido_personal');
        $avatar_personal        = $request->file('avatar_personal');
        $avatar_personal_antiguo= $request->input('avatar_personal_antiguo');

        if ( empty( $idpersonal ) ){

            if (!empty($avatar_personal)) {
                $avatar_personal_nombre =  $avatar_personal->getClientOriginalName() . '-' . rand() . '.' . $avatar_personal->getClientOriginalExtension();
                $avatar_ruta = '/img_personal';
                $avatar_ruta = Storage::disk('public')->put($avatar_ruta , $avatar_personal);
            }

            $personal = PersonalModel::firstOrCreate(
                [
                    'dni'=> $dni_personal,
                    'nombres' => $nombre_personal,
                    'apellidos' => $apellido_personal,
                ],
                [
                    'avatar' => $avatar_ruta,
                ]
            );

            return json_encode(['status' => true, 'message' => 'Éxito se registro el personal', 'id' => $personal->idpersonal]);

        } else {

            $personal_edit = PersonalModel::find($idpersonal);

            if ($avatar_personal) {
                // borramos doc
                $ruta_delete = '/' . $personal_edit->avatar;
                Storage::disk('public')->delete($ruta_delete);
                // insetamos nuevo doc
                $avatar_personal_nombre =  $avatar_personal->getClientOriginalName() . '-' . rand() . '.' . $avatar_personal->getClientOriginalExtension();
                $avatar_ruta = '/img_personal';
                $avatar_ruta = Storage::disk('public')->put($avatar_ruta ,  $avatar_personal);
            }else{
                $avatar_ruta = $avatar_personal_antiguo;
            }

            try{
                $personal_edit->dni = $dni_personal;
                $personal_edit->nombres = $nombre_personal;
                $personal_edit->apellidos = $apellido_personal;
                $personal_edit->avatar = $avatar_ruta;
                $personal_edit->save();
            }
            catch(Exception $e){
                return json_encode($e->getMessage());
            }

            return json_encode(['status' => true, 'message' => 'Éxito se actualizo el personal']);
        }
    }

    public function DetallePersonal($idpersonal){

        $personal = PersonalModel::where('idpersonal', $idpersonal)->first();

        return json_encode($personal);
    }

}
