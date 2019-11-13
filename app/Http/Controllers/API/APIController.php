<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class APIController extends Controller
{
    public function fallback(){
        return response()->json([
            'error' => 'Page Not Found. Kindly check the url you entered.'
        ], 404);
    }
}