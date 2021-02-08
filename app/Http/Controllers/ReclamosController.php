<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReclamosModel;
class ReclamosController extends Controller
{
    public function index(){
        return view('reclamos.reclamos');
    }
}
