<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;


class Order extends Model
{
	use CrudTrait;
	
	protected $fillable = [
    	'discount',
    	'payment_id',
		'customer_id',
		'address_id',
		'cart_id'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}
	public function cart()
	{
		return $this->belongsTo(Cart::class);
	}

	public function status()
	{
		$status = 'Sudah Dibayar';
		if (is_null($this->payment)) {
			$status = 'Belum Dibayar';
		} else if ($this->payment->status == 'acc') {
			$status = 'Pembayaran Terverifikasi, Tunggu Pesanan';
		} else if ($this->payment->status == 'decline') {
			$status = 'Pembayaran Ditolak, Mohon Konfirmasi ulang pembayaran';
		}

		return $status;
	}
	public function bayarable()
	{
		return is_null($this->payment)  or ($this->payment->status == 'decline');
	}

	public function payment()
	{
		return $this->belongsTo(Payment::class);
	}
}
