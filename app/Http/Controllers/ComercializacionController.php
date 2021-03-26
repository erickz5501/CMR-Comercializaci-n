<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ComercializacionModel;
use App\Models\CorrelativoModel;
use App\Models\CotizacionesModel;
use App\Models\CotizacionComercializacionModel;
use App\Models\ClientesModel;
use App\Http\Requests\ComercializacionRequest;
use App\Http\Requests\CotizacionRequest;
use App\Models\ModuloComercializacionModel;
use Exception;

class ComercializacionController extends Controller
{
    public function mantenimiento(){
        return view('errors.mantenimiento');
    }

    public function index(){
        return view('comercializacion.comercializacion');
    }

    public function indexLista(Request $request){

        $filtro_cant   = $request->filtro_cant;
        $filtro_search = ($request->filtro_search === "null")? '' : $request->filtro_search;

        $comercializaciones = ClientesModel::with('ModeloComercializaciones','gironegocio')
                                            ->where(function($query) {
                                                    return $query->orWhereHas('ModeloComercializaciones', function ($query) {
                                                        return $query->where('idcomercializacion', '>', '0');
                                                    });
                                                })
                                            ->where(function($query) use ($filtro_search){
                                                    return $query->orWhereHas('gironegocio', function ($query) use ($filtro_search){
                                                        return $query->orwhere('nombre', 'like', "%{$filtro_search}%");
                                                    });
                                                })
                                            ->where(function ($query) use ($filtro_search){
                                                return $query->orWhere('nombres_razon_social', 'like', "%{$filtro_search}%")
                                                                ->orWhere('apellidos_nombre_comercial', 'like', "%{$filtro_search}%")
                                                                ->orWhere('nro_documento', 'like', "%{$filtro_search}%")
                                                                ->orWhere('correo_1', 'like', "%{$filtro_search}%")
                                                                ->orWhere('telefono_empresa', 'like', "%{$filtro_search}%");
                                                })
                                            ->orderBy('idclientes', 'DESC')
                                            ->paginate($filtro_cant);
        // return json_encode($comercializaciones);
        return view('componentes.comercializacion.tabla_comercializacion', compact('comercializaciones'));
    }

    public function mostrar_seguimiento($idcliente,Request $request){//Lista de comercializacion de un cliente/iteresado

        $filtro_cant   = $request->filtro_cant;
        $filtro_search = ($request->filtro_search === "null")? '' : $request->filtro_search;

        $seguimientos = ComercializacionModel::with('ModeloCliente.gironegocio','medio')
                                        ->where('idclientes', $idcliente)
                                        ->orderBy('created_at', 'DESC')
                                        ->where(function ($query) use ($filtro_search){
                                            return $query->orWhere('persona_contacto', 'like', "%{$filtro_search}%")
                                                            ->orWhere('detalla_llamada', 'like', "%{$filtro_search}%")
                                                            ->orWhere('fecha_evento', 'like', "%{$filtro_search}%");
                                            })
                                        ->paginate();

        // return json_encode($seguimientos);
        return view('comercializacion.comercializacion_historial', compact('seguimientos'));
    }

    public function recargar_tabla_seguimiento($id_idclientes,Request $request){//Lista de comercializacion de un cliente/iteresado

        $filtro_cant   = $request->filtro_cant;
        $filtro_search = ($request->filtro_search === "null")? '' : $request->filtro_search;

        if ( !empty( $request->fecha_inicio ) &&  !empty( $request->fecha_fin ) ) {

            $fecha_inicio = \Carbon\Carbon::parse($request->fecha_inicio)->format('Y-m-d H:i:s');

            $fecha_fin = \Carbon\Carbon::parse($request->fecha_fin)->format('Y-m-d H:i:s');

            $seguimientos = ComercializacionModel::with('ModeloCliente.gironegocio','medio')
                                                ->where('idclientes', $id_idclientes)
                                                ->whereBetween('fecha_evento', [$fecha_inicio, $fecha_fin])
                                                ->orderBy('fecha_evento', 'DESC')
                                                ->where(function ($query) use ($filtro_search){
                                                    return $query->orWhere('persona_contacto', 'like', "%{$filtro_search}%")
                                                                    ->orWhere('detalla_llamada', 'like', "%{$filtro_search}%")
                                                                    ->orWhere('fecha_evento', 'like', "%{$filtro_search}%");
                                                    })
                                                ->paginate($filtro_cant);
        }else{
            $seguimientos = ComercializacionModel::with('ModeloCliente.gironegocio','medio')
                                                ->where('idclientes', $id_idclientes)
                                                ->orderBy('fecha_evento', 'DESC')
                                                ->where(function ($query) use ($filtro_search){
                                                    return $query->orWhere('persona_contacto', 'like', "%{$filtro_search}%")
                                                                    ->orWhere('detalla_llamada', 'like', "%{$filtro_search}%")
                                                                    ->orWhere('fecha_evento', 'like', "%{$filtro_search}%");
                                                    })
                                                ->paginate($filtro_cant);
        }
        // return json_encode(['total'=>count($seguimientos),'segui'=>$seguimientos,'inicio'=>$fecha_inicio,'fin'=>$fecha_fin]);
        return view('componentes.comercializacion.tabla_seguimiento', compact('seguimientos'));
    }



