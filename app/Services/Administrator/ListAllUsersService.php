<?php

namespace App\Services\Administrator;

use App\Models\User;

class ListAllUsersService
{
    public function execute()
    {
        $users = User::all();
        
        return $users;
    }
}
