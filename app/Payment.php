<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
		'name',
		'sender',
		'cart_id',
		'customer_id',
		'user_id',
		'cart_id',
		'address_id'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}
	public function cart()
	{
		return $this->belongsTo(Cart::class);
	}
}