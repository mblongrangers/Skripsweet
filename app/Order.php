<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Carbon\Carbon;

class Order extends Model
{
	use CrudTrait;
	
	protected $fillable = [
    	'discount',
    	'payment_id',
		'customer_id',
		'address_id',
		'cart_id',
		'created_at'
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
	public function address()
	{
		return $this->belongsTo(Address::class);
	}
	public function bayarable()
	{
		return is_null($this->payment)  or ($this->payment->status == 'decline');
	}

	public function payment()
	{
		return $this->belongsTo(Payment::class);
	}
	public static function telahDibayar()
	{
		$begin 	= Carbon::parse("first day of " . date('F Y'));
		$last 	= Carbon::parse("last day of " . date('F Y'))->addDay()->subSecond();
		$return = [];
		foreach (Order::whereNotNull('payment_id')->whereBetween('created_at', [$begin, $last])->get() as $order) {
			if ($order->payment->status == 'acc') {
				array_push($return, $order);
			}
		}
		return collect($return);
	}
}
