<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Consumer extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'consumers'; 
    protected $fillable = [
        'cons_fname', 'cons_lastname', 'cons_email', 'cons_phone', 'cons_addr_id', 'cons_password'
    ];

    protected $hidden = [
        'cons_password',
    ];

    
    public function getAuthPassword()
    {
        return $this->cons_password;
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }


}