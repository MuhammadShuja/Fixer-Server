<?php

namespace App\Http\Controllers\Back\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Image;
use Uuid;

use App\Models\Category;

/*
-----------------------------------------------------------------------------------------------
| TABLE > categories
|----------------------------------------------------------------------------------------------
| COLUMNS > COMPULSORY 
| name
|----------------------------------------------------------------------------------------------
| COLUMNS > NULLABLE
| parent, position, status, code, description, thumbnail, thumbnail_alt_text
-----------------------------------------------------------------------------------------------
*/

class CategoriesController extends Controller
{
    // Path to store media
    private $path_to_storage = 'storage/categories/';

	// GET:admin/s/categories
    public function index()
    {
        return view('back.services.categories.index');
    }

    // GET:api/admin/s/categories
    public function indexAPI()
    {
        // id, name, code, thumbnail, services, description, created_at

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
            $categories = Category::orderBy('position', 'ASC')->get()
                ->map(function ($category){
                    return [
                        'id' => $category->id,
                        'thumbnail' => $category->thumbnail(),
                        'name' => $category->name,
                        'code' => ($category->code) ? $category->code: '-',
                        'services' => count($category->services),
                        'workers' => count($category->workers),
                        'description' => ($category->description) ? $category->description: '-',
                        'created_at' => $category->created_at->toDateTimeString()
                    ];
                });
        }
        else{
            $categories = Category::where('status', $status)->orderBy('position', 'ASC')->get()
                ->map(function ($category){
                    return [
                        'id' => $category->id,
                        'thumbnail' => $category->thumbnail(),
                        'name' => $category->name,
                        'code' => ($category->code) ? $category->code: '-',
                        'services' => count($category->services),
                        'workers' => count($category->workers),
                        'description' => ($category->description) ? $category->description: '-',
                        'created_at' => $category->created_at->toDateTimeString()
                    ];
                });
        }

        return datatables($categories)->make(true);
    }    

    // GET:admin/s/categories/new
    public function create(){
        return view('back.services.categories.new');
    }

    // POST:admin/s/categories/new
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:191',
        ]);

        $position = count(Category::all());
        $position++;

        $category = Category::create([
            'name' => $request->name,
            'status' => $request->status,
            'position' => $position,
            'code' => $request->code,
            'description' => $request->description,
        ]);

        if($request->thumbnail){
            $category->thumbnail = $this->storeThumbnail($request->thumbnail);
            $category->thumbnail_alt_text = $request->thumbnail_alt_text;
            $category->save();
        }

        return redirect('/admin/s/categories/'.$category->id)->with(['alert' => 'add']);

    }

    // GET:admin/s/categories/{category}
    public function show(Category $category){
        $alert = session()->get('alert');
        return view('back.services.categories.show', compact('category', 'alert'));
    }

    // POST:admin/s/categories/{category}
    public function update(Request $request, Category $category){
        $validated = $request->validate([
            'name' => 'required|string|max:191'
        ]);

        $category->name = $request->name;
        $category->code = $request->code;
        $category->status = $request->status;
        $category->description = $request->description;
        $category->thumbnail_alt_text = $request->thumbnail_alt_text;

        if($request->thumbnail){
            if ($category->thumbnail){
                unlink($category->thumbnail);
            }
            
            $category->thumbnail = $this->storeThumbnail($request->thumbnail);
        }

        $category->save();

        return redirect('/admin/s/categories/'.$category->id)->with(['alert' => 'update']);
    }


    //POST:admin/s/categories/{category}/replicate
    public function replicate(Request $request, Category $category){
        $newCategory = $category->replicate();
        $newCategory->name = $request->name;

        if($category->thumbnail){
            $newCategory->thumbnail = $this->storeThumbnail($category->thumbnail);
            $newCategory->thumbnail_alt_text = $category->thumbnail_alt_text;
        }

        $newCategory->save();
        
        return redirect('/admin/s/categories/'.$newCategory->id)->with(['alert' => 'add']);
    }

    // POST:api/admin/s/categories/remove
    public function destroy(Request $request){
        $category = Category::where('id', $request->id)->first();
        if ($category->thumbnail){
            unlink($category->thumbnail);
        }

        $category->delete();
    }

    private function storeThumbnail($image){
        $this->checkDir();

        $img = Image::make($image);
        $img->resize(300, 300);

        $storagePath = $this->path_to_storage.Uuid::generate()->string.'.png';

        $img = $img->save($storagePath);

        return $storagePath;
    }

    private function checkDir(){
        if (!file_exists($this->path_to_storage)) {
            mkdir($this->path_to_storage, 775, true);
        }
    }

    // GET:/admin/s/categories/hierarchy
    public function hierarchy(){
        $categories = Category::orderBy('position', 'ASC')->get();
        return view('back.services.categories.hierarchy', compact('categories'));
    }

    // POST:/admin/p/categories/hierarchy
    public function sort(Request $request){
        $data = json_decode($request->data);
        foreach($data as $key=>$val){
            $category = Category::find($val->id);
            $category->position = $key+1;
            $category->save();
        }
    }
}