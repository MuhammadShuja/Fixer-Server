<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Worker extends Authenticatable
{
    
	protected $guarded = [];

    // public function findForPassport($username) {
    //     return $this->where('id', $username)->first();
    // }

    public static function active(){
        return self::where('user_status_id', \App\Models\UserStatus::active())->get();
    }
	
    public function status(){
        return $this->belongsTo('\App\Models\UserStatus', 'user_status_id');
    }

    public function category(){
        return $this->belongsTo('\App\Models\Category', 'category_id');
    }

    public function avatar(){
        if($this->avatar){
            return \URL::asset($this->avatar);
        }

        return \URL::asset('/images/default/image-placeholder.svg');
    }
}
