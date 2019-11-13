<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public static function active($limit = null){
        if($limit != null)
            return self::where('status', 'active')->orderBy('position', 'ASC')->take($limit)->get();
        else
            return self::where('status', 'active')->orderBy('position', 'ASC')->get();
    }

    public static function inactive($limit = null){
        if($limit != null)
            return self::where('status', 'inactive')->orderBy('position', 'ASC')->take($limit)->get();
        else
            return self::where('status', 'inactive')->orderBy('position', 'ASC')->get();
    }

    public function services(){
    	return $this->hasMany('\App\Models\Service', 'category_id');
    }

    public function workers(){
    	return $this->hasMany('\App\Models\Worker', 'category_id');
    }

    public function thumbnail(){
        if($this->thumbnail){
            return \URL::asset($this->thumbnail);
        }

        return \URL::asset('/images/default/image-placeholder.svg');
    }
}
