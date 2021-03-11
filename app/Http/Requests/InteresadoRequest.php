<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InteresadoRequest extends FormRequest
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
    public function rules(){//estas son las validaciones
        return [
            'nombre_razon_social_input' => 'required',
            'nombre_comercial_input' => 'required',
            'number_empresa_input' => 'max:9|min:9|required',
            'InputCorreo1' => 'email|max:45',
            'select_modal_giro_negocio' => 'required|min:1',
        ];
    }

    public function messages(){
        return[
            'nombre_comercial_input.required' => 'El campo Apellido es requerido',
            'nombre_razon_social_input.required' => 'El campo Nombre es requerido.',
            'number_empresa_input.required' => 'El campo telefono es requerido.',
            'number_empresa_input.min' => 'Numero de telefono invalido.',
            'number_empresa_input.max' => 'Numero de telefono invalido.',
            'select_modal_giro_negocio.required' => 'Selecione un giro de negocio'
        ];
    }

}
