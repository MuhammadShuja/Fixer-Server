<?php

namespace App\Http\Controllers\Back\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;

use App\Models\Service;
use App\Models\Worker;
use App\Models\User;
use App\Models\UserStatus;
use App\Models\JobStatus;
use App\Models\Job;
use App\Models\Payment;

class JobsController extends Controller
{
    private $job_time_periods = [
        '09 AM - 10 AM',
        '10 AM - 11 AM',
        '11 AM - 12 PM',
        '12 PM - 01 PM',
        '01 PM - 02 PM',
        '02 PM - 03 PM',
        '03 PM - 04 PM',
        '04 PM - 05 PM',
        '05 PM - 06 PM',
    ];

    // GET:admin/jobs
    public function index()
    {
        $statuses = JobStatus::all();
        return view('back.sales.job.index', compact('statuses'));
    }

    // GET:api/admin/jobs
    public function indexAPI()
    {
        // id, reference, service, job, amount, payment, created_at

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
            $jobs = Job::get()
                ->map(function ($job){
                    return [
                        'id' => $job->id,
                        'reference' => $job->reference,
                        'service' => ($job->service) ? $job->service->name : '-',
                        'customer' => $job->customer->name,
                        'worker' => ($job->worker)? $job->worker->name : '-',
                        'amount' => config('app.currency').' '.$job->price,
                        'payment' => 'pending',
                        'created_at' => Carbon::parse($job->created_at)->format('F d, Y \a\t h:i a')
                    ];
                });
        }
        else{
            $s = JobStatus::where('key', $status)->first();
            $jobs = Job::where('job_status_id', $s->id)->get()
                ->map(function ($job){
                    return [
                        'id' => $job->id,
                        'reference' => $job->reference,
                        'service' => ($job->service) ? $job->service->name : '-',
                        'customer' => $job->customer->name,
                        'worker' => ($job->worker)? $job->worker->name : '-',
                        'amount' => config('app.currency').' '.$job->price,
                        'payment' => 'pending',
                        'created_at' => Carbon::parse($job->created_at)->format('F d, Y \a\t h:i a')
                    ];
                });
        }

        return datatables($jobs)->make(true);
    }

    // GET:admin/jobs/new
    public function create(){
        $services = Service::active();
        $customers = User::active();

        $time_periods = $this->job_time_periods;

        return view('back.sales.job.new', compact('services', 'customers', 'time_periods'));
    }

    // POST:admin/jobs/new
    public function store(Request $request){

        $messages = [
            'service_id.required' => 'The service field is required.',
            'user_id.required' => 'The user field is required.',
            'schedule_date.required' => 'The date field is required.',
            'schedule_time.required' => 'The time field is required.',
        ];

        $validated = $request->validate([
            'service_id' => 'required',
            'user_id' => 'required',
            'schedule_date' => 'required',
            'schedule_time' => 'required',
        ], $messages);

        $reference = '1001';
        $reference.= substr(date('Y'), 2, 4);
        $reference.= str_pad(date('m'), 2, '0', STR_PAD_LEFT);
        $reference.= str_pad(\DB::table('jobs')->max('id') + 1, 4, '0', STR_PAD_LEFT);

        $service = Service::find($request->service_id);
        $user = User::find($request->user_id);

        $job = Job::create([
            'reference' => $reference,
            'job_status_id' => JobStatus::pending(),
            'category_id' => $service->category_id,
            'service_id' => $request->service_id,
            'user_id' => $request->user_id,
            'name' => $service->name,
            'price' => $service->price,
            'job_notes' => $request->job_notes,
            'user_address_id' => $user->defaultAddress()->id,
            'schedule_date' => Carbon::createFromFormat('d/m/Y', $request->schedule_date)->format('Y-m-d'),
            'schedule_time' => $request->schedule_time,
        ]);

        $payment = Payment::create([
            'job_id' => $job->id,
            'status' => 'pending',
            'sub_total_price' => $job->price,
            'discount' => '0',
            'extra_cost' => '0',
            'total_price' => $job->price,
        ]);

        return redirect('/admin/jobs/'.$job->id)->with(['alert' => 'add']);

    }

    // GET:admin/jobs/{job}
    public function show(Job $job){
        $alert = session()->get('alert');
        $statuses = JobStatus::all();
        $workers = Worker::where([
            ['category_id', $job->category->id],
            ['user_status_id', UserStatus::active()]
        ])->get();

        return view('back.sales.job.show', compact('job', 'alert', 'statuses', 'workers'));
    }

    // POST:admin/jobs/{job}/update-worker
    public function updateWorker(Request $request, Job $job){
        $messages = [
            'worker_id.required' => 'Kindly select a worker to assign.',
        ];

        $validated = $request->validate([
            'worker_id' => 'required',
        ], $messages);

        $job->worker_id = $request->worker_id;

        if($job->status->id == JobStatus::pending()){
            $job->job_status_id = JobStatus::assigned();
        }

        $job->save();

        return redirect('/admin/jobs/'.$job->id)->with(['alert' => 'update']);
    }

    // POST:admin/jobs/{job}/update-status
    public function updateStatus(Request $request, Job $job){

        $validated = $request->validate([
            'job_status_id' => 'required',
        ]);

        $job->job_status_id = $request->job_status_id;
        $job->save();

        return redirect('/admin/jobs/'.$job->id)->with(['alert' => 'update']);
    }

    // POST:admin/jobs/{job}/update-payment
    public function updatePayment(Request $request, Job $job){

        $validated = $request->validate([
            'status' => 'required',
        ]);

        $payment = $job->payment;

        $payment->status = $request->status;
        $payment->save();

        return redirect('/admin/jobs/'.$job->id)->with(['alert' => 'update']);
    }
}