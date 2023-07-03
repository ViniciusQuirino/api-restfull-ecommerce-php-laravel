<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Requests\Administrator\AdministratorUpdateUserRequest;
use App\Services\Administrator\ListAllUsersService;
use App\Services\Administrator\UpdateUserService;
use Illuminate\Http\Request;

class AdministratorController
{
    public function updateUser(AdministratorUpdateUserRequest $request, $id)
    {
        $validatedData = $request->validated();
        $updateUserService = new UpdateUserService();

        return $updateUserService->execute($validatedData, $id);
    }

    public function listAllUsers(Request $request)
    {
       
        $updateUserService = new ListAllUsersService();

        $result = $updateUserService->execute();

        return response()->json($result,200);
    }
}
