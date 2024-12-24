<?php

namespace App\Http\Resources\Perfil;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PerfilCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($perfil){
                return [
                    'id' => $perfil->id,
                    'descripcion' => $perfil->descripcion,
                    'created' => $perfil->created_at,
                    'updated' => $perfil->updated_at,
                ];
            }),
        ];
    }
}
