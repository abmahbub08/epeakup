<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoneyRequest extends Model
{
    protected $guarded = [];

    public static function pendingRequest()
    {
        return static::orderBy('created_at','desc')->where('status',0)->get();
    }

    public static function completeRequest()
    {
        return static::orderBy('created_at','desc')->where('status',1)->get();
    }

    public function agent()
    {
        return $this->belongsTo('App\Agent');
    }



}
