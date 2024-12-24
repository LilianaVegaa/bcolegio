<?php

namespace App\Http\Controllers;

use App\Materia;
use Illuminate\Http\Request;
use App\Http\Requests\Materia\MateriaRequest;
use App\Filters\MateriaSearch\MateriaSearch;
use App\Http\Resources\Materia\MateriaCollection;
use App\Http\Resources\Materia\MateriaResource;

class MateriaController extends ApiController
{
    private $materia;

    public function __construct(Materia $materia)
    {
        $this->materia = $materia;
    }

    public function index(Request $request)
    {
        if ($request->filled('filter.filters')) {
            return new MateriaCollection(MateriaSearch::apply($request, $this->materia));
        }

        $materias = MateriaSearch::checkSortFilter($request, $this->materia->newQuery());

        return new MateriaCollection($materias->paginate($request->take));
    }

    public function store(MateriaRequest $request)
    {
        try {
            $materia = $this->materia->create($request->all());
        } catch (\Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondCreated($materia);
    }

    public function show(Materia $materia)
    {
        return new MateriaResource($materia);
    }

    public function update(MateriaRequest $request, Materia $materia)
    {
        try {
            $materia->update($request->all());
        } catch (\Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondUpdated();
    }

    public function destroy(Request $request)
    {
        try {
            $data = [];
            $materias = $this->materia->find($request->materias);
            foreach ($materias as $materia) {
                $model = $materia->secureDelete();
                if ($model) {
                    $data[] = $materia;
                }
            }
        } catch (Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondDeleted($data);
    }

    public function listing()
    {
        $materias = $this->materia->listMaterias();
        return $this->respond($materias);
    }
}
