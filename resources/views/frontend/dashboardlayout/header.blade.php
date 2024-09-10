<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="zxx"> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang="zxx"> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang="zxx"> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang="zxx"> <!--<![endif]-->

<!--  index  11:46:08 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Dashboard</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{asset('favicon.png')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap-slider.css')}}">
	<link rel="stylesheet" href="{{asset('css/normalize.css')}}">
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
	<link rel="stylesheet" href="{{asset('css/chosen.css')}}">
	<link rel="stylesheet" href="{{asset('css/prettyPhoto.css')}}">
	<link rel="stylesheet" href="{{asset('css/scrollbar.css')}}">
	<link rel="stylesheet" href="{{asset('css/morris.css')}}">
	<link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{asset('css/YouTubePopUp.css')}}">
	<link rel="stylesheet" href="{{asset('css/auto-complete.css')}}">
	<link rel="stylesheet" href="{{asset('css/jquery.navhideshow.css')}}">
	<link rel="stylesheet" href="{{asset('css/transitions.css')}}">
	<link rel="stylesheet" href="{{asset('style.css')}}">
	<link rel="stylesheet" href="{{asset('css/color.css')}}">
	<link rel="stylesheet" href="{{asset('css/responsive.css')}}">
	<link rel="stylesheet" href="{{asset('dbstyle.css')}}">
	<link rel="stylesheet" href="productlist.css">
	<script src="{{asset('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>

</head>
<body>
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<!--************************************
			Preloader Start
	*************************************-->
	<div class="preloader-outer">
		<div class="pin"></div>
		<div class="pulse"></div>
	</div>
	<!--************************************
			Preloader End
	*************************************-->
	<!--************************************
			Wrapper Start
	*************************************-->
	
		<!--************************************
				Header Start
		*************************************-->
		<header id="listar-dashboardheader" class="listar-dashboardheader listar-haslayout">
			
				<div class="container-fluid">
					<div class="row">
						<strong class="listar-logo"><a href="{{asset('index')}}"><img src="images/logo.png" alt="company logo here"></a></strong>
						<nav class="listar-addnav">
							<ul>
								<li>
									<div class="dropdown listar-dropdown">
										<a class="listar-userlogin listar-btnuserlogin" href="javascript:void(0);" id="listar-dropdownuser" data-toggle="dropdown">
											<span>Logout</span>
											{{-- <em>{{Auth::user()->name}} </em> --}}
											<i class="fa fa-angle-down"></i>
										</a>
										<div class="dropdown-menu listar-dropdownmen" aria-labelledby="listar-dropdownuser">
											<ul>
												
												
												
												<li>
													<a href="{{ route('logout') }}"
													onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
													 {{-- <i class="icon-exit"></i> --}}
													 <i class="icon-lock6"></i>
													 <span>Log Out</span>
												 </a>
												 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
													 @csrf
												 </form>
												</li>
											</ul>
										</div>
									</div>
								</li>
								
							</ul>
						</nav>
						<nav id="listar-nav" class="listar-nav">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#listar-navigation" aria-expanded="false">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div id="listar-navigation" class="collapse navbar-collapse listar-navigation">
								<ul>
									<li class="">
										<a href="{{asset('/')}}">Home</a>
									</li>
									<li class="menu-item-has-children">
										<a href="javascript:void(0);">About Us</a>
										<ul class="sub-menu">
											<li><a href="{{asset('aboutus')}}">About Us</a></li>
											
											
										</ul>
									</li>
									<li class="menu-item-has-children">
										<a href="javascript:void(0);">Pages</a>
										<ul class="sub-menu">
											<li><a href="{{asset('termsandconditions')}}">Terms and Privacy Policy</a></li>
											<li><a href="{{asset('Careers')}}">Careers</a></li>
											<li><a href="{{asset('testimonials')}}">Testimonials</a></li>
											<li><a href="{{asset('contactus')}}">Contact Us</a></li>
											{{-- <li><a href="{{asset('404error')}}">404 Error</a></li> --}}
											
										</ul>
									</li>
									<li class="menu-item-has-children">
										<a href="javascript:void(0);">News</a>
										<ul class="sub-menu">
											
											<li><a href="{{asset('newsv2')}}">News&Events</a></li>
										</ul>
									</li>
									<li><a href="{{route('userprofile')}}">My Profile</a></li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			

		</header>
		
		<!--************************************
				Header End
		*************************************-->