<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="{{ asset('css/oWD5bC7852_main.css') }}" rel="stylesheet">
	@stack('styles')
	<style>
		.app-header
		{
			background-color: #03A9F4;
		}
		.app-header__logo,.app-sidebar__toggle:focus, .app-sidebar__toggle:hover
		{
			background-color: #2980b9;
		}
		.user .user-tabs .nav-link.active {
			border-left-color: #03A9F4;
		}
		.app-menu__item.active, .app-menu__item:focus, .app-menu__item:hover
		{
			border-left-color: #2980b9;
		}
		a{
			color: #03A9F4;
		}
		.btn-primary
		{
			background-color: #03A9F4;
			border-color: #03A9F4;
		}
		.btn-primary:active, .btn-primary:hover
		{
			background-color: #2980b9;
			border-color: #2980b9;
		}
		.form-control:focus{
			border-color: #03A9F4;
		}
		::selection {
			color: #fff;
			background-color: #03A9F4;
		}
	</style>
</head>
<body class="app sidebar-mini">
	@include('layouts.master.header')
	<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
	@include('layouts.master.aside')
	<div id="app">
		<main class="app-content">
			@yield('content')
		</main>
	</div>
	<script src="{{ asset('js/oWD5bC7852_main.js') }}"></script>
	@stack('scripts')
</body>
</html>