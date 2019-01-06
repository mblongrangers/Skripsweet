@extends('layouts.customer')
@section('content')
<div class="container head-spacer">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="box box-success">
                <div class="box-body">
                    <p class="lead">My Account</p>
                    <p>{{ Auth::user()->customer->name }}</p>
                    <p>{{ Auth::user()->customer->addresses->first()->name }}</p>
                    <p>{{ Auth::user()->customer->addresses->first()->address }}</p>
                    <p>{{ Auth::user()->customer->addresses->first()->phone }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box box-default">
                <div class="box-header">{{ __('MyAccount') }}</div>

                <div class="box-body">
                    <form method="POST" action="{{ route('account.update-account') }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                name="name"
                                value="{{ is_null(Auth::user()->customer->addresses->first()) ? old('name') : Auth::user()->customer->addresses->first()->name }}" required>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ is_null(Auth::user()->customer->addresses->first()) ? old('name') : Auth::user()->customer->addresses->first()->address }}" required>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('No.Hp') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="phone" value="{{ is_null(Auth::user()->customer->addresses->first()) ? old('name') : Auth::user()->customer->addresses->first()->phone }}" required>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
