<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CotizacionComercializacionRequest extends FormRequest
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
            'nombre_cotiza' => 'required|min:4|max:100',
            'ruta_cotiza' => 'max:100000',
        ];
    }

    public function messages()
    {
        return [
            'nombre_cotiza.required' => 'Asegurese de escribir el nombre.',
            'ruta_cotiza.max' => 'El documento no puede pesar mas de 100 Megabyte (mb)',
        ];
    }
}
