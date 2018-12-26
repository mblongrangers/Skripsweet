<!DOCTYPE html>
<html>

@include('partials-admin._head')

<body>
  <div class="container-scroller">

		@include('partials-admin._navbar')

		@yield('content')

		@include('partials-admin._javascript')
	</div>
</body>
</html>