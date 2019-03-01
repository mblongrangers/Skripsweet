@extends('layouts.customer')

@section('content')
<section class="bgwhite p-t-66 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 p-b-30">
                <form method="POST" action="{{ route('payment.store', $order->id) }}" enctype="multipart/form-data">
                    @csrf
                    <h4 class="m-text26 p-b-36 p-t-15">
                        Payment
                    </h4>

                    <center><h5> Nama Bank </h5></center>
                    <center><h5><b> Bank Centrak Asia (BCA) </b></h5></center>
                    <center><h5> No Rekening </h5></center>
                    <center><h5><b> 731-025-2527 </b></h5></center>                        

                    <div class="bo4 of-hidden size15 m-b-20" >
                        <input id="name" type="text" class="sizefull s-text7 p-l-22 p-r-22 {{ $errors->has('name') ? ' is-invalid' : '' }}" name="sender" value="" required placeholder="Your Name">
                    </div>

                    <div class="bo4 of-hidden m-b-20">
                        <input id="image" type="file" class="{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" required placeholder="Input Your Image">
                    </div>

                    <div class="w-size25">
                        <button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                            Confrim
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection