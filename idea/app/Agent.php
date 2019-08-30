<?php

namespace App;

use App\Notifications\Agent\AgentResetPassword;
use App\Notifications\Agent\AgentVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Agent extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AgentResetPassword($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new AgentVerifyEmail);
    }

    //Full name
    public function fullName()
    {
        return $this->first_name.' '.$this->last_name;
    }

    //Rull Address
    public function fullAddress()
    {
        return $this->address.' '.$this->city.' '.$this->state.' '.$this->zipcode;
    }

    public function clients()
    {
        return $this->hasMany('App\Client');
    }

    public function moneys()
    {
        return $this->hasOne('App\MoneyRequest');
    }

    public function balance()
    {
        return $this->hasOne('App\Balance');
    }

}
