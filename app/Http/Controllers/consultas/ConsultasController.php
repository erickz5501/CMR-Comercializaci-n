<?php

namespace App\Http\Controllers\consultas;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ConsultasController extends Controller{

    public function consultaDNISunat($dni){

        try {

            $client = new Client();  //Creamos un cliente
            $res = $client->request('GET', 'https://api.reniec.cloud/dni/' . $dni, ['verify' => false] );   //obtenemos los datos de la persona mediante la api de SUNAT
        
            $data = $res->getBody();
            $cliente_data = json_decode($data);
        
            if (isset($cliente_data->error)) {

                return json_encode(['status' => false, "exception" => 'No cencontrado']);
        
                
            }else{
                return json_encode(['status' => true, "cliente" => $cliente_data]);
                
            }
        
        } catch (\Exception $e) {
            return json_encode(['status' => false, "exception" => $e->getMessage()]);
        }
    }

    public function consultaRUCSunat($ruc){
        try {

            $client = new Client();  //Creamos un cliente(de la libreria GuzzleHttp)
            $res = $client->request('GET', 'https://consultardoc.ceatec.com.pe/ruc/' . $ruc, ['verify' => false] );   //obtenemos los datos de la persona mediante la api de SUNAT
        
            $data = $res->getBody();
        
            if ($data) {//si viene datos

                $cliente_data = json_decode($data);//decodificamos los datos

                return json_encode($cliente_data);//Lo volmemos a codificar y retornamos los datos

            }else{
                return json_encode(['status' => false, "exception" => 'No cencontrado']);
            }
        
        } catch (\Exception $e) {
            return json_encode(['status' => false, "exception" => $e->getMessage()]);
        }
    }

}
