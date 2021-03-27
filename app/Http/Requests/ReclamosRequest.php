<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReclamosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'reclamo_procede'       => 'max:2',
            'select_modal_clientes' => 'required|min:1',
            'persona_contacto'      => 'required|min:4|max:450',
            'select_modal_medios'   => 'required|min:1|max:120',
            'select_modal_modulos'  => 'required|min:1|max:120',
            'descripcion_reclamo'   => 'required|min:4',

            'tipo_solucion'         => 'required_if:reclamo_procede,==,on',
            'select_modal_personal' => 'required_if:reclamo_procede,==,on',
            'causa'                 => 'required_if:reclamo_procede,==,on',
            'accion_tomar'          => 'required_if:reclamo_procede,==,on',
            'fecha_solucion'        => 'required_if:reclamo_procede,==,on',
            'solucion_minutos'      => 'required_if:reclamo_procede,==,on',
            'solucion_dias'         => 'required_if:reclamo_procede,==,on',
        ];
    }

    public function messages()
    {
        return [
            'select_modal_clientes.required'=> 'Asegurese de selecionar un cliente',
            'persona_contacto.required'     => 'Asegurese de escribir una persona de contacto',
            'select_modal_medios.required'  => 'Asegurese de selecionar un medio de contacto',
            'select_modal_modulos.required' => 'Asegurese de selecionar un módulo',
            'descripcion_reclamo.required'  => 'Asegurese de escribir una descripcion del reclamo.',

            'tipo_solucion.required_if'     => 'Asegurese de escribir un tipo de solución.',
            'select_modal_personal.required_if'=> 'Asegurese de selecionar un personal.',
            'causa.required_if'             => 'Asegurese de escribir una causa.',
            'accion_tomar.required_if'      => 'Asegurese de escribir una acción a tomar.',
            'fecha_solucion.required_if'    => 'Asegurese de selecionar una fecha de solucion.',
            'solucion_minutos.required_if'  => 'El campo solucion minutos es requerido',
            'solucion_dias.required_if'     => 'El campo solucion dias es requerido',
        ];
    }
}
