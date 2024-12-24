<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserPasswordRequest;
use App\Filters\UserSearch\UserSearch;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserResource;

class UserController extends ApiController
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(Request $request)
    {
        if ($request->filled('filter.filters')) {
            return new UserCollection(UserSearch::apply($request, $this->user));
        }

        $users = UserSearch::checkSortFilter($request, $this->user->newQuery());

        return new UserCollection($users->paginate($request->take));
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function store(UserRequest $request)
    {
        try {
            $this->user->create($request->all());
        } catch (\Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondCreated();
    }

    public function update(UserRequest $request, User $user)
    {
        try {
            $relatedModel = $user->rol;

            $relatedModel->nombres = $request->nombres;
            $relatedModel->apellidos = $request->apellidos;
            $relatedModel->telefono = $request->telefono;
            $relatedModel->direccion = $request->direccion;
            $relatedModel->ci = $request->ci;
            $relatedModel->save();
        } catch (\Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondUpdated($request->all());
    }

    public function password(UserPasswordRequest $request, User $user)
    {
        try {
            $user->update(['contraseña' => $request->password]);
        } catch (\Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondUpdated();
    }

    public function destroy(Request $request)
    {
        try {
            $data = [];
            $users = $this->user->find($request->users);
            foreach ($users as $user) {
                $model = $user->secureDelete();
                if ($model) {
                    $data[] = $user;
                }
            }
        } catch (Exception $e) {
            return $this->respondInternalError();
        }
        return $this->respondDeleted($data);
    }

    public function listing()
    {
        $users = $this->user->listUsers();
        return $this->respond($users);
    }
}
