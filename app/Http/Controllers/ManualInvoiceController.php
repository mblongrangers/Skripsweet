<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ManualInvoice;
use App\Product;

class ManualInvoiceController extends Controller
{
	public function create(ManualInvoice $manualInvoice)
	{
		$products = Product::orderBy('name')->get();

		return view('manual-invoice.product', compact('manualInvoice', 'products'));
	}

	public function store(ManualInvoice $manualInvoice, Request $request)
	{
		$product = Product::findOrFail($request->product);
		$currentProduct = $manualInvoice->products()->find($product->id);

		if ($currentProduct) {
			$manualInvoice->products()->updateExistingPivot($product, [
				'quantity' => $currentProduct->pivot->quantity + $request->quantity,
			], false);
		} else {
			$manualInvoice->products()->attach($product->id, [
				'quantity' => $request->quantity,
			]);
		}

		$manualInvoice->refresh();

		$subtotal = 0;

		foreach ($manualInvoice->products as $product) {
			$subtotal += $product->price * $product->pivot->quantity;
		}

		$manualInvoice->subtotal = $subtotal;
		$manualInvoice->total = ($subtotal - ($manualInvoice->tax - $manualInvoice->discount));
		$manualInvoice->save();

		return redirect()->back();

	}

	public function sub(ManualInvoice $manualInvoice, Request $request)
	{
		$product = Product::findOrFail($request->product);
		$currentProduct = $manualInvoice->products()->find($product->id);

		$manualInvoice->products()->updateExistingPivot($product, [
			'quantity' => $request->quantity,
		], false);

		$manualInvoice->refresh();

		$subtotal = 0;

		foreach ($manualInvoice->products as $product) {
			$subtotal += $product->price * $product->pivot->quantity;
		}

		$manualInvoice->subtotal = $subtotal;
		$manualInvoice->total = ($subtotal - ($manualInvoice->tax - $manualInvoice->discount));
		$manualInvoice->save();

		return redirect()->back();
	}

	public function trash(ManualInvoice $manualInvoice, Request $request)
	{
		$product = Product::findOrFail($request->product);
		$manualInvoice->products()->detach($product);
		$manualInvoice->refresh();

		$subtotal = 0;

		foreach ($manualInvoice->products as $product) {
			$subtotal += $product->price * $product->pivot->quantity;
		}

		$manualInvoice->subtotal = $subtotal;
		$manualInvoice->total = ($subtotal - ($manualInvoice->tax - $manualInvoice->discount));
		$manualInvoice->save();

		return redirect()->back();
	}
}
