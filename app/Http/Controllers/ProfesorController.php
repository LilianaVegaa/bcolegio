<?php

namespace App\Http\Controllers;

use App\Profesor;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\Profesor\ProfesorRequest;
use App\Filters\ProfesorSearch\ProfesorSearch;
use App\Http\Resources\Profesor\ProfesorCollection;
use App\Http\Resources\Profesor\ProfesorResource;

class ProfesorController extends ApiController
{
    private $profesor;

    public function __construct(Profesor $profesor)
    {
        $this->profesor = $profesor;
    }

    public function index(Request $request)
    {
        if ($request->filled('filter.filters')) {
            return new ProfesorCollection(ProfesorSearch::apply($request, $this->profesor));
        }

        $profesores = ProfesorSearch::checkSortFilter($request, $this->profesor->newQuery());

        return new ProfesorCollection($profesores->paginate($request->take));
    }

    public function store(ProfesorRequest $request)
    {
        try {
            $usuario = User::create([
                "nombre" => $request->ci,
                "contraseña" => $request->ci,
                "perfil_id" => 2,
                "tipo_usuario" => 'App\Profesor',
            ]);

            $profesor = $this->profesor->create([
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
        return $this->respondCreated($profesor);
    }

    public function show(Profesor $profesor)
    {
        return new ProfesorResource($profesor);
    }

    public function update(ProfesorRequest $request, Profesor $profesor)
    {
        try {
            $profesor->update($request->all());
        } catch (\Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondUpdated();
    }

    public function destroy(Request $request)
    {
        try {
            $data = [];
            $profesores = $this->profesor->find($request->profesores);
            foreach ($profesores as $profesor) {
                $model = $profesor->secureDelete();
                if ($model) {
                    $data[] = $profesor;
                }
            }
        } catch (Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondDeleted($data);
    }

    public function listing()
    {
        $profesores = $this->profesor->listProfesores();
        return $this->respond($profesores);
    }
}
