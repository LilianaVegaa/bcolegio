<?php

namespace App\Http\Resources\Trimestre;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Carbon\Carbon;

class TrimestreCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($trimestre){
                return [
                    'id' => $trimestre->id,
                    'nombre' => $trimestre->nombre,
                    'gestion' => $trimestre->gestion->año,
                    'registrado' => Carbon::parse($trimestre->created_at)->format('d/m/Y'),
                    'actualizado' => Carbon::parse($trimestre->updated_at)->format('d/m/Y'),
                ];
            }),
        ];
    }
}
