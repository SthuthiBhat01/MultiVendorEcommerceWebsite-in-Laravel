<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/ekka/ekka-v34/ekka-admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 09 Jun 2023 05:42:50 GMT -->
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="">

	<title>Windiamart Admin</title>

	<!-- GOOGLE FONTS -->
	<link rel="preconnect" href="{{asset('https://fonts.googleapis.com/')}}">
	<link rel="preconnect" href="{{asset('https://fonts.gstatic.com/')}}" crossorigin>
	<link href="{{asset('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;family=Poppins:wght@300;400;500;600;700;800;900&amp;family=Roboto:wght@400;500;700;900&amp;display=swap')}}" rel="stylesheet"> 

	<link href="../../../../../cdn.jsdelivr.net/npm/%40mdi/font%404.4.95/css/materialdesignicons.min.css" rel="stylesheet" />

	<!-- PLUGINS CSS STYLE -->
	<link href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet">
	<link href="{{asset('assets/plugins/simplebar/simplebar.css')}}" rel="stylesheet" />

	<!-- Ekka CSS -->
	<link id="ekka-css" href="{{asset('assets/css/ekka.css')}}" rel="stylesheet" />

	<!-- FAVICON -->
	
	<link href="{{asset('favicon.png')}}" rel="shortcut icon" />

</head>

