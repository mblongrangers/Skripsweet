<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManualInvoice extends Model
{
	public function products()
	{
		return $this->belongsToMany(Product::class)
			->withPivot('quantity');
	}

}
