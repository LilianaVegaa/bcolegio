<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;

class AccessControlList
{
    public function handle($request, Closure $next)
    {
        $route = $request->route()->getName();
        $cache = Cache::get('actions_' . auth()->user()->id);
        if ($cache == null) {
            return response()->json([
                'success' => false,
                'message' => message('MSG009'),
            ], 401);
        }

        if (!in_array($route, $cache) && !in_array('*', $cache) && $route) {
            return response()->json(['success' => false], 403);
        } else {
            return $next($request);
        }
    }
}
