<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    protected $fillable = [
        'name', 'username','email','password','role_id' 
    ];

   

    public function role(){
        return $this->belongsTo('App\Roles');
    }

}
