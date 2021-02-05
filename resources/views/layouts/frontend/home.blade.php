<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Website berisi ribuan artikel yang bermanfaat">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Callie HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">
	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ asset('callie/css/bootstrap.min.css') }}" />
	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{ asset('callie/css/font-awesome.min.css') }}">
	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('callie/css/style.css') }}" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	@yield('css')

</head>

<body>
	<!-- HEADER -->
	<header id="header">
		<!-- NAV -->
		@include('layouts.frontend.partials.navbar')
		<!-- /NAV -->
		@yield('header')
	</header>
	<!-- /HEADER -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			@yield('content')
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					@yield('second-content')
				</div>
				<div class="col-md-4">
					@include('layouts.frontend.partials.widget')
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- FOOTER -->
	@include('layouts.frontend.partials.footer')
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="{{ asset('callie/js/jquery.min.js') }}"></script>
	<script src="{{ asset('callie/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('callie/js/jquery.stellar.min.js') }}"></script>
	<script src="{{ asset('callie/js/main.js') }}"></script>

	@yield('js')

</body>

</html>