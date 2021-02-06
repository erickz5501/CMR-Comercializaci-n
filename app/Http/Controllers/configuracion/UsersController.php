<?php

namespace App\Http\Controllers\configuracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\historial\UsersModel;
use App\Http\Requests\UsersRequest;
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
        $nombre_input               = $request->input('nombre_input');
        $apellido_input             = $request->input('apellido_input');
        $email_input                = $request->input('email_input');
        $password_input             = $request->input('password_input');
       
        if ($idusers != "") {
            $users = UsersModel::find($idusers);

            try{
                $users->nombres = $nombre_input;
                $users->apellidos = $apellido_input;
                $users->email = $email_input;
                $users->password = $password_input;

                $users->save();
            }
            catch(Exception $e){
                return json_encode($e->getMessage());
            }

            return json_encode(['status' => true, 'message' => 'Éxito se actuasizo el modulo']);
            
        } else {
            $users = UsersModel::create(
                [
                'nombres' => $nombre_input,
                'apellidos' => $apellido_input,
                'email' => $email_input,
                'password' => $password_input
                ]);
            
            return json_encode(['status' => true, 'message' => 'Éxito se registro el usuario']);
        }
        
    }

    public function DetalleUser($iduser){
        $det_user = UsersModel::where('idusers', $iduser)->first();

        return json_encode(['user' => $det_user]);
    }
}
