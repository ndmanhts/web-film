<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	@yield('title')

	<!-- Loading third party fonts -->
	<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
	<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- Loading main css file -->
	<link rel="stylesheet" href="/css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<link rel="stylesheet" href="/css/login.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">



	<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
	<link rel="stylesheet" href="/css/signup.css">

	<!--[if lt IE 9]>
	<head>
		<base href="{{asset('')}}">
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

		@yield('title')
		
		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="/css/style.css">
		
</head>

<body>
	<?php
	use Illuminate\Support\Facades\Auth;
	?>
	<div id="site-content">
		<header class="site-header">
			<div class="container">
				<a id="branding">
					<img src="images/logo.png" alt="" class="logo">
					<div class="logo-copy">
						<h1 class="site-title">Welcome to you</h1>
						<small class="site-description">Web-film</small>
					</div>
				</a> <!-- #branding -->

				<div class="main-navigation">
					
					<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>

					<ul class="menu">
						<li class="menu-item current-menu-item"><a href="/">Home</a></li>
						<li class="menu-item"><a href="/review">Movies</a></li>
						  @if(Auth::User())  <li class="menu-item"><a href="EditUser"><b>{{Auth::User()->name}}<b></a></li>
						  	<li class="menu-item"><a href="/LogOut">Logout</a></li>
  
  
@else 
						<li class="menu-item"><a href="/login">Login</a></li>
						<li class="menu-item"><a href="/signup">Sign up</a></li>
						@endif
						<li class="menu-item"><input type="text" placeholder="Search..." name="Search" id="TextSearch"></li>
							<button id="ButtonSearch"><i class="fa fa-search"></i></button>
					</ul> <!-- .menu -->


				</div> <!-- .main-navigation -->

				<div class="mobile-navigation"></div>
			</div>
		</header>

		@yield('webMain')

		<footer class="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-2">
						<div class="widget">
							<h3 class="widget-title">About Us</h3>
							<p>Nguyễn Đình Mạnh</p>
						</div>
					</div>
					<div class="col-md-2">
						<div class="widget">
							<h3 class="widget-title">Recent Review</h3>
							<ul class="no-bullet">
								<li><a href="https://www.google.com">Google review</a></li>
								<li><a href="https://github.com">GitHub review</a></li>
								<li><a href="https://www.facebook.com">FaceBook review</a></li>
								<li><a href="https://www.youtube.com">Youtube review</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-2">
						<div class="widget">
							<h3 class="widget-title">Help Center</h3>
							<ul class="no-bullet">
								<li><a href="https://www.google.com">Google help center</a></li>
								<li><a href="https://github.com">GitHub help center</a></li>
								<li><a href="https://www.facebook.com">FaceBook help center</a></li>
								<li><a href="https://www.youtube.com">Youtube help center</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-2">
						<div class="widget">
							<h3 class="widget-title">Join Us</h3>
							<ul class="no-bullet">
								<li><a href="https://www.google.com">Gmail</a></li>
								<li><a href="https://github.com">GitHub</a></li>
								<li><a href="https://www.facebook.com/minhanh.vuong.98">FaceBook</a></li>
								<li><a href="https://www.youtube.com">Youtube</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-2">
						<div class="widget">
							<h3 class="widget-title">Social Media</h3>
							<ul class="no-bullet">
								<li><a href="https://www.google.com">Google</a></li>
								<li><a href="https://github.com">GitHub</a></li>
								<li><a href="https://www.facebook.com">FaceBook</a></li>
								<li><a href="https://www.youtube.com">Youtube</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-2">
						<div class="widget">
							<h3 class="widget-title">Newsletter</h3>
							<form action="https://www.youtube.com" class="subscribe-form">
								<input type="text" placeholder="Email Address">
							</form>
						</div>
					</div>
				</div> <!-- .row -->

				<div class="colophon">Copyright 2019 Group 16, Designed by Group16. All rights reserved</div>
			</div> <!-- .container -->

		</footer>
	</div>
		<!-- Default snippet for navigation -->


	<script src="{{asset('/js/jquery-1.11.1.min.js')}}"></script>
	<script src="{{asset('/js/plugins.js')}}"></script>
	<script src="{{asset('/js/app.js')}}"></script>
	<script src="https://cdnjs.com/libraries/jquery.pjax"></script>


	</body>

