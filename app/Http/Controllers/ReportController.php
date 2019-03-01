<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class ReportController extends Controller
{
    public function report()
    {
    	$orders = Order::telahDibayar();
    	return view('report.report', compact('orders'));
    }
}
