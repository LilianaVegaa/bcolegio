<?php

namespace App\Http\Requests\Materia;

use Illuminate\Foundation\Http\FormRequest;

class MateriaRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'nombre' => 'required|max:128',
            'descripcion' => 'nullable|max:128',
        ];

        return $rules;
    }

    public function attributes()
    {
        return [
            'descripcion' => 'descripción',
        ];
    }
}
