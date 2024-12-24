<?php

namespace App\Http\Controllers;

use App\Perfil;
use Illuminate\Http\Request;
use App\Http\Requests\PerfilRequest;
use App\Filters\PerfilSearch\PerfilSearch;
use App\Http\Resources\Perfil\PerfilCollection;
use App\Http\Resources\Perfil\PerfilResource;
use Illuminate\Support\Facades\DB;

class PerfilController extends ApiController
{
    private $perfil;

    public function __construct(Perfil $perfil)
    {
        $this->perfil = $perfil;
    }

    public function index(Request $request)
    {
        if ($request->filled('filter.filters')) {
            return new PerfilCollection(PerfilSearch::apply($request, $this->perfil));
        }

        $perfiles = PerfilSearch::checkSortFilter($request, $this->perfil->newQuery());

        return new PerfilCollection($perfiles->paginate($request->take));
    }

    public function show(Perfil $perfil)
    {
        return new PerfilResource($perfil);
    }

    public function store(PerfilRequest $request)
    {
        DB::beginTransaction();
        try {
            $perfil = $this->perfil->create($request->all());
            $this->syncActions($perfil, $request->input('action_list'));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $this->respondInternalError();
        }
        return $this->respondCreated();
    }

    public function update(PerfilRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $perfil = $this->perfil->find($id);
            $perfil->update($request->all());
            $this->syncActions($perfil, $request->input('action_list'));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $this->respondInternalError();
        }
        return $this->respondUpdated();
    }

    public function destroy(Request $request)
    {
        try {
            $data = [];
            $perfiles = $this->perfil->find($request->perfiles);
            foreach ($perfiles as $perfil) {
                $model = $perfil->secureDelete();
                if ($model) {
                    $data[] = $perfil->setAppends([]);
                }
            }
        } catch (Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondDeleted($data);
    }

    public function listing()
    {
        $perfiles = $this->perfil->listPerfiles();
        return $this->respond($perfiles);
    }

    private function syncActions(Perfil $perfil, array $actions)
    {
        $perfil->permisos()->sync($actions);
    }
}
