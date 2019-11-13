<?php

namespace App\Http\Controllers\Back\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

use App\Models\UserStatus;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\Job;
use App\Models\JobStatus;

/*
-----------------------------------------------------------------------------------------------
| TABLE > users
|----------------------------------------------------------------------------------------------
| COLUMNS > COMPULSORY 
| user_status_id, name, email, password
|----------------------------------------------------------------------------------------------
| COLUMNS > NULLABLE
| phone, address
----------------------------------------------------------------------------------------------
-
| TABLE > user_addresses
|----------------------------------------------------------------------------------------------
| COLUMNS > COMPULSORY 
| user_id, default
|----------------------------------------------------------------------------------------------
| COLUMNS > NULLABLE
| name, email, phone, address, country, sate, city, zipcode
-----------------------------------------------------------------------------------------------
*/

class CustomersController extends Controller
{
    // GET:admin/customers
    public function index()
    {
        $statuses = UserStatus::all();
        return view('back.sales.customer.index', compact('statuses'));
    }

    // GET:api/admin/customers
    public function indexAPI()
    {
        // id, avatar, name, jobs, created_at

        $status = 'all';

        $queryString = rawurldecode(request()->getQueryString());
        $params = explode('&', $queryString);
        foreach($params as $param){
            $t = explode('=', $param);
            if($t[0] == 'status'){
                $status = $t[1];
            }
        }

        if($status === 'all'){
            $customers = User::get()
                ->map(function ($customer){
                    $active_jobs = count(Job::where([['user_id', $customer->id], ['job_status_id', '!=', JobStatus::completed()]])->get());
                    $lifetime_jobs = count(Job::where([['user_id', $customer->id]])->get());
                    return [
                        'id' => $customer->id,
                        'name' => ($customer->name) ? $customer->name : '-',
                        'active_jobs' => $active_jobs,
                        'lifetime_jobs' => $lifetime_jobs,
                        'created_at' => $customer->created_at->toDateTimeString()
                    ];
                });
        }
        else{
            $status = UserStatus::where('key', $status)->first();
            $customers = User::where('user_status_id', $status->id)->get()
                ->map(function ($customer){
                    $active_jobs = count(Job::where([['user_id', $customer->id], ['job_status_id', '!=', JobStatus::completed()]])->get());
                    $lifetime_jobs = count(Job::where([['user_id', $customer->id]])->get());
                    return [
                        'id' => $customer->id,
                        'name' => ($customer->name) ? $customer->name : '-',
                        'active_jobs' => $active_jobs,
                        'lifetime_jobs' => $lifetime_jobs,
                        'created_at' => $customer->created_at->toDateTimeString()
                    ];
                });
        }

        return datatables($customers)->make(true);
    }

    // GET:admin/customers/new
    public function create(){
        $statuses = UserStatus::all();
        return view('back.sales.customer.new', compact('statuses'));
    }

    // POST:admin/customers/new
    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $customer = User::create([
            'name' => $request->name,
            'user_status_id' => $request->status,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);

        if($request->address){
            $address = UserAddress::create([
                'user_id' => $customer->id,
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'default' => true
            ]);
        }

        return redirect('/admin/customers/'.$customer->id)->with(['alert' => 'add']);

    }

    // GET:admin/customers/{customer}
    public function show(User $customer){
        $alert = session()->get('alert');
        $statuses = UserStatus::all();

        return view('back.sales.customer.show', compact('customer', 'statuses', 'alert'));
    }

    // POST:admin/customers/{customer}
    public function update(Request $request, User $customer){

        $validated = $request->validate([
            'name' => 'required|string|max:191',
        ]);

        $customer->name = $request->name;
        $customer->user_status_id = $request->status;
        $customer->phone = $request->phone;
        $customer->save();

        if($request->password){
            $validated = $request->validate([
                'password' => 'required|string|min:6|confirmed',
            ]);

            $customer->password = Hash::make($request->password);
            $customer->save();
        }

        if($request->address){
            $address = $customer->defaultAddress();
            $address->address = $request->address;
            $address->name = $request->name;
            $address->phone = $request->phone;
            $address->save();
        }

        return redirect('/admin/customers/'.$customer->id)->with(['alert' => 'update']);
    }

    // POST:api/admin/customers/remove
    public function destroy(Request $request){
        $customer = User::where('id', $request->id)->first();

        if($customer){
            if($customer->avatar){
                unlink($customer->avatar);
            }

            $customer->delete();
        }
    }
}