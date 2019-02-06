@extends('layouts.customer')

@section('content')
<section class="bgwhite p-t-66 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 p-b-30">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h4 class="m-text26 p-b-36 p-t-15">
                        Login
                    </h4>

                    <div class="bo4 of-hidden size15 m-b-20">
                        <input id="email" type="email" class="sizefull s-text7 p-l-22 p-r-22 {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Your Email">
                    </div>
                    @if ($errors->has('email'))
                        <div class="alert alert-danger">
                            <small>{{ $errors->first('email') }}</small>
                        </div>
                    @endif

                    <div class="bo4 of-hidden size15 m-b-20">
                        <input id="password" type="password" class="sizefull s-text7 p-l-22 p-r-22 {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Your Password">
                    </div>
                    @if ($errors->has('password'))
                        <div class="alert alert-danger">
                            <small>{{ $errors->first('password') }}</small>
                        </div>
                    @endif
                    <div class="w-size25">
                        <button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
