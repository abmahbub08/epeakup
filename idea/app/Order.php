<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    // User for Order
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // Recipient for Order
    public function recipient()
    {
        return $this->belongsTo('App\Recipient');
    }

    //Reasons of this order
    public function reason()
    {
        return $this->belongsTo('App\Reason');
    }

    //method of a order
    public function payment_network()
    {
        return $this->belongsTo('App\PaymentNetwork');
    }

    //country of order
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
