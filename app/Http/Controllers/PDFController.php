<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Order;

class PDFController extends Controller
{
    public function invoice($id)
    {
    	$pdf = Order::find($id);
    	return view('pdf.invoice', compact('pdf'));
    }


    public function delivery($id)
    {
    	$pdf = Order::find($id);
    	return view('pdf.delivery', compact('pdf'));
    }
}
