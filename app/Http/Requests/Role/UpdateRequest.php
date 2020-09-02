<?php

namespace App\Http\Requests\Role;

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
            'name'=> 'required|unique:roles,name,'.$this->route('role')->id. '|max:255',
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
