<?php

namespace App\Http\Resources\Estudiante;

use Illuminate\Http\Resources\Json\JsonResource;

class EstudianteResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'telefono' => $this->telefono,
            'ci' => $this->ci,
            'padre_id' => $this->padre_id,
        ];
    }
}
