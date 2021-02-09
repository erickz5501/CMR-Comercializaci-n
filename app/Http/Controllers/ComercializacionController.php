<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ComercializacionModel;
use App\Http\Requests\ComercializacionRequest;
class ComercializacionController extends Controller
{
    public function index(){
        return view('comercializacion.comercializacion');
    }

    public function indexLista(){
        $comercio = ComercializacionModel::get();
        //return json_encode($comercio);
        return view('componentes.comercializacion.tabla_comercializacion', compact('comercio'));
    }

    public function createComercio(ComercializacionRequest $request){

    }
    
}
