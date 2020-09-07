@extends('backpack::layout')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-body">
				<p class="lead">Nomer Invoice : {{ $manualInvoice->number }}</p>
				<div class="row">
					<div class="col-md-4">Atas Nama </div>
					<div class="col-md-8">: <strong>{{ $manualInvoice->customer }}</strong> ({{ $manualInvoice->phone }})</div>
					<div class="col-md-4"></div>
					<div class="col-md-8">{{ $manualInvoice->address }}</div>
					<div class="col-md-4">Subtotal </div>
					<div class="col-md-8">: RP . {{ number_format($manualInvoice->subtotal) }}</div>
					<div class="col-md-4">Discount </div>
					<div class="col-md-8">: RP . {{ number_format($manualInvoice->discount) }}</div>
					<div class="col-md-4">Pajak </div>
					<div class="col-md-8">: RP . {{ number_format($manualInvoice->tax) }}</div>
					<div class="col-md-4">Total </div>
					<div class="col-md-8">: RP . {{ number_format($manualInvoice->total) }}</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-body">
				<form action="{{ route('manual-invoice.product', $manualInvoice) }}" method="POST">
					@csrf
					<div class="row">
						<div class="col-md-4">
							<label>Produk</label>
						</div>
						<div class="col-md-4">
							<label>Jumlah</label>
						</div>
					</div>
					<div class="row">

						<div class="col-md-4">
							<select class="form-control" name="product">
								@foreach ($products as $product)
									<option value="{{ $product->id }}">{{ $product->name }}</option>
								@endforeach
							</select>
						</div>

						<div class="col-md-4">
							<input type="number" name="quantity" class="form-control">
						</div>

						<div class="col-md-4">
							<button class="btn btn-block btn-info">Tambah Produk</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-body">
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Product</th>
							<th>Price</th>
							<th>Subtotal</th>
							<th>Quantity</th>
							<th></th>
						</tr>
					</thead>

					<tbody>
						@forelse ($manualInvoice->products as $i => $product)
						<tr>
							<th>{{ ++$i }}</th>
							<td>{{ $product->name }}</td>
							<td>Rp . {{ number_format($product->price) }}</td>
							<td>Rp . {{ number_format($product->price * $product->pivot->quantity) }}</td>
							<td>
								<form action="{{ route('manual-invoice.sub', $manualInvoice) }}" method="POST">
									@csrf
									@method('PUT')

									<div class="row">
										<div class="col-md-4">
											<input type="hidden" name="product" value="{{ $product->id }}">
											<input type="number" name="quantity" class="form-control" value="{{ $product->pivot->quantity }}" min="1">
										</div>
										<div class="col-md-6">
											<button class="btn btn-warning btn-block">Update</button>
										</div>
									</div>
								</form>
							</td>
							<td>
								<form action="{{ route('manual-invoice.trash', $manualInvoice) }}" method="POST">
									@csrf
									@method('DELETE')
									<input type="hidden" name="product" value="{{ $product->id }}">
									<button class="btn btn-danger btn-block">Hapus</button>
								</form>
							</td>
						</tr>
						@empty
						<tr>
							<td>Tidak ada Data</td>
						</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
</div>

@endsection