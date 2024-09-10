<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="zxx"> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang="zxx"> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang="zxx"> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang="zxx"> <!--<![endif]-->

<!--  index  11:46:08 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SellerDashboard</title>
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
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.13/lottie.min.js"></script>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bucket" viewBox="0 0 16 16">
        <path d="M2.522 5H2a.5.5 0 0 0-.494.574l1.372 9.149A1.5 1.5 0 0 0 4.36 16h7.278a1.5 1.5 0 0 0 1.483-1.277l1.373-9.149A.5.5 0 0 0 14 5h-.522A5.5 5.5 0 0 0 2.522 5m1.005 0a4.5 4.5 0 0 1 8.945 0zm9.892 1-1.286 8.574a.5.5 0 0 1-.494.426H4.36a.5.5 0 0 1-.494-.426L2.58 6h10.838z"/>
      </svg>
	<script src="{{asset('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
<style>
	.profile-image {
    max-width: 60px;
    max-height: 60px;
}

</style>
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
	<div id="listar-wrapper" class="listar-wrapper listar-haslayout">
		<!--************************************
				Header Start
		*************************************-->
		<header id="listar-dashboardheader" class="listar-dashboardheader listar-haslayout">
			<div class="cd-auto-hide-header listar-haslayout">
				<div class="container-fluid">
					<div class="row">
						<strong class="listar-logo"><a href="{{asset('sellerpage')}}"><img src="{{asset("images/logo.png")}}" alt="company logo here"></a></strong>
						<nav class="listar-addnav">
							<ul>
								<li>
									<div class="dropdown listar-dropdown">
										<a class="listar-userlogin listar-btnuserlogin" href="javascript:void(0);" id="listar-dropdownuser" data-toggle="dropdown">
											<span>
												<!-- Check if the user has a company detail and then access the img property -->
												@if(Auth::user()->company &&!empty(Auth::user()->company->img))
													<img src="{{ asset('uploads/'. Auth::user()->company->img) }}" alt="User Profile Image" class="profile-image">
												@else
													<!-- Fallback image if the user does not have a company detail or the img is empty -->
													<img src="{{ asset('images/profile.png') }}" alt="Default Profile Image" class="profile-image">
												@endif
											</span>
											<em>{{ Auth::user()->name }}</em>
											<i class="fa fa-angle-down"></i>
										</a>
										
										
										<div class="dropdown-menu listar-dropdownmen" aria-labelledby="listar-dropdownuser">
											<ul>
												<li>
													<a href="{{asset('sellerpage')}}">
														<i class="icon-speedometer2"></i>
														<span>Dashboard</span>
													</a>
												</li>
												<li>
													<a href="{{asset('sellerdashboardlisting')}}">
														<i class="icon-layers"></i>
														<span>My Listings</span>
													</a>
												</li>
												<li>
													<a href="{{asset('sellerprofile')}}">
														<i class="icon-user2"></i>
														<span>My Profile</span>
													</a>
												</li>
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
													{{-- <a href="{{asset('index')}}"> --}}
														{{-- <i class="icon-lock6"></i> --}}
														{{-- <span>Logout</span> --}}
													{{-- </a> --}}
												</li>
											</ul>
										</div>
									</div>
								</li>
								<li>
									<a class="listar-btn listar-btngreen" href="{{asset('selleraddproducts')}}">
										<i class="icon-plus"></i>
										<span>Add Listing</span>
									</a>
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
									<li><a href="{{asset('sellerprofile')}}">My Profile</a></li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
			<div id="listar-sidebarwrapper" class="listar-sidebarwrapper">
				<strong class="listar-logo"><a href="{{route("sellerpage")}}"><img src="{{asset('images/logo.png')}}" alt="company logo here"></a></strong>
				<span id="listar-btnmenutoggle" class="listar-btnmenutoggle"><i class="fa fa-angle-left"></i></span>
				<div id="listar-verticalscrollbar" class="listar-verticalscrollbar">
					<nav id="listar-navdashboard" class="listar-navdashboard">
						<div class="listar-menutitle"><span>Main</span></div>
						<ul>
							<li class="listar-active">
								<a href="{{asset('sellerpage')}}">
									<i class="icon-speedometer2"></i>
									<span>Dashboard</span>
								</a>
							</li>
							<li>
								<a href="{{asset('sellerdashboardlisting')}}">
									<i class="icon-layers"></i>
									<span>My Listings</span>
								</a>
							</li>
							<li>
								<a href="{{asset('selleraddproducts')}}">
									<i class="icon-pencil3"></i>
									<span>Add Products</span>
								</a>
							</li>
							<li>
								<a href="{{route('seller.offers')}}">
									<i class="icon-gift"></i>
									<span> Offers</span>
								</a>
							</li>
                             
                            
                            
                            <li>
								<a href="{{route('notify.enquiry')}}">
									<i class="icon-envelope"></i>
									<span>Enquires</span>
								</a>
							</li>

							<li>
								<a href="{{route('seller.report')}}">
									<i class="icon-star4"></i>
									<span>Report</span>
								</a>
							</li>

						</ul>
						<div class="listar-menutitle listar-menutitleaccount"><span>Account</span></div>
						<ul>
							<li>
								<a href="{{asset('sellerprofile')}}">
									<i class="icon-lock6"></i>
									<span>My Profile</span>
								</a>
							</li>
							 <li>
								<a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="icon-exit"></i>
            <span>Log Out</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
                                    </li>
								</a>
								
							</li> 
						</ul>
					</nav>
				</div>
			</div>
		</header>
		{{-- <ul class="navbar-nav">   
			<li class="nav-item">
			<a class="nav-link" href="#" style="color:white;margin-right:4rem;">Welcome {{ optional(Auth::user())->name ?? 'guest' }} </a>
			</li>
			<li class="nav-item">
			  <form method="POST" action="{{ route('logout')}}">
				@csrf
				<div>
				<button id="btn" class=" btn btn-secondary" :href="route('logout')"
				onclick="event.preventDefault();
				this.closest('form').submit();">
				{{ __('Log Out') }}
			  </button>
			  </div>
			</form>
			</li>
			<li class="nav-item">
			</li>
		  </ul>
		</div>
	  </div>
	</nav> --}}
		<!--************************************
				Header End
		*************************************-->