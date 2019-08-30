<?php

namespace App;

use function GuzzleHttp\Psr7\str;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
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
        return $this->address.' '.$this->state;
    }

    /**
     * make number editable
     *
     */
    public function numberEdit()
    {
        return substr($this->phone,3);
    }

    /**
     * Get Receivers of these client
     *
     */
    public function receivers()
    {
        return $this->hasMany('App\Receiver');
    }
}
