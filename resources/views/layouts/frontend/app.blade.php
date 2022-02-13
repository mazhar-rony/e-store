<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Divisima | eCommerce Template</title>
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="{{ asset('frontend/assets/img/favicon.ico') }}" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/flaticon.css') }}"/>
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/slicknav.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery-ui.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}"/>
	<link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}"/>


	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

    @stack('css')

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
    @include('layouts.frontend.partials.header')
	<!-- Header section end -->


    <!-- Main section -->
	
		@yield('content')
   
    <!-- Main section end -->


	<!-- Footer section -->
	@include('layouts.frontend.partials.footer')
	<!-- Footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="{{ asset('frontend/assets/js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/jquery.slicknav.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/jquery.nicescroll.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/jquery.zoom.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('frontend/assets/js/main.js') }}"></script>

	<script>
		$(document).ready(function() {
			// Make Navbar Sticky
			$(window).scroll(function () {
				//if you hard code, then use console
				//.log to determine when you want the 
				//nav bar to stick.  
				//console.log($(window).scrollTop())
			  if ($(window).scrollTop() > $('.header-top').height()) {
				$('.main-navbar').addClass('navbar-fixed');
			  }
			  if ($(window).scrollTop() < $('.header-top').height()) {
				$('.main-navbar').removeClass('navbar-fixed');
			  }
			});
		  });
	</script>

    @stack('js')

	</body>
</html>
