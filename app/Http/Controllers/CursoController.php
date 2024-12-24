<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;
use App\Http\Requests\Curso\CursoRequest;
use App\Filters\CursoSearch\CursoSearch;
use App\Http\Resources\Curso\CursoCollection;
use App\Http\Resources\Curso\CursoResource;

class CursoController extends ApiController
{
    private $curso;

    public function __construct(Curso $curso)
    {
        $this->curso = $curso;
    }

    public function index(Request $request)
    {
        if ($request->filled('filter.filters')) {
            return new CursoCollection(CursoSearch::apply($request, $this->curso));
        }

        $cursos = CursoSearch::checkSortFilter($request, $this->curso->newQuery());

        return new CursoCollection($cursos->paginate($request->take));
    }

    public function store(CursoRequest $request)
    {
        try {
            $curso = $this->curso->create($request->all());
        } catch (\Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondCreated($curso);
    }

    public function show(Curso $curso)
    {
        return new CursoResource($curso);
    }

    public function update(CursoRequest $request, Curso $curso)
    {
        try {
            $curso->update($request->all());
        } catch (\Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondUpdated();
    }

    public function destroy(Request $request)
    {
        try {
            $data = [];
            $cursos = $this->curso->find($request->cursos);
            foreach ($cursos as $curso) {
                $model = $curso->secureDelete();
                if ($model) {
                    $data[] = $curso;
                }
            }
        } catch (Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondDeleted($data);
    }

    public function listing()
    {
        $cursos = $this->curso->listCursos();
        return $this->respond($cursos);
    }
}
