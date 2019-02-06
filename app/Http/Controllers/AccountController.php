<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Address;
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

    public function myAccount($id = null)
    {
        $current = null;
        if (!is_null($id)) {
            $current = Address::find($id);
        }
        return view('account.my-account', compact('current'));
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

    public function addAddress(Request $request)
    {
        $customer = Auth::user()->customer;
        $address = Address::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'customer_id' => $customer->id
        ]);
        return redirect()->back();
    }

    public function deleteAddress($id)
    {
        $address = Address::find($id)->delete();
        return redirect()->back();
    }

    public function updateAddress(Request $request, $id)
    {
        $address = Address::find($id);
        $address->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone
        ]);
        return redirect()->route('account.my-account');
    }

    public function updateCustomer(Request $request)
    {
        Auth::user()->customer->update([
            'name'=> $request->name
        ]);
        
            return redirect()->back();
    }
}