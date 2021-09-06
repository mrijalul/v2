<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('app_login_register') | {{ config('app.name', 'Laravel') }}</title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/oWD5bC7852_main.css') }}" rel="stylesheet">
	@stack('styles')
	<style type="text/css">
		.material-half-bg{
			background-color: #C2E8FF;
		}
		.material-half-bg .cover{
			background-color: #C2E8FF;
		}
		.form-control:focus{
			border-color: #C2E8FF;
		}
		.btn-primary{
			background-color: #03A5ED;
			border-color: #03A5ED;
		}
		.btn-primary:hover{
			background-color: #C2E8FF;
			border-color: #C2E8FF;
		}
	</style>
</head>
<body>
	<div id="app">
		<section class="material-half-bg">
			<div class="cover" sty></div>
		</section>
		<section class="login-content">
			<div class="logo">
				<img src="{{ asset('img/logo-i-mobil.png') }}" alt="">
			</div>
			@yield('content')
		</section>
	</div>

	{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
	<script src="{{ asset('js/oWD5bC7852_main.js') }}"></script>
	@stack('scripts')
	<script type="text/javascript">
		// Login Page Flipbox control
		$(document).ready(function(){
			$('.login-content [data-toggle="flip"]').click(function() {
				$('.login-box').toggleClass('flipped');
				return false;
			});
		});
	</script>
</body>
</html>
