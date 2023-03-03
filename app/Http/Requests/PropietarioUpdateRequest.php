<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropietarioUpdateRequest extends FormRequest
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
            'cedula' => 'required|unique:propietarios,cedula,' . $this->id,
            'nombre' => 'required',
            'apellido' => 'required',
            'fecha_nac' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'cedula.required|unique:propietarios,cedula,' . $this->id => ' :attribute obligatorio.',
            'nombre.required' => ' :attribute obligatorio.',
            'apellido.required' => ' :attribute obligatorio.',
            'fecha_nac.required' => ' :attribute obligatorio.',

        ];
    }
}
