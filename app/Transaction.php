<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];

    //Find Agent information of a Transaction
    public function agent()
    {
        return $this->belongsTo('App\Agent');
    }

    //Find Client information of a Transaction
    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    //Find Receiver of these Transaction
    public function receiver()
    {
        return $this->belongsTo('App\Receiver');
    }

    //complete transactions
    public static function completeTransactions()
    {
        return static::where('status',1)->orderBy('created_at', 'desc')->get();
    }

    //incomplete transactions
    public static function incompleteTransactions()
    {
        return static::where('status',0)->orderBy('created_at', 'desc')->get();
    }
}
