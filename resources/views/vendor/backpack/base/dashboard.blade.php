@extends('backpack::layout')

@section('header')
  <section class="content-header">
    <h1>
      {{ trans('backpack::base.dashboard') }}
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
      <li class="active">{{ trans('backpack::base.dashboard') }}</li>
    </ol>
  </section>

<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="box" style="height: 150px !important">
          <div class="box-header with-border">
              <div class="box-title">Data</span></div>
          </div>
          <div class="box-body" style="padding-top: 30px">
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-3 text-center">
                    <i class='fa fa-drivers-license' style="font-size: 45px"></i>
                  </div>
                  <div class="col-md-9">
                    <strong>{{ App\Customer::all()->count() }}</strong>
                    <p>Customers</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>


    <div class="col-md-4">
      <div class="box" style="height: 150px !important">
          <div class="box-header with-border">
              <div class="box-title">Data</span></div>
          </div>
          <div class="box-body" style="padding-top: 30px">
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-3 text-center">
                    <i class='fa fa-user-circle' style="font-size: 45px"></i>
                  </div>
                  <div class="col-md-9">
                    <strong>{{ App\User::all()->count() }}</strong>
                    <p>Users</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="box" style="height: 150px !important">
          <div class="box-header with-border">
              <div class="box-title"><span>Data</span></div>
          </div>
          <div class="box-body" style="padding-top: 30px">
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-3 text-center">
                    <i class='fa fa-cubes' style="font-size: 45px"></i>
                  </div>
                  <div class="col-md-9">
                    <strong>{{ App\Product::all()->count() }}</strong>
                    <p>Products</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>


@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">{{ trans('backpack::base.login_status') }}</div>
                </div>
                <div class="box-body">
                  <p>You are currently login as {{ backpack_user()->email }}</p>
                </div>

                <div class="box-body">{{ trans('backpack::base.logged_in') }}</div>
            </div>
        </div>
    </div>

@endsection
