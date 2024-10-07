<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSlot extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id', 'slot_time', 'availability'
    ];

    public function serviceSlots()
{
    return $this->hasMany(ServiceSlot::class);
}
}