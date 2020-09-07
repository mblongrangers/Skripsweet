<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" href="{{ asset('pdf\style.css') }}">
		<link rel="license" href="http://www.opensource.org/licenses/mit-license/">
		<script src="{{ asset('pdf\script.js') }}"></script>
	</head>
	<body>
		<header>
			<h1>Sales Invoice</h1>
			<address contenteditable>
				<p>PT Anugrah Distributor Indonesia
				<p>Jln. Prabu Kian Santang No. 169 A <br>Sangiang, Kota Tangerang</p>
				<p>(+621) 555-1234</p>
			</address>
			<span><img alt="" src="{{ asset('images\anugrah_maju_sentosa_pt.png') }}" height="75%" width="75%"><input type="file" accept="image/*"></span>
		</header>
		<article>
			<address contenteditable>
				<p>{{ $pdf->address->name }}</p>
			</address>
			<table class="meta">
				<tr>
					<th><span contenteditable>Invoice #</span></th>
					<td><span contenteditable>{{ $pdf->id }}</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Date</span></th>
					<td><span contenteditable>{{ $pdf->created_at->format('d/m/Y ') }}</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Amount Due</span></th>
					<td><span id="prefix" contenteditable>Rp. {{ $pdf->cart->total() }}</span><span</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Ship To</span></th>
					<td><span id="prefix" contenteditable>{{ ucwords($pdf->address->address) }}</span><span</span></td>
				</tr>
			</table>
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
					@foreach ($pdf->cart->products as $product)
					<tr>
						<td><span contenteditable>{{ $product->name }}</span></td>
						<td><span data-prefix>Rp </span><span contenteditable>{{ number_format($product->price) }}</span></td>
						<td><span contenteditable>{{ $product->pivot->quantity }}</span></td>
						<td><span data-prefix>Rp </span><span>{{ number_format($product->price * $product->pivot->quantity) }}</span></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{-- <a class="add">+</a> --}}
			<table class="balance">
				<tr>
					<th><span contenteditable>Total</span></th>
					<td><span data-prefix>Rp. </span><span>{{ number_format($pdf->cart->total()) }}</span></td>
				</tr>
			</table>
		</article>
		<aside>
			{{-- <h1><span contenteditable>Additional Notes</span></h1>
			<div contenteditable>
				<p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
			</div> --}}
		</aside>
	</body>
</html>