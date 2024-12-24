<?php

namespace App\Http\Resources\Materia;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Carbon\Carbon;

class MateriaCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($materia){
                return [
                    'id' => $materia->id,
                    'nombre' => $materia->nombre,
                    'descripcion' => $materia->descripcion ? $materia->descripcion : 'N/A',
                    'registrado' => Carbon::parse($materia->created_at)->format('d/m/Y'),
                    'actualizado' => Carbon::parse($materia->updated_at)->format('d/m/Y'),
                ];
            }),
        ];
    }
}
