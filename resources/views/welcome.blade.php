<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<title>{{ config('app.name') }}</title>
		<meta content="" name="description">
		<meta content="" name="keywords">
		<link href="assets/img/favicon.png" rel="icon">
		<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
		<link href="{{ asset('css/5agMXYbT_wlcm.css') }}" rel="stylesheet">
	</head>
	<body>
	  <section id="hero" class="d-flex align-items-center">
		<div class="container">
		  <div class="row">
			<div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
			  <h1>{{ config('app.name') }}</h1>
			  <h2>Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu</h2>
			  <div class="d-flex">
			  	@if (Route::has('login'))
				  	@auth
				  		@if(auth()->user()->is_pemohon == '1')
						<a class="btn-get-started scrollto" href="{{ route('pemohon.home') }}">Dashboard</a>
						@elseif(auth()->user()->is_bagpemeriksa == '1')
						<a class="btn-get-started scrollto" href="{{ route('bagPemeriksa.home') }}">Dashboard</a>
						@elseif(auth()->user()->is_frontoffice == '1')
						<a class="btn-get-started scrollto" href="{{ route('frontOffice.home') }}">Dashboard</a>
						@else
						@endif
					@else
						<a href="{{ route('login') }}" class="btn-get-started scrollto">Login</a>
						<a href="{{ route('register') }}" class="venobox btn-watch-video"> Register <i class="icofont-play-alt-2"></i></a>
					@endauth
				@endif
			  </div>
			</div>
			<div class="col-lg-6 order-1 order-lg-2 hero-img">
			  <img src="{{ asset('img/wlcm-img.png') }}" class="img-fluid animated" alt="">
			</div>
		  </div>
		</div>

	  </section><!-- End Hero -->


	  <!-- ======= Footer ======= -->
	  <footer id="footer">

		<div class="container footer-bottom clearfix">
		  <div class="copyright">
			&copy; Copyright <strong><span>{{ config('app.name') }}</span></strong>. All Rights Reserved
		  </div>
		  <div class="credits">
			Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
		  </div>
		</div>
	  </footer>
	  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

	  <script src="{{ asset('js/5agMXYbT_wlcm.js') }}"></script>

	</body>

</html>