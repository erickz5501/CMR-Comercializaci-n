<?php

namespace App\Http\Controllers\historial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HistorialModel;
use App\Models\historial\ModulosModel;
use App\Models\historial\MediosModel;
use App\Models\historial\EventosModel;
use App\Models\historial\PersonalModel;
use App\Http\Requests\HistorialRequest;

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

    public function indexModulos(){
        $modulos = ModulosModel::select('idmodulos as id', 'nombre')->get();

        return json_encode($modulos);
    }
    public function indexMedios(){
        $medios = MediosModel::select('idmedios as id', 'nombre')->get();

        return json_encode($medios);
    }

    public function indexEventos(){
        $eventos = EventosModel::select('ideventos as id', 'nombre')->get();

        return json_encode($eventos);
    }

    public function indexPersonal(){
        $personal = PersonalModel::select('idpersonal as id', 'nombre')->get();

        return json_encode($personal);
    }

    public function det_Registro($idregistro)
    {
        $det_registro = HistorialModel::where('idhistorial_comercializacion', $idregistro)->first();
        return view('componentes.historial.modal_detalle_historial', compact('det_registro'));
        //return json_encode($det_registro);
    }

    public function det_registro_one($idregistro){
        $det_registro = HistorialModel::where('idhistorial_comercializacion', $idregistro)->first();
        return json_encode(['registro' => $det_registro]);
    }

    public function createHistorial(HistorialRequest $request)
    {
        $idhistorial_comercializacion       = $request->input('idhistorial_comercializacion');
        $idcotizacion                       = $request->input('idcotizacion');
        $persona_contacto_input             = $request->input('persona_contacto_input');
        $select_modal_modulos               = $request->input('select_modal_modulos');
        $select_modal_medios                = $request->input('select_modal_medios');
        $llamadaDetTextarea                 = $request->input('llamadaDetTextarea');
        $select_modal_eventos               = $request->input('select_modal_eventos');
        $example_date_input                 = $request->input('example_date_input');
        $eventoTextarea                     = $request->input('eventoTextarea');
        $select_modal_personal              = $request->input('select_modal_personal');
        $calificacionSelect                 = $request->input('calificacionSelect');
        $solucionInput                      = $request->input('solucionInput');
        $observacionesTextarea              = $request->input('observacionesTextarea');
        $conclusionesTextarea               = $request->input('conclusionesTextarea');
        //$user                               = 2;
        if ($idhistorial_comercializacion != "") {
            $registro = HistorialModel::find($idhistorial_comercializacion);
            //dd($registro);

            try {
                $registro->persona_contacto = $persona_contacto_input;
                $registro->idmodulos = $select_modal_modulos;
                $registro->idmedios = $select_modal_medios;
                $registro->detalle_llamada = $llamadaDetTextarea;
                $registro->ideventos = $select_modal_eventos;
                $registro->fecha_evento = $example_date_input;
                $registro->descripcion_evento = $eventoTextarea;
                $registro->idpersonal = $select_modal_personal;
                $registro->calificacion_encuesta = $calificacionSelect;
                $registro->solucion_temporal = $solucionInput;
                $registro->idcotizacion = $idcotizacion;
                $registro->observaciones = $observacionesTextarea;
                $registro->conclusiones = $conclusionesTextarea;

                $registro->save();
            }
            catch(Exception $e){
                return json_encode($e->getMessage());
            }
                  
            return json_encode(['status' => true, 'message' => 'Éxito se registro el cliente']);
            //-----------//
            
        } else {
            $registro = HistorialModel::create(
                ['persona_contacto' => $persona_contacto_input,
                'idmodulos' => $select_modal_modulos,
                'idmedios ' => $select_modal_medios,
                //'users_id ' => $user,
                'detalle_llamada' => $llamadaDetTextarea,
                'ideventos' => $select_modal_eventos,
                'fecha_evento' => $example_date_input,
                'descripcion_evento' => $eventoTextarea,
                'idpersonal' => $select_modal_personal,
                'calificacion_encuesta' => $calificacionSelect,
                'solucion_temporal' => $solucionInput,
                'idcotizacion' => $idcotizacion,
                'observaciones' => $observacionesTextarea,
                'conclusiones' => $conclusionesTextarea]);
            //dd($persona_contacto_input);
            return json_encode(['status' => true, 'message' => 'Éxito se registro su registro']);
        }
        
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

}
