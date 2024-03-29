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
            'number_empresa_input' => 'max:9',
            'InputCorreo1' => 'max:45',
            'select_modal_giro_negocio' => 'required|min:1',

            'InputCorreo2' => 'max:45',
            'InputCorreo3' => 'max:45',

            'select_modal_tamano_empresa' => 'max:20',
            'select_modal_a_que_dedicas'  => 'max:50',
            'select_modal_grado_interes'  => 'max:50',
            'select_modal_provincia'      => 'max:70',
        ];
    }

    public function messages(){
        return[
            'select_modal_tipo_doc.required' => 'Asegurese de selecionar el tipo de documento.',
            'nro_documento.required' => 'Asegurese de escribir un numero de Documento.',
            'nombre_comercial_input.required' => 'El campo Apellido es requerido',
            'nombre_razon_social_input.required' => 'El campo Nombre es requerido.',
            'number_empresa_input.max' => 'Numero de telefono invalido.',
            'select_modal_giro_negocio.required' => 'Selecione un giro de negocio'
        ];
    }

}
