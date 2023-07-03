<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'address';

    protected $fillable = [
        'street',
        'number',
        'destrict',
        'city',
        'complement',
        'user_id',
    ];
}
