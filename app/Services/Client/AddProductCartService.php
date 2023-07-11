<?php

namespace App\Services\Client;

use App\Exceptions\AppError;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use App\Models\User;

use Illuminate\Support\Facades\Log;


class AddProductCartService
{
    public function execute(string $productId, string $userId)
    {

        $product = Product::firstWhere("id", $productId);
        if (is_null($product)) {
            throw new AppError('Produto não encontrado', 404);
        }
        
        $user = User::firstWhere("id", $userId);
        if (is_null($user)) {
            throw new AppError('Usuário não encontrado', 404);
        }

        $cart = Cart::firstWhere("user_id", $userId);
        if (!is_null($cart)) {
            
            $found = CartProduct::where('cart_id', $cart->id)
                ->where('product_id', $productId)
                ->first();

            if ($found) {
                $found->amount += 1;
                $found->save();

                $user = User::with('cart.cart_product.product')->find($userId);

                $user->cart->cart_product = $user->cart->cart_product->map(function ($cartProduct) {
                    unset($cartProduct->cart_id);
                    unset($cartProduct->product_id);
                    return $cartProduct;
                });

                $userData = [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'age' => $user->age,
                    'cpf' => $user->cpf,
                    'type' => $user->type,
                    'cart' => $user->cart->toArray()
                ];

                return $userData;
            } else {

                $cartProduct = new CartProduct();
                $cartProduct->product_id = $productId;
                $cartProduct->cart_id = $cart->id;
                $cartProduct->save();

                $user = User::with('cart.cart_product.product')->find($userId);

                $user->cart->cart_product = $user->cart->cart_product->map(function ($cartProduct) {
                    unset($cartProduct->cart_id);
                    unset($cartProduct->product_id);
                    return $cartProduct;
                });

                $userData = [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'age' => $user->age,
                    'cpf' => $user->cpf,
                    'type' => $user->type,
                    'cart' => $user->cart->toArray()
                ];

                return $userData;
            }
        } else {
            $cart = Cart::create(['user_id' => $userId]);

            $cartProduct = new CartProduct();
            $cartProduct->product_id = $productId;
            $cartProduct->cart_id = $cart->id;
            $cartProduct->save();

            $user = User::with('cart.cart_product.product')->find($userId);

            $user->cart->cart_product = $user->cart->cart_product->map(function ($cartProduct) {
                unset($cartProduct->cart_id);
                unset($cartProduct->product_id);
                return $cartProduct;
            });

            $userData = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'age' => $user->age,
                'cpf' => $user->cpf,
                'type' => $user->type,
                'cart' => $user->cart->toArray()
            ];

            return $userData;
        }
    }
}
