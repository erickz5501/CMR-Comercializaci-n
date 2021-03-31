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

    public function index_lista_tabla(Request $request){

        $filtro_cant   = $request->filtro_cant;
        $filtro_search = ($request->filtro_search === "null")? '' : $request->filtro_search;
        $filtro_estado = $request->filtro_estado;
        $filtro_tipo   = $request->filtro_tipo;
        $filtro_etiqueta = ($request->filtro_etiqueta === "null")? '' : $request->filtro_etiqueta;

        $clientes = ClientesModel::
                      when( $filtro_tipo == '1' ,function ($query) { return $query->interesados();   })
                    ->when( $filtro_tipo == '2' ,function ($query) { return $query->clientes();   })
                    ->when($filtro_estado == '0' , function ($query) { return $query->activos();  })
                    ->when($filtro_estado == '1' , function ($query) { return $query->inactivos();  })
                    ->when($filtro_etiqueta != '' , function ($query) use ($filtro_etiqueta) { return $query->etiquetas($filtro_etiqueta);  })
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

    public function mostrar_cliente_interesado_one($id_cliente){

        $det_cliente = ClientesModel::where('idclientes', $id_cliente)->first();

        return json_encode($det_cliente);
    }

    public function agregar_edit_cliente_interesado(InteresadoRequest $request){
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
        $select_modal_etiquetas = $request->input('select_modal_etiquetas');
        $select_modal_tamano_empresa= $request->input('select_modal_tamano_empresa');
        $select_modal_a_que_dedicas = $request->input('select_modal_a_que_dedicas');
        $InputCorreo2               = $request->input('InputCorreo2');
        $InputCorreo3               = $request->input('InputCorreo3');
        $number_contacto_input      = $request->input('number_contacto_input');
        $number_otro_input          = $request->input('number_otro_input');


        // return json_encode($hola);
        if ( empty( $idclientes ) ){
            $usuario = ClientesModel::firstOrCreate(
            [
                'tipo_documento' => $tipoDocSelect,
                'nro_documento' => $nro_documento,
                'nombres_razon_social' => $nombre_razon_social_input,
                'apellidos_nombre_comercial' => $nombre_comercial_input,
            ],
            [
                'tipo_persona' => $tipoPersonaSelect,
                'idgiro_negocio' => $GiroNegocioSelect,
                'correo_1' => $InputCorreo1,
                'telefono_empresa' => $number_empresa_input,
                'direccion' => $direccion,

                'provincia' => $select_modal_provincia,
                'grado_interes' => $select_modal_grado_interes,
                'idetiquetas'=> $select_modal_etiquetas,
                'tamano_empresa' => $select_modal_tamano_empresa,
                'a_que_dedicas' => $select_modal_a_que_dedicas,
                'correo_2' => $InputCorreo2,
                'correo_3' => $InputCorreo3,
                'telefono_contacto' => $number_contacto_input,
                'telefono_otro' => $number_otro_input,
            ]
            );
            return json_encode(['status' => true, 'message' => 'Registro conforme!!', 'id' => $usuario->idclientes]);
        }else{
            $interesado = ClientesModel::find($idclientes);

            try {
                $interesado->tipo_documento             = $tipoDocSelect;
                $interesado->nro_documento              = $nro_documento;
                $interesado->nombres_razon_social       = $nombre_razon_social_input;
                $interesado->apellidos_nombre_comercial = $nombre_comercial_input;
                $interesado->tipo_persona               = $tipoPersonaSelect;
                $interesado->idgiro_negocio             = $GiroNegocioSelect;
                $interesado->correo_1                   = $InputCorreo1;
                $interesado->telefono_empresa           = $number_empresa_input;
                $interesado->direccion                  = $direccion;

                $interesado->provincia                  = $select_modal_provincia;
                $interesado->grado_interes              = $select_modal_grado_interes;
                $interesado->idetiquetas                = $select_modal_etiquetas;
                $interesado->tamano_empresa             = $select_modal_tamano_empresa;
                $interesado->a_que_dedicas              = $select_modal_a_que_dedicas;
                $interesado->correo_2                   = $InputCorreo2;
                $interesado->correo_3                   = $InputCorreo3;
                $interesado->telefono_contacto          = $number_contacto_input;
                $interesado->telefono_otro              = $number_otro_input;
                $interesado->save();

            } catch(Exception $e){

                return json_encode($e->getMessage());
            }

            return json_encode(['status' => true, 'message' => 'Actualización exitosa']);
        }
    }

    public function detalle_cliente_interesado($id_cliente){

        $cliente = ClientesModel::with('gironegocio','ModeloEtiqueta')->where('idclientes', $id_cliente)->first();

        return view('componentes.clientes.modal_detalle_interesado', compact('cliente'));
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

    public function historialInteresado(){
        return view('listas\interesados\detalle_historial_interesado');
    }

    public function lista_select2_clientes(){

        $clientes = ClientesModel::select(['idclientes as id', DB::raw("CONCAT(  clientes.nombres_razon_social, ' ' ,clientes.apellidos_nombre_comercial ) AS nombre") ] )
                                    ->where('estado', 0)
                                    ->orderBy('idclientes', 'DESC')
                                    ->get();

        return json_encode($clientes);
    }

}
