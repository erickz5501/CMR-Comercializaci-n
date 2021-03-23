<?php

namespace App\Http\Controllers\clientes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientesModel;
use App\Http\Requests\InteresadoRequest;
use App\Http\Requests\UserGeneralRequest;
use Exception;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    public function index_vista(){
        //dd($cliente);
        return view('listas.clientes');
    }

    public function lista_tabla_clientes(Request $request){

        $filtro_cant   = $request->filtro_cant;
        $filtro_search = ($request->filtro_search === "null")? '' : $request->filtro_search;
        $filtro_estado = $request->filtro_estado;
        $filtro_tipo   = $request->filtro_tipo;


        $clientes = ClientesModel::
                      when( $filtro_tipo == '1' ,function ($query) { return $query->interesados();   })
                    ->when( $filtro_tipo == '2' ,function ($query) { return $query->clientes();   })
                    ->when($filtro_estado == '1' , function ($query) { return $query->activos();  })
                    ->when($filtro_estado == '1' , function ($query) { return $query->inactivos();  })
                    ->orderBy('idclientes', 'DESC')
                    ->where(function ($query) use ($filtro_search){
                        return $query->orWhere('nombres_razon_social', 'like', "%{$filtro_search}%")
                                     ->orWhere('apellidos_nombre_comercial', 'like', "%{$filtro_search}%")
                                     ->orWhere('nro_documento', 'like', "%{$filtro_search}%");
                    })
                    ->paginate($filtro_cant);

        // return json_encode($clientes);
        return view('componentes.clientes.tabla_cliente', compact('clientes'))->render();
    }

    public function lista_select2_clientes(){

        $clientes = ClientesModel::select(['idclientes as id', DB::raw("CONCAT(  clientes.nombres_razon_social, ' ' ,clientes.apellidos_nombre_comercial ) AS nombre") ] )
                                    ->where('estado', 0)
                                    ->get();

        return json_encode($clientes);
    }

    public function lista_select2_interesado(){

        $interesados = ClientesModel::select('idclientes as id', 'nombres_razon_social as nombre')->where('tipo_persona', 1)->get();

        return json_encode($interesados);
    }

    public function indexListaInteresado(){

        $interesados = ClientesModel::where('tipo_persona', 1)->get();

        return view('componentes.interesados.tabla_interesados', compact('interesados'));
    }

    public function detalle_cliente($id_cliente){
        $det_cliente = ClientesModel::where('idclientes', $id_cliente)->first();
        // $det_cliente->each(function($det_cliente){
        //     $det_cliente->gironegocio;
        // });

        return view('componentes.clientes.modal_detalle_cliente', compact('det_cliente'));
    }

    public function detalle_cliente_one($id_cliente){
        $det_cliente = ClientesModel::where('idclientes', $id_cliente)->first();

        return json_encode($det_cliente);
    }

    public function interesados(){
        return view('listas.lista_interesados');
    }

    public function detalle_interesado($id_interesado){
        $det_interesado = ClientesModel::with('gironegocio')->where('idclientes', $id_interesado)->first();

        //return json_encode(['interesado'=>$det_interesado]);

        return view('componentes.clientes.modal_detalle_interesado', compact('det_interesado'));
    }

    public function agregar_edit_cliente_interesado(InteresadoRequest $request){ //CREA UN REGISTRO DE INTERESADO
        $idclientes                 = $request->input('idclientes');
        $tipoPersonaSelect          = $request->input('select_modal_tipoPersona');
        $tipoDocSelect              = $request->input('select_modal_tipo_doc');
        $nro_documento              = $request->input('nro_documento');
        $GiroNegocioSelect          = $request->input('select_modal_giro_negocio');
        $nombre_razon_social_input  = $request->input('nombre_razon_social_input');
        $nombre_comercial_input     = $request->input('nombre_comercial_input');
        $InputCorreo1               = $request->input('InputCorreo1');
        $number_empresa_input       = $request->input('number_empresa_input');
        $direccion                  = $request->input('direccion');

        $select_modal_provincia     = $request->input('select_modal_provincia');
        $select_modal_grado_interes = $request->input('select_modal_grado_interes');
        $select_modal_tamano_empresa= $request->input('select_modal_tamano_empresa');
        $select_modal_a_que_dedicas = $request->input('select_modal_a_que_dedicas');
        $InputCorreo2               = $request->input('InputCorreo2');
        $InputCorreo3               = $request->input('InputCorreo3');
        $number_contacto_input      = $request->input('number_contacto_input');
        $number_otro_input          = $request->input('number_otro_input');

        $hola = [
            'idclientes'=>                  $idclientes                 ,
            'nombre_razon_social_input'=>   $nombre_razon_social_input  ,
            'nombre_comercial_input'=>      $nombre_comercial_input    ,
            'GiroNegocioSelect'=>           $GiroNegocioSelect          ,
            'tipoPersonaSelect'=>           $tipoPersonaSelect          ,
            'tipoDocSelect'=>               $tipoDocSelect              ,
            'nro_documento'=>               $nro_documento              ,
            'direccion'=>                   $direccion                 ,
            'InputCorreo1'=>                $InputCorreo1               ,
            'InputCorreo2'=>                $InputCorreo2               ,
            'InputCorreo3'=>                $InputCorreo3               ,
            'number_empresa_input'=>        $number_empresa_input       ,
            'number_contacto_input'=>       $number_contacto_input      ,
            'number_otro_input'=>           $number_otro_input,
            'select_modal_provincia' =>     $select_modal_provincia    ,
            'select_modal_grado_interes' => $select_modal_grado_interes  ,
            'select_modal_tamano_empresa' =>$select_modal_tamano_empresa ,
            'select_modal_a_que_dedicas' =>     $select_modal_a_que_dedicas     ,
        ];
        // return json_encode($hola);
        if ( empty( $idclientes ) ){
            $usuario = ClientesModel::firstOrCreate(
            [   'tipo_persona' => $tipoPersonaSelect,
                'tipo_documento' => $tipoDocSelect,
                'nro_documento' => $nro_documento,
                'nombres_razon_social' => $nombre_razon_social_input,
                'apellidos_nombre_comercial' => $nombre_comercial_input,
            ],
            [
                'idgiro_negocio' => $GiroNegocioSelect,

                'correo_1' => $InputCorreo1,
                'telefono_empresa' => $number_empresa_input,
                'direccion' => $direccion,

                'provincia' => $select_modal_provincia,
                'grado_interes' => $select_modal_grado_interes,
                'tamano_empresa' => $select_modal_tamano_empresa,
                'a_que_dedicas' => $select_modal_a_que_dedicas,
                'correo_2' => $InputCorreo2,
                'correo_3' => $InputCorreo3,
                'telefono_contacto' => $number_contacto_input,
                'telefono_otro' => $number_otro_input,
            ]
            );

                return json_encode(['status' => true, 'message' => 'Éxito se registro su empresa', 'id' => $usuario->idclientes]);



        }else{
            $interesado = ClientesModel::find($idclientes);

            try {
                $interesado->tipo_documento             = $tipoDocSelect;
                $interesado->nro_documento              = $nro_documento;
                $interesado->nombres_razon_social       = $nombre_razon_social_input;
                $interesado->apellidos_nombre_comercial = $nombre_comercial_input;
                $interesado->direccion                  = $direccion;
                $interesado->correo_1                   = $InputCorreo1;
                $interesado->correo_2                   = $InputCorreo2;
                $interesado->correo_3                   = $InputCorreo3;
                $interesado->telefono_empresa           = $number_empresa_input;
                $interesado->telefono_contacto          = $number_contacto_input;
                $interesado->telefono_otro              = $number_otro_input;
                $interesado->idgiro_negocio             = $GiroNegocioSelect;
                $interesado->tipo_persona               = $tipoPersonaSelect;
                $interesado->save();

            } catch(Exception $e){

                return json_encode($e->getMessage());
            }

            return json_encode(['status' => true, 'message' => 'Éxito se registro el cliente']);
        }

    }

    public function editarCliente(InteresadoRequest $request){
        $idclientes                     = $request->input('idclientes');
        $nombre_razon_social_input      = $request->input('nombre_razon_social_input');
        $nombre_comercial_input         = $request->input('nombre_comercial_input');
        $GiroNegocioSelect              = $request->input('select_modal_giroNegocio');
        $tipoPersonaSelect              = $request->input('select_modal_tipoPersona');
        $tipoDocSelect                  = $request->input('select_modal_tipo_doc');
        $nro_documento              = $request->input('nro_documento');
        $InputCorreo1                   = $request->input('InputCorreo1');
        $InputCorreo2                   = $request->input('InputCorreo2');
        $InputCorreo3                   = $request->input('InputCorreo3');
        $number_empresa_input           = $request->input('number_empresa_input');
        $number_contacto_input          = $request->input('number_contacto_input');
        $number_otro_input              = $request->input('number_otro_input');

        $usuario = ClientesModel::find($idclientes);

        try {
            $usuario->tipo_documento = $tipoDocSelect;
            $usuario->nro_documento = $nro_documento;
            $usuario->nombres_razon_social = $nombre_razon_social_input;
            $usuario->apellidos_nombre_comercial = $nombre_comercial_input;
            $usuario->correo_1 = $InputCorreo1;
            $usuario->correo_2 = $InputCorreo2;
            $usuario->correo_3 = $InputCorreo3;
            $usuario->telefono_empresa = $number_empresa_input;
            $usuario->telefono_contacto = $number_contacto_input;
            $usuario->telefono_otro = $number_otro_input;
            $usuario->idgiro_negocio = $GiroNegocioSelect;
            $usuario->tipo_persona = $tipoPersonaSelect;

            $usuario->save();
        }
        catch(Exception $e){
            return json_encode($e->getMessage());
        }


        return json_encode(['status' => true, 'message' => 'Éxito se registro el cliente']);

    }

    public function editar_cliente($idcliente){
        // $clientes = ClientesModel::where('tipo_persona', 2)->get();
        $usuario = ClientesModel::where('idclientes', $idcliente)->first();
        return json_encode(['cliente' => $usuario]);
        // return json_encode(['horarios' => $horarios]);
    }

    public function desactivar($idclientes)
    {
        $usuario = ClientesModel::where('idclientes', $idclientes)->first();
        $usuario->estado = 1;
        $usuario->save();
        return json_encode(['status' => true, 'message' => 'Se ha desactivado el Cliente']);
    }

    public function activar($idclientes)
    {
        $usuario = ClientesModel::where('idclientes', $idclientes)->first();
        $usuario->estado = 0;
        $usuario->save();
        return json_encode(['status' => true, 'message' => 'Se ha activado el Cliente']);

    }

    public function desactivarInteresado($idclientes)
    {
        $usuario = ClientesModel::where('idclientes', $idclientes)->first();
        $usuario->estado = 1;
        $usuario->save();
        return json_encode(['status' => true, 'message' => 'Se ha desactivado el interesado']);
    }

    public function historialInteresado(){
        return view('listas\interesados\detalle_historial_interesado');
    }

}
