<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded = [];

    //States of a Country
    public function states()
    {
        return $this->hasMany('App\State');
    }

    //Currency of this Country
    public function currency()
    {
        return $this->hasOne('App\Currency');
    }

    //Services of a country
    public function services()
    {
        return $this->hasMany('App\Service');
    }

    //Users of a country
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
