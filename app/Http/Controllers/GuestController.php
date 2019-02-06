<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Auth;
use App\User;

class GuestController extends Controller
{
	public function catalogue()
	{
		$products = Product::orderBy('created_at', 'desc')->get();
		return view('homepage.catalogue', compact('products'));
	}
}
