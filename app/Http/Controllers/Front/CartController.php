<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\ProductVariant;

use Session;
use DB;

class CartController extends Controller
{
    public function index(){
    	$cart = Session::get('cart');
        return view('front.cart.content', compact('cart'));
    }

    public function add(Request $request){

        DB::transaction(function() use($request){
            $product = Product::find($request->product_id);
            $variant = ProductVariant::find($request->product_variant_id);
            $quantity = $request->quantity;

            $cart = Cart::addItem($this->getCart(), $product, $variant, $quantity);

            $product->times_added_to_cart += 1;
            $product->quantity_added_to_cart += $quantity;
            $product->save();

            self::updateSession($cart);
        });

    	return redirect()->back()->with(['alert' => 'add']);
    }

    public function remove(Request $request){
        $cart = Cart::removeItem($this->getCart(), $request->id);
        self::updateSession($cart);

        $response = [
            'items' => $cart->total_items,
            'subtotal' => $cart->sub_total_price,
            'shipping' => $cart->shipping_cost,
            'extra' => $cart->extra_cost,
            'total' => $cart->total_price
        ];

        return response()->json(['cart' => $response], 200);
    }

    public function increase(Request $request){
        $cart = Cart::increaseQuantity($this->getCart(), $request->id, 1);

        $item = CartItem::find($request->id);

        $response = [
            'item_quantity' => $item->quantity,
            'item_subtotal' => $item->sub_total_price,
            'items' => $cart->total_items,
            'subtotal' => $cart->sub_total_price,
            'shipping' => $cart->shipping_cost,
            'extra' => $cart->extra_cost,
            'total' => $cart->total_price
        ];
        
        return response()->json(['cart' => $response], 200);
    }

    public function decrease(Request $request){
        $cart = Cart::decreaseQuantity($this->getCart(), $request->id, 1);

        $item = CartItem::find($request->id);

        $response = [
            'item_quantity' => $item->quantity,
            'item_subtotal' => $item->sub_total_price,
            'items' => $cart->total_items,
            'subtotal' => $cart->sub_total_price,
            'shipping' => $cart->shipping_cost,
            'extra' => $cart->extra_cost,
            'total' => $cart->total_price
        ];
        
        return response()->json(['cart' => $response], 200);
    }

    private function getCart(){
        $oldCart = Cart::find(Session::has('cart') ? Session::get('cart')->id : null);
 
        if($oldCart){
            $cart = $oldCart->first();
        }
        else{
            $cart = Cart::create([]);
            $cart->save();

            self::updateSession($cart);
        }

        return $cart->id;
    }

    private static function updateSession($cart){
        Session::put('cart', $cart);
        Session::save();
    }

    // associate user to cart after login
    public static function associateUserToCart($user){
        $oldCart = null;
        if($user->has('cart')){
            $oldCart = $user->cart;
        }

        $cartFromSession = Cart::find(Session::has('cart') ? Session::get('cart')->id : null);

        if($oldCart != null && $cartFromSession !=null){
            $newCart = Cart::mergeCarts($oldCart, $cartFromSession);
            self::updateSession($newCart);
        }
        else if($oldCart != null && $cartFromSession == null){
            self::updateSession($oldCart);
        }
        else if($oldCart == null && $cartFromSession != null){
            if(\Auth::guard('web')->check()){
                $cartFromSession->user_id = $user->id;
                $cartFromSession->save();
            }
            self::updateSession($cartFromSession);
        }
    }

    public function setCart(Request $request){
        $cart = $this->getCart();
        $item = CartItem::where([['cart_id', $cart], ['product_id', $request->product_id], ['product_variant_id', $request->product_variant_id]])->first();

        $product = Product::find($request->product_id);
        $variant = ProductVariant::find($request->product_variant_id);

        if($request->operation == 'increase'){
            if($item){
                $cart = Cart::increaseQuantity($cart, $item->id, $request->quantity);
            }
            else{
                $cart = Cart::addItem($this->getCart(), $product, $variant, $request->quantity);
            }

            $message = 'Item added to cart.';
        }
        else if($request->operation == 'decrease'){
            if($item){
                $cart = Cart::decreaseQuantity($cart, $item->id, $request->quantity);
            }

            $message = 'Item removed from cart.';
        }

        self::updateSession($cart);

        $item = Cart::findInCart($cart->id, $variant);

        $response = [
            'item_quantity' => ($item) ? $item->quantity : 0,
            'message' => $message,
            'items' => $cart->total_items,
            'subtotal' => $cart->sub_total_price,
            'shipping' => $cart->shipping_cost,
            'extra' => $cart->extra_cost,
            'total' => $cart->total_price
        ];
        
        return response()->json($response, 200);

    }
}