<?php

namespace App\Http\Controllers\configuracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UsersModel;
use App\Http\Requests\UsersRequest;
use Exception;

class UsersController extends Controller
{

    public function index()
    {
        return view('configuracion.users');
    }

    public function indexLista( Request $request  ){

        $filtro_estado = $request->filtro_estado;

        $filtro_cant   = $request->filtro_cant;

        $filtro_search = ($request->filtro_search === "null")? '' : $request->filtro_search;

        $users = UsersModel::when($filtro_estado == '0' , function ($query) { return $query->activos();  })
                            ->when($filtro_estado == '1' , function ($query) { return $query->inactivos();  })
                            ->where(function ($query) use ($filtro_search){
                                return $query->orWhere('dni', 'like', "%{$filtro_search}%")
                                            ->orWhere('nombres', 'like', "%{$filtro_search}%")
                                            ->orWhere('apellidos', 'like', "%{$filtro_search}%")
                                            ->orWhere('email', 'like', "%{$filtro_search}%");
                            })
                            ->orderBy('idusers', 'DESC')
                            ->paginate($filtro_cant);
        //return json_encode($eventos);
        return view('componentes.configuracion.tabla_users', compact('users'));
    }

    public function activar($idusers){
        $user = UsersModel::where('idusers', $idusers)->first();
        $user->estado = 0;
        $user->save();
        return json_encode(['status' => true, 'message' => 'Se ah activado el usuario']);
    }

    public function desactivar($idusers){
        $user = UsersModel::where('idusers', $idusers)->first();
        $user->estado = 1;
        $user->save();
        return json_encode(['status' => true, 'message' => 'Se ah desactivado el usuario']);
    }

    public function createUsers(UsersRequest $request){
        $idusers                    = $request->input('idusers');
        $nombre_users               = $request->input('nombre_users');
        $apellido_users             = $request->input('apellido_users');
        $email_users                = $request->input('email_users');
        $password             = $request->input('password');

        if ($idusers != "") {
            $users = UsersModel::find($idusers);

            try{
                $users->nombres = $nombre_users;
                $users->apellidos = $apellido_users;
                $users->email = $email_users;
                $users->password = $password;

                $users->save();
            }
            catch(Exception $e){
                return json_encode($e->getMessage());
            }

            return json_encode(['status' => true, 'message' => 'Éxito se actuasizo el modulo']);

        } else {
            $users = UsersModel::create(
                [
                'nombres' => $nombre_users,
                'apellidos' => $apellido_users,
                'email' => $email_users,
                'password' => $password
                ]);

            return json_encode(['status' => true, 'message' => 'Éxito se registro el usuario']);
        }

    }

    public function DetalleUser($iduser){
        $user = UsersModel::where('idusers', $iduser)->first();

        return json_encode( $user);
    }
}
