<?php

namespace App\Http\Resources\Profesor;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfesorResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'ci' => $this->ci,
            'usuario_id' => $this->usuario_id,
        ];
    }
}
