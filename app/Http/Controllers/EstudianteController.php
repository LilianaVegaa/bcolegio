<?php

namespace App\Http\Controllers;

use App\Estudiante;
use Illuminate\Http\Request;
use App\Http\Requests\Estudiante\EstudianteRequest;
use App\Filters\EstudianteSearch\EstudianteSearch;
use App\Http\Resources\Estudiante\EstudianteCollection;
use App\Http\Resources\Estudiante\EstudianteResource;

class EstudianteController extends ApiController
{
    private $estudiante;

    public function __construct(Estudiante $estudiante)
    {
        $this->estudiante = $estudiante;
    }

    public function index(Request $request)
    {
        if ($request->filled('filter.filters')) {
            return new EstudianteCollection(EstudianteSearch::apply($request, $this->estudiante));
        }

        $estudiantes = EstudianteSearch::checkSortFilter($request, $this->estudiante->newQuery());

        return new EstudianteCollection($estudiantes->paginate($request->take));
    }

    public function store(EstudianteRequest $request)
    {
        try {
            $estudiante = $this->estudiante->create($request->all());
        } catch (\Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondCreated($estudiante);
    }

    public function show(Estudiante $estudiante)
    {
        return new EstudianteResource($estudiante);
    }

    public function update(EstudianteRequest $request, Estudiante $estudiante)
    {
        try {
            $estudiante->update($request->all());
        } catch (\Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondUpdated();
    }

    public function destroy(Request $request)
    {
        try {
            $data = [];
            $estudiantes = $this->estudiante->find($request->estudiantes);
            foreach ($estudiantes as $estudiante) {
                $model = $estudiante->secureDelete();
                if ($model) {
                    $data[] = $estudiante;
                }
            }
        } catch (Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondDeleted($data);
    }

    public function listing()
    {
        $estudiantes = $this->estudiante->listEstudiantes();
        return $this->respond($estudiantes);
    }
}
