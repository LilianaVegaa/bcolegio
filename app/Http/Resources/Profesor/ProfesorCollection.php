<?php

namespace App\Http\Resources\Profesor;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProfesorCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($profesor){
                return [
                    'id' => $profesor->id,
                    'nombres' => $profesor->nombres,
                    'apellidos' => $profesor->apellidos,
                    'telefono' => $profesor->telefono,
                    'direccion' => $profesor->direccion,
                    'ci' => $profesor->ci,
                    'usuario_id' => $profesor->usuario_id,
                ];
            }),
        ];
    }
}
