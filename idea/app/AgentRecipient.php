<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentRecipient extends Model
{
    protected $guarded = [];

    public function agent()
    {
        return $this->belongsTo('App\Agent');
    }

    //full name
    public function name()
    {
        return $this->first_name.' '.$this->last_name;
    }

    //address
    public function address()
    {
        return $this->address_one.' '.$this->address_two.' '.$this->city.' '.$this->postcode;
    }
}
