<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
	protected $fillable = [
		'name',
		'address',
		'phone'
	];
    public function customer()
    {
    	return $this->belongsTo(Customer::class);
    }
}
