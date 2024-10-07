<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_name', 'service_description', 'service_price'
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function orders()
{
    return $this->hasMany(Order::class);
}
public function serviceSlots()
{
    return $this->hasMany(ServiceSlot::class);
}
}