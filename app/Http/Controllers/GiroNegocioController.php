<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GiroNegocioModel;

class GiroNegocioController extends Controller
{
    public function index()
    {
        $g_negocio = GiroNegocioModel::select('idgiro_negocio as id', 'nombre as nombre')->get();

        return json_encode($g_negocio);
    }
}
