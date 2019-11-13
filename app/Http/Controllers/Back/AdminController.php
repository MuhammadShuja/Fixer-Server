<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Job;
use App\Models\JobStatus as Status;
use App\Models\Service;
use App\Models\Payment;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function dashboard(){

        $currentDate = \Carbon\Carbon::now();
        $agoDate = $currentDate->startOfWeek()->subWeek();

        $lt_sales = Payment::where('status', 'paid')->sum('total_price');
        $lw_sales = Payment::where('status', 'paid')
                        ->where('created_at', '>=', Carbon::today()->subDays(7))
                        ->sum('total_price');
        $pw_sales = Payment::where('status', 'paid')
                                ->where('created_at', '>=', Carbon::today()->subDays(14))
                                ->where('created_at', '<=', Carbon::today()->subDays(7))
                                ->sum('total_price');
        $trend_sales = '<i class="fa fa-lg fa-caret-left font-blue-hoki"></i><i class="fa fa-lg fa-caret-right font-blue-hoki"></i>';
        if($lw_sales > $pw_sales){
            $trend_sales = '<i class="fa fa-lg fa-caret-up font-green-jungle"></i>';
        }
        elseif($lw_sales < $pw_sales){
            $trend_sales = '<i class="fa fa-lg fa-caret-down font-red-thunderbird"></i>';
        }

        $lt_jobs = Job::all()->count();
        $lw_jobs = Job::where('created_at', '>=', Carbon::today()->subDays(7))->count();
        $pw_jobs = Job::where('created_at', '>=', Carbon::today()->subDays(14))
                                ->where('created_at', '<=', Carbon::today()->subDays(7))
                                ->count();
        $trend_jobs = '<i class="fa fa-lg fa-caret-left font-blue-hoki"></i><i class="fa fa-lg fa-caret-right font-blue-hoki"></i>';
        if($lw_jobs > $pw_jobs){
            $trend_jobs = '<i class="fa fa-lg fa-caret-up font-green-jungle"></i>';
        }
        elseif($lw_jobs < $pw_jobs){
            $trend_jobs = '<i class="fa fa-lg fa-caret-down font-red-thunderbird"></i>';
        }

        $lt_users = User::all()->count();
        $lw_users = User::where('created_at', '>=', Carbon::today()->subDays(7))->count();
        $pw_users = User::where('created_at', '>=', Carbon::today()->subDays(14))
                                ->where('created_at', '<=', Carbon::today()->subDays(7))
                                ->count();
        $trend_users = '<i class="fa fa-lg fa-caret-left font-blue-hoki"></i><i class="fa fa-lg fa-caret-right font-blue-hoki"></i>';
        if($lw_users > $pw_users){
            $trend_users = '<i class="fa fa-lg fa-caret-up font-green-jungle"></i>';
        }
        elseif($lw_users < $pw_users){
            $trend_users = '<i class="fa fa-lg fa-caret-down font-red-thunderbird"></i>';
        }

        $lt_services = Service::all()->count();
        $lw_services = Service::where('created_at', '>=', Carbon::today()->subDays(7))->count();
        $pw_services = Service::where('created_at', '>=', Carbon::today()->subDays(14))
                                ->where('created_at', '<=', Carbon::today()->subDays(7))
                                ->count();
        $trend_services = '<i class="fa fa-lg fa-caret-left font-blue-hoki"></i><i class="fa fa-lg fa-caret-right font-blue-hoki"></i>';
        if($lw_services > $pw_services){
            $trend_services = '<i class="fa fa-lg fa-caret-up font-green-jungle"></i>';
        }
        elseif($lw_services < $pw_services){
            $trend_services = '<i class="fa fa-lg fa-caret-down font-red-thunderbird"></i>';
        }

        $completed_jobs = Job::where('job_status_id', Status::completed())->count();
        $completed_jobs = ($lt_jobs > 0) ? number_format((float) $completed_jobs / $lt_jobs * 100, 2, '.', '') : 0;
        $rejected_jobs = Job::where('job_status_id', Status::rejected())->count();
        $rejected_jobs = ($lt_jobs > 0) ? number_format((float) $rejected_jobs / $lt_jobs * 100, 2, '.', '') : 0;
        $cancelled_jobs = Job::where('job_status_id', Status::cancelled())->count();
        $cancelled_jobs = ($lt_jobs > 0) ? number_format((float) $cancelled_jobs / $lt_jobs * 100, 2, '.', '') : 0;

        $pending_jobs_count = Job::where('job_status_id', Status::pending())->count();
    	$rts_jobs_count = Job::where('job_status_id', Status::assigned())->count();
    	$latest_users = User::orderBy('id', 'desc')->take(6)->get();
    	$latest_jobs = Job::orderBy('id', 'desc')->take(6)->get();
    	$latest_services = Service::orderBy('id', 'desc')->take(6)->get();



        for( $i = 30 ; $i > 0 ; $i-- ){
            $date_start = Carbon::today()->subDays($i);
            $date_end = Carbon::today()->subDays($i+1);
            $l30_sales[] = Job::where('job_status_id', Status::completed())
                        ->where('created_at', '<=', $date_start)
                        ->where('created_at', '>=', $date_end)
                        ->sum('price');

        }

        for( $i = 30 ; $i > 0 ; $i-- ){
            $date_start = Carbon::today()->subDays($i);
            $date_end = Carbon::today()->subDays($i+1);
            $l30_jobs[] = Job::where('created_at', '<=', $date_start)
                        ->where('created_at', '>=', $date_end)
                        ->count();
        }

        $l30_sales = implode(',', $l30_sales);
        $l30_jobs = implode(',', $l30_jobs);
        
    	return view('back.dashboard.content', compact('pending_jobs_count', 'rts_jobs_count', 'latest_users', 'latest_jobs', 'latest_services', 'lt_sales', 'lw_sales', 'trend_sales', 'lt_jobs', 'lw_jobs', 'trend_jobs', 'lt_users', 'lw_users', 'trend_users', 'lt_services', 'lw_services', 'trend_services', 'completed_jobs', 'rejected_jobs', 'cancelled_jobs', 'l30_sales', 'l30_jobs'));
    }
}