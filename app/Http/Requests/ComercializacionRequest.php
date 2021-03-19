<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComercializacionRequest extends FormRequest
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
            'select_modal_clientes' => 'required|min:1',
            'persona_contacto_input' => 'max:150',
            'select_modal_medios' => 'required|min:1',

            'avance_input' => 'max:500',
        ];
    }

    public function messages()
    {
        return [
            'select_modal_clientes.required' => 'Asegurese de selecionar el campo Cliente.',
            'select_modal_medios.required' => 'Asegurese de selecionar el campo Medios.',
        ];
    }
}
