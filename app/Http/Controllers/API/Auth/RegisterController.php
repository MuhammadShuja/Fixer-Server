<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Laravel\Passport\Client;
use App\Models\User;

class RegisterController extends Controller
{
    private $client;

    public function __construct() {
        $this->client = Client::find(2);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            $this->username() => $this->usernameRule(),
            'password' => 'required|confirmed|min:6'
        ]);

        if ( $validator->fails() ) {
            return response()->json( [ 'errors' => $validator->errors() ], 400 );
        }

        $user = User::create([
            'user_status_id' => \App\Models\UserStatus::active(),
            'name' => $request->name,
            $this->username() => request($this->username()),
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);

        $params = [
            'grant_type' => 'password',
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'username' => request($this->username()),
            'password' => $request->password,
            'scope' => '*'
        ];

        $request->request->add($params);
        $proxy = Request::create('/oauth/token', 'POST');
        return Route::dispatch($proxy);
    }

    private function username(){
        return 'email';
    }

    private function usernameRule(){
        switch($this->username()){
            case 'username':
            return 'required|string|unique:users|max:191';
            break;
            case 'email':
            return 'required|email|unique:users|max:191';
            break;
        }
    }
}