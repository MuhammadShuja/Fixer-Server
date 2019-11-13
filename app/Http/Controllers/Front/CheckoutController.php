<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\UserAddress;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use App\Models\ProductVariant;
use Session;
use Validator;

class CheckoutController extends Controller
{
    public function index()
    {
    	$cart = Session::get('cart');
        if($cart){
    		if(count($cart->items) > 0){
                $user = auth()->guard('web')->user();
                $default = $user->defaultAddress();
                $addressBook = $user->addressBook();
	        	return view('front.checkout.content', compact('cart', 'default', 'addressBook'));
	    	}
            else{
                return redirect('/cart');
            }

    	}    	
    	else{
    		return redirect('/cart');
    	}
    	
    }

    public function order(Request $request){
        $user = auth()->guard('web')->user();

        $address = $request->default;
        if(empty($address)){
            $this->validator($request->all())->validate();
            $address = $this->newAddress($request);
            $address = $address->id;
        }

        $order = $this->placeOrder($request, $user->id, $address);

        return redirect('/thank-you')->with(['order' => $order]);
    }

    private function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);
    }

    private function newAddress(Request $request)
    {
        $user = auth()->guard('web')->user();

        $default = $user->defaultAddress();
        if($default){
            $default->default = false;
            $default->save();
        }

        $address = UserAddress::create([
            'user_id' => $user->id,
            'first_name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'country' => $request->country,
            'city' => $request->city,
            'default' => true
        ]);

        return $address;
    }

    private function placeOrder($request, $user_id, $user_address_id){
        $cart = Cart::find(Session::get('cart')->id);
        $reference = '1003';
        $reference.= substr(date('Y'), 2, 4);
        $reference.= str_pad(date('m'), 2, '0', STR_PAD_LEFT);
        $reference.= str_pad(\DB::table('orders')->max('id') + 1, 8, '0', STR_PAD_LEFT);

        $order = Order::create([
            'reference' => $reference,
            'user_id' => $user_id,
            'order_status_id' => OrderStatus::pending(),
            'total_items' => $cart->total_items,
            'sub_total_price' => $cart->sub_total_price,
            'discount' => '0',
            'shipping_cost' => $cart->shipping_cost,
            'extra_cost' => $cart->extra_cost,
            'tax' => '0',
            'total_price' => $cart->total_price,
            'user_address_id' => $user_address_id,
            'order_notes' => $request->notes
        ]);

        foreach($cart->items as $item){
            OrderItem::create([
                'order_id' => $order->id,
                'product_variant_id' => $item->product_variant_id,
                'product_id' => $item->product_id,
                'slug' => $item->slug,                
                'name' => $item->name,
                'thumbnail' => $item->thumbnail,
                'quantity' => $item->quantity,
                'item_price' => $item->itemPrice,
                'sub_total_price' => $item->sub_total_price,
                'item_extra_cost' => $item->item_extra_cost,
                'total_extra_cost' => $item->total_extra_cost,
                'shipping_cost' => $item->shipping_cost,
                'total_price' => $item->total_price,
            ]);

            $variant = ProductVariant::find($item->product_variant_id);

            $qty = $variant->quantity;
            $qty -= $item->quantity;
            $variant->quantity = $qty;
            $variant->save();
        }

        $cart->delete();

        Session::forget('cart');
        Session::save();

        return $order;
    }

    public function placed(Request $request){
        $order = session()->get('order');
        if($order){
            return view('front.thankyou.content', compact('order'));
        }
        else{
            return redirect('/cart');
        }
    }
}