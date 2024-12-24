<?php

namespace App\Http\Controllers;

use App\Gestion;
use Illuminate\Http\Request;
use App\Http\Requests\Gestion\GestionRequest;
use App\Filters\GestionSearch\GestionSearch;
use App\Http\Resources\Gestion\GestionCollection;
use App\Http\Resources\Gestion\GestionResource;

class GestionController extends ApiController
{
    private $gestion;

    public function __construct(Gestion $gestion)
    {
        $this->gestion = $gestion;
    }

    public function index(Request $request)
    {
        if ($request->filled('filter.filters')) {
            return new GestionCollection(GestionSearch::apply($request, $this->gestion));
        }

        $gestiones = GestionSearch::checkSortFilter($request, $this->gestion->newQuery());

        return new GestionCollection($gestiones->paginate($request->take));
    }

    public function store(GestionRequest $request)
    {
        try {
            $gestion = $this->gestion->create($request->all());
        } catch (\Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondCreated($gestion);
    }

    public function show(Gestion $gestion)
    {
        return new GestionResource($gestion);
    }

    public function update(GestionRequest $request, Gestion $gestion)
    {
        try {
            $gestion->update($request->all());
        } catch (\Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondUpdated();
    }

    public function destroy(Request $request)
    {
        try {
            $data = [];
            $gestiones = $this->gestion->find($request->gestiones);
            foreach ($gestiones as $gestion) {
                $model = $gestion->secureDelete();
                if ($model) {
                    $data[] = $gestion;
                }
            }
        } catch (Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondDeleted($data);
    }

    public function listing()
    {
        $gestiones = $this->gestion->listGestiones();
        return $this->respond($gestiones);
    }

    public function listingGeneral()
    {
        $gestiones = $this->gestion->listGeneralGestiones();
        return $this->respond($gestiones);
    }
}
