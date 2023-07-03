<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'order';

    protected $fillable = [
        'status',
        'name',
        'value',
        'amount',
        'stock',
        'category',
        'seller_id',
        'user_id',
        'address_id',
    ];
}
