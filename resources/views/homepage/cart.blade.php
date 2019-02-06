@extends('layouts.customer')

@section('content')

	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Product</th>
							<th class="column-3">Price</th>
							<th class="column-4 p-l-70">Quantity</th>
							<th class="column-5">Total</th>
						</tr>
							@php
								$sub = 0;
							@endphp
							@foreach ($product as $element)
								@php
									$qty = 0;
									foreach ($element as $pro) {
										$qty = $pro->pivot->quantity;
									}
								@endphp
						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="{{ asset('storage/'.$element->first()->image) }}" alt="IMG-PRODUCT">
								</div>
							</td>
							<td class="column-3">{{ $element->first()->name }}</td>
							<td class="column-3">{{ $element->first()->price }}</td>
							<td class="column-4">
								<div class="flex-w bo5 of-hidden w-size17">
									<button onclick="subPrice({{ $element->first()->id }}, {{ $element->first()->price }})" class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>
									
										<input class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="{{ $qty }}" id="qty-{{ $element->first()->id }}">

									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2" onclick="addPrice({{ $element->first()->id }}, {{ $element->first()->price }})">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>
							</td>
							<td class="column-5"><strong id="persada-{{ $element->first()->id }}">{{ $element->first()->price * $qty }}</strong></td>
							@php
								$sub += $element->first()->price * $qty;
							@endphp
						</tr>
							@endforeach
					</table>
				</div>
			</div>
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<form action="">
					<h5 class="m-text20 p-b-24">
						Cart Totals
					</h5>

					<div class="flex-w flex-sb-m p-b-12">
						<span class="s-text18 w-size19 w-full-sm">
							Subtotal:
							<p>Rp. <strong id="sub_tot">{{ $sub }}</strong></p>
							<input type="hidden" id="sub_tot_input" value="">
						</span>

						<span class="m-text21 w-size20 w-full-sm">
						</span>
					</div>

					<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
						<span class="s-text18 w-size19 w-full-sm">
							Shipping:
						</span>

						<div class="w-size20 w-full-sm">
							<div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
								<select class="sizefull s-text7 p-l-15 p-r-15" name="address" id="address">
									<option value="0">Select an address</option>
									@foreach (Auth::user()->customer->addresses as $address)
										<option value="{{ $address->id }}">{{ $address->name }}</option>
									@endforeach
								</select>
							</div>
							<p class="s-text8 p-b-23" id="address_info">
							</p>
						</div>
					</div>

					<div class="flex-w flex-sb-m p-t-26 p-b-30">
						<span class="m-text22 w-size19 w-full-sm">
							Total:
						</span>

						<span class="m-text21 w-size20 w-full-sm">
							<p>Rp. <strong id="sub_tot">{{ $sub }}</strong></p>
						</span>
					</div>

					<div class="size15 trans-0-4">
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" >
							Proceed to Payment
						</button>
					</div>
				</form>
			</div>
		</div>
	</section>

@endsection

@push('js_head')
	<script
	  src="https://code.jquery.com/jquery-3.3.1.min.js"
	  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	  crossorigin="anonymous"></script>
	<script>
			function addPrice(element, price) {
				val = $('#persada-' + element).html();
				qty = $('#qty-' + element).val();
				tot = parseInt($('#sub_tot').html());
				$('#persada-' + element).html('');
				$('#sub_tot').html('');
				$('#persada-' + element).html(parseInt(val) + price);

				$.post( "http://localhost:8000/api/cart/" + {{ Auth::user()->customer->cart->id }} + "/product/" + element, 
					{ quantity: parseInt(qty) + 1}
				).done(function(response) {
					$('#sub_tot').html(tot + price);
					$('#sub_tot_input').html(tot + price);
			  	});
			}

			function subPrice(element, price) {
				val = $('#persada-' + element).html();
				qty = $('#qty-' + element).val();
				tot = parseInt($('#sub_tot').html());
				$('#sub_tot').html('');
				$('#persada-' + element).html('')
				$('#persada-' + element).html(parseInt(val) - price);

				$.post( "http://localhost:8000/api/cart/" + {{ Auth::user()->customer->cart->id }} + "/product/" + element, 
					{ quantity: parseInt(qty) - 1}
				).done(function(response) {
					$('#sub_tot').html(tot - price);
					$('#sub_tot_input').html(tot - price);
			  	});

			}

			$(document).ready(function () {
				$('#address').on('change', function () {
					console.log('Fetch address');
					$.ajax({
						url: 'http://localhost:8000/api/user/' + {{ Auth::user()->id }} + '/addresses'
					}).done(function (response) {
						response.map(function (address) {
							if (address.id == $('#address').val()) {
								$('#address_info').html(address.address)
							}
						})
					});
				});
			});
	</script>
@endpush