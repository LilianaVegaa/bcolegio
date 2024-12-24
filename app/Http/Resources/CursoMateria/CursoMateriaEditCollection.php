<?php

namespace App\Http\Resources\CursoMateria;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CursoMateriaEditCollection extends ResourceCollection
{
    public function toArray($request)
    {
        $cursosAgrupados = $this->collection->groupBy('curso_id');

        return $cursosAgrupados->map(function ($items) {
            $curso = $items->first()->curso;

            return [
                'id' => $curso->id,
                'nombre' => $curso->nombre,
                'selected' => true,
                'assignments' => $items->map(function ($item) {
                    return [
                        'materia' => $item->materia->id,
                        'profesor' => $item->profesor->id,
                    ];
                })->toArray(),
                'students' => $curso->estudiantes->pluck('id')->toArray(),
            ];
        })->values()->toArray();
    }
}
