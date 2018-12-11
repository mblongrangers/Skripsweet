@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        {{ trans('backpack::base.dashboard') }}<small>{{ trans('backpack::base.first_page_you_see') }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">{{ trans('backpack::base.login_status') }}</div>
                </div>
<<<<<<< HEAD
                <div class="box-body">
                  <p>You are currently login as {{ backpack_user()->loginAs() }}</p>
                </div>
=======

                <div class="box-body">{{ trans('backpack::base.logged_in') }}</div>
>>>>>>> c28ff1e2b1d075a0f5281dd0cfa77252a1101526
            </div>
        </div>
    </div>
@endsection
