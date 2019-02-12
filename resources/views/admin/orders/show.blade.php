@extends('backpack::layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                  <p>Detail Order nomor #{{ $order->id }}</p>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="thumbnail">
                        <img src="{{ $order->payment->image }}">
                      </div>
                    </div>

                    @if ($order->payment->status == 'process')
                      <div class="col-md-3">
                        <form action="{{ route('payment.update', [$order->id, $order->payment->id]) }}" method="POST">
                          @csrf
                          @method('PATCH')
                          <input type="hidden" name="status" value="acc">
                          <button type="submit" class="btn btn-info btn-block">Verifikasi Pembayaran</button>
                        </form>
                      </div>
                    @endif
                    @if ($order->payment->status == 'process')
                      <div class="col-md-3">
                        <form action="{{ route('payment.update', [$order->id, $order->payment->id]) }}" method="POST">
                          @csrf
                          @method('PATCH')
                          <input type="hidden" name="status" value="decline">
                          <button type="submit" class="btn btn-danger btn-block">Tolak Pembayaran</button>
                        </form>
                      </div>
                    @endif
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
