<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function identities() {
        return $this->hasMany('App\SocialIdentity');
    }

    public function chargeBacks() {
        return $this->hasMany('App\ChargeBack','user_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany('App\Order','user_id', 'id');
    }

    /**
     * @param bool $redirect
     * @return bool|void
     */
    public function admin($redirect = true)
    {
        if (Auth::user()->admin == 1){
            return true;
        }

        if ($redirect == true){
            return abort('403');
        }else{
            return false;
        }
    }

    public function userDataIncompleted()
    {
        if (auth()->user()->country == ''
            || auth()->user()->city == '' || auth()->user()->zipcode == ''
            || auth()->user()->street_nr == '' || auth()->user()->street_name == ''
            || auth()->user()->first_name == '' || auth()->user()->last_name == '' ){
            return true;
        }

        return false;
    }
}
