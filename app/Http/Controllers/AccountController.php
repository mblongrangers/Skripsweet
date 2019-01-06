<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Alert;

use App\Http\Requests\AccountRequest;

class AccountController extends Controller
{
    public function update(AccountRequest $request, $id)
    {   
        $user = User::find($id);
        $user->customer->update([
            'name' => $request->name
        ]);
        $user->update([
            'email' => $request->email
        ]);
        return redirect()->back();
    }

    public function myAccount()
    {
        return view('account.my-account');
    }

    public function updateAccount(Request $request)
    {
        if (Auth::user()->customer->addresses->first() == null) {
            Auth::user()->customer->addresses()->create([
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone
            ]);
        } else {
            Auth::user()->customer->addresses->first()->update([
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone
            ]);
        }
            return redirect()->back();
    }
}