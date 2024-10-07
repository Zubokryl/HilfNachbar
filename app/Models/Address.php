<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'addr_street', 'addr_house_number', 'addr_zip', 'addr_city'
    ];

    public function address()
{
    return $this->hasOne(Address::class);
}
}