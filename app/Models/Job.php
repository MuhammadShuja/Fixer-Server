<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = [];

    public function status(){
    	return $this->belongsTo('\App\Models\JobStatus', 'job_status_id');
    }

    public function customer(){
    	return $this->belongsTo('\App\Models\User', 'user_id');
    }

    public function category(){
        return $this->belongsTo('\App\Models\Category', 'category_id');
    }

    public function service(){
    	return $this->belongsTo('\App\Models\Service', 'service_id');
    }

    public function worker(){
    	return $this->belongsTo('\App\Models\Worker', 'worker_id');
    }

    public function payment(){
        return $this->hasOne('\App\Models\Payment', 'job_id');
    }
}
