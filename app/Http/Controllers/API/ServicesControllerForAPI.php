<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Str;

use App\Models\Category;
use App\Models\ServiceStatus;
use App\Models\Service;

class ServicesControllerForAPI extends Controller
{
    public function categories(Request $request){
    	$categories = Category::where('status', 'active')
            ->orderBy('position', 'ASC')
            ->get()
	        ->map(function ($category){
	            return [
	                'id' => $category->id,
	                'name' => $category->name,
                    'thumbnail' => \URL::asset($category->thumbnail),
	            ];
	        });

        return response()->json([
            'categories' => $categories,
        ]);
    }

    public function services(Request $request){
        if($request->category){
            return $this->servicesFromCategory($request->category);
        }
        else{
            return $this->servicesAll();
        }
    }

    private function servicesFromCategory($category){
        $services = Service::where([
                ['category_id', $category],
                ['service_status_id', ServiceStatus::active()],
            ])
            ->get()
            ->map(function ($service){
                return [
                    'id' => $service->id,
                    'name' => $service->name,
                    'price' => $service->price,
                    'description' => $service->description,
                    'category_id' => $service->category->id,
                ];
            });

        return response()->json([
            'services' => $services,
        ]);
    }

    private function servicesAll(){
        $services = Service::where('service_status_id', ServiceStatus::active())
            ->get()
            ->map(function ($service){
                return [
                    'id' => $service->id,
                    'name' => $service->name,
                    'price' => $service->price,
                    'description' => $service->description,
                    'category_id' => $service->category->id,
                ];
            });

        return response()->json([
            'services' => $services,
        ]);
    }
}