    public function indexCotizacion(){
        $cotizacion = CotizacionesModel::select('idcotizaciones as id', 'nombre as nombre')->get();

        return json_encode($cotizacion);
    }

    public function createComercio(ComercializacionRequest $request){

        $idcomercializacion             = $request->input('idcomercializacion');
        $idusers                        = 1;
        $select_modal_clientes          = $request->input('select_modal_clientes');
        $persona_contacto_input         = $request->input('persona_contacto_input');
        $actividad_input                = $request->input('select_modal_actividad');
        $select_modal_medios            = $request->input('select_modal_medios');
        $select_modal_modulos           = $request->input('modulo');//Trae los valores de los modulos
        $cant_licencias_modulo          = $request->input('licencias');
        $persona_atencion_input         = $request->input('persona_atencion_input');//Este campo no esta en la tabla comercializacion
        $llamadaDetTextarea             = $request->input('llamadaDetTextarea');
        $select_modal_eventos           = $request->input('select_modal_evento');
        $example_date_input             = $request->input('example_date_input');//fecha evento
        $evento_input                   = $request->input('evento_input');
        $select_modal_cotizacion        = $request->input('select_modal_cotizacion');
        $select_modal_personal          = $request->input('select_modal_personal');
        $calificacionSelect             = $request->input('calificacionSelect');
        $avance_input                   = $request->input('avance_input');
        $cobrar_input                   = $request->input('cobrar_input');
        $conclusionessTextarea          = $request->input('conclusionessTextarea');

        $proxima_llamada          = \Carbon\Carbon::parse($request->input('proxima_llamada'))->format('Y-m-d h:i:s');

        // return json_encode($proxima_llamada);

        if ($idcomercializacion != "") {
            $registro = ComercializacionModel::find($idcomercializacion);
            $modulo = ModuloComercializacionModel::where('idcomercializacion', $idcomercializacion )->get();
            // $cant_modulos = count($modulo);
            $cotizacion = CotizacionComercializacionModel::where('idcomercializacion' ,$idcomercializacion )->first();
            // $cant_cotizacion = count($cotizacion);
            // return json_encode($cotizacion);

            foreach ($modulo as $i => $value) {
                $modulo[$i]->estado = 1;
                $modulo[$i]->save();
            }

            try{
                $registro->idusers              = $idusers;
                $registro->idclientes           = $select_modal_clientes;
                $registro->persona_contacto     = $persona_contacto_input;
                $registro->idactividad          = $actividad_input;
                $registro->idmedios             = $select_modal_medios;
                $registro->detalla_llamada      = $llamadaDetTextarea;
                $registro->ideventos            = $select_modal_eventos;
                $registro->fecha_evento         = Carbon::now()->format('Y-m-d H:i:s');
                $registro->descripcion_evento   = $evento_input;
                $registro->idpersonal           = $select_modal_personal;
                $registro->calificacion         = $calificacionSelect;
                $registro->avance               = $avance_input;
                $registro->por_cobrar           = $cobrar_input;
                $registro->observacion          = $conclusionessTextarea;
                $registro->proxima_llamada      = $proxima_llamada;

                //Registra los modulos en la tabla modulo_comercializacion
                if ($cant_licencias_modulo != null) {
                    foreach ($select_modal_modulos as $i => $value) {
                        $modulo_comercializacion = ModuloComercializacionModel::create([
                        'idcomercializacion' => $idcomercializacion,
                        'idmodulos' => $select_modal_modulos[$i],
                        'cant_licencias' => $cant_licencias_modulo[$i]
                        ]);
                    }
                }

                if ($cotizacion) {
                    $cotizacion->idcotizaciones = $select_modal_cotizacion;
                    $cotizacion->save();
                }else{
                    $cotiza_comerci = CotizacionComercializacionModel::create([
                        'idcomercializacion' => $idcomercializacion,
                        'idcotizaciones' => $select_modal_cotizacion,
                    ]);
                }

                $registro->save();

            }
            catch(Exception $e){
                return json_encode($e->getMessage());
            }

            return json_encode(['status' => true, 'message' => 'Éxito se actualizo el evento']);

        } else {
            $registro = ComercializacionModel::create(
                [
                'idusers' => $idusers,
                'idclientes' => $select_modal_clientes,
                'persona_contacto' => $persona_contacto_input,
                'idactividad' => $actividad_input,
                'idmedios' => $select_modal_medios,
                'detalla_llamada' => $llamadaDetTextarea,
                'ideventos' => $select_modal_eventos,
                'fecha_evento' => Carbon::now()->format('Y-m-d H:i:s'),
                'descripcion_evento' => $evento_input,
                'idpersonal' => $select_modal_personal,
                //'calificacion' => $calificacionSelect,
                'avance' => $avance_input,
                //'por_cobrar' => $cobrar_input,
                'observacion' => $conclusionessTextarea,
                'proxima_llamada' => $proxima_llamada
                ]);

            //Registro en la tabla modulo_comercializacion
            $registros = ComercializacionModel::all();
            $ultimo_registro = $registros->last();
            $ultimo_registro = json_encode($ultimo_registro);
            $ultimo_registro = json_decode($ultimo_registro);
            //dd($ultimo_registro);

            //Registra los modulos en la tabla modulo_comercializacion
            if ($select_modal_modulos != null) {
                foreach ($select_modal_modulos as $i => $value) {
                    $modulo_comercializacion = ModuloComercializacionModel::create([
                        'idcomercializacion' => $ultimo_registro->idcomercializacion,
                        'idmodulos' => $select_modal_modulos[$i],
                        'cant_licencias' => $cant_licencias_modulo[$i]
                    ]);
                }
            }

            if ($select_modal_cotizacion != null) {
                $cotizacion_comercializacion = CotizacionComercializacionModel::create([
                    'idcomercializacion' => $ultimo_registro->idcomercializacion,
                    'idcotizaciones' => $select_modal_cotizacion
                ]);
            }

            return json_encode(['status' => true, 'message' => 'Éxito se registro la comercializacion']);
        }
    }

