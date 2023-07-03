<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use App\Services\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller {
    
    public function login(LoginRequest $request) {
       
        $login = new LoginService();

        return $login->execute($request->all());
    }
}
