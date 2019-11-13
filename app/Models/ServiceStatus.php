<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceStatus extends Model
{
    const ACTIVE = 'active';
    const INACTIVE = 'inactive';

    public static function active(){
    	return self::where('key', self::ACTIVE)->first()->id;
    }

    public static function inactive(){
    	return self::where('key', self::INACTIVE)->first()->id;
    }
}