    public function createComercioNuevo(ComercializacionRequest $request){
        //$idcomercializacion             = $request->input('idcomercializacion');
        $idusers                        = 1;
        $select_modal_clientes          = $request->input('select_modal_clientes');
        $persona_contacto_input         = $request->input('persona_contacto_input');
        $actividad_input                = $request->input('select_modal_actividad');
        $select_modal_medios            = $request->input('select_modal_medios');
        $select_modal_modulos           = $request->input('modulo');//Trae los valores de los modulos
        $cant_licencias_modulo          = $request->input('licencias');
        $persona_atencion_input         = $request->input('persona_atencion_input');//Este campo no esta en la tabla comercializacion
        $llamadaDetTextarea             = $request->input('llamadaDetTextarea');
        $select_modal_eventos           = $request->input('select_modal_evento');
        $example_date_input             = $request->input('example_date_input');//fecha evento
        $evento_input                   = $request->input('evento_input');
        $select_modal_cotizacion        = $request->input('select_modal_cotizacion');
        $select_modal_personal          = $request->input('select_modal_personal');
        $calificacionSelect             = $request->input('calificacionSelect');
        $avance_input                   = $request->input('avance_input');
        $cobrar_input                   = $request->input('cobrar_input');
        $conclusionessTextarea          = $request->input('conclusionessTextarea');
        $proxima_llamada          = \Carbon\Carbon::parse($request->input('proxima_llamada'))->format('Y-m-d h:i:s');
        $registro = ComercializacionModel::create(
            [
            'idusers' => $idusers,
            'idclientes' => $select_modal_clientes,
            'persona_contacto' => $persona_contacto_input,
            'idactividad' => $actividad_input,
            'idmedios' => $select_modal_medios,
            'detalla_llamada' => $llamadaDetTextarea,
            'ideventos' => $select_modal_eventos,
            'fecha_evento' => Carbon::now()->format('Y-m-d H:i:s'),
            'descripcion_evento' => $evento_input,
            'idpersonal' => $select_modal_personal,
            //'calificacion' => $calificacionSelect,
            'avance' => $avance_input,
            //'por_cobrar' => $cobrar_input,
            'observacion' => $conclusionessTextarea,
            'proxima_llamada' => $proxima_llamada,
            ]);

        //Registro en la tabla modulo_comercializacion
        $registros = ComercializacionModel::all();
        $ultimo_registro = $registros->last();
        $ultimo_registro = json_encode($ultimo_registro);
        $ultimo_registro = json_decode($ultimo_registro);
        //dd($ultimo_registro);

        //Registra los modulos en la tabla modulo_comercializacion
        foreach ($select_modal_modulos as $i => $value) {
            $modulo_comercializacion = ModuloComercializacionModel::create([
                'idcomercializacion' => $ultimo_registro->idcomercializacion,
                'idmodulos' => $select_modal_modulos[$i],
                'cant_licencias' => $cant_licencias_modulo[$i]
            ]);
        }

        $cotizacion_comercializacion = CotizacionComercializacionModel::create([
            'idcomercializacion' => $ultimo_registro->idcomercializacion,
            'idcotizaciones' => $select_modal_cotizacion
        ]);

        return json_encode(['status' => true, 'message' => 'Éxito se registro la comercializacion']);
    }

