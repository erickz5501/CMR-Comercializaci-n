<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'select_modal_personal' => 'required|min:1',
            'email'                 => "min:2|max:45|required|unique:users,email,". $this->id .",id",
            'password' => 'required|confirmed|min:8|max:16',
            'password_confirmation' => 'required|min:8|max:16'
        ];
    }

    public function messages()
    {
        return [
            'select_modal_personal.required'    => 'Asegurese de selecionar un personal.',
            'email.required'              => 'Asegurese de escribir un correo.',
            'email.min'                         => 'El campo correo electronico debe ser un correo valido.',
            'email.max'                         => 'El campo correo electronico debe tener menos de 45 caracteres.',
            'password.required'                 => 'El campo clave no debe estar vacio.',
            'password.min'                      => 'El campo clave debe tener al menos 8 caracteres.',
            'password.max'                      => 'El campo clave debe tener menos de 16 caracteres.',
            'password.confirmed'                => 'El campo clave y confirmar clave no coinciden.',
            'password_confirmation.required'    => 'El campo clave no debe estar vacio.',
            'password_confirmation.min'         => 'El campo clave debe tener al menos 8 caracteres.',
            'password_confirmation.max'         => 'El campo clave debe tener menos de 16 caracteres.'
        ];
    }

}
