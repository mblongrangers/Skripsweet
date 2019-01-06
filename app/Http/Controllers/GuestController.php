<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class GuestController extends Controller
{
	public function catalogue()
	{
		$products = Product::orderBy('created_at', 'desc')->get();
		return view('homepage.catalogue', compact('products'));
	}
}
