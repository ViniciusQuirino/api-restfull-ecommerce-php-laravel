<?php

namespace App\Http\Middleware;
use Closure;
use App\Exceptions\AppError;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EnsureItIsExistMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $id = $request->route('id'); 

        $user = User::find($id);

        if (!$user) {
            throw new AppError('Usuário não encontrado', 404);
        }

        return $next($request);
    }
}
