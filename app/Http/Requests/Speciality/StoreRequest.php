<?php

namespace App\Http\Requests\Speciality;

use Illuminate\Foundation\Http\FormRequest;
use App\Speciality;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', Speciality::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:specialities|max:255',
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'El nombre es requerido',
            'name.uniqued' => 'El nombre ya esta en uso',
        ];
    }
}
