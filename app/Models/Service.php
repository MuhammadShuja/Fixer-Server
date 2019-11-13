<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];

    public static function active(){
        return self::where('service_status_id', \App\Models\ServiceStatus::active())->get();
    }

    public function status(){
    	return $this->belongsTo('\App\Models\ServiceStatus', 'service_status_id');
    }

    public function category(){
    	return $this->belongsTo('\App\Models\Category', 'category_id');
    }
}
