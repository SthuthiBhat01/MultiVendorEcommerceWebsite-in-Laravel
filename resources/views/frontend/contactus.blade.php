@extends('frontend.layouts.main')

@section('main-container')
		<!--************************************
				Header End
		*************************************-->
		

		<!--************************************
				Main Start
		*************************************-->
		<main id="listar-main" class="listar-main listar-haslayout">
			<div id="listar-locationmap" class="listar-locationmap"></div>
			{{-- <br>
			<br>
		<br>
		<br>
		<br>
		<br>
	<br>
	<br>
	<br>
	<br>
<br>
<br> --}}

			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div id="listar-content" class="listar-content">
							<div class="listar-contactusarea">
								<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 pull-left">
									<div class="row">
										<form class="listar-formtheme listar-formcontactus" action="{{route('contact.store')}}" method="post">
											@csrf
											<fieldset>
												<h2>Contact Form</h2>
												<div class="row">
													<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
														<div class="form-group">
															<input type="text" id="contact_name" name="contact_name" class="form-control" placeholder="Your Name">
														</div>
													</div>
													<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
														<div class="form-group">
															<input type="email" id="contact_email" name="contact_email" class="form-control" placeholder="Email Address">
														</div>
													</div>

													<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
														<div class="form-group">
															<textarea class="form-control" id="contact_message" name="contact_message" placeholder="Describe your Requirements"></textarea>
														</div>
													</div>
													<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
														<button class="listar-btn listar-btngreen" type="submit">Send Message</button>
													</div>
												</div>
											</fieldset>
										</form>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 pull-right">
									<div class="row">
										<div class="listar-contactinfo">
											<h2>Get in Touch</h2>
											<div class="listar-description">
												<p>Connect with us to explore our services and offerings.</p>
											</div>
											<ul class="listar-contactinfolist">
												<li>
													<i class="icon-"><img src="images/icons/icon-03.png" alt="image description"></i>
													<span>+ 7890 456 133</span>
												</li>
												<li>
													<i class="icon-icons208"></i>
													<span><a href="mailto:listingstar@gmail.com">windiamart@gmail.com</a></span>
												</li>
												<li>
													<i class="icon-world"></i>
													<span><a href="www.listingstar.html" target="_blank">www.windiamart.com</a></span>
												</li>
												<li>
													<i class="icon-icons74"></i>
													<span>Manhattan Hall, London W1K 2EQ UK</span>
												</li>
											</ul>
											<ul class="listar-socialicons listar-socialiconsborder">
												<li class="listar-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
												<li class="listar-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
												<li class="listar-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
												<li class="listar-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
												<li class="listar-instagram"><a href="javascript:void(0);"><i class="fa fa-instagram"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		@endsection
		<!--************************************
				Main End
		*************************************-->
		<!--************************************
				Footer Start
		*************************************-->
		