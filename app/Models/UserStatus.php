<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    protected $guarded = [];

    const ACTIVE = 'active';
    const INACTIVE = 'inactive';
	const PENDING_APPROVAL = 'pending_approval';
	const BANNED = 'banned';
	const LOCKED = 'locked';
	const DELETED = 'deleted';

    public static function active(){
    	return self::where('key', self::ACTIVE)->first()->id;
    }

    public static function inactive(){
    	return self::where('key', self::INACTIVE)->first()->id;
    }

    public static function pendingApproval(){
    	return self::where('key', self::PENDING_APPROVAL)->first()->id;
    }

    public static function banned(){
    	return self::where('key', self::BANNED)->first()->id;
    }

    public static function locked(){
    	return self::where('key', self::LOCKED)->first()->id;
    }

    public static function userDeleted(){
    	return self::where('key', self::DELETED)->first()->id;
    }

    public function admins(){
    	return $this->hasMany('\App\Models\Admin');
    }

    public function vendors(){
    	return $this->hasMany('\App\Models\Vendor');
    }

    public function users(){
    	return $this->hasMany('\App\Models\User');
    }

    public function riders(){
    	return $this->hasMany('\App\Models\Rider');
    }
}
