<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Alert;

class AccountController extends Controller
{
    public function myAccount()
    {
    	return view('account.my-account');
    }

    public function updateInfo(Request $form)
    {
    	// Jika Auth.customer == null
    	// Simpam Auth.customer
    	// else
    	// Update Auth.customer
    	if (is_null(Auth::user()->customer)) {
    		Auth::user()->customer()->create([
    			'name' => $form->name
    		]);
    	} else {
    		Auth::user()->customer()->update([
    			'name' => $form->name
    		]);
    	}

    	Alert::success('Successfully update info')->flash();
    	return redirect()->back();
    }
}
