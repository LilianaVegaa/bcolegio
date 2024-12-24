<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CursoMateria;
use App\EstudianteCurso;
use App\Curso;
use App\Gestion;
use App\Estudiante;
use Illuminate\Support\Facades\DB;
use App\Filters\CursoMateriaSearch\CursoMateriaSearch;
use App\Http\Resources\CursoMateria\CursoMateriaCollection;
use App\Http\Resources\CursoMateria\CursoMateriaEditCollection;
use App\Http\Resources\CursoMateria\CursoMateriaAsistenciaCollection;
use App\Http\Resources\CursoMateria\CursoMateriaEvaluacionCollection;

class CursoMateriaController extends ApiController
{
    private $asignacion;

    public function __construct(CursoMateria $asignacion)
    {
        $this->asignacion = $asignacion;
    }

    public function index(Request $request)
    {
        if ($request->filled('filter.filters')) {
            return new CursoMateriaCollection(CursoMateriaSearch::apply($request, $this->asignacion));
        }

        $asignaciones = CursoMateriaSearch::checkSortFilter($request, $this->asignacion->newQuery());

        return new CursoMateriaCollection($asignaciones->paginate($request->take));
    }

    public function asistencias(Request $request)
    {
        if ($request->filled('filter.filters')) {
            return new CursoMateriaAsistenciaCollection(CursoMateriaSearch::apply($request, $this->asignacion));
        }

        $asignaciones = CursoMateriaSearch::checkSortFilter($request, $this->asignacion->newQuery());

        return new CursoMateriaAsistenciaCollection($asignaciones->paginate($request->take));
    }

    public function evaluaciones(Request $request)
    {
        if ($request->filled('filter.filters')) {
            return new CursoMateriaEvaluacionCollection(CursoMateriaSearch::apply($request, $this->asignacion));
        }

        $asignaciones = CursoMateriaSearch::checkSortFilter($request, $this->asignacion->newQuery());

        return new CursoMateriaEvaluacionCollection($asignaciones->paginate($request->take));
    }

    public function detalle(Request $request)
    {
        $curso = Curso::find($request->id);
        $gestion = Gestion::find($request->gestion);
        $estudiantes = EstudianteCurso::estudiantesPorGestionYCursos($request->gestion, $request->id);
        $rol = auth()->user()->tipo_usuario;
        if ($rol === 'App\Profesor') {
            $materias = CursoMateria::materiasPorGestionYProfesor($gestion->id, $curso->id, auth()->user()->rol->id);
        } else {
            $materias = CursoMateria::materiasPorGestionYProfesor($gestion->id, $curso->id);
        }

        return $this->respond(['curso' => $curso, 'gestion' => $gestion, 'estudiantes' => $estudiantes, 'materias' => $materias]);
    }

    public function show(Request $request)
    {
        $asignaciones = $this->asignacion->where('gestion_id', $request->gestion_id)->get();

        return new CursoMateriaEditCollection($asignaciones);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $gestionId = null;

            $data = $request->validate([
                '*.curso_id' => 'required|exists:cursos,id',
                '*.gestion_id' => 'required',
                '*.materias' => 'array',
                '*.materias.*.materia_id' => 'required|exists:materias,id',
                '*.materias.*.profesor_id' => 'required|exists:profesores,id',
                '*.estudiantes' => 'array',
                '*.estudiantes.*' => 'required|exists:estudiantes,id',
            ]);

            foreach ($data as $cursoData) {
                $cursoId = $cursoData['curso_id'];
                $gestionId = $cursoData['gestion_id'];
                $estudiantesEnviados = $cursoData['estudiantes'] ?? [];

                // MATERIAS - Eliminar y actualizar registros
                $materiasActuales = $this->asignacion->where('curso_id', $cursoId)
                    ->where('gestion_id', $gestionId)
                    ->pluck('materia_id')->toArray();

                $materiasEnviadas = collect($cursoData['materias'])->pluck('materia_id')->toArray();
                $materiasAEliminar = array_diff($materiasActuales, $materiasEnviadas);

                $this->asignacion->where('curso_id', $cursoId)
                    ->where('gestion_id', $gestionId)
                    ->whereIn('materia_id', $materiasAEliminar)
                    ->delete();

                foreach ($cursoData['materias'] as $materiaData) {
                    $registro = $this->asignacion->firstOrNew([
                        'curso_id' => $cursoId,
                        'materia_id' => $materiaData['materia_id'],
                        'gestion_id' => $gestionId,
                    ]);
                    $registro->profesor_id = $materiaData['profesor_id'];
                    $registro->save();
                }

                // ESTUDIANTES - Eliminar y actualizar registros
                $estudiantesActuales = EstudianteCurso::where('curso_id', $cursoId)
                    ->where('gestion_id', $gestionId)
                    ->pluck('estudiante_id')->toArray();

                $estudiantesAEliminar = array_diff($estudiantesActuales, $estudiantesEnviados);

                // Eliminar registros y actualizar estado a 0 para estudiantes eliminados
                if (!empty($estudiantesAEliminar)) {
                    EstudianteCurso::where('curso_id', $cursoId)
                        ->where('gestion_id', $gestionId)
                        ->whereIn('estudiante_id', $estudiantesAEliminar)
                        ->delete();

                    Estudiante::whereIn('id', $estudiantesAEliminar)
                        ->whereDoesntHave('cursos', function ($query) {
                            $query->whereNull('estudiante_curso.deleted_at');
                        })->update(['estado' => 0]);
                }

                // Crear o actualizar registros para estudiantes enviados
                foreach ($estudiantesEnviados as $estudianteId) {
                    EstudianteCurso::updateOrCreate(
                        [
                            'curso_id' => $cursoId,
                            'gestion_id' => $gestionId,
                            'estudiante_id' => $estudianteId,
                        ],
                        [
                            'fecha_registro' => now(),
                        ]
                    );

                    // Actualizar estado a 1 para estudiantes enviados
                    Estudiante::where('id', $estudianteId)->update(['estado' => 1]);
                }
            }

            // Actualizar el estado de la gestión
            Gestion::where('id', $gestionId)->update(['estado' => 1]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->respondInternalError($e->getMessage());
        }

        return $this->respondCreated();
    }
}

