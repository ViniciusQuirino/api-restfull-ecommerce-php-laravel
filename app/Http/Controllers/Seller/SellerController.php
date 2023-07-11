<?php

namespace App\Http\Controllers\Seller;

use App\Http\Requests\Seller\CreateProductRequest;
use App\Services\Seller\CreateProductService;
use Illuminate\Http\Request;

class SellerController
{
    public function createProduct(CreateProductRequest $request)
    {
        $validatedData = $request->validated();
        $createProductService = new CreateProductService();
        $result = $createProductService->execute($validatedData, $request->bearerToken());
        return response()->json($result, 201);
    }
}
