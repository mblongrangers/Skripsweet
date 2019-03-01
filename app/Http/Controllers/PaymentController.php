<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Order;
use Auth;
use Image;
use File;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($order)
    {
        $order = Order::find($order);
        return view('payments.create', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($order, Request $request)
    {
        $order = Order::find($order);

        $original = $request->file('image');
        $thumbnail = Image::make($original);
        $folder = '/images/payments/';
        $originalPath = public_path() . $folder;
        $filename = time().$original->getClientOriginalName();
        $path = $originalPath.$filename;
        $thumbnail->save($path);

        $payment = new Payment;
        $payment->sender = $request->sender;
        $payment->image = $folder.$filename;
        $payment->cart_id = $order->cart->id;
        $payment->customer_id = Auth::user()->customer->id;
        $payment->user_id = Auth::user()->id;
        $payment->status = 'process';
        $payment->save();
        
        $order->update(['payment_id' => $payment->id]);

        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($order, Request $request, $id)
    {
        $order = Order::find($order);
        $order->payment->status = $request->status;
        $order->payment->save();
        if ($request->status == 'decline') {
            File::delete(public_path() . $order->payment->image);
        }
        return redirect()->route('crud.order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
