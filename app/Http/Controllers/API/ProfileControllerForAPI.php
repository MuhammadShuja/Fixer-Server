<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Str;
use App\Models\UserAddress;
use App\Models\User;

class ProfileControllerForAPI extends Controller
{    
    public function profile(){
        $user = auth()->user();
        return response()->json([
            'profile' => [
                'name' => $user->name,
                'email' => $user->email,
                'address' => ($user->defaultAddress()) ? $user->defaultAddress()->address : '',
                'phone' => ($user->defaultAddress()) ? $user->defaultAddress()->phone : '',
            ]
        ]);
    }
}