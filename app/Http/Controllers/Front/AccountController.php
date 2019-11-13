<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\Models\Order;
use App\Models\OrderStatus as Status;

use App\Models\ProductVariant;
use App\Models\User;

class AccountController extends Controller
{
    public function dashboard(){
        $title = 'My Account';
        $content = 'dashboard';
        return view('front.account.content', compact('content', 'title'));
    }

    public function orders(){
        $title = 'Order History';
        $content = 'orders';
        return view('front.account.content', compact('content', 'title'));
    }

    public function profile(){
        $title = 'Profile Overview';
        $content = 'profile';
        return view('front.account.content', compact('content', 'title'));
    }

    public function profileUpdate(Request $request){
        $validated = $request->validate([
            'address' => 'required|string',
            'name' => 'required|string|max:191',
            'phone' => 'required|string|max:191',
        ]);

        $user = auth()->user();

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->save();

        $address = $user->defaultAddress();
        $address->address = $request->address;
        $address->first_name = $request->name;
        $address->phone = $request->phone;
        $address->save();

        return redirect('/account/profile');
    }

    public function passwordUpdate(Request $request){
        $validated = $request->validate([
            'old_password' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = auth()->user();
        if(Hash::check($request->old_password, $user->password)){
            $user->password = Hash::make($request->password);
            $user->save();
        }
        else{
            return redirect()->back()->withErrors(['old_password' => ['Wrong password']]);
        }
        return redirect('/account/profile');
    }

    public function showOrder($reference)
    {
        $customer = auth()->guard('web')->user();

        $order = Order::where('reference', $reference)->first();

        if($order && $order->user->id == $customer->id){
            $allowedToCancel = false;
            $allowedToReturn = false;

            if($order->status->id == Status::pending() || $order->status->id == Status::readyToShip()){
                $allowedToCancel = true;
            }

            if($order->status->id == Status::delivered()){
                $allowedToReturn = true;
            }

            $title = 'Order #: '.$order->reference;
            $content = 'order-single';

            return view('front.account.content', compact('title', 'content', 'order', 'allowedToCancel', 'allowedToReturn'));
        }

        return redirect()->back();
    }

    public function printOrderInvoice($reference){
        $customer = auth()->guard('web')->user();

        $order = Order::where('reference', $reference)->first();

        if($order && $order->user->id == $customer->id){

            return view('front.account.components.order-invoice', compact('order'));
        }

        return redirect()->back();
    }

    public function cancelOrder(Request $request)
    {
        $customer = auth()->guard('web')->user();

        $order = Order::where('reference', $request->reference)->first();

        if($order && $order->user->id == $customer->id){
            $items = $order->items;

            foreach($items as $item){
                $variant = ProductVariant::find($item->product_variant_id);
                $qty = $variant->quantity + $item->quantity;
                $variant->quantity = $qty;
                $variant->save();
            }

            $order->order_status_id = Status::cancelled();
            $order->save();

            return response()->json( true );
        }

        return response()->json( false );
    }
}