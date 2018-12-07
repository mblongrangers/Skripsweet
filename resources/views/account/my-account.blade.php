@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
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
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h5 class="card-title"> Edit My Account </h5>
                        <p class="card-text">
                        <form action="{{ route('account.update', Auth::user()->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="exampleInputName"> Name </label>
                                <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{ Auth::user()->customer->name }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail"> Email  </label>
                                <input type="text" class="form-control" placeholder="Enter Email" name="email" value="{{ Auth::user()->email }}"l>
                            </div>
                             <div class="form-check">
                            <label class="form-check-label" for="exampleCheck1"></label>
                            </div></p>
                            <button class="float-right btn btn-primary" type="submit">Submit</button>
                        </form>
                      </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card divider">
                      <div class="card-body">
                        <h5 class="card-title">My Address</h5>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection