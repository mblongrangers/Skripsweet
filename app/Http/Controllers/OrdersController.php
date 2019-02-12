<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Payment;
use Auth;

class OrdersController extends Controller
{
	public function index()
	{
		return view('orders.index');
	}

    public function store(Request $request)
    {
        $order = Order::create([
            'discount' => 0,
            'customer_id' => Auth::user()->customer->id,
            'address_id' => $request->address_id,
            'cart_id' => Auth::user()->customer->cart()->id
        ]);
        Auth::user()->customer->carts()->create();
        return redirect()->route('catalogue');
    }

    public function show($id)
    {
        $order = Order::find($id);
        return view('orders.show', compact('order'));
    }
}
