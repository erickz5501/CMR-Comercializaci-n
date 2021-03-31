<?php

namespace App\Http\Controllers\configuracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UsersModel;
use App\Http\Requests\UsersRequest;
use App\Models\User;
use Exception;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
    public function index()
    {
        return view('configuracion.users');
    }

    public function index_lista_tabla( Request $request  ){

        $filtro_estado = $request->filtro_estado;

        $filtro_cant   = $request->filtro_cant;

        $filtro_search = ($request->filtro_search === "null")? '' : $request->filtro_search;

        $users = UsersModel::with('ModeloPersonal')->when($filtro_estado == '0' , function ($query) { return $query->activos();  })
                            ->when($filtro_estado == '1' , function ($query) { return $query->inactivos();  })
                            ->where(function ($query) use ($filtro_search){
                                return $query->orWhere('email', 'like', "%{$filtro_search}%")
                                            ->orWhereHas('ModeloPersonal', function ($query) use ($filtro_search){
                                                return $query->where('nombres', 'like', "%{$filtro_search}%")
                                                            ->orwhere('apellidos', 'like', "%{$filtro_search}%")
                                                            ->orwhere('dni', 'like', "%{$filtro_search}%");
                                            });
                            })
                            ->orderBy('id', 'DESC')
                            ->paginate($filtro_cant);
        //return json_encode($eventos);
        return view('componentes.configuracion.tabla_users', compact('users'));
    }

    public function activar($id){
        $user = UsersModel::where('id', $id)->first();
        $user->estado = 0;
        $user->save();
        return json_encode(['status' => true, 'message' => 'Se ah activado el usuario']);
    }

    public function desactivar($id){
        $user = UsersModel::where('id', $id)->first();
        $user->estado = 1;
        $user->save();
        return json_encode(['status' => true, 'message' => 'Se ah desactivado el usuario']);
    }

    public function guardar_editar_user(UsersRequest $request){

        $id         = $request->input('id');

        $idpersonal = $request->input('select_modal_personal');

        $email      = $request->input('email');

        $password   = bcrypt($request->input('password'));

        if ( empty( $id ) ) {

            $user = User::create(
                [
                'idpersonal' => $idpersonal,
                'email' => $email,
                'password' => $password
                ]
            );

            //Asigno su rol por defecto
            $user->assignRole('administrador');

            return json_encode(['status' => true, 'message' => 'Éxito se registro el usuario']);

        } else {

            $users = UsersModel::find($id);

            try{
                $users->idpersonal  = $idpersonal;
                $users->email       = $email;
                $users->password    = $password;
                $users->save();
            }

            catch(Exception $e){ return json_encode($e->getMessage()); }

            return json_encode(['status' => true, 'message' => 'Éxito se actualizo el usuario']);
        }
    }

    public function mostrar_one_user($iduser){

        $user = UsersModel::where('id', $iduser)->first();

        return json_encode( $user);
    }
}
