<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GiroNegocioModel;
class GiroNegocioController extends Controller
{
    public function indexGiroNegocio()
    {
        $negocio = GiroNegocioModel::select('idgiro_negocio as id', 'nombre as nombre')->get();

        return json_encode($negocio);
    }
}
