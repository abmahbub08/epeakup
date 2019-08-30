<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{
    protected $guarded = [];

    /**
     * Format Name
     *
     */
    public function name()
    {
        return $this->first_name.' '.$this->last_name;
    }

    /**
     * make number update able
     *
     */
    public function accountNumberEdit()
    {
        return substr($this->account_number, 3);
    }

    /**
     * Get Client of these Receiver
     *
     */
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
