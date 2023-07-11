<?php

namespace App\Services;

use App\Models\Order;

class CreateOrderService
{
    public function execute(array $data)
    {
        $order = Order::create($data);

        return $order;
    }
}
