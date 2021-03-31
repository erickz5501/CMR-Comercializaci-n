<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth/login');
    }

    public function LogIn(LoginRequest $request)
    {

        $email    = $request->input('email');
        $password = $request->input('password');
        $remember = ($request->input('remember') == 'on') ? true : false;

        $user = User::where('email', $email)->first();

        if ($user) {
            if ($user->hasAnyRole(['administrador','personal'])) {
                if (Auth::attempt(['email' => $email, 'password' => $password, 'estado' => 0], $remember)) {

                    if (Auth::check()) {

                        //    $user = User::where('id', Auth::id())->first();
                        //    $user->hasRole(['super_administrador']);

                        $redirect = '';

                        if (Auth::user()->hasAnyRole(['administrador'])) {

                            $redirect = '/cmr/comercializacion';

                        }elseif(Auth::user()->hasAnyRole(['personal'])){
                            $redirect = '/dashboard/actualizaciones';
                        }

                        return json_encode(['status' => true, 'message' => 'Exito', 'redirect' => $redirect]);
                    }

                } else {
                    return json_encode(['status' => false, 'message' => 'Sus credenciales no son válidas']);
                }
            } else {
                return json_encode(['status' => false, 'message' => 'Sus credenciales no son válidas']);
            }
        } else {
            return json_encode(['status' => false, 'message' => 'Sus credenciales no son válidas']);
        }

        // return json_encode(['email'=> $email, 'password' => $password, 'remember' => $remember]);
    }

    public function LogOut()
    {
        Auth::LogOut();
        session()->flush();
        return redirect('/');
    }
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
