@php
	use App\Order;
@endphp

@if (!is_null(Order::find($entry->id)->payment))
	@if (Order::find($entry->id)->payment->status == 'acc')
		<a href="{{ route('pdf.delivery', $entry->id) }}" class="btn btn-warning btn-xs">Delivery Order</a>
	@endif
@endif