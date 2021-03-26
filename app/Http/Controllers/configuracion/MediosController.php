<?php

namespace App\Http\Controllers\configuracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MediosRequest;
use App\Models\MediosModel;
use Exception;

class MediosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('configuracion.medios');
    }

    public function indexLista(Request $request ){

        $filtro_estado = $request->filtro_estado;

        $filtro_cant   = $request->filtro_cant;

        $filtro_search = ($request->filtro_search === "null")? '' : $request->filtro_search;

        $medios = MediosModel::when($filtro_estado == '0' , function ($query) { return $query->activos();  })
                            ->when($filtro_estado == '1' , function ($query) { return $query->inactivos();  })
                            ->where(function ($query) use ($filtro_search){
                                return $query->orWhere('nombre', 'like', "%{$filtro_search}%")
                                            ->orWhere('updated_at', 'like', "%{$filtro_search}%");
                            })
                            ->orderBy('idmedios', 'DESC')
                            ->paginate($filtro_cant);
        //return json_encode($eventos);
        return view('componentes.configuracion.tabla_medios', compact('medios'));
    }

    public function indexMedios()
    {
        $medios = MediosModel::select('idmedios as id', 'nombre as nombre')->where('estado', 0)->get();

        return json_encode($medios);
    }

    public function activar($idmedios){
        $medio = MediosModel::where('idmedios', $idmedios)->first();
        $medio->estado = 0;
        $medio->save();
        return json_encode(['status' => true, 'message' => 'Se ah activado el medio']);
    }

    public function desactivar($idmedios){
        $medio = MediosModel::where('idmedios', $idmedios)->first();
        $medio->estado = 1;
        $medio->save();
        return json_encode(['status' => true, 'message' => 'Se ah desactivado el medio']);
    }

    public function createMedio(MediosRequest $request){
        $idmedios                = $request->input('idmedios');
        $nombre_medio             = $request->input('nombre_medio');

        if ($idmedios != "") {
            $medio = MediosModel::find($idmedios);

            try{
                $medio->nombre = $nombre_medio;

                $medio->save();
            }
            catch(Exception $e){
                return json_encode($e->getMessage());
            }

            return json_encode(['status' => true, 'message' => 'Éxito se actualizo el medio de contacto']);

        } else {
            $medio = MediosModel::create(
                [
                'nombre' => $nombre_medio,
                ]);

            return json_encode(['status' => true, 'message' => 'Éxito se registro el medio medio de contacto','id'=>$medio->idmedios]);
        }

    }

    public function DetalleMedio($idmedios){

        $medio = MediosModel::where('idmedios', $idmedios)->first();

        return json_encode($medio);
    }
}
