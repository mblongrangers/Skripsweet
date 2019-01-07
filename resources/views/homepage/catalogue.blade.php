@extends('layouts.customer')

@section('content')
<div class="container head-spacer">
<br>
	<div class="card-deck">

	@foreach($products as $product)
	  <div class="card" >
	    <img class="card-img-top" src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
	    <div class="card-body">
	    	<h5 class="card-title"><font face="arial"><b>{{ $product->name }}</font></h5></b>
	    	<p class="card-text"style="text-align: justify;">{{ $product->description }}</p>
	    	<p><strong>Rp. {{ number_format($product->price) }}</strong></p>
	    	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#div{{ $product->id }}modal">Pesan</button>
			@include('partials._modal', [ 'product' => $product ])
	    </div>
	  </div>
	 @endforeach

	</div>

</div>
	
@endsection