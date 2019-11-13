<?php

namespace App\Http\Controllers\Back\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

use App\Models\UserStatus;
use App\Models\Admin;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class StaffController extends Controller
{
    // GET:admin/users
    public function index()
    {
        $statuses = UserStatus::all();
        return view('back.settings.staff.index', compact('statuses'));
    }

    // GET:api/admin/settings/staff
    public function indexAPI()
    {
        // id, name, avatar, username, email, phone, created_at

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
            $users = Admin::get()
                ->map(function ($user){
                    return [
                        'id' => $user->id,
                        'avatar' => ($user->avatar) ? \URL::asset($user->avatar) : \URL::asset('/images/default/image-placeholder.svg'),
                        'name' => $user->name,
                        'username' => $user->username,
                        'email' => $user->email,
                        'phone' => ($user->phone) ? $user->phone : '-',
                        'created_at' => $user->created_at->toDateTimeString()
                    ];
                });
        }
        else{
            $s = UserStatus::where('key', $status)->first();
            $users = Admin::where('user_status_id', $s->id)->get()
                ->map(function ($user){
                    return [
                        'id' => $user->id,
                        'avatar' => ($user->avatar) ? \URL::asset($user->avatar) : \URL::asset('/images/default/image-placeholder.svg'),
                        'name' => $user->name,
                        'username' => $user->username,
                        'email' => $user->email,
                        'phone' => ($user->phone) ? $user->phone : '-',
                        'created_at' => $user->created_at->toDateTimeString()
                    ];
                });
        }

        return datatables($users)->make(true);
    }

    // GET:admin/users/new
    public function create(){
        $statuses = UserStatus::all();
        $permissions = Permission::all();

        return view('back.settings.staff.new', compact('statuses', 'permissions'));
    }

    // POST:admin/users/new
    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'username' => 'required|string|unique:users|max:191',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = Admin::create([
            'user_status_id' => $request->user_status_id,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);

        $user->syncPermissions($request->permissions);

        return redirect('/admin/settings/staff/'.$user->id)->with(['alert' => 'add']);

    }

    // GET:admin/users/{user}
    public function show(Admin $user){
        $alert = session()->get('alert');
        $statuses = UserStatus::all();
        $permissions = Permission::all();

        return view('back.settings.staff.show', compact('user', 'statuses', 'permissions', 'alert'));
    }

    // POST:admin/users/{user}
    public function update(Request $request, Admin $user){

        $validated = $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
        ]);

        $user->name = $request->name;
        $user->user_status_id = $request->user_status_id;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();

        if($request->password){
            $validated = $request->validate([
                'password' => 'required|string|min:6|confirmed',
            ]);

            $user->password = Hash::make($request->password);
            $user->save();
        }

        $user->syncPermissions($request->permissions);

        return redirect('/admin/settings/staff/'.$user->id)->with(['alert' => 'update']);
    }

    // POST:api/admin/settings/staff/remove
    public function destroy(Request $request){
        $user = Admin::where('id', $request->id)->first();

        if($user){
            $user->delete();
        }
    }
}