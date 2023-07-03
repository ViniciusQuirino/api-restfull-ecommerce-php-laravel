<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HasUuids;

    //nome da tabela com que faz referencia
    protected $table = 'product';

    //quais são os campos
    //chave primaria nao precisa colocar
    protected $fillable = [
        'name',
        'value',
        'amount',
        'stock',
        'category',
        'seller_id',
    ];
}
