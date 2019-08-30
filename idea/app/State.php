<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $guarded = [];

    //Country of a state
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    //Cities of a state
    public function cities()
    {
        return $this->hasMany('App\City');
    }


}
