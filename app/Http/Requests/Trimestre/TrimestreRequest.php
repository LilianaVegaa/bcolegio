<?php

namespace App\Http\Requests\Trimestre;

use Illuminate\Foundation\Http\FormRequest;

class TrimestreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'nombre' => 'required|max:128',
            'pruebas' => 'required',
            'gestion_id' => 'required|integer'
        ];

        return $rules;
    }

    public function attributes()
    {
        return [
            'pruebas' => 'evaluaciones',
            'gestion_id' => 'gestión',
        ];
    }
}
