<?php

namespace App\Http\Controllers\historial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HistorialModel;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        return view('listas.historial');
    }

    public function DetalleHistorial($idhist){
        $historial = HistorialModel::where('idhistorial_comercializacion', $idhist)->get();
        
        //return json_encode($historial);
        return view('listas.historial');
    }

    public function indexLista(){
        $historial = HistorialModel::get();
        //return json_encode($historial);
        return view('componentes.historial.tabla_historial', compact('historial'));
    }

    public function create()
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
