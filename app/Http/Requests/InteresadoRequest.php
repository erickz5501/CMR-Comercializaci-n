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
    public function rules(){
        return [
            'number_empresa_input' => 'max:9|min:9|required'
        ];
    }

    public function messages(){
        return[
            'number_empresa_input.required' => 'Este campo es requerido',
            'number_empresa_input.min' => 'Solo 9 digitos',
            'number_empresa_input.max' => 'Solo 9 digitos'
        ];
    }

}
