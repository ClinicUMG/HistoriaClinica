<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'dob' => 'required',
            'email' => 'required|string|email|unique:users,email,' .$this->route('user')->id . '|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Este campo es requerido',
            'name.string' => 'El valor no es correcto',
            'name.max' => 'Sólo se permiten 255 caracteres',
            'dob.required' => 'Este campo es requerido',
            'email.required' => 'Este campo es requerido',
            'email.string' => 'El valor no es correcto',
            'email.max' => 'Sólo se permiten 255 caracteres',
            'email.unique' => 'Este email ya está registrado',
        ];
    }
}
