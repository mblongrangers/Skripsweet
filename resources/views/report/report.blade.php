<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Report</title>
		<link rel="stylesheet" href="{{ asset('pdf\style.css') }}">
		<link rel="license" href="http://www.opensource.org/licenses/mit-license/">
		<script src="{{ asset('pdf\script.js') }}"></script>
	</head>
	<body>
		<header>
			<h1>Report</h1>
			<table class="inventory">
				<thead>
					<tr>
						<th><span contenteditable>Name</span></th>
						<th><span contenteditable>Price</span></th>
						<th><span contenteditable>Quantity</span></th>
						<th><span contenteditable>SubTotal</span></th>
					</tr>
				</thead>
				<tbody>
					@php
						$sum = 0;
					@endphp
					@forelse ($orders as $order)
						@foreach ($order->cart->products as $product)
							<tr>
								<td><span contenteditable>{{ $product->name }}</span></td>
								<td><span data-prefix>Rp {{ $product->price }}</span></td>
								<td><span contenteditable></span>{{ $product->pivot->quantity }}</td>
								<td><span data-prefix>Rp {{ $product->pivot->quantity * $product->price }}</span></td>
							</tr>
							@php
								$sum += $product->pivot->quantity * $product->price;
							@endphp
						@endforeach
						@empty
						<tr>
							<td colspan="4">No Data show</td>
						</tr>
					@endforelse
				</tbody>
			</table>
			<table class="balance">
				<tr>
					<th><span contenteditable>Total</span></th>
					<td><span data-prefix>Rp. {{ $sum }}</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Date</span></th>
					<td><span>{{ date('F Y') }}</span></td>
				</tr>
			</table>
		</article>
	</body>
</html>