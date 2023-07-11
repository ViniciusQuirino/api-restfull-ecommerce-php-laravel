<?php

use App\Http\Controllers\Client\ClientController;
use Illuminate\Support\Facades\Route;

Route::middleware(['jwt.verify'])->group(function () {
    Route::prefix('/auth/product/cart')->group(function () {
        Route::post('{id}', [ClientController::class, 'addProductCart']);
        Route::delete('', [ClientController::class, 'deleteCart']);
    });
});


