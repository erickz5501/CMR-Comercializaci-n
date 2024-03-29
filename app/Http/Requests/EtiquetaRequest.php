<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtiquetaRequest extends FormRequest
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
            'nombre_etiqueta' => 'required|min:3|max:150',
        ];
    }

    public function messages()
    {
        return [
            'nombre_etiqueta.required' => 'Asegurese de escribir el nombre de la etiqueta',
        ];
    }
}
