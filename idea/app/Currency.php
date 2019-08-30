<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $guarded = [];

    //Country of this currency
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
