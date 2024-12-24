<?php

namespace App\Http\Controllers;

use App\Asistencia;
use App\EstudianteCurso;
use App\Materia;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AsistenciaController extends ApiController
{
    private $asistencia;

    public function __construct(Asistencia $asistencia)
    {
        $this->asistencia = $asistencia;
    }

    public function getAsistenciasByCurso(Request $request)
    {
        $cursoId = $request->input('curso_id');
        $materiaId = $request->input('materia_id');
        $anioSeleccionado = $request->input('gestion'); // Año seleccionado
        $mesSeleccionado = $request->input('mes'); // Número del mes (1-12)

        // Validar entrada
        if (!$cursoId || !$materiaId || !$mesSeleccionado || !$anioSeleccionado) {
            return response()->json(['error' => 'Faltan parámetros requeridos.'], 400);
        }

        // Obtener el nombre de la materia
        $materia = Materia::find($materiaId);
        if (!$materia) {
            return response()->json(['error' => 'La materia no existe.'], 404);
        }
        $nombreMateria = $materia->nombre;

        // Obtener estudiantes del curso
        $estudiantesCurso = EstudianteCurso::with('estudiante')
            ->where('curso_id', $cursoId)
            ->get();

        // Crear estructura inicial con días del mes
        $fechaInicio = Carbon::create($anioSeleccionado, $mesSeleccionado, 1);
        $fechaFin = $fechaInicio->copy()->endOfMonth();
        $diasDelMes = collect(range(1, $fechaFin->day))->mapWithKeys(function ($dia) use ($mesSeleccionado) {
            return ["day_$dia" => null];
        });

        // Obtener asistencias del mes para la materia
        $asistencias = Asistencia::whereIn('estudiante_curso_id', $estudiantesCurso->pluck('id'))
            ->where('materia_id', $materiaId)
            ->whereBetween('fecha', [$fechaInicio, $fechaFin])
            ->get();

        // Generar la estructura de respuesta
        $respuesta = [];

        foreach ($estudiantesCurso as $estudianteCurso) {
            $estudianteId = $estudianteCurso->id;

            $mesKey = "mes_$mesSeleccionado";
            $respuesta[$nombreMateria][$estudianteId][$mesKey] = $diasDelMes->toArray();

            // Filtrar asistencias correspondientes al estudiante actual
            $asistenciasEstudiante = $asistencias->where('estudiante_curso_id', $estudianteCurso->id);
            foreach ($asistenciasEstudiante as $asistencia) {
                $dia = Carbon::parse($asistencia->fecha)->day;
                $respuesta[$nombreMateria][$estudianteId][$mesKey]["day_$dia"] = $asistencia->estado;
            }
        }

        return response()->json($respuesta);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $year = 2024;
            $data = $request->all();

            foreach ($data as $materiaId => $estudiantes) {
                foreach ($estudiantes as $estudianteCursoId => $meses) {
                    foreach ($meses as $mes => $dias) {
                        // Extraemos el número del mes, por ejemplo, "mes_12" => 12
                        $mesNumero = intval(str_replace('mes_', '', $mes));

                        foreach ($dias as $diaClave => $estado) {
                            if ($estado !== null) {
                                // Extraemos el número del día, por ejemplo, "day_18" => 18
                                $diaNumero = intval(str_replace('day_', '', $diaClave));

                                // Construimos la fecha completa
                                $fecha = sprintf('%s-%02d-%02d', $year, $mesNumero, $diaNumero);

                                // Insertamos o actualizamos el registro
                                Asistencia::updateOrCreate(
                                    [
                                        'fecha' => $fecha,
                                        'estudiante_curso_id' => $estudianteCursoId,
                                        'materia_id' => $materiaId,
                                    ],
                                    [
                                        'estado' => $estado,
                                    ]
                                );
                            }
                        }
                    }
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->respondInternalError($e->getMessage());
        }

        return $this->respondCreated();
    }
}
