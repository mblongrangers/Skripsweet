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

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
     public function payments()
    {
        return $this->hasMany(Cart::class);
    }
}
