<!DOCTYPE html>
	<html>
		@include('partials._head')

		<body>
			@include('partials._navbar')

			@yield('content')

			@include('partials._footer')
			@include('partials._javascript')
		</body>
	</html>