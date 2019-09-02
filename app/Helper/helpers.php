<?php

use App\Models\AdminSetting;
use Carbon\Carbon;
use App\Models\Role;
use \Illuminate\Support\Facades\Auth;
use \App\ProductTransactionHistory;

/**
 * @param $img_with_path
 * @param $height
 * @param $width
 * @return string
 */
//use Intervention\Image\Image;
function getAudCurrency($amount = 1){
    $currency = \App\Currency::where('country_id',1)->first();
     $value  = (!empty($currency)) ? $currency->rate : 0;

    return $value*$amount;

}
function getCharge($type = 1){
    return \App\Service::find($type)->service_charge;

}