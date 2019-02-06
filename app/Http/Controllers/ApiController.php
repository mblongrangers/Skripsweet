<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cart;
use App\Product;

class ApiController extends Controller
{
	public function addresses($id)
	{
		return response()->json(User::find($id)->customer->addresses);
	}

	public function updateCart(Request $request, $cart, $product)
    {
    	$product = Product::find($product);
    	$cart = Cart::find($cart);
    	$cart->products()->updateExistingPivot($product->id, [
    		'quantity' => $request->quantity,
    		'price' => $request->quantity + $product->price
    	]);

		return response()->json($request->all());
    }
}
