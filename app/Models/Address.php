<?php

namespace App\Models;

use DateTime;
use DateTimeZone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public $timestamps = false;

    public function getCreatedAtAttribute($value)
    {
        $dateTime = new DateTime($value);
        $dateTime->setTimezone(new DateTimeZone('America/Sao_Paulo'));
        return $dateTime->format('d-m-Y, H:i:s');
    }

    public function getUpdatedAtAttribute($value)
    {
        $dateTime = new DateTime($value);
        $dateTime->setTimezone(new DateTimeZone('America/Sao_Paulo'));
        return $dateTime->format('d-m-Y, H:i:s');
    }

    public function user():HasOne
    {
        return $this->hasOne(User::class);
    }
}
