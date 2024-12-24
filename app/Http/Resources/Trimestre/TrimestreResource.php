<?php

namespace App\Http\Resources\Trimestre;

use Illuminate\Http\Resources\Json\JsonResource;

class TrimestreResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'pruebas' => $this->pruebas,
            'gestion_id' => $this->gestion_id,
        ];
    }
}
