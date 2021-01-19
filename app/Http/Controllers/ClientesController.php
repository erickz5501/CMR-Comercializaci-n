<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClientesModel;

class ClientesController extends Controller
{
    public function index()
    {   
        $clientes = ClientesModel::all();
        //dd($cliente);
        return view('listas.clientes', compact('clientes'));
    }
    public function detalle_cliente($id_cliente){
        $det_cliente = ClientesModel::where('idclientes', $id_cliente)->first();

        return view('componentes.clientes.modal_detalle_cliente', compact('det_cliente'));
    }

    public function interesados(){
        $interesados = ClientesModel::all();
        return view('listas.lista_interesados', compact('interesados'));
    }
    public function detalle_interesado($id_interesado){
        $det_interesado = ClientesModel::where('idclientes', $id_interesado)->first();
        //dd($det_interesado);
        return view('componentes.clientes.modal_detalle_interesado', compact('det_interesado'));
    }
    
    public function create()
    {
        //
    }
    
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
