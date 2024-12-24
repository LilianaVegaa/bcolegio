<?php

namespace App\Http\Requests\Gestion;

use Illuminate\Foundation\Http\FormRequest;

class GestionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'año' => 'required|max:128|unique:gestiones,año',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
        ];

        if($this->method() == 'PATCH' || $this->method() == 'PUT') {
            $rules['año'] .= ',' . $this->id;
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'fecha_inicio' => 'fecha inicio',
            'fecha_fin' => 'fecha fin',
        ];
    }
}
