<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class Authenticate
{
    public function handle($request, Closure $next)
    {
        if ($request->cookie('token')) {
            try {
                $token = $request->cookie('token');
                $user = JWTAuth::setToken($token)->toUser();
                Auth::login($user);
            } catch (\Exception $e) {
                return redirect()->route('login');
            }
        } else {
            return redirect()->route('login');
        }

        return $next($request);
    }
}

