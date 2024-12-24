<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
         $rules = [
            'name' => 'nullable|min:3|max:64|unique:usuarios,name',
            'email' => 'nullable|max:128|unique:users,email',
            'nombres' => 'required|max:128',
            'apellidos' => 'required|max:32',
            'telefono' => 'required|max:256',
            'direccion' => 'required|max:16',
            'ci' => 'required|max:128',
        ];

        if($this->method() == 'POST') {
            $rules['password'] = 'required|min:5';
            $rules['password_confirmation'] = 'required|min:5|same:password';
            $rules['perfil_id'] = 'required|integer';
        }

        if($this->method() == 'PATCH' || $this->method() == 'PUT') {
            $rules['name'] .= ',' . $this->id;
        }

        return $rules;
    }
}
