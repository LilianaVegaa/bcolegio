<?php

namespace App\Http\Resources\CursoMateria;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CursoMateriaCollection extends ResourceCollection
{
    public function toArray($request)
    {
        // Agrupar los registros por gestión
        $agrupados = $this->collection->groupBy('gestion_id');

        return $agrupados->map(function ($items, $gestionId) {
            // Asumimos que todos los registros en el grupo tienen la misma gestión
            $primerItem = $items->first();

            // Agrupar los registros por curso dentro de la gestión
            $cursosAgrupados = $items->groupBy('curso_id')->map(function ($cursoItems) {
                $curso = $cursoItems->first()->curso;

                return [
                    'id' => $curso->id,
                    'nombre' => $curso->nombre,
                    'materias' => $cursoItems->map(function ($item) {
                        return [
                            'id' => $item->materia->id,
                            'nombre' => $item->materia->nombre,
                            'profesor' => $item->profesor->fullname,
                            'alumnos' => $item->curso->estudiantes->map(function ($estudiante) {
                                return [
                                    'id' => $estudiante->id,
                                    'nombre' => $estudiante->fullname,
                                ];
                            })->toArray(),
                        ];
                    })->toArray(),
                ];
            });

            // Calcular totales
            $totalCursosAsignados = $cursosAgrupados->count();
            $totalMateriasAsignadas = $items->unique('materia_id')->count();
            $totalAlumnosAsignados = $items->unique(function ($item) {
                return $item->curso->estudiantes->pluck('id')->toArray();
            })->reduce(function ($carry, $item) {
                return $carry + $item->curso->estudiantes->count();
            }, 0);

            return [
                'gestion_id' => $gestionId,
                'gestion' => $primerItem->gestion->año,
                'total_cursos_asignados' => $totalCursosAsignados,
                'total_materias_asignados' => $totalMateriasAsignadas,
                'total_alumnos_asignados' => $totalAlumnosAsignados,
                'fecha' => $primerItem->created_at->format('d/m/Y'),
                'cursos' => $cursosAgrupados->values()->toArray(),
            ];
        })->values()->toArray();
    }
}
