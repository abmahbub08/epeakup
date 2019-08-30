<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    protected $guarded = [];

    //Orders of recipient
    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    //User of a Recipient
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //Country of a Recipient
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

}
