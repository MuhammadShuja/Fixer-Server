<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Collection;

use App\Models\Department;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductStatus as Status;
use App\Models\ProductVariant;

use App\Models\Cart;
use Session;

class CatalogController extends Controller
{
    public function index()
    {
        $categories = Category::active();
        $brands = Brand::all();
        $products = Product::all();

        return view('front.home.content', compact('categories', 'brands', 'products'));
    }

    public function show(Product $product){
        $alert = session()->get('alert');
    	$categories = Category::all();
        $brands = Brand::all();

        $product->times_viewed += 1;
        $product->save();

    	return view('front.product.content', compact('alert', 'product', 'categories', 'brands'));
    }

    public function brand(Brand $brand){

        $brand->times_viewed += 1;
        $brand->save();

        $catalog_name = $brand->name;
        $products = $brand->activeProducts()->paginate(16);
        $products->withPath($brand->slug);

        $catalog = $brand;
        $catalog_type = 'brands';

        return view('front.catalog.content', compact('catalog', 'products', 'catalog_type'));
    }

    public function category(Category $category){

        $category->times_viewed += 1;
        $category->save();

        $catalog_name = $category->name;
        $products = $category->activeProducts()->paginate(16);
        $products->withPath($category->slug);

        $catalog = $category;
        $catalog_type = 'category';

        return view('front.catalog.content', compact('catalog', 'products', 'catalog_type'));
    }

    public function checkStock(Request $request){
        $variant = ProductVariant::find($request->id);

        if($variant->quantity){
            return response()->json([
                'stock' => $variant->quantity
            ]);
        }

        return response()->json([
            'stock' => 0
        ]);
    }

    public function search(Request $request){
        $string = $request->s;

        $products = Product::search($string)->paginate(16);

        if(count($products) < 1){

            // split on 1+ whitespace & ignore empty (eg. trailing space)
            $searchValues = preg_split('/\s+/', $string, -1, PREG_SPLIT_NO_EMPTY);
            if(count($searchValues) < 1){
                return redirect()->back();
            }

            $products = Product::where(function ($q) use ($searchValues) {
              foreach ($searchValues as $value) {
                $q->orWhere('name', 'like', "%{$value}%");
              }
            })->paginate(16);
            
        }

        $catalog_name = 'Search results for: '.$string;

        $catalog = null;
        $catalog_type = 'search';

        return view('front.catalog.content', compact('catalog_name', 'catalog', 'products', 'catalog_type'));
    }

    public function catalog(Department $department){
        $cart = Cart::find(Session::has('cart') ? Session::get('cart')->id : null);
 
        $catalog = Category::where([['department_id', $department->id],['status', 'active']])
                ->get()
                ->map(function ($category) use ($cart){
                    return [
                        'id' => $category->id,
                        'name' => $category->name,
                        'slug' => $category->slug,
                        'products' => $category->products->map(function ($product) use($cart){
                            $variant = $product->variants[0];
                            $inCart = 0;
                            if($cart){
                                $item = Cart::findInCart($cart->id, $variant);
                                if($item){
                                    $inCart = $item->quantity;
                                }
                            }
                            return [
                                'id' => $product->id,
                                'reference' => $product->reference,
                                'variant' => $variant->id,
                                'slug' => $product->slug,
                                'name' => $product->name,
                                'jap' => $product->name_japanese,
                                'lot' => $product->lot,
                                'price' => ($product->special_price) ? $product->special_price : $product->price,
                                'unit' => $product->unit->name,
                                'stock' => $product->stock(),
                                'cart' => $inCart,
                                'available' => $product->stock() - $inCart,
                            ];
                        })
                    ];
                });

        return response()->json([
            'catalog' => $catalog
        ]);
    }
}