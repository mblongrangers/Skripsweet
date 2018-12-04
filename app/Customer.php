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
}
