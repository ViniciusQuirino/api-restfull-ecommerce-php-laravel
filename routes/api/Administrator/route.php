<?php

use App\Http\Controllers\Administrator\AdministratorController;
use App\Http\Controllers\Seller\SellerController;
use Illuminate\Support\Facades\Route;

Route::middleware(['jwt.verify'])->group(function () {
    Route::prefix('/auth/adm/users')->group(function () {
        Route::patch('/{id}', [AdministratorController::class, 'updateUser'])->middleware('ensureItIsExist')->middleware('admin.verify');
        Route::get('', [AdministratorController::class, 'listAllUsers'])->middleware('admin.verify');
    });
});
