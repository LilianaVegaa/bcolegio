<?php

namespace App\Http\Requests\Tutor;

use Illuminate\Foundation\Http\FormRequest;

class TutorRequest extends FormRequest
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
            'telefono' => 'required|max:32',
            'direccion' => 'required|max:256',
            'ci' => 'required|max:16|unique:padres,ci',
        ];

        if($this->method() == 'PATCH' || $this->method() == 'PUT') {
            $rules['ci'] .= ',' . $this->id;
        }

        return $rules;
    }
}
