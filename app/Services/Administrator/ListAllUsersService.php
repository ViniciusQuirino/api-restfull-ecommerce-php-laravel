<?php

namespace App\Services\Administrator;

use App\Models\User;
use Illuminate\Support\Collection;

class ListAllUsersService
{
    public function execute()
    {
        $users = User::all();


        return $users;
    }
}