<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-light ec-header-light" id="body">

	<!--  WRAPPER  -->
	<div class="wrapper">
		
		<!-- LEFT MAIN SIDEBAR -->
		<div class="ec-left-sidebar ec-bg-sidebar">
			<div id="sidebar" class="sidebar ec-sidebar-footer">

				<div class="ec-brand">
					<a href="{{url('adminindex')}}" >
						{{-- <img class="ec-brand-icon" src="{{asset('images/logowin.png')}}" alt="" /> --}}
						<span class="ec-brand-name text-truncate">Windiamart</span>
					</a>
				</div>

				<!-- begin sidebar scrollbar -->
				<div class="ec-navigation" data-simplebar>
					<!-- sidebar menu -->
					<ul class="nav sidebar-inner" id="sidebar-menu">
						<!-- Dashboard -->
						<li class="active">
							<a class="sidenav-item-link" href="{{url('adminindex')}}">
								<i class="mdi mdi-view-dashboard-outline"></i>
								<span class="nav-text">Dashboard</span>
							</a>
							<hr>
						</li>
						<!-- /Dashboard -->
						<!-- Reports -->
						{{-- <li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-dns-outline"></i>
								<span class="nav-text">Reports</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="categorys" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="{{route('admin.reports')}}">
											<span class="nav-text">View Reports</span>
										</a>
									</li>

								</ul>
							</div>
						</li> --}}
						<!-- /Reports -->

						<!-- Vendors -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-account-group-outline"></i>
								<span class="nav-text">Vendors</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="vendors" data-parent="#sidebar-menu">
									

									<li class="">
										<a class="sidenav-item-link" href="{{url('/vendor-list')}}">
											<span class="nav-text">Vendor List</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>

						<!-- Users -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-account-group"></i>
								<span class="nav-text">Users</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="users" data-parent="#sidebar-menu">
									<li>
										<a class="sidenav-item-link" href="{{route('business.users.list') }}">
											<span class="nav-text">Clients(Business)</span>
										</a>
									</li>

									<li class="">
										<a class="sidenav-item-link" href="{{url('user-list')}}">
											<span class="nav-text">Clients(individuals)</span>
										</a>
									</li>
									{{-- <li class="">
										<a class="sidenav-item-link" href="{{url('user-profile')}}">
											<span class="nav-text">Users Profile</span>
										</a>
									</li> --}}
								</ul>
							</div>
							<hr>
						</li>

						<!-- Category -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-dns-outline"></i>
								<span class="nav-text">Categories</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="categorys" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="{{url('main-category')}}">
											<span class="nav-text">Add Category</span>
										</a>
									</li>

								</ul>
							</div>
						</li>

						<!-- Products -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-palette-advanced"></i>
								<span class="nav-text">Products</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="products" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="{{route('adminfrontend.product-add')}}">
											<span class="nav-text">Add Product</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="{{route('adminfrontend.product-list')}}">
											<span class="nav-text">List Product</span>
										</a>
									</li>
									
									
								</ul>
							</div>
						</li>
				


						<!-- Orders -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-cart"></i>
								<span class="nav-text">Enquires</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="orders" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="{{route('admin.enquiry')}}">
											<span class="nav-text">Enquires list</span>
										</a>
									</li>
									<li class="">
										<a class="sidenav-item-link" href="{{route('admin.enquiryview')}}">
											<span class="nav-text">Enquiries view</span>
										</a>
									</li>
									
									
									
								</ul>
							</div>
						</li>
						<!-- Add Careers -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-dns-outline"></i>
								<span class="nav-text">Careers</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="categorys" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="{{route('addcareers')}}">
											<span class="nav-text">Add Careers</span>
										</a>
									</li>

								
									<li class="">
										<a class="sidenav-item-link" href="{{route('showcareerlist')}}">
											<span class="nav-text">List Careers</span>
										</a>
									</li>

								</ul>
							</div>
						</li>

						
						<!-- Add Testimonials -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-dns-outline"></i>
								<span class="nav-text">Testimonials</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="categorys" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="{{route('addtestimonials')}}">
											<span class="nav-text">Add Testimonial</span>
										</a>
									</li>

							
									<li class="">
										<a class="sidenav-item-link" href="{{route('listtestimonials')}}">
											<span class="nav-text">List Testimonials</span>
										</a>
									</li>

								</ul>
							</div>
						</li>
                <!-- Add News and Events -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-dns-outline"></i>
								<span class="nav-text">News &amp; Events</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="categorys" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="{{route('addnewsevents')}}">
											<span class="nav-text">Add News &amp; Events</span>
										</a>
									</li>

						
									<li class="">
										<a class="sidenav-item-link" href="{{route('news_events.index')}}">
											<span class="nav-text">List News &amp; Events</span>
										</a>
									</li>

								</ul>
							</div>
						</li>
						<!-- Contact forms -->
						
									 <li class="has-sub">
										<a class="sidenav-item-link" href="javascript:void(0)">
											<i class="mdi mdi-cart"></i>
											<span class="nav-text">Contact Forms</span> <b class="caret"></b>
										</a>
										<div class="collapse">
											<ul class="sub-menu" id="orders" data-parent="#sidebar-menu">
												<li class="">
													<a class="sidenav-item-link" href="{{route('adminfrontend.contacts.show')}}">
														<span class="nav-text">Contact Forms</span>
													</a>
												</li>
												
												
												
											</ul>
										</div>
									</li>
						
							<!-- Additional Details -->
						<li class="has-sub">
							<a class="sidenav-item-link" href="javascript:void(0)">
								<i class="mdi mdi-dns-outline"></i>
								<span class="nav-text">additional info</span> <b class="caret"></b>
							</a>
							<div class="collapse">
								<ul class="sub-menu" id="categorys" data-parent="#sidebar-menu">
									<li class="">
										<a class="sidenav-item-link" href="{{route('additionaladdinfo')}}">
											<span class="nav-text">Additional Information</span>
										</a>
									</li>

								
								
									<li class="">
										<a class="sidenav-item-link" href="{{route('additionalinfo')}}">
											<span class="nav-text">View Addtional details</span>
										</a>
									</li>

								</ul>
							</div>
						</li>


					
						

					</ul>
				</div>
			</div>
		</div>

		<!--  PAGE WRAPPER -->
		<div class="ec-page-wrapper">

			<!-- Header -->
			<header class="ec-main-header" id="header">
				<nav class="navbar navbar-static-top navbar-expand-lg">
					<!-- Sidebar toggle button -->
					
					<!-- search form -->
					<div class="search-form d-lg-inline-block">
						
						<div id="search-results-container">
							<ul id="search-results"></ul>
						</div>
					</div>

					<!-- navbar right -->
					<div class="navbar-right">
						<ul class="nav navbar-nav">
							<!-- User Account -->
							<li class="dropdown user-menu">
								<button class="dropdown-toggle nav-link ec-drop" data-bs-toggle="dropdown"
									aria-expanded="false">
									<img src="{{!empty($company->img)? asset('uploads/'.$company->img) : asset('images/profile.png') }}" class="user-image" alt="User Image" />
								</button>
								<ul class="dropdown-menu dropdown-menu-right ec-dropdown-menu">
									<!-- User image -->
									<li class="dropdown-header">
										
										<img src="{{asset('images/logov3.png') }}" class="img-circle" alt="User Image" />
										<div class="d-inline-block">
											Windiamart <small class="pt-1">Admin</small>
										</div>
									</li>
									<li>
										<a href="{{route('adminfrontend.adminprofile')}}">
											<i class="mdi mdi-account"></i> My Profile
										</a>
									</li>
									
									
									<li class="dropdown-footer">
										
										
											<a href="{{ route('logout') }}"
					   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
						<i class="icon-exit"></i>
						<span>Log Out</span>
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
												
											
										 
									
									</li>
								</ul>
							</li>
							
							
						</ul>
					</div>
				</nav>
			</header>