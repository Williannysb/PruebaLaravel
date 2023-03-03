<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModeloStoreRequest extends FormRequest
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
            'nombre' => 'required',
            'descripcion' => 'required',
            'id_marca' => 'required',
        ];
    }
    public function messages()
    {
        return [

            'nombre.required' => ' :attribute obligatorio.',
            'descripcion.required' => ' :attribute obligatorio.',
            'id_marca.required' => ' :attribute obligatorio.',

        ];
    }
}
