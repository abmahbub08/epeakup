<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentNetwork extends Model
{
    protected $guarded = [];

    //Service of a method
    public function service()
    {
        return $this->belongsTo('App\Service');
    }

    //orders of this method
    public function orders()
    {
        return $this->hasMany('App\Order', 'payment_network_id', 'id');
    }
}
