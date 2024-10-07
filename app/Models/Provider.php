<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provider extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;


    protected $table = 'providers'; 
    protected $fillable = [
        'prov_fname', 'prov_lastname', 'prov_dob', 'prov_gender', 'prov_email',
        'prov_password', 'prov_phone', 'prov_avatar', 'prov_addr_id'
    ];

    protected $hidden = [
        'prov_password',
    ];

   
    public function getAuthPassword()
    {
        return $this->prov_password;
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }
}