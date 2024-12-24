<?php

namespace App\Http\Resources\Curso;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Carbon\Carbon;

class CursoCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($curso){
                return [
                    'id' => $curso->id,
                    'nombre' => $curso->nombre,
                    'descripcion' => $curso->descripcion ? $curso->descripcion : 'N/A',
                    'registrado' => Carbon::parse($curso->created_at)->format('d/m/Y'),
                    'actualizado' => Carbon::parse($curso->updated_at)->format('d/m/Y'),
                ];
            }),
        ];
    }
}
