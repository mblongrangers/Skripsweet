<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use Auth;

class CartController extends Controller
{
    public function __construct()
    {
    	return $this->middleware(['auth']);
    }

    public function addToCart(Request $request)
    {
    	$product = Product::find($request->product_id);
    	if (Auth::user()->customer->cart == null) {
    		Auth::user()->customer->cart()->create();
    	}
        $cart = Cart::where('customer_id', Auth::user()->customer->id)->first();
		$cart->products()->attach($product, [
			'quantity' => $request->qty,
			'price' => $product->price * $request->qty
		]);

		return redirect()->back();
    }

    public function cart()
    {
        $product = Auth::user()->customer->cart->products->groupBy('id');

        return view('homepage.cart', compact(['product', 'product1']));
    }
}
