@php
	use App\Order;
@endphp

@if (!is_null(Order::find($entry->id)->payment))
	@if (Order::find($entry->id)->payment->status == 'acc')
		<a href="{{ route('pdf.invoice', $entry->id) }}" class="btn btn-info btn-xs">Invoice</a>
	@endif
@endif