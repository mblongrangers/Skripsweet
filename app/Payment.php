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

	public function scopeTodayVerification($builder)
	{
		return $this->where('updated_at', 'like', now()->toDateString() . '%')
			->where('status', 'acc')
			->with(['cart.products']);
	}

	public function scopeVerificationAt($builder, $datetime)
	{
		return $this->where('updated_at', 'like', $datetime . '%')
			->where('status', 'acc')
			->with(['cart.products']);
	}
}