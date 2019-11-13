<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobStatus extends Model
{
    protected $guarded = [];

    const PENDING = 'pending';
	const ASSIGNED = 'assigned';
	const COMPLETED = 'completed';
	const FAILED = 'failed';
	const CANCELLED = 'cancelled';
	const REJECTED = 'rejected';

	public function jobs(){
    	return $this->hasMany('\App\Models\Job', 'job_status_id');
    }

    public static function pending(){
    	return self::where('key', self::PENDING)->first()->id;
    }

    public static function assigned(){
    	return self::where('key', self::ASSIGNED)->first()->id;
    }

    public static function completed(){
    	return self::where('key', self::COMPLETED)->first()->id;
    }

    public static function failed(){
    	return self::where('key', self::FAILED)->first()->id;
    }

    public static function cancelled(){
    	return self::where('key', self::CANCELLED)->first()->id;
    }

    public static function rejected(){
    	return self::where('key', self::REJECTED)->first()->id;
    }
}
