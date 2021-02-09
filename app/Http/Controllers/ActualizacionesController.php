<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ActualizacionesModel;
use App\Http\Requests\ActualizacionesRequest;
class ActualizacionesController extends Controller
{
    public function index(){
        return view('actualizaciones.actualizaciones');
    }

    public function indexLista()
    {
        $actualizaciones = ActualizacionesModel::get();
        //return json_encode($comercio);
        return view('componentes.actualizaciones.tabla_actualizaciones', compact('actualizaciones'));
    }
}
