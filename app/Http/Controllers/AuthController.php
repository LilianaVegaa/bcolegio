<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use Carbon\Carbon;

class AuthController extends ApiController
{
    public function login(LoginRequest $request)
    {
        $user = User::where('nombre', '=', request('username'))
        ->first();

        if (!$user) {
            return response()->json([
                'message' => message('MSG007'),
            ], 422);
        }
        if ($user->state === 0) {
            return response()->json([
                'message' => message('MSG007'),
            ], 422);
        }
        if (!Hash::check(request('password'), $user->contraseña)) {
            return response()->json([
                'message' => message('MSG006'),
            ], 422);
        }

        $data = [
            'grant_type' => 'password',
            'client_id' => config('services.passport.client_id'),
            'client_secret' => config('services.passport.client_secret'),
            'username' => $user->nombre,
            'password' => request('password'),
        ];

        $request = Request::create('/oauth/token', 'POST', $data);
        $response = app()->handle($request);

        $data = json_decode($response->getContent());

        foreach ($user->perfil->permisos as $action) {
            if (strpos($action->metodo, '|') !== false) {
                $pipe = explode('|', $action->metodo);
                foreach ($pipe as $value) {
                    $actions[] = $value;
                }
            } else {
                $actions[] = $action->metodo;
            }
        }

        $auth = [
            'id' => $user->id,
            'rol_id' => $user->rol->id,
            'name' => $user->nombre,
            'nombres' => $user->rol->nombres,
            'apellidos' => $user->rol->apellidos,
            'telefono' => $user->rol->telefono,
            'direccion' => $user->rol->direccion,
            'ci' => $user->rol->ci,
            'acl' => $actions
        ];

        Cache::add('actions_' . $user->id, $actions);

        return $this->respond([
            'access_token'  => $data->access_token,
            'refresh_token' => $data->refresh_token,
            'expires_in' => $data->expires_in,
            'user' => $auth
        ]);
    }

    public function logout()
    {
        $accessToken = auth()->user()->token();

        $refreshToken = DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true,
            ]);

        $accessToken->revoke();

        if (Cache::has('actions_' . auth()->user()->id)) {
            Cache::forget('actions_' . auth()->user()->id);
        }

        return $this->respond(['status' => 200]);
    }
}
