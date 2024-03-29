<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActividadRequest extends FormRequest
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
            'nombre_actividad' => 'required|min:3|max:45',
        ];
    }

    public function messages()
    {
        return [
            'nombre_actividad.required' => 'Asegúrese de escribir el campo nombre',
            'nombre_actividad.min' => 'min',
            'nombre_actividad.max' => 'max',
        ];
    }
}
