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
            'dni_users' => 'max:12',
            'nombre_users' => 'required|min:3|max:250',
            'apellido_users' => 'required|min:3|max:250',
            'email_users' => 'required|min:4|max:100',
            'password' => 'required|confirmed|min:8|max:16',
            'password_confirmation' => 'required|min:8|max:16'
        ];
    }

    public function messages()
    {
        return [
            'nombre_users.required' => 'Asegurese de escribir el NOMBRE.',
            'apellido_users.required' => 'Asegurese de escribir el APELLIDOS.',
            'email_users.required' => 'Asegurese de escribir el nombre.',
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
