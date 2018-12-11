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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection