<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ComercializacionModel;
class ComercializacionController extends Controller
{
    public function index(){
        return view('comercializacion.comercializacion');
    }

    
}
