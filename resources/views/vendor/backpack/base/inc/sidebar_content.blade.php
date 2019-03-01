<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
@if (backpack_user()->isAdmin())
	<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
	<li><a href="{{ backpack_url('user') }}"><i class="fa fa-user-circle"></i> <span> Users</span></a></li>
	<li><a href="{{ backpack_url('product') }}"><i class="fa fa-clone"></i> <span>Products</span></a></li>
	<li><a href="{{ backpack_url('order') }}"><i class="fa fa-envelope-open"></i> <span>Order</span></a></li>
@endif

@if (backpack_user()->isManager())
	<li><a href="{{ route('report') }}"><i class="fa fa-newspaper-o"></i> <span>Report</span></a></li>
@endif