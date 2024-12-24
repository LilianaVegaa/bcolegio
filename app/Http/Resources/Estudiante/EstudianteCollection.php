<?php

namespace App\Http\Resources\Estudiante;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EstudianteCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($estudiante){
                return [
                    'id' => $estudiante->id,
                    'nombres' => $estudiante->nombres,
                    'apellidos' => $estudiante->apellidos,
                    'telefono' => $estudiante->telefono,
                    'ci' => $estudiante->ci,
                    'padre_id' => $estudiante->padre_id,
                ];
            }),
        ];
    }
}
