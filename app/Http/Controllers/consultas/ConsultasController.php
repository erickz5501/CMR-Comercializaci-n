<?php

namespace App\Http\Controllers\consultas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClientesModel;
class ConsultasController extends Controller{

    public function consultaDNISunat($dni){

        try {

            $client = new ClientesModel();  //Creamos un cliente
            $res = $client->request('GET', 'https://api.reniec.cloud/dni/' . $dni, ['verify' => false] );   //obtenemos los datos de la persona mediante la api de SUNAT
        
            $data = $res->getBody();
        
            if ($data) {

                $cliente_data = json_decode($data);
                
                $cliente_api = array(
                    "nro_documento" => $cliente_data->dni,
                    "cui"           => $cliente_data->cui,
                    "nombres"       => $cliente_data->nombres,
                    "apellidos"     => $cliente_data->apellido_paterno . ' ' . $cliente_data->apellido_materno,
                );
        
                $cliente_db = Clientes::firstOrCreate(
                    ['nro_documento' => $cliente_data->dni], 
                    ['nombres' => $cliente_data->nombres, 'apellidos' => $cliente_data->apellido_paterno . ' ' . $cliente_data->apellido_materno, 'tipo' => 1]
                );

                return json_encode(['status' => true, "cliente" => $cliente_api]);

            }else{
                return json_encode(['status' => false, "exception" => 'No cencontrado']);
            }
        
        } catch (\Exception $e) {
            return json_encode(['status' => false, "exception" => $e->getMessage()]);
        }
    }

    public function consultaRUCSunat($ruc){
        try {

            $client = new ClientesModel();  //Creamos un cliente
            $res = $client->request('GET', 'https://consultardoc.ceatec.com.pe/ruc/' . $ruc, ['verify' => false] );   //obtenemos los datos de la persona mediante la api de SUNAT
        
            $data = $res->getBody();
        
            if ($data) {

                $cliente_data = json_decode($data);
                
                $cliente_api = array(
                    "nro_documento" => $cliente_data->dni,
                    "cui"           => $cliente_data->cui,
                    "nombres"       => $cliente_data->nombres,
                    "apellidos"     => $cliente_data->apellido_paterno . ' ' . $cliente_data->apellido_materno,
                );
        
                $cliente_db = Clientes::firstOrCreate(
                    ['nro_documento' => $cliente_data->dni], 
                    ['nombres' => $cliente_data->nombres, 'apellidos' => $cliente_data->apellido_paterno . ' ' . $cliente_data->apellido_materno, 'tipo' => 1]
                );

                return json_encode(['status' => true, "cliente" => $cliente_api]);

            }else{
                return json_encode(['status' => false, "exception" => 'No cencontrado']);
            }
        
        } catch (\Exception $e) {
            return json_encode(['status' => false, "exception" => $e->getMessage()]);
        }
    }

}
