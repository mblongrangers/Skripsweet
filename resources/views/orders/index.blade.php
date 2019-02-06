@extends('layouts.customer')

@section('content')
<section class="bgwhite p-t-66 p-b-60">
    <div class="container">
        <div class="row">
            @foreach (Auth::user()->customer->orders as $order)
            <div class="col-md-8 offset-md-2" style="margin-bottom: 20px">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Order number #{{ $order->id }}</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Status Pembayaran : <strong>{{ $order->status() }}</strong></p>
                        </div>
                        <div class="col-md-6 text-right">
                            @if ($order->bayarable())
                                <a href="{{ route('payment.create', $order->id) }}" class="card-link">Konfirmasi Pembayaran</a>
                            @endif
                        </div>
                    </div>
                  </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection