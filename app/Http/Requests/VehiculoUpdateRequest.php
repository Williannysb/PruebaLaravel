<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoUpdateRequest extends FormRequest
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
            'placa' => 'required|unique:vehiculos,placa,' . $this->id,
            'color' => 'required',
            'fecha_ingreso' => 'required|date',
            'id_modelo' => 'required',
            'id_propietario' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'placa.required|unique:vehiculos' => ' :attribute obligatorio.',
            'color.required' => ' :attribute obligatorio.',
            'fecha_ingreso.required|date' => ' :attribute obligatorio.',
            'id_modelo.required' => ' :attribute obligatorio.',
            'id_propietario.required' => ' :attribute obligatorio.',

        ];
    }
}
