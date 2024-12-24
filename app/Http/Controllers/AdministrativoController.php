<?php

namespace App\Http\Controllers;

use App\Administrativo;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\Administrativo\AdministrativoRequest;
use App\Filters\AdministrativoSearch\AdministrativoSearch;
use App\Http\Resources\Administrativo\AdministrativoCollection;
use App\Http\Resources\Administrativo\AdministrativoResource;

class AdministrativoController extends ApiController
{
    private $administrativo;

    public function __construct(Administrativo $administrativo)
    {
        $this->administrativo = $administrativo;
    }

    public function index(Request $request)
    {
        if ($request->filled('filter.filters')) {
            return new AdministrativoCollection(AdministrativoSearch::apply($request, $this->administrativo));
        }

        $administrativos = AdministrativoSearch::checkSortFilter($request, $this->administrativo->newQuery());

        return new AdministrativoCollection($administrativos->paginate($request->take));
    }

    public function store(AdministrativoRequest $request)
    {
        try {
            $usuario = User::create([
                "nombre" => $request->ci,
                "contraseña" => $request->ci,
                "perfil_id" => 4,
                "tipo_usuario" => 'App\Administrativo',
            ]);

            $administrativo = $this->administrativo->create([
                "nombres" => $request->nombres,
                "apellidos" => $request->apellidos,
                "telefono" => $request->telefono,
                "direccion" => $request->direccion,
                "ci" => $request->ci,
                "usuario_id" => $usuario->id
            ]);
        } catch (\Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondCreated($administrativo);
    }

    public function show(Administrativo $administrativo)
    {
        return new AdministrativoResource($administrativo);
    }

    public function update(AdministrativoRequest $request, Administrativo $administrativo)
    {
        try {
            $administrativo->update($request->all());
        } catch (\Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondUpdated();
    }

    public function destroy(Request $request)
    {
        try {
            $data = [];
            $administrativos = $this->administrativo->find($request->administrativos);
            foreach ($administrativos as $administrativo) {
                $model = $administrativo->secureDelete();
                if ($model) {
                    $data[] = $administrativo;
                }
            }
        } catch (Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondDeleted($data);
    }
}
