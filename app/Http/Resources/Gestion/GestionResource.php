<?php

namespace App\Http\Resources\Gestion;

use Illuminate\Http\Resources\Json\JsonResource;

class GestionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'año' => $this->año,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
        ];
    }
}
