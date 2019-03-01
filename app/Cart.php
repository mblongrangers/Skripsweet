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
    public function payments()
    {
    	return $this->belongsToMany(Cart::class);
    }
     public function orders()
    {
        return $this->hasOne(Order::class);
    }
    public function total()
    {
        $count = 0;
        foreach ($this->products as $product) {
            $count += $product->pivot->quantity * $product->price;
        }
        return $count;
    }
}
