<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClientesModel;
use App\Http\Requests\UserGeneralRequest;

class ClientesController extends Controller
{
    public function index()
    {   
        //dd($cliente);
        return view('listas.clientes');
    }
    public function indexLista()
    {   
        $clientes = ClientesModel::where('tipo_persona', 2)->get();
        //dd($cliente);
        return view('componentes.clientes.tabla_cliente', compact('clientes'));
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
    
    public function create(UserGeneralRequest $request)
    {
        $nombre_razon_social_input      = $request->input('nombre_razon_social_input');
        $nombre_comercial_input         = $request->input('nombre_comercial_input');
        $GiroNegocioSelect              = $request->input('select_modal_giroNegocio');
        $tipoPersonaSelect              = $request->input('select_modal_tipoPersona');
        $tipoDocSelect                  = $request->input('select_modal_tipoDocumento');
        $numDocumentoInput              = $request->input('numDocumentoInput');
        $InputCorreo1                   = $request->input('InputCorreo1');
        $InputCorreo2                   = $request->input('InputCorreo2');
        $InputCorreo3                   = $request->input('InputCorreo3');
        $number_empresa_input           = $request->input('number_empresa_input');
        $number_contacto_input          = $request->input('number_contacto_input');
        $number_otro_input              = $request->input('number_otro_input');
        
        //dd($number_otro_input);
    //     $todo =[
    //     'tipo_documento' => $tipoDocSelect, 
    //     'nro_documento' => $numDocumentoInput, 
    //     'nombres_razon_social' => $nombre_razon_social_input, 
    //     'apellidos_nombre_comercial' => $nombre_comercial_input,
    //     'correo_1' => $InputCorreo1,
    //     'correo_2' => $InputCorreo2,
    //     'correo_3' => $InputCorreo3, 
    //     'telefono_empresa' => $number_empresa_input, 
    //     'telefono_contacto' => $number_contacto_input, 
    //     'telefono_otro' => $number_otro_input, 
    //     'idgiro_negocio' => $GiroNegocioSelect,
    //     'tipo_persona' => $tipoPersonaSelect
    // ];
        // return json_encode($todo);

        $usuario = ClientesModel::create(
            ['tipo_documento' => $tipoDocSelect, 
            'nro_documento' => $numDocumentoInput, 
            'nombres_razon_social' => $nombre_razon_social_input, 
            'apellidos_nombre_comercial' => $nombre_comercial_input,
            'correo_1' => $InputCorreo1,
            'correo_2' => $InputCorreo2,
            'correo_3' => $InputCorreo3, 
            'telefono_empresa' => $number_empresa_input, 
            'telefono_contacto' => $number_contacto_input, 
            'telefono_otro' => $number_otro_input, 
            'idgiro_negocio' => $GiroNegocioSelect,
            'tipo_persona' => $tipoPersonaSelect
            ]);
            return json_encode(['status' => true, 'message' => 'Éxito se registro su empresa']);
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
