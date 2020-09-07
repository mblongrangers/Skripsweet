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
						<th><span contenteditable>Nama</span></th>
						<th><span contenteditable>Produk</span></th>
						<th><span contenteditable>Kuantitas</span></th>
						<th><span contenteditable>Total Harga</span></th>
					</tr>
				</thead>
				<tbody>
					@php
						$sum = 0;
					@endphp
					@foreach ($payments as $payment)
						<tr>
							<td><span contenteditable>{{ $payment->sender }}</span></td>
							<td><span contenteditable>{{ $payment->cart->products->first()->name }}</span></td>
							<td><span contenteditable>{{ number_format($payment->cart->products->first()->pivot->quantity) }}</span></td>
							<td><span contenteditable>{{ number_format($payment->cart->products->first()->pivot->quantity * $payment->cart->products->first()->pivot->price) }}</span></td>
						</tr>
						@php
							$sum += $payment->cart->products->first()->pivot->quantity * $payment->cart->products->first()->pivot->price;
						@endphp

						@foreach ($payment->cart->products as $i => $product)
							@if ($i != 0)
								<tr>
									<td><span contenteditable></span></td>
									<td><span contenteditable>{{ $product->name }}</span></td>
									<td><span contenteditable>{{ number_format($product->pivot->quantity) }}</span></td>
									<td><span contenteditable>{{ number_format($product->pivot->quantity * $product->pivot->price) }}</span></td>
								</tr>
								@php
									$sum += $product->pivot->quantity * $product->pivot->price;
								@endphp
							@endif
							@php
								++$i;
							@endphp
						@endforeach

					@endforeach
				</tbody>
			</table>
			<table class="balance">
				<tr>
					<th><span contenteditable>Total</span></th>
					<td><span data-prefix>Rp. {{ number_format($sum) }}</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Date</span></th>
					<td><span>{{ date('F Y') }}</span></td>
				</tr>
			</table>
		</article>
	</body>
</html>