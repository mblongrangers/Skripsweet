@extends('layouts.customer')
@section('content')
<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6 p-b-30">
                <div class="p-r-20 p-r-0-lg">
                    <p class="lead">My Account</p>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Name : <strong>{{ Auth::user()->customer->name }}</strong></p>
                            <p>Email : <strong>{{ Auth::user()->email }}</strong></p>
                        </div>
                    </div>
                    </hr>
                </div>

                <div class="p-r-20 p-r-0-lg">
                    <p class="lead">My Address</p>
                    <hr>
                    <div class="row">
                        @forelse (Auth::user()->customer->addresses as $address)
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10">
                                    <p>
                                        <strong>{{ $address->name }}</strong>
                                    </p>
                                    <p>
                                        <small>{{ $address->address }}</small>
                                    </p>
                                    <p class="text-info">
                                        <small>{{ $address->phone }}</small>
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{ route('account.my-account', $address->id) }}" class="btn btn-info btn-sm btn-link">
                                        <span class="fa fa-edit text-info"></span>
                                    </a>
                                    <form method="post" action="{{ route('address.delete', $address->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-link">
                                            <span class="fa fa-trash text-danger"></span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <hr>
                        </div>
                        @empty
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Address Empty<p>
                                </div>
                            </div>
                            <hr>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="col-md-6 p-b-30">
                <div class="row">
                    <div class="col-md-12">
                        <form class="registerForm" method="POST" action="{{ route('customer.update', Auth::user()->customer->id) }}">
                            @csrf
                            @method('PATCH')
                            <h4 class="m-text26 p-b-36 p-t-15">
                                Update MyAccount 
                            </h4>

                            <div class="bo4 of-hidden size15 m-b-20">
                                <input type="text" class="sizefull s-text7 p-l-22 p-r-22 {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required minlength="3" maxlength="15" placeholder="Your Name" value="{{ !is_null($current) ? $current->name : ''}}">
                            </div>
                            @if ($errors->has('name'))
                                <div class="alert alert-danger">
                                    <small>{{ $errors->has('name') ? ' is-invalid' : '' }}</small>
                                </div>
                            @endif

                            <div class="w-size25">
                                <button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                                    {{ !isset($address) ? 'Save' : 'Update' }}
                                </button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-12"><hr></div>

                    <div class="col-md-12">
                        <form method="POST" action="{{ is_null($current) ? route('address.add') : route('address.update', $current->id) }}">
                            @csrf

                            @if (!is_null($current))
                                @method('PATCH')
                            @endif

                            <h4 class="m-text26 p-b-36 p-t-15">
                                Update Info 
                            </h4>

                            <div class="bo4 of-hidden size15 m-b-20">
                                <input type="text" class="sizefull s-text7 p-l-22 p-r-22 {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required minlength="3" maxlength="15" placeholder="Your Address Name" value="{{ !is_null($current) ? $current->name : ''}}">
                            </div>
                            @if ($errors->has('name'))
                                <div class="alert alert-danger">
                                    <small>{{ $errors->has('name') ? ' is-invalid' : '' }}</small>
                                </div>
                            @endif

                            <div class="bo4 of-hidden size15 m-b-20">
                                <input type="text" class="sizefull s-text7 p-l-22 p-r-22 {{ $errors->has('address') ? ' is-invalid' : ''}}" name="address" required placeholder="Your Address" value="{{ !is_null($current) ? $current->address : ''}}" >
                            </div>
                            @if ($errors->has('address'))
                                <div class="alert alert-danger">
                                    <small>{{ $errors->first('address') ? ' is-invalid' : ''}}</small>
                                </div>
                            @endif

                            <div class="bo4 of-hidden size15 m-b-20">
                                <input type="text" class="sizefull s-text7 p-l-22 p-r-22" {{ $errors->has('phone') ? ' is-invalid' : '' }} name="phone" required placeholder="Your Phone" value="{{ !is_null($current) ? $current->phone : ''}}">
                            </div>
                            @if ($errors->has('phone'))
                                <div class="alert alert-danger">
                                    <small>{{ $errors->first('phone') }}</small>
                                </div>
                            @endif

                            <div class="w-size25">
                                <button type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                                    {{ !isset($address) ? 'Save' : 'Update' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
