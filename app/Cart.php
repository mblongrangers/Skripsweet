<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	protected $fillable = [
		'id',
		'customer_id'
	];

    public function products()
    {
    	return $this->belongsToMany(Product::class)->withPivot('price', 'quantity');
    }
}
