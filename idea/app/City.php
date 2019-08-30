<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];

    //State of a city
    public function state()
    {
        return $this->belongsTo('App\State');
    }
}
