<?php

namespace App\Services\Client;

use App\Exceptions\AppError;
use App\Models\Cart;
use App\Models\User;

class DeleteCartService
{
    public function execute(string $userId)
    {
        $user = User::firstWhere("id", $userId);

        if (is_null($user)) {
            throw new AppError('Usuário não encontrado', 404);
        }

        $cart = Cart::firstWhere('user_id', $userId);

        $cart->delete();
    }
}
