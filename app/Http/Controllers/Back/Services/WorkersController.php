<?php

namespace App\Http\Controllers\Back\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Image;
use Uuid;

use App\Models\UserStatus;
use App\Models\Category;
use App\Models\Worker;
use App\Models\Job;
use App\Models\JobStatus;

/*
-----------------------------------------------------------------------------------------------
| TABLE > workers
|----------------------------------------------------------------------------------------------
| COLUMNS > COMPULSORY 
| user_status_id, category_id, name, username, password
|----------------------------------------------------------------------------------------------
| COLUMNS > NULLABLE
| email, phone, avatar, avatar_alt_text
-----------------------------------------------------------------------------------------------
*/

class WorkersController extends Controller
{
    // Path to store media
    private $path_to_storage = 'storage/workers/';

    // GET:admin/s/workers
    public function index()
    {
        $statuses = UserStatus::all();
        return view('back.services.workers.index', compact('statuses'));
    }

    // GET:api/admin/s/workers
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
            $workers = Worker::get()
                ->map(function ($worker){
                    $active_jobs = count(Job::where([['worker_id', $worker->id], ['job_status_id', JobStatus::assigned()]])->get());

                    $completed_jobs = count(Job::where([['worker_id', $worker->id], ['job_status_id', JobStatus::completed()]])->get());
                    return [
                        'id' => $worker->id,
                        'avatar' => ($worker->avatar) ? \URL::asset($worker->avatar) : \URL::asset('/images/default/image-placeholder.svg'),
                        'name' => $worker->name,
                        'phone' => ($worker->phone) ? $worker->phone : '-',
                        'category' => ($worker->category) ? $worker->category->name : '-',
                        'active_jobs' => $active_jobs,
                        'completed_jobs' => $completed_jobs,
                        'created_at' => $worker->created_at->toDateTimeString()
                    ];
                });
        }
        else{
            $status = UserStatus::where('key', $status)->first();
            $workers = Worker::where('user_status_id', $status->id)->get()
                ->map(function ($worker){
                    $active_jobs = count(Job::where([['worker_id', $worker->id], ['job_status_id', JobStatus::assigned()]])->get());

                    $completed_jobs = count(Job::where([['worker_id', $worker->id], ['job_status_id', JobStatus::completed()]])->get());
                    return [
                        'id' => $worker->id,
                        'avatar' => ($worker->avatar) ? \URL::asset($worker->avatar) : \URL::asset('/images/default/image-placeholder.svg'),
                        'name' => $worker->name,
                        'phone' => ($worker->phone) ? $worker->phone : '-',
                        'category' => ($worker->category) ? $worker->category->name : '-',
                        'active_jobs' => $active_jobs,
                        'completed_jobs' => $completed_jobs,
                        'created_at' => $worker->created_at->toDateTimeString()
                    ];
                });
        }

        return datatables($workers)->make(true);
    }    

    // GET:admin/s/workers/new
    public function create(){
        $statuses = UserStatus::all();
        $categories = Category::active();
    	return view('back.services.workers.new', compact('statuses', 'categories'));
    }

    // POST:admin/s/workers/new
    public function store(Request $request){

        $messages = [
            'category_id.required' => 'The category field is required.'
        ];

        $validated = $request->validate([
            'name' => 'required|string|max:191',
            'username' => 'required|string|unique:workers|max:191',
            'password' => 'required|string|min:6|confirmed',
            'category_id' => 'required',
        ], $messages);

        $worker = Worker::create([
            'name' => $request->name,
            'user_status_id' => $request->status,
            'category_id' => $request->category_id,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'phone' => $request->mobile,
        ]);

        if($request->avatar){
            $worker->avatar = $this->storeAvatar($request->avatar);
            $worker->avatar_alt_text = $request->avatar_alt_text;
            $worker->save();
        }

        return redirect('/admin/s/workers/'.$worker->id)->with(['alert' => 'add']);

    }

    // GET:admin/s/workers/{worker}
    public function show(Worker $worker){
        $alert = session()->get('alert');
        $statuses = UserStatus::all();
        $categories = Category::active();

        return view('back.services.workers.show', compact('worker', 'statuses', 'categories', 'alert'));
    }

    // POST:admin/s/workers/{worker}
    public function update(Request $request, Worker $worker){

        $messages = [
            'category_id.required' => 'The category field is required.'
        ];

        $validated = $request->validate([
            'name' => 'required|string|max:191',
            'category_id' => 'required',
        ], $messages);

        $worker->name = $request->name;
        $worker->user_status_id = $request->status;
        $worker->category_id = $request->category_id;
        $worker->email = $request->email;
        $worker->phone = $request->phone;
        $worker->avatar_alt_text = $request->avatar_alt_text;
        $worker->save();

        if($request->password){
            $validated = $request->validate([
                'password' => 'required|string|min:6|confirmed',
            ]);

            $worker->password = Hash::make($request->password);
            $worker->save();
        }

        if($request->avatar){
            if ($worker->avatar){
                unlink($worker->avatar);
            }
            
            $worker->avatar = $this->storeAvatar($request->avatar);
            $worker->save();
        }

        return redirect('/admin/s/workers/'.$worker->id)->with(['alert' => 'update']);
    }

    // POST:api/admin/s/workers/remove
    public function destroy(Request $request){
        $worker = Worker::find($request->id);

        if($worker){
            if ($worker->avatar){
                unlink($worker->avatar);
            }

            $worker->delete();
        }
    }

    private function storeAvatar($image){
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
}