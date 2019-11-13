<?php

namespace App\Http\Controllers\Back\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Str;

use App\Models\Category;
use App\Models\ServiceStatus;
use App\Models\Service;
use App\Models\Mechanic;

use Uuid;

/*
-----------------------------------------------------------------------------------------------
| TABLE > services
|----------------------------------------------------------------------------------------------
| COLUMNS > COMPULSORY 
| name, service_status_id
|----------------------------------------------------------------------------------------------
| COLUMNS > NULLABLE
| category_id, price, description
-----------------------------------------------------------------------------------------------
*/

class ServicesController extends Controller
{
    // GET:admin/s/services
    public function index()
    {
        $statuses = ServiceStatus::all();

        return view('back.services.services.index', compact('statuses'));
    }

    // GET:api/admin/s/services
    public function indexAPI()
    {
        // id, name, price, category, description, created_at

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
            $services = Service::get()
                ->map(function ($service){
                    return [
                        'id' => $service->id,
                        'name' => $service->name,
                        'price' => $service->price,
                        'category' => ($service->category)? $service->category->name : '-',
                        'description' => $service->description,
                        'created_at' => $service->created_at->toDateTimeString()
                    ];
                });
        }
        else{
            $s = ServiceStatus::where('key', $status)->first();
            $services = Service::where('service_status_id', $s->id)->get()
                ->map(function ($service){
                    return [
                        'id' => $service->id,
                        'name' => $service->name,
                        'price' => $service->price,
                        'category' => ($service->category)? $service->category->name : '-',
                        'description' => $service->description,
                        'created_at' => $service->created_at->toDateTimeString()
                    ];
                });
        }

        return datatables($services)->make(true);
    }    

    // GET:admin/s/services/new
    public function create(){
        $categories = Category::active();
        $statuses = ServiceStatus::all();

        return view('back.services.services.new', compact('categories', 'statuses'));
    }

    // POST:admin/s/services/new
    public function store(Request $request){

        $messages = [
            'category_id.required' => 'The category field is required.'
        ];

        $validated = $request->validate([
            'name' => 'required|string|max:191',
            'price' => 'required|numeric',
            'category_id' => 'required'
        ], $messages);

        $service = Service::create([
            'name' => $request->name,
            'service_status_id' => $request->status,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect('/admin/s/services/'.$service->id)->with(['alert' => 'add']);

    }

    // GET:admin/s/services/{service}
    public function show(Service $service){
        $alert = session()->get('alert');

        $categories = Category::active();
        $statuses = ServiceStatus::all();

        return view('back.services.services.show', compact('service', 'alert', 'categories', 'statuses'));
    }

    // POST:admin/s/services/{service}
    public function update(Request $request, Service $service){
        
        $messages = [
            'category_id.required' => 'The category field is required.'
        ];

        $validated = $request->validate([
            'name' => 'required|string|max:191',
            'price' => 'required|numeric',
            'category_id' => 'required'
        ], $messages);

        $service->name = $request->name;
        $service->service_status_id = $request->status;
        $service->price = $request->price;
        $service->description = $request->description;
        $service->category_id = $request->category_id;
        $service->save();

        return redirect('/admin/s/services/'.$service->id)->with(['alert' => 'update']);
    }

    //POST:admin/s/services/{service}/replicate
    public function replicate(Request $request, Service $service){

        $newService = $service->replicate();

        $newService->name = $request->name;
        $newService->save();
        
        return redirect('/admin/s/services/'.$newService->id)->with(['alert' => 'add']);
    }

    // POST:api/admin/s/services/remove
    public function destroy(Request $request){
        $service = Service::where('id', $request->id)->first();
        if($service){
            $service->delete();
        }
    }
}