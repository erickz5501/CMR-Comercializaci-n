<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ActualizacionesModel;
class ActualizacionesController extends Controller
{
    public function index(){
        return view('actualizaciones.actualizaciones');
    }
}
