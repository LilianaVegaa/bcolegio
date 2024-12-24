<?php

namespace App\Http\Resources\Gestion;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Carbon\Carbon;

class GestionCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($gestion){
                return [
                    'id' => $gestion->id,
                    'año' => $gestion->año,
                    'fecha_inicio' => Carbon::parse($gestion->fecha_inicio)->format('d/m/Y'),
                    'fecha_fin' => Carbon::parse($gestion->fecha_fin)->format('d/m/Y'),
                    'registrado' => Carbon::parse($gestion->created_at)->format('d/m/Y'),
                    'actualizado' => Carbon::parse($gestion->updated_at)->format('d/m/Y'),
                ];
            }),
        ];
    }
}
