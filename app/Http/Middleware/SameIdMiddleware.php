<?php

namespace App\Http\Middleware;

use App\Exceptions\AppError;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Facades\JWTAuth;

class SameIdMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();
        $jwtToken = new \Tymon\JWTAuth\Token($token);
        $payload = JWTAuth::decode($jwtToken);
        
        $idToken = $payload['id'];
        $idParams = $request->route('id'); 

        if($idToken == $idParams){
            return $next($request);
        } else {
            throw new AppError("Você não tem permissão", 403);
        }

    }
}
