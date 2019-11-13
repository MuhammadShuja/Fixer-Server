<?php

namespace App\Http\Controllers\Back\Subscriptions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Image;
use Uuid;

use App\Models\Area;
use App\Models\City;

/*
-----------------------------------------------------------------------------------------------
| TABLE > areas
|----------------------------------------------------------------------------------------------
| COLUMNS > COMPULSORY 
| name, city_id
|----------------------------------------------------------------------------------------------
| COLUMNS > NULLABLE
| status
-----------------------------------------------------------------------------------------------
*/

class AreasController extends Controller
{
    // GET:admin/s/areas
    public function index()
    {
        return view('back.services.areas.index');
    }

    // GET:api/admin/s/areas
    public function indexAPI()
    {
        // id, name, city, created_at

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
            $areas = Area::get()
                ->map(function ($area){
                    return [
                        'id' => $area->id,
                        'name' => $area->name,
                        'city' => $area->city->name,
                        'created_at' => $area->created_at->toDateTimeString()
                    ];
                });
        }
        else{
            $areas = Area::where('status', $status)->get()
                ->map(function ($area){
                    return [
                        'id' => $area->id,
                        'name' => $area->name,
                        'city' => $area->city->name,
                        'created_at' => $area->created_at->toDateTimeString()
                    ];
                });
        }

        return datatables($areas)->make(true);
    }    

    // GET:admin/s/areas/new
    public function create(){
        $cities = City::active();

        return view('back.services.areas.new', compact('cities'));
    }

    // POST:admin/s/areas/new
    public function store(Request $request){
        
        $validated = $request->validate([
            'name' => 'required|string|max:191',
            'city' => 'required'
        ]);

        $area = Area::create([
            'name' => $request->name,
            'city_id' => $request->city,
            'status' => $request->status
        ]);

        return redirect('/admin/s/areas/'.$area->id)->with(['alert' => 'add']);

    }

    // GET:admin/s/areas/{area}
    public function show(Area $area){
        $alert = session()->get('alert');
        $cities = City::active();

        return view('back.services.areas.show', compact('area', 'alert', 'cities'));
    }

    // POST:admin/s/areas/{area}
    public function update(Request $request, Area $area){

        $validated = $request->validate([
            'name' => 'required|string|max:191',
            'city' => 'required'
        ]);

        $area->name = $request->name;
        $area->city_id = $request->city;
        $area->status = $request->status;

        $area->save();

        return redirect('/admin/s/areas/'.$area->id)->with(['alert' => 'update']);
    }

    // POST:api/admin/s/areas/remove
    public function destroy(Request $request){
        $area = Area::where('id', $request->id)->first();
        
        $area->delete();
    }
}