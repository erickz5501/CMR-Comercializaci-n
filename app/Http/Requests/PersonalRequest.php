<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalRequest extends FormRequest
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
            'nombre_personal' => 'required|min:3|max:120',
            'apellido_personal' => 'required|min:3|max:120',
            'avatar_personal' => 'max:100000',
        ];
    }

    public function messages()
    {
        return [
            'nombre_personal.required' => 'Asegurese de escribir el nombre.',
            'apellido_personal.required' => 'Asegurese de escribir el apellido',
            'avatar_personal' => 'La foto no puede pesar mas de 100 Megabyte (mb)'
        ];
    }

}
