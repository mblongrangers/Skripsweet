@extends('layouts.customer')

@section('content')
<section class="bgwhite p-t-66 p-b-60">
    <div class="container">
        <div class="row">
            @foreach ($order->cart->products as $product)
            <p>{{ $product->name }}</p>
            @endforeach
        </div>
    </div>
</section>
@endsection