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
        // dd($request->all());
        $request->validate([
            'qty' => 'required|max:3',
        ]);

    	$product = Product::find($request->product_id);
    	if (Auth::user()->customer->cart() == null) {
    		Auth::user()->customer->carts()->create();
    	}
		Auth::user()->customer->cart()->products()->attach($product, [
			'quantity' => $request->qty,
			'price' => $product->price * $request->qty
		]);

		return redirect()->back();
    }

    public function cart()
    {
        $product = Auth::user()->customer->cart()->products->groupBy('id');

        return view('homepage.cart', compact(['product', 'product1']));
    }

    public function detach($cart, $product)
    {
        $cart = Cart::find($cart);
        $product = Cart::find($product);
        $cart->products()->detach($product);
        return redirect()->back();
    }
}
