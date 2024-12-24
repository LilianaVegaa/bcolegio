<?php

namespace App\Http\Controllers;

use App\Tutor;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\Tutor\TutorRequest;
use App\Filters\TutorSearch\TutorSearch;
use App\Http\Resources\Tutor\TutorCollection;
use App\Http\Resources\Tutor\TutorResource;

class TutorController extends ApiController
{
    private $tutor;

    public function __construct(Tutor $tutor)
    {
        $this->tutor = $tutor;
    }

    public function index(Request $request)
    {
        if ($request->filled('filter.filters')) {
            return new TutorCollection(TutorSearch::apply($request, $this->tutor));
        }

        $tutores = TutorSearch::checkSortFilter($request, $this->tutor->newQuery());

        return new TutorCollection($tutores->paginate($request->take));
    }

    public function store(TutorRequest $request)
    {
        try {
            $usuario = User::create([
                "nombre" => $request->ci,
                "contraseña" => $request->ci,
                "perfil_id" => 3,
                "tipo_usuario" => 'App\Tutor',
            ]);

            $tutor = $this->tutor->create([
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
        return $this->respondCreated($tutor);
    }

    public function show(Tutor $tutor)
    {
        return new TutorResource($tutor);
    }

    public function update(TutorRequest $request, Tutor $tutor)
    {
        try {
            $tutor->update($request->all());
        } catch (\Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondUpdated();
    }

    public function destroy(Request $request)
    {
        try {
            $data = [];
            $tutores = $this->tutor->find($request->tutores);
            foreach ($tutores as $tutor) {
                $model = $tutor->secureDelete();
                if ($model) {
                    $data[] = $tutor;
                }
            }
        } catch (Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondDeleted($data);
    }

    public function listing()
    {
        $tutores = $this->tutor->listTutores();
        return $this->respond($tutores);
    }
}
