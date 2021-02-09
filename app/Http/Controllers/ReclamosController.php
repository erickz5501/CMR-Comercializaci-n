<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReclamosModel;
use App\Http\Requests\ReclamosRequest;
class ReclamosController extends Controller
{
    public function index(){
        return view('reclamos.reclamos');
    }

    public function indexLista()
    {
        $reclamos = ReclamosModel::get();
        //return json_encode($comercio);
        return view('componentes.reclamos.tabla_reclamos', compact('reclamos'));
    }
}
