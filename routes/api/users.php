<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//criação do usuario
Route::post('/users', [UserController::class, 'create']);

Route::group([
    'prefix' => '/auth',
], function () {
    //login
    Route::post('/login', [AuthController::class, 'login']);
    // Route::post('/forget-password', [AuthController::class, 'create']);
    // Route::post('/send-z', [AuthController::class, 'create']);
});

Route::middleware(['jwt.verify', 'sameId'])->prefix('/auth/users')->group(function () {
    Route::patch('/{id}', [UserController::class, 'updateUser']);
    Route::get('/{id}', [UserController::class, 'retrieveUser']);
    Route::delete('/{id}', [UserController::class, 'deleteUser']);
});
