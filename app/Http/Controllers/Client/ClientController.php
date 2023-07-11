<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Services\Client\AddProductCartService;
use App\Services\Client\DeleteCartService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ClientController
{
    public function addProductCart(Request $request, $id)
    {
        $addProductCartService = new AddProductCartService();

        $token = $request->bearerToken();
        $jwtToken = new \Tymon\JWTAuth\Token($token);
        $payload = JWTAuth::decode($jwtToken);
        $userId = $payload['id'];

        $result = $addProductCartService->execute($id, $userId);

        return response()->json($result, 201);
    }

    public function deleteCart(Request $request)
    {
        $deleteCartService = new DeleteCartService();

        $token = $request->bearerToken();
        $jwtToken = new \Tymon\JWTAuth\Token($token);
        $payload = JWTAuth::decode($jwtToken);
        $userId = $payload['id'];

        $deleteCartService->execute($userId);

        return response()->json([], 204);
    }
}
