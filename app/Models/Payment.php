<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];

    public static function pending(){
        return self::where('status', 'pending')->get();
    }

    public static function paid(){
        return self::where('status', 'paid')->get();
    }

    public function job(){
    	return $this->belongsTo('\App\Models\Job', 'job_id');
    }
}
