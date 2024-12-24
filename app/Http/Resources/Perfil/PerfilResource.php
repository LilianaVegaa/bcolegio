<?php

namespace App\Http\Resources\Perfil;

use Illuminate\Http\Resources\Json\JsonResource;

class PerfilResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'descripcion' => $this->descripcion,
            'action_list' => $this->action_list,
            'created' => $this->created_at,
            'updated' => $this->updated_at,
        ];
    }
}
