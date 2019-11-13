<?php

namespace App\Http\Controllers\Back\Subscriptions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Image;
use Uuid;

use App\Models\Subscription;

/*
-----------------------------------------------------------------------------------------------
| TABLE > subscriptions
|----------------------------------------------------------------------------------------------
| COLUMNS > COMPULSORY 
| name, slug
|----------------------------------------------------------------------------------------------
| COLUMNS > NULLABLE
| status, description, logo, alt_text, views, sold
| meta_title, meta_keywords, meta_description
-----------------------------------------------------------------------------------------------
*/

class SubscriptionsController extends Controller
{
    // GET:admin/p/subscriptions
    public function index()
    {
        return view('back.services.subscriptions.index');
    }

    // GET:api/admin/p/subscriptions
    public function indexAPI()
    {
        // id, name, logo, products, created_at

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
            $subscriptions = Subscription::get()
                ->map(function ($subscription){
                    return [
                        'id' => $subscription->slug,
                        'logo' => ($subscription->logo) ? \URL::asset($subscription->logo) : \URL::asset('/images/default/image-placeholder.svg'),
                        'name' => $subscription->name,
                        'products' => count($subscription->products),
                        'created_at' => $subscription->created_at->toDateTimeString()
                    ];
                });
        }
        else{
            $subscriptions = Subscription::where('status', $status)->get()
                ->map(function ($subscription){
                    return [
                        'id' => $subscription->slug,
                        'logo' => ($subscription->logo) ? \URL::asset($subscription->logo) : \URL::asset('/images/default/image-placeholder.svg'),
                        'name' => $subscription->name,
                        'products' => count($subscription->products),
                        'created_at' => $subscription->created_at->toDateTimeString()
                    ];
                });
        }

        return datatables($subscriptions)->make(true);
    }    

    // GET:admin/p/subscriptions/new
    public function create(){
        return view('back.services.subscriptions.new');
    }

    // POST:admin/p/subscriptions/new
    public function store(Request $request){
        $requestData = $request->all();
        $requestData['slug'] = substr($request->slug, strrpos($request->slug, '/') + 1);
        $request->replace($requestData);

        $validated = $request->validate([
            'name' => 'required|string|max:191',
            'slug' => 'required|string|unique:subscriptions|max:191'
        ]);

        $subscription = Subscription::create([
            'name' => $request->name,
            'status' => $request->status,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'slug' => $request->slug,
        ]);

        if($request->logo){
            if (!file_exists('storage/subscriptions/')) {
                mkdir('storage/subscriptions/', 666, true);
            }

            $img = Image::make($request->logo);
            $img->resize(300, 300);

            $storagePath = 'storage/subscriptions/'.Uuid::generate()->string.'.jpg';

            $img = $img->save($storagePath);
            
            $subscription->logo = $storagePath;
            $subscription->alt_text = $request->alt_text;
            $subscription->save();
        }

        return redirect('/admin/p/subscriptions/'.$subscription->slug)->with(['alert' => 'add']);

    }

    // GET:admin/p/subscriptions/{subscription}
    public function show(Subscription $subscription){
        $alert = session()->get('alert');

        return view('back.services.subscriptions.show', compact('subscription', 'alert'));
    }

    // POST:admin/p/subscriptions/{subscription}
    public function update(Request $request, Subscription $subscription){

        $requestData = $request->all();
        $requestData['slug'] = substr($request->slug, strrpos($request->slug, '/') + 1);
        $request->replace($requestData);

        if($request->slug == $subscription->slug){
            $validated = $request->validate([
                'name' => 'required|string|max:191',
                'slug' => 'required|string|max:191'
            ]);
        }
        else{
            $validated = $request->validate([
                'name' => 'required|string|max:191',
                'slug' => 'required|string|unique:subscriptions|max:191'
            ]);
        }
        

        $subscription->name = $request->name;
        $subscription->status = $request->status;
        $subscription->description = $request->description;
        $subscription->alt_text = $request->alt_text;
        $subscription->meta_title = $request->meta_title;
        $subscription->meta_keywords = $request->meta_keywords;
        $subscription->meta_description = $request->meta_description;
        $subscription->slug = $request->slug;

        if($request->logo){
            if (!file_exists('storage/subscriptions/')) {
                mkdir('storage/subscriptions/', 666, true);
            }

            if ($subscription->logo){
                unlink($subscription->logo);
            }
            $img = Image::make($request->logo);
            $img->resize(300, 300);

            $storagePath = 'storage/subscriptions/'.Uuid::generate()->string.'.jpg';

            $img = $img->save($storagePath);
            
            $subscription->logo = $storagePath;

        }

        $subscription->save();

        return redirect('/admin/p/subscriptions/'.$subscription->slug)->with(['alert' => 'update']);
    }

    // POST:api/admin/p/subscriptions/remove
    public function destroy(Request $request){
        $subscription = Subscription::where('id', $request->id)->first();
        if ($subscription->logo){
            unlink($subscription->logo);
        }

        $subscription->delete();
    }
}