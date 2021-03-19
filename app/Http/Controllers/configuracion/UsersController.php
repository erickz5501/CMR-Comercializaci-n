<?php

namespace App\Http\Controllers\configuracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\historial\UsersModel;
use App\Http\Requests\UsersRequest;
use Exception;

class UsersController extends Controller
{

    public function index()
    {
        return view('configuracion.users');
    }

    public function indexLista(){
        $users = UsersModel::get();
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
