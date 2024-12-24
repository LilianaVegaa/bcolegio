<?php

namespace App\Http\Requests\Perfil;

use Illuminate\Foundation\Http\FormRequest;

class PerfilRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'descripcion' => 'required|min:3|max:60|unique:perfiles,descripcion',
            'action_list' => 'required|array|min:1',
        ];

        if($this->method() == 'PATCH' || $this->method() == 'PUT') {
            $rules['descripcion'] .= ',' . $this->id;
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'descripcion' => 'descripción',
        ];
    }
}
