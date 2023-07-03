<?php

namespace App\Services\Administrator;

use App\Exceptions\AppError;
use App\Models\User;

class UpdateUserService
{
    public function execute(array $data, string $id)
    {
        $user = User::find($id);
        $data['type'] = strtoupper($data['type']);

        $user->update(['type' => $data['type']]);
        return $user;
    }
}
