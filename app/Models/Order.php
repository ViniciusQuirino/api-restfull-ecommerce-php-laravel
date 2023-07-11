<?php

namespace App\Models;

use DateTime;
use DateTimeZone;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'order';

    protected $fillable = [
        'status',
        'created_at',
        'user_id'
    ];

    public function toArray()
    {
        return [
            'status' => $this->name,
            'created_at' => $this->created_at,
            'user_id' => $this->seller_id,
        ];
    }

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

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function order_product(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
