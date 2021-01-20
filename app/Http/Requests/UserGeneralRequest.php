<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserGeneralRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() //Acá pones las validaciones de los campos
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() //El mensaje que se vera al incumplir un validacion de un campo
    {
        return [
            //
        ];
    }
}
