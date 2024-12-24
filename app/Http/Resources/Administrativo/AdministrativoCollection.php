<?php

namespace App\Http\Resources\Administrativo;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AdministrativoCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($administrativo){
                return [
                    'id' => $administrativo->id,
                    'nombres' => $administrativo->nombres,
                    'apellidos' => $administrativo->apellidos,
                    'telefono' => $administrativo->telefono,
                    'direccion' => $administrativo->direccion,
                    'ci' => $administrativo->ci,
                    'usuario_id' => $administrativo->usuario_id,
                ];
            }),
        ];
    }
}
