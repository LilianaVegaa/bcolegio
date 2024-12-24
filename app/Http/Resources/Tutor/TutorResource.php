<?php

namespace App\Http\Resources\Tutor;

use Illuminate\Http\Resources\Json\JsonResource;

class TutorResource extends JsonResource
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
