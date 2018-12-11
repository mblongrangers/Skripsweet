<<<<<<< HEAD
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">My Account</h5>
                        <hr>
                        <p>Name : <strong>{{ Auth::user()->customer->name }}</strong></p>
                        <p>Email : <strong>{{ Auth::user()->email }}</strong></p>
                        <a href="" class="btn btn-info">Change Password</a>
                      </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card divider">
                      <div class="card-body">
                        @include('account._address-table')
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-body">
                        @include('account._edit-info')
                      </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card divider">
                      <div class="card-body">
                        <h5 class="card-title">My Address</h5>
                      </div>
                      <div class="form-group">
                            <label for="exampleInputName"> Address </label>
                            <input type="text" class="form-control" placeholder="" name="" value="">
                    </div>
                    <div class="form-check">
                            <label class="form-check-label" for="exampleCheck1"></label>
                            <button class="float-right btn btn-primary" type="submit">Submit</button>
                    </div>
=======
@extends('vendor.backpack.base.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="box box-success">
                <div class="box-body">
                    <p class="lead">My Account</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box box-default">
                <div class="box-header">{{ __('MyAccount') }}</div>

                <div class="box-body">
                    <form method="POST" action="">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('No.Hp') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>
                            </div>
                            </div>
                              

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Simpan MyAccount') }}
                                </button>
                            </div>
                        </div>
                    </form>
>>>>>>> c28ff1e2b1d075a0f5281dd0cfa77252a1101526
                </div>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> c28ff1e2b1d075a0f5281dd0cfa77252a1101526
