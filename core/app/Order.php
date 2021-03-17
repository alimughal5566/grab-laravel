<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'food_id', 'users_id', 'c_name', 'c_phone', 'c_mail', 'c_quantity',
        'price', 'c_payment', 'c_address', 'status',
    ];
}
