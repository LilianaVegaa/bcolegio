<?php

namespace App\Http\Controllers;

use App\Evaluacion;
use App\Trimestre;
use App\EstudianteCurso;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EvaluacionController extends ApiController
{
    private $evaluacion;

    public function __construct(Evaluacion $evaluacion)
    {
        $this->evaluacion = $evaluacion;
    }

    public function getEvaluacionesByCurso(Request $request)
    {
        $validated = $request->validate([
            'curso_id' => 'required|integer',
            'materia_id' => 'required|integer',
            'gestion' => 'required|integer',
        ]);

        $cursoId = $validated['curso_id'];
        $materiaId = $validated['materia_id'];
        $gestionId = $validated['gestion'];

        $trimestres = Trimestre::where('gestion_id', $gestionId)->get();

        $estudiantesCurso = EstudianteCurso::where('curso_id', $cursoId)
            ->where('gestion_id', $gestionId)
            ->get();

        $estructura = [];

        $periodosOrdenados = $trimestres->pluck('id')->toArray();

        foreach ($estudiantesCurso as $estudianteCurso) {
            if (!isset($estructura[$materiaId])) {
                $estructura[$materiaId] = [];
            }

            if (!isset($estructura[$materiaId][$estudianteCurso->id])) {
                $estructura[$materiaId][$estudianteCurso->id] = [];
            }

            foreach ($periodosOrdenados as $index => $periodoId) {
                if (!isset($estructura[$materiaId][$estudianteCurso->id][$periodoId])) {
                    $estructura[$materiaId][$estudianteCurso->id][$periodoId] = [];
                }

                for ($i = 1; $i <= 3; $i++) {
                    $estructura[$materiaId][$estudianteCurso->id][$periodoId]["periodo_" . ($index + 1) . "_calificacion_" . $i] = null;
                }

                $evaluaciones = Evaluacion::where('estudiante_curso_id', $estudianteCurso->id)
                    ->where('materia_id', $materiaId)
                    ->where('trimestre_id', $periodoId)
                    ->get();

                foreach ($evaluaciones as $indexEvaluacion => $evaluacion) {
                    $estructura[$materiaId][$estudianteCurso->id][$periodoId]["periodo_" . ($index + 1) . "_calificacion_" . ($indexEvaluacion + 1)] = $evaluacion->calificacion;
                }
            }
        }

        return response()->json($estructura, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'evaluaciones' => 'required',
        ]);

        foreach ($validated['evaluaciones'] as $materiaId => $estudiantes) {
            foreach ($estudiantes as $estudianteCursoId => $periodos) {
                foreach ($periodos as $trimestreId => $calificaciones) {
                    Evaluacion::where('estudiante_curso_id', $estudianteCursoId)
                        ->where('materia_id', $materiaId)
                        ->where('trimestre_id', $trimestreId)
                        ->delete();

                    foreach ($calificaciones as $key => $calificacion) {
                        if ($calificacion !== null) {
                            preg_match('/periodo_(\d+)_calificacion_(\d+)/', $key, $matches);
                            $periodo = $matches[1]; // El número del período

                            Evaluacion::create([
                                'calificacion' => $calificacion,
                                'estudiante_curso_id' => $estudianteCursoId,
                                'materia_id' => $materiaId,
                                'trimestre_id' => $trimestreId,
                            ]);
                        }
                    }
                }
            }
        }

        return response()->json(['message' => 'Evaluaciones registradas correctamente'], 200);
    }
}
