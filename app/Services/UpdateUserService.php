<?php

namespace App\Services;

use App\Models\User;

class UpdateUserService
{
    public function execute(array $data, string $id)
    {
        $user = User::find($id);

        if ($user) {
            $user->update($data);

            return $user;
        }
    }
}
