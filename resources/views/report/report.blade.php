@extends('backpack::layout')

@section('before_styles')	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
@endsection

@section('content')	
	<div class="row">

		<div class="col-md-12">
			<div class="box">
				<div class="box-body">
					{!! $chart->container() !!}
				</div>
			</div>
		</div>

		<div class="col-md-12">
			<div class="box">
				<div class="box-body">
					<table class="table">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Produk</th>
								<th>Kuantitas</th>
								<th>Total Harga</th>
								<th>Tanggal Verifikasi</th>
							</tr>
						</thead>

						<tbody>
							@foreach ($payments as $payment)
								<tr>
									<td>{{ $payment->sender }}</td>
									<td>{{ $payment->cart->products->first()->name }}</td>
									<td>{{ number_format($payment->cart->products->first()->pivot->quantity) }}</td>
									<td>{{ number_format($payment->cart->products->first()->pivot->quantity * $payment->cart->products->first()->pivot->price) }}</td>
									<td>{{ $payment->updated_at->format('d F Y') }}</td>
								</tr>

								@foreach ($payment->cart->products as $i => $product)
									@if ($i != 0)
										<tr>
											<td></td>
											<td>{{ $product->name }}</td>
											<td>{{ number_format($product->pivot->quantity) }}</td>
											<td>{{ number_format($product->pivot->quantity * $product->pivot->price) }}</td>
											<td>{{ $payment->updated_at->format('d F Y') }}</td>
										</tr>
									@endif
									@php
										++$i;
									@endphp
								@endforeach
							@endforeach
						</tbody>
					</table>					
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<a class="btn btn-primary" href="{{ route('report.pdf') }}">Export to PDF</a>
		</div>
	</div>

	{!! $chart->script() !!}
@endsection	