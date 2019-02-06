<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = [
    	'discount',
    	'payment_id',
		'customer_id',
		'address_id'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}

	public function status()
	{
		$status = 'Dalam tahap Verifikasi';
		if (is_null($this->payment)) {
			$status = 'Belum Dibayar';
		}

		return $status;
	}
	public function bayarable()
	{
		return is_null($this->payment);
	}
}
