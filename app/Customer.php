<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $fillable = [
		'name'
	];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function addresses()
    {
    	return $this->hasMany(Address::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function cart()
    {
        return $this->carts()->orderBy('created_at', 'desc')->first();
    }
     public function payments()
    {
        return $this->hasMany(Cart::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
