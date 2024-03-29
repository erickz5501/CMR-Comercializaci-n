<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModulosRequest extends FormRequest
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
            'nombre_input' => 'required|max:45',
        ];
    }

    public function messages()
    {
        return [
            'nombre_input.required' => 'Asegurese de escribir el nombre del MÓDULO',
        ];
    }
}
