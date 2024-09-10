@extends('frontend.layouts.main')

@section('main-container')
		<!--************************************
				Header End
		*************************************-->
		<!--************************************
				Inner Search Start
		*************************************-->
		<div class="listar-innerpagesearch">
			<a id="listar-btnsearchtoggle" class="listar-btnsearchtoggle" href="javascript:void(0);"><i class="icon-icons185"></i></a>
			<div id="listar-innersearch" class="listar-innersearch">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<form class="listar-formtheme listar-formsearchlisting">
								<fieldset>
									<div class="form-group listar-inputwithicon">
										<i class="icon-layers"></i>
										<div class="listar-select">
											<select id="listar-categorieschosen" class="listar-categorieschosen listar-chosendropdown">
												<option>Ex: Food, Retail, hotel, cinema</option>
												<option class="icon-entertainment">Art &amp; Entertainment</option>
												<option class="icon-shopping">Beauty &amp; Health</option>
												<option class="icon-study">Education</option>
												<option class="icon-healthfitness">Fitness</option>
												<option class="icon-icons240">Hotels</option>
												<option class="icon-localservice">Motor Mechanic</option>
												<option class="icon-nightlife">Night Life</option>
												<option class="icon-tourism">Restaurant</option>
												<option class="icon-shopping">Real Estate</option>
												<option class="icon-shopping">Shopping</option>
											</select>
										</div>
									</div>
									<div class="form-group listar-inputwithicon">
										<i class="icon-global"></i>
										<div class="listar-select listar-selectlocation">
											<select id="listar-locationchosen" class="listar-locationchosen listar-chosendropdown">
												<option>Choose a Location</option>
												<option>Lahore</option>
												<option>Bayonne</option>
												<option>Greenville</option>
												<option>Manhattan</option>
												<option>Queens</option>
												<option>The Heights</option>
											</select>
										</div>
									</div>
									<div class="form-group listar-inputwithicon">
										<i class=""><img src="images/icons/icon-01.png" alt="image description"></i>
										<p>Price: </p>
										<!-- <input id="listar-rangeslider" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="14"> -->
										<input id="listar-rangeslider" class="listar-rangeslider" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="14">
									</div>
									<button type="button" class="listar-btn listar-btngreen">Search Places</button>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--************************************
				Inner Search End
		*************************************-->
		<!--************************************
				Inner Banner Start
		*************************************-->
		<div class="listar-innerbanner">
			<div class="listar-parallaxcolor listar-innerbannerparallaxcolor">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="listar-innerbannercontent">
								<div class="listar-pagetitle">
									<h1>Latest News</h1>
								</div>
								<ol class="listar-breadcrumb">
									<li><a href="javascript:void(0);">Home</a></li>
									<li class="listar-active"><span>News</span></li>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--************************************
				Inner Banner End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		<main id="listar-main" class="listar-main listar-innerspeace listar-bglight listar-haslayout">
			<div class="container">
				<div class="row">
					<div id="listar-content" class="listar-content">
						<div class="listar-posts listar-postsgrid listar-postsgridvone">
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<div class="listar-themepost listar-post">
									<figure class="listar-featuredimg">
										<a href="newsdetail.html"><img src="images/blog/img-13.jpg" alt="image description"></a>
										<a class="listar-postcategory" href="newsv1.html">Fitness</a>
									</figure>
									<div class="listar-postcontent">
										<figure class="listar-authorimg"><img src="images/author/img-01.jpg" height="54" width="54" alt="image description"></figure>
										<h2><a href="newsdetail.html">The most common mistakes people make at the gym</a></h2>
										<div class="listar-themepostfoot">
											<time datetime="2017-08-08">
												<i class="icon-clock4"></i>
												<span>Apr 22, 2018</span>
											</time>
											<span class="listar-postcomment">
												<i class="icon-comment"></i>
												<span>3 Comments</span>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<div class="listar-themepost listar-post">
									<figure class="listar-featuredimg">
										<a href="newsdetail.html"><img src="images/blog/img-14.jpg" alt="image description"></a>
										<a class="listar-postcategory" href="newsv2.html">Enjoy Life</a>
									</figure>
									<div class="listar-postcontent">
										<figure class="listar-authorimg"><img src="images/author/img-02.jpg" alt="image description"></figure>
										<h2><a href="newsdetail.html">Here's how drinking can be good for your wellbeing</a></h2>
										<div class="listar-themepostfoot">
											<time datetime="2017-08-08">
												<i class="icon-clock4"></i>
												<span>Apr 22, 2018</span>
											</time>
											<span class="listar-postcomment">
												<i class="icon-comment"></i>
												<span>3 Comments</span>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<div class="listar-themepost listar-post">
									<figure class="listar-featuredimg">
										<a href="newsdetail.html"><img src="images/blog/img-15.jpg" alt="image description"></a>
										<a class="listar-postcategory" href="newsv1.html">Travel</a>
									</figure>
									<div class="listar-postcontent">
										<figure class="listar-authorimg"><img src="images/author/img-03.jpg" alt="image description"></figure>
										<h2><a href="newsdetail.html">12 of the best family days out in the Melbourne</a></h2>
										<div class="listar-themepostfoot">
											<time datetime="2017-08-08">
												<i class="icon-clock4"></i>
												<span>Apr 22, 2018</span>
											</time>
											<span class="listar-postcomment">
												<i class="icon-comment"></i>
												<span>3 Comments</span>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<div class="listar-themepost listar-post">
									<figure class="listar-featuredimg">
										<a href="newsdetail.html"><img src="images/blog/img-16.jpg" alt="image description"></a>
										<a class="listar-postcategory" href="newsv2.html">Fitness</a>
									</figure>
									<div class="listar-postcontent">
										<figure class="listar-authorimg"><img src="images/author/img-01.jpg" height="54" width="54" alt="image description"></figure>
										<h2><a href="newsdetail.html">The most common mistakes people make at the gym</a></h2>
										<div class="listar-themepostfoot">
											<time datetime="2017-08-08">
												<i class="icon-clock4"></i>
												<span>Apr 22, 2018</span>
											</time>
											<span class="listar-postcomment">
												<i class="icon-comment"></i>
												<span>3 Comments</span>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<div class="listar-themepost listar-post">
									<figure class="listar-featuredimg">
										<a href="newsdetail.html"><img src="images/blog/img-17.jpg" alt="image description"></a>
										<a class="listar-postcategory" href="newsv1.html">Enjoy Life</a>
									</figure>
									<div class="listar-postcontent">
										<figure class="listar-authorimg"><img src="images/author/img-02.jpg" alt="image description"></figure>
										<h2><a href="newsdetail.html">Here's how drinking can be good for your wellbeing</a></h2>
										<div class="listar-themepostfoot">
											<time datetime="2017-08-08">
												<i class="icon-clock4"></i>
												<span>Apr 22, 2018</span>
											</time>
											<span class="listar-postcomment">
												<i class="icon-comment"></i>
												<span>3 Comments</span>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<div class="listar-themepost listar-post">
									<figure class="listar-featuredimg">
										<a href="newsdetail.html"><img src="images/blog/img-18.jpg" alt="image description"></a>
										<a class="listar-postcategory" href="newsv2.html">Travel</a>
									</figure>
									<div class="listar-postcontent">
										<figure class="listar-authorimg"><img src="images/author/img-03.jpg" alt="image description"></figure>
										<h2><a href="newsdetail.html">12 of the best family days out in the Melbourne</a></h2>
										<div class="listar-themepostfoot">
											<time datetime="2017-08-08">
												<i class="icon-clock4"></i>
												<span>Apr 22, 2018</span>
											</time>
											<span class="listar-postcomment">
												<i class="icon-comment"></i>
												<span>3 Comments</span>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<div class="listar-themepost listar-post">
									<figure class="listar-featuredimg">
										<a href="newsdetail.html"><img src="images/blog/img-19.jpg" alt="image description"></a>
										<a class="listar-postcategory" href="newsv1.html">Fitness</a>
									</figure>
									<div class="listar-postcontent">
										<figure class="listar-authorimg"><img src="images/author/img-01.jpg" height="54" width="54" alt="image description"></figure>
										<h2><a href="newsdetail.html">The most common mistakes people make at the gym</a></h2>
										<div class="listar-themepostfoot">
											<time datetime="2017-08-08">
												<i class="icon-clock4"></i>
												<span>Apr 22, 2018</span>
											</time>
											<span class="listar-postcomment">
												<i class="icon-comment"></i>
												<span>3 Comments</span>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<div class="listar-themepost listar-post">
									<figure class="listar-featuredimg">
										<a href="newsdetail.html"><img src="images/blog/img-20.jpg" alt="image description"></a>
										<a class="listar-postcategory" href="newsv2.html">Enjoy Life</a>
									</figure>
									<div class="listar-postcontent">
										<figure class="listar-authorimg"><img src="images/author/img-02.jpg" alt="image description"></figure>
										<h2><a href="newsdetail.html">Here's how drinking can be good for your wellbeing</a></h2>
										<div class="listar-themepostfoot">
											<time datetime="2017-08-08">
												<i class="icon-clock4"></i>
												<span>Apr 22, 2018</span>
											</time>
											<span class="listar-postcomment">
												<i class="icon-comment"></i>
												<span>3 Comments</span>
											</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<div class="listar-themepost listar-post">
									<figure class="listar-featuredimg">
										<a href="newsdetail.html"><img src="images/blog/img-21.jpg" alt="image description"></a>
										<a class="listar-postcategory" href="newsv1.html">Travel</a>
									</figure>
									<div class="listar-postcontent">
										<figure class="listar-authorimg"><img src="images/author/img-03.jpg" alt="image description"></figure>
										<h2><a href="newsdetail.html">12 of the best family days out in the Melbourne</a></h2>
										<div class="listar-themepostfoot">
											<time datetime="2017-08-08">
												<i class="icon-clock4"></i>
												<span>Apr 22, 2018</span>
											</time>
											<span class="listar-postcomment">
												<i class="icon-comment"></i>
												<span>3 Comments</span>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<nav class="listar-pagination">
							<ul>
								<li class="listar-prevpage"><a href="javascript:void(0);"><i class="fa fa-angle-left"></i></a></li>
								<li><a href="javascript:void(0);">1</a></li>
								<li><a href="javascript:void(0);">2</a></li>
								<li><a href="javascript:void(0);">3</a></li>
								<li class="listar-nextpage"><a href="javascript:void(0);"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</nav>
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
		