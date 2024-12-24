<?php

namespace App\Http\Requests\Estudiante;

use Illuminate\Foundation\Http\FormRequest;

class EstudianteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'nombres' => 'required|max:128',
            'apellidos' => 'required|max:128',
            'telefono' => 'nullable|max:32',
            'ci' => 'nullable|max:16',
            'padre_id' => 'required|integer'
        ];

        if($this->method() == 'PATCH' || $this->method() == 'PUT') {
            $rules['ci'] .= ',' . $this->id;
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'padre_id' => 'tutor',
        ];
    }
}
