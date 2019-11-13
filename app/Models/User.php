<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

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

    // public function findForPassport($username) {
    //     return $this->where('id', $username)->first();
    // }

    public function addressBook(){
        return $this->hasMany('\App\Models\UserAddress');
    }

    public function defaultAddress(){
        return $this->addressBook->where('default', '1')->first();
    }

    public static function active(){
        return self::where('user_status_id', \App\Models\UserStatus::active())->get();
    }

    public function jobs(){
        return $this->hasMany('\App\Models\Job');
    }

    public function avatar(){
        if($this->avatar){
            return \URL::asset($this->avatar);
        }

        return \URL::asset('/images/default/image-placeholder.svg');
    }

    public function status(){
        return $this->belongsTo('\App\Models\UserStatus', 'user_status_id');
    }
}