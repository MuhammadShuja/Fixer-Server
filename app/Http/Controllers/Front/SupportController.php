<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Order;

class SupportController extends Controller
{
    public function faq(){
        return view('front.support.faq.content');
    }

    public function termsAndConditions(){
        return view('front.support.terms.content');
    }

    public function trackOrder(){
        return view('front.support.track-order.content');
    }

    public function trackOrderSubmit(Request $request){
    	$validated = $request->validate([
            'order_reference_id' => 'required|numeric|digits:16',
        ]);

        $order = Order::where('reference', $request->order_reference_id)->first();

        if($order){
        	$reference = $order->reference;
        	$status = $order->status->label;

        	return view('front.support.track-order.show', compact('reference', 'status'));

        }

        return redirect()->back()->withErrors(['order_reference_id' => ['Wrong ID, Please provide a valid order reference ID']]);
        
    }
}