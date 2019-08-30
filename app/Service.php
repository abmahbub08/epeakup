<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];

    //Country of this service
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    //Networks/Methods of a service
    public function methods()
    {
        return $this->hasMany('App\PaymentNetwork');
    }
}
