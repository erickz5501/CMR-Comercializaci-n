<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventosRequest extends FormRequest
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
            'nombre_evento' => 'required|min:3|max:45',
        ];
    }

    public function messages()
    {
        return [
            'nombre_evento.required' => 'Asegurese de escribir el nombre del MÓDULO',
        ];
    }
}
