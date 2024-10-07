<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider_id', 'service_slot_id', 'date', 'availability'
    ];

    public function calendar()
    {
        return $this->hasOne(Calendar::class);
    }
}