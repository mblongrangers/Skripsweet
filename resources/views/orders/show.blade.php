@extends('layouts.customer')

@section('content')
<section class="bgwhite p-t-66 p-b-60">
    <div class="container">
        <div class="row">
        </div>
        		<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Product</th>
							<th class="column-3">Price</th>
							<th class="column-4">Quantity</th>
							<th class="column-5">Total</th>
						</tr>
							@php
								$sub = 0;
								$total = 0;
							@endphp
							@foreach ($order->cart->products->groupBy('product_id')	 as $element)
						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="{{ asset('storage/'.$element->first()->image) }}" alt="IMG-PRODUCT">
								</div>
							</td>
							@php
								$sum = 0;
								$total = 0;
							@endphp
							@foreach ($element as $product)
								@php
									$sum += $product->pivot->quantity;
									$total += $product->pivot->price;
								@endphp
							@endforeach
							<td class="column-3">{{ $element->first()->name }}</td>
							<td class="column-3">{{ $element->first()->price }}</td>
							<td class="column-4">{{ $sum }}</td>
							<td class="column-5">{{ number_format($total) }}</td>
						</tr>
							@endforeach
					</table>
				</div>
    </div>
</section>
@endsection