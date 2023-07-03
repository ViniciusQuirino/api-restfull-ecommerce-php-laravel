<?php

namespace App\Http\Controllers\Seller;

use App\Http\Requests\Seller\CreateProductRequest;
use App\Services\CreateProductService;
use Illuminate\Http\Request;

class SellerController
{
    public function createProduct(CreateProductRequest $request, $id)
    {
        $createProductService = new CreateProductService();
        $result = $createProductService->execute($request->all(), $request->bearerToken());
        return response()->json($result, 201);
    }
}
