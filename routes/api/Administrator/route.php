<?php

use App\Http\Controllers\Administrator\AdministratorController;
use Illuminate\Support\Facades\Route;

Route::middleware(['jwt.verify', 'admin.verify'])->group(function () {
    Route::prefix('/auth/adm/users')->group(function () {
        Route::patch('/{id}', [AdministratorController::class, 'updateUser'])->middleware('ensureItIsExist');
        Route::get('', [AdministratorController::class, 'listAllUsers']);
    });
});
