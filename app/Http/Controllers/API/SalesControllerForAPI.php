<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Str;
use App\Models\Service;
use App\Models\JobStatus;
use App\Models\Job;
use App\Models\Payment;
use App\Models\UserAddress;

class SalesControllerForAPI extends Controller
{    
    public function jobs(){
        $jobs = Job::where('user_id', auth()->user()->id)
            ->get()
            ->map(function ($job){
                $status = false;
                if($job->job_status_id == JobStatus::completed()){                    
                    $status = true;
                }

                $name = $job->job_notes;
                if($job->name){
                    $name = $job->name;
                }
                return [
                    'id' => $job->id,
                    'reference' => $job->reference,
                    'status' => $status,
                    'category_id' => $job->category_id,
                    'service_id' => ($job->service) ? $job->service->id : '-1',
                    'name' => ($job->name) ? $job->name : $job->job_notes,
                    'price' => $job->payment->total_price,
                    'description' => $job->job_notes,
                    'date' => Carbon::parse($job->schedule_date)->format('F d, Y'),
                    'time' => $job->schedule_time,
                    'address' => $job->customer->defaultAddress()->address,
                    'phone' => $job->customer->defaultAddress()->phone,
                ];
            });

        return response()->json([
            'jobs' => $jobs,
        ]);
    }

    public function jobRequest(Request $request){
        $service_id = null;
        $name = null;
        $price = $request->price;

        if($request->service_id != '-1'){
            $service = Service::find($request->service_id);
            if($service){
                $service_id = $service->id;
                $name = $service->name;
                $price = $service->price;
            }
        }

        $reference = '1001';
        $reference.= substr(date('Y'), 2, 4);
        $reference.= str_pad(date('m'), 2, '0', STR_PAD_LEFT);
        $reference.= str_pad(\DB::table('jobs')->max('id') + 1, 4, '0', STR_PAD_LEFT);

        $user = auth()->user();

        $address = UserAddress::updateOrCreate(
            ['user_id' => $user->id, 'default' => 1],
            ['address' => $request->address, 'phone' => $request->phone]
        );


        $job = Job::create([
            'reference' => $reference,
            'job_status_id' => JobStatus::pending(),
            'category_id' => $request->category_id,
            'service_id' => $service_id,
            'user_id' => $user->id,
            'name' => $name,
            'price' => $price,
            'job_notes' => $request->job_notes,
            'user_address_id' => $address->id,
            'schedule_date' => Carbon::createFromFormat('M d, Y', $request->schedule_date)->format('Y-m-d'),
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

        return response()->json([
            'job' => [
                'id' => $job->id,
                'reference' => $job->reference,
                'status' => true,
                'category_id' => $job->category_id,
                'service_id' => ($job->service) ? $job->service->id : '-1',
                'name' => ($job->name) ? $job->name : $job->job_notes,
                'price' => $job->payment->total_price,
                'description' => $job->job_notes,
                'date' => Carbon::parse($job->schedule_date)->format('F d, Y'),
                'time' => $job->schedule_time,
                'address' => $job->customer->defaultAddress()->address,
                'phone' => $job->customer->defaultAddress()->phone,
            ]
        ]);
    }

    public function payment(Request $request){
        $payment = Payment::where('job_id', $request->job_id)->first();

        return response()->json([
            'payment' => $payment
        ]);
    }
}