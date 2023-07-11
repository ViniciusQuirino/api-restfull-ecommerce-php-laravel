<?php

use App\Http\Controllers\Seller\SellerController;
use Illuminate\Support\Facades\Route;

Route::middleware(['jwt.verify'])->group(function () {
    Route::prefix('/auth')->group(function () {
        Route::post('/product', [SellerController::class, 'createProduct']);
    });
});
