<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	@include('layouts._head')
	@include('layouts._stylesheets')
</head>

<body>
	@include('layouts._nav')

		<!-- session flash message -->
		@include('layouts._messages')
		<!-- content -->
		@yield('content')

	@include('layouts._footer')
	@include('layouts._scripts')
</body>
</html>