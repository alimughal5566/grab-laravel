<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'bill_fname', '	bill_lname', 'companyname','bill_fname','companyname', 'bill_country',
        'bill_street', 'bill_appartment', 'bill_town','bill_zip','bill_phone', 'bill_email',
        'ship_fname', '	ship_lname', 'ship_company','ship_country','ship_appartment', 'ship_town',
        'ship_zip','ship_phone', 'ship_email','notes',
    ];
}
