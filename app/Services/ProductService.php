<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductService
{
    public function execute(string $id = null, string $name = null, string $category = null)
    {

        $query = Product::query();

        if ($id) {
            $query->where('id', 'like', "%$id%");
        }

        if ($name) {
            $query->where('name', 'like', "%$name%");
        }

        if ($category) {
            $query->where('category', 'like', "%$category%");
        }

        $products = $query->get();

        return $products;
    }
}
