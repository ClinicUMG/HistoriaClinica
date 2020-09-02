<?php

namespace App\Http\Requests\Role;

use App\Role;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //politicas para autorizacion en la base de datos
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    //validacion de los dos campos que se tiene en la tabla rol
    public function rules()
    {
        return [
            'name'=> 'required|unique:roles|max:255',
            'descripcion'=> 'required',
        ];
    }
    // campos requerido en el formulario
    public function messages()
    {
        return [
            'name.required' => 'El campo de nombre es requerido',
            'name.unique'=> 'El nombre ya esta ocupado',
            'descripcion.required'=> 'la descripcion es requerida',

        ];
    }
}
