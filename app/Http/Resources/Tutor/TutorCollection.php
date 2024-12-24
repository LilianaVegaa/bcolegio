<?php

namespace App\Http\Resources\Tutor;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TutorCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($tutor){
                return [
                    'id' => $tutor->id,
                    'nombres' => $tutor->nombres,
                    'apellidos' => $tutor->apellidos,
                    'telefono' => $tutor->telefono,
                    'direccion' => $tutor->direccion,
                    'ci' => $tutor->ci,
                    'usuario_id' => $tutor->usuario_id,
                ];
            }),
        ];
    }
}
