<?php

namespace App\Http\Resources\CursoMateria;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CursoMateriaEvaluacionCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($asistencia){
                return [
                    'id' => $asistencia->id,
                    'curso' => $asistencia->curso->nombre,
                    'curso_id' => $asistencia->curso_id,
                    'gestion' => $asistencia->gestion->año,
                    'gestion_id' => $asistencia->gestion_id,
                    'profesor' => $asistencia->profesor->fullname,
                    'total_estudiantes' => $asistencia->cantidadEstudiantes(),
                ];
            }),
        ];
    }
}
