<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'consumer_id', 'provider_id', 'service_id', 'order_date', 'status'
    ];

    public function provider()
{
    return $this->belongsTo(Provider::class);
}

public function orders()
{
    return $this->hasMany(Order::class);
}

public function review()
{
    return $this->hasOne(Review::class);
}

public function calendar()
{
    return $this->hasOne(Calendar::class);
}

}