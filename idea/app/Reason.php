<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    protected $guarded = [];

    //Orders of this reason
    public function orders()
    {
        return $this->hasMany('App\Orders');
    }
}
