<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $guarded = [];

    //Agent
    public function agent()
    {
        return $this->belongsTo('App\Agent');
    }
}
