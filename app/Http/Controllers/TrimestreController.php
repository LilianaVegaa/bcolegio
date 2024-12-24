<?php

namespace App\Http\Controllers;

use App\Trimestre;
use Illuminate\Http\Request;
use App\Http\Requests\Trimestre\TrimestreRequest;
use App\Filters\TrimestreSearch\TrimestreSearch;
use App\Http\Resources\Trimestre\TrimestreCollection;
use App\Http\Resources\Trimestre\TrimestreResource;

class TrimestreController extends ApiController
{
    private $trimestre;

    public function __construct(Trimestre $trimestre)
    {
        $this->trimestre = $trimestre;
    }

    public function index(Request $request)
    {
        if ($request->filled('filter.filters')) {
            return new TrimestreCollection(TrimestreSearch::apply($request, $this->trimestre));
        }

        $trimestres = TrimestreSearch::checkSortFilter($request, $this->trimestre->newQuery());

        return new TrimestreCollection($trimestres->paginate($request->take));
    }

    public function store(TrimestreRequest $request)
    {
        try {
            $trimestre = $this->trimestre->create($request->all());
        } catch (\Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondCreated($trimestre);
    }

    public function show(Trimestre $trimestre)
    {
        return new TrimestreResource($trimestre);
    }

    public function update(TrimestreRequest $request, Trimestre $trimestre)
    {
        try {
            $trimestre->update($request->all());
        } catch (\Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondUpdated();
    }

    public function destroy(Request $request)
    {
        try {
            $data = [];
            $trimestres = $this->trimestre->find($request->trimestres);
            foreach ($trimestres as $trimestre) {
                $model = $trimestre->secureDelete();
                if ($model) {
                    $data[] = $trimestre;
                }
            }
        } catch (Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondDeleted($data);
    }

    public function listing()
    {
        $trimestres = $this->trimestre->listTrimestres();
        return $this->respond($trimestres);
    }
}