    //generamos el codigo de la cotizacion
    public function generar_correlativo($increment = false){//en caso sea falso muestar el siguiente correlativo, pero no lo aumente a nivel de BD
        $correlativo = CorrelativoModel::first();

        //$nro_cotizacion = $correlativo;
        // $nro_cotizacion->serie              = $correlativo->serie;
        // $nro_cotizacion->correlativo        = sprintf("%03d", $correlativo->correlativo);
        // $nro_cotizacion->year               = Carbon::now()->format('Y');
        $nro_cotizacion = $correlativo->serie . '-' . sprintf("%03d", $correlativo->correlativo) . '-' . Carbon::now()->format('Y');

        if ($increment) {
            $correlativo->correlativo++;
            $correlativo->save();

            return $nro_cotizacion; //Guarda el siguiente correlativo
        }

        return json_encode($nro_cotizacion);//muestra el siguiente correlativo
    }

    public function createCotizacion(CotizacionRequest $request){
        $idcotizaciones             = $request->input('idcotizaciones');
        $nombre_cotizacion             = $request->input('nombre_cotizacion');
        $ruta_cotizacion            = $request->file('ruta_cotizacion');
        $archivo                    = $_FILES["ruta_cotizacion"];
        //$nombre_archivo             = $ruta_cotizacion->getClientOriginalName(); //obtenemos el nombre del archivo

        //move_uploaded_file($archivo["tmp_name"], "storage/uploads/".$archivo["name"]   );

        $cotizacion = CotizacionesModel::create([
            'nombre' => ComercializacionController::generar_correlativo($increment = true),//llamamos a la funcion para generar su correlativo
            'ruta' => $ruta_cotizacion
        ]);

        return json_encode(['status' => true, 'message' => 'Éxito se registro la cotizacion', 'id' => $cotizacion->idcotizaciones]);
    }

    public function activar($idcomercializacion){
        $registro = ComercializacionModel::where('idcomercializacion', $idcomercializacion)->first();
        $registro->estado = 0;
        $registro->save();
        return json_encode(['status' => true, 'message' => 'Se ah activado el registro']);
    }

    public function desactivar($idcomercializacion){
        $registro = ComercializacionModel::where('idcomercializacion', $idcomercializacion)->first();
        $registro->estado = 1;
        $registro->save();
        return json_encode(['status' => true, 'message' => 'Se ah desactivado el registro']);
    }

    public function mostrar_one_comercializacion($idcomercializacion){//Para editar
        $det_registro = ComercializacionModel::where('idcomercializacion', $idcomercializacion)->first();
        $det_modulo = ModuloComercializacionModel::with('modulo')->where('idcomercializacion', '=', $idcomercializacion)
                                                ->where('estado', '=', 0)
                                                ->orderBy('created_at', 'DESC')
                                                ->get();
        $cotizacion = CotizacionComercializacionModel::with('ModeloCotizacion')->where('idcomercializacion', $idcomercializacion)->first();
        $cant_modulos = \count($det_modulo);
        return json_encode(['registro' => $det_registro,'modulo'=> $det_modulo, 'cant_modulos'=>$cant_modulos, 'mod_cotizacion'=>$cotizacion]);
        //return json_encode(['modulo'=> $det_modulo]);
    }

    public function detalle_registro($idcomercializacion){
        $det_registro = ComercializacionModel::with('ModeloCliente.ModeloEtiqueta', 'medio', 'evento', 'personal')->where('idcomercializacion', $idcomercializacion)->first();
        $det_modulo = ModuloComercializacionModel::with('modulo')->where('idcomercializacion', $idcomercializacion)->where('estado', '=', 0)->get();
        $cotizacion = CotizacionComercializacionModel::with('ModeloCotizacion')->where('idcomercializacion', $idcomercializacion)->first();
        $cant_modulos = \count($det_modulo);

        // return json_encode($cotizacion);
        return view('comercializacion.modal_detalle_comercializacion', compact('det_registro','det_modulo','cant_modulos', 'cotizacion') );
    }

    public function ultimo_cliente(){
        $ultimo = ClientesModel::get()->last();
        return json_encode(['ultimo' => $ultimo]);
    }

    public function ver_one_documento($idcomercializacion){//Lista de comercializacion de un cliente/iteresado
        $one_documento = ComercializacionModel::with('ModeloCotizacionComercializaciones.ModeloCotizacion','ModeloCliente')
                                            ->where('idcomercializacion', $idcomercializacion)
                                            ->first();
        // return json_encode($one_documento);
        return view('componentes.comercializacion.docs_cotizacion', compact('one_documento'));
    }

}
