<?php

namespace App\Http\Controllers\Back\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Image;
use App\Models\Configuration as Config;

class SettingsController extends Controller
{
	protected $keys = [
		'store_logo_dark' => [
			'name' => 'logo_dark.png',
			'path' => 'storage/logo/',
			'type' => 'png'
		],
		'store_logo_light' => [
			'name' => 'logo_light.png',
			'path' => 'storage/logo/',
			'type' => 'png'
		],
		'store_favicon' => [
			'name' => 'favicon.ico',
			'path' => 'favicon',
			'type' => 'ico'
		],
		'store_favicon_16x16' => [
			'name' => 'favicon-16x16.png',
			'path' => 'storage/favicon/',
			'type' => 'png'
		],
		'store_favicon_32x32' => [
			'name' => 'favicon-32x32.png',
			'path' => 'storage/favicon/',
			'type' => 'png'
		],
		'store_favicon_192x192' => [
			'name' => 'android-chrome-192x192.png',
			'path' => 'storage/favicon/',
			'type' => 'png'
		],
		'store_favicon_512x512' => [
			'name' => 'android-chrome-512x512.png',
			'path' => 'storage/favicon/',
			'type' => 'png'
		],
		'store_favicon_apple_touch_icon' => [
			'name' => 'apple-touch-icon.png',
			'path' => 'storage/favicon/',
			'type' => 'png'
		],
		'store_favicon_mstile' => [
			'name' => 'mstile-150x150.png',
			'path' => 'storage/favicon/',
			'type' => 'png'
		],
		'store_favicon_safari_svg' => [
			'name' => 'safari-pinned-tab.svg',
			'path' => 'favicon',
			'type' => 'svg'
		],
	];
    public function index(){

    	return view('back.settings.index');
    }

    public function general(){

    	$config = Config::all();

    	return view('back.settings.general', compact('config'));
    }

    public function updateGeneral(Request $request){

    	$params = $request->except('_token');

    	foreach($params as $key => $value){
    		if(gettype($value) == 'string'){
    			$this->updateEntry($key, $value);
    		}
    		elseif(gettype($value) == 'object'){
    			if(get_class($value) == 'Illuminate\Http\UploadedFile'){
    				$this->updateImageEntry($key, $value);
    			}
    		}
    	}

    	return redirect('/admin/settings/general');
    }

    public function account(){
        
        $config = Config::all();

        return view('back.settings.account', compact('config'));
    }

    public function updateAccount(Request $request){

        $params = $request->except('_token');

        foreach($params as $key => $value){
            if(gettype($value) == 'string'){
                $this->updateEntry($key, $value);
            }
            elseif(gettype($value) == 'object'){
                if(get_class($value) == 'Illuminate\Http\UploadedFile'){
                    $this->updateImageEntry($key, $value);
                }
            }
        }

        return redirect('/admin/settings/account');
    }

    public function staff(){
        
        $config = Config::all();

        return view('back.settings.staff', compact('config'));
    }

    public function updateStaff(Request $request){

        $params = $request->except('_token');

        foreach($params as $key => $value){
            if(gettype($value) == 'string'){
                $this->updateEntry($key, $value);
            }
            elseif(gettype($value) == 'object'){
                if(get_class($value) == 'Illuminate\Http\UploadedFile'){
                    $this->updateImageEntry($key, $value);
                }
            }
        }

        return redirect('/admin/settings/staff');
    }

    protected function updateEntry($key, $value){
    	$entry = Config::where('key', $key)->first();
    	if($entry){
    		$entry->value = $value;
    		$entry->save();
    	}
    	else{
    		Config::create([
    			'key' => $key,
    			'value' => $value
    		]);
    	}
    }

    protected function updateImageEntry($key, $value){
    	$entry = Config::where('key', $key)->first();
        if ($entry){
        	if (file_exists($entry->value)){
        		unlink($entry->value);
        	}
        }

    	$keyField = $this->keys[$key];
    	if (!file_exists($keyField['path'])) {
            mkdir($keyField['path'], 666, true);
        }

    	if($keyField['type'] == 'svg'){
    		$storagePath = $keyField['path'].'/'.$keyField['name'];
    		$file = $value->storeAs($keyField['path'], $keyField['name'], 'public');
    	}
    	elseif($keyField['type'] == 'ico'){
    		$storagePath = $keyField['path'].'/'.$keyField['name'];
    		$file = $value->storeAs($keyField['path'], $keyField['name'], 'public');
    	}
    	else{
    		$img = Image::make($value);
	        $storagePath = $keyField['path'].$keyField['name'];
	        $img = $img->save($storagePath);
    	}

        if($entry){
        	$entry->value = $storagePath;
        	$entry->save();
        }
        else{
        	Config::create([
        		'key' => $key,
        		'value' => $storagePath
        	]);
        }
    }
}