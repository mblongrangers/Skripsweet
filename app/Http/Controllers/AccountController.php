<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
<<<<<<< HEAD
use App\Http\Requests\AccountRequest;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function myAccount()
    {
        return view('account.my-account');
=======
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
>>>>>>> c28ff1e2b1d075a0f5281dd0cfa77252a1101526
    }
}
