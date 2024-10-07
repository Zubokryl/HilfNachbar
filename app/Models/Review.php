<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'rating', 'comment'
    ];

    public function review()
{
    return $this->hasOne(Review::class);
}
}