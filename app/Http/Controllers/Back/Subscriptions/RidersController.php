<?php

namespace App\Http\Controllers\Back\Subscriptions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Image;
use Uuid;

use App\Models\UserStatus;
use App\Models\Rider;
use App\Models\Area;
use App\Models\RiderArea;

/*
-----------------------------------------------------------------------------------------------
| TABLE > riders
|----------------------------------------------------------------------------------------------
| COLUMNS > COMPULSORY 
| name
|----------------------------------------------------------------------------------------------
| COLUMNS > NULLABLE
| user_role_id, user_status_id, email, password, mobile, address, avatar, alt_text, description
| commission, account_title, account_number, iban_number, bank_name, branch_code
-----------------------------------------------------------------------------------------------
*/

class RidersController extends Controller
{
    // GET:admin/s/riders
    public function index()
    {
        $statuses = UserStatus::all();
        return view('back.services.riders.index', compact('statuses'));
    }

    // GET:api/admin/s/riders
    public function indexAPI()
    {
        // id, name, avatar, products, created_at

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
            $riders = Rider::get()
                ->map(function ($rider){
                    return [
                        'id' => $rider->id,
                        'avatar' => ($rider->avatar) ? \URL::asset($rider->avatar) : \URL::asset('/images/default/image-placeholder.svg'),
                        'name' => $rider->name,
                        'areas' => $rider->areas->pluck('name'),
                        'created_at' => $rider->created_at->toDateTimeString()
                    ];
                });
        }
        else{
            $status = UserStatus::where('key', $status)->first();
            $riders = Rider::where('user_status_id', $status->id)->get()
                ->map(function ($rider){
                    return [
                        'id' => $rider->id,
                        'avatar' => ($rider->avatar) ? \URL::asset($rider->avatar) : \URL::asset('/images/default/image-placeholder.svg'),
                        'name' => $rider->name,
                        'areas' => $rider->areas->pluck('name'),
                        'created_at' => $rider->created_at->toDateTimeString()
                    ];
                });
        }

        return datatables($riders)->make(true);
    }    

    // GET:admin/s/riders/new
    public function create(){
        $statuses = UserStatus::all();
        $areas = Area::open();
        return view('back.services.riders.new', compact('statuses', 'areas'));
    }

    // POST:admin/s/riders/new
    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $rider = Rider::create([
            'name' => $request->name,
            'user_status_id' => $request->status,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'description' => $request->description,
            'commission' => $request->commission,
            'account_title' => $request->account_title,
            'account_number' => $request->account_number,
            'iban_number' => $request->iban_number,
            'bank_name' => $request->bank_name,
            'branch_code' => $request->branch_code,
        ]);

        if($request->avatar){
            $img = Image::make($request->avatar);
            $img->resize(300, 300);

            $storagePath = 'storage/riders/'.Uuid::generate()->string.'.jpg';

            $img = $img->save($storagePath);
            
            $rider->avatar = $storagePath;
            $rider->alt_text = $request->alt_text;
            $rider->save();
        }

        if($request->areas){
            foreach($request->areas as $area){
                RiderArea::create([
                    'rider_id' => $rider->id,
                    'area_id' => $area
                ]);
            }
        }

        return redirect('/admin/s/riders/'.$rider->id)->with(['alert' => 'add']);

    }

    // GET:admin/s/riders/{rider}
    public function show(Rider $rider){
        $alert = session()->get('alert');
        $statuses = UserStatus::all();
        $areas = Area::openFor($rider->id);

        return view('back.services.riders.show', compact('rider', 'statuses', 'alert', 'areas'));
    }

    // POST:admin/s/riders/{rider}
    public function update(Request $request, Rider $rider){

        $validated = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $rider->name = $request->name;
        $rider->user_status_id = $request->status;
        $rider->email = $request->email;
        $rider->mobile = $request->mobile;
        $rider->address = $request->address;
        $rider->description = $request->description;
        $rider->alt_text = $request->alt_text;
        $rider->account_title = $request->account_title;
        $rider->commission = $request->commission;
        $rider->account_number = $request->account_number;
        $rider->iban_number = $request->iban_number;
        $rider->bank_name = $request->bank_name;
        $rider->branch_code = $request->branch_code;


        if($request->avatar){
            if ($rider->avatar){
                unlink($rider->avatar);
            }
            $img = Image::make($request->avatar);
            $img->resize(300, 300);

            $storagePath = 'storage/riders/'.Uuid::generate()->string.'.jpg';

            $img = $img->save($storagePath);
            
            $rider->avatar = $storagePath;


            // $image = Storage::disk('public')->put( '.jpg', $image);
        }

        $rider->save();

        $rider->areas()->sync($request->areas);

        return redirect('/admin/s/riders/'.$rider->id)->with(['alert' => 'update']);
    }

    // POST:api/admin/s/riders/remove
    public function destroy(Request $request){
        $rider = Rider::find($request->id);
        
        if ($rider->avatar){
            unlink($rider->avatar);
        }

        $rider->delete();
    }

    public function updatePassword(Request $request, Rider $rider){
        $rider->password = bcrypt($request->password);
        $rider->save();

        return redirect('/admin/s/riders/'.$rider->id)->with(['alert' => 'update']);
    }
}