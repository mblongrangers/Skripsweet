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
            'customer_id' => $request->customer_id,
            'address_id' => $request->address_id
        ]);
        return redirect()->route('catalogue');
    }
}
