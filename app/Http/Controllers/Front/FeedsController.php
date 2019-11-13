<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Exports\FacebookFeed;
use Maatwebsite\Excel\Facades\Excel;

class FeedsController extends Controller
{

    public function facebook(){
        // return (new FacebookFeed)->download('feeds.csv', \Maatwebsite\Excel\Excel::CSV);
        return Excel::download(new FacebookFeed, 'feeds.csv');
    }

}