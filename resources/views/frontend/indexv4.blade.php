@extends('frontend.layouts.main')

@section('main-container')
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style>
	.form-control-search{
		width: 98%;
	}
	input.form-control-search{
		padding: 12px 12px 11px 41px;
	}
/* .subcategories {
    display: none;
} */
 .text-center{
	margin-left: 85em;
 }
.product-card-wrapper {
    margin: auto;
    max-width: calc(100% - 60px); /* Adjust based on your preference */
    padding: 10px;
    background-color: #f9f9f9; /* Light grey background */
    border: 1px solid #ccc; /* Grey border */
    box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* Optional: Adds shadow for depth */
    border-radius: 8px; /* Rounded corners */
}

.sidebar {
  /* Your sidebar styles */
}

.category-list {
  list-style: none;
  padding: 0;
}

.category-item {
  /* Your category item styles */
}
.category-link {
  /* Your styles for category link */
  position: relative;
  padding-right: 20px; /* Adjust as needed */
}

.category-link::after {
  content: '+';
  position: absolute;
  right: 0;
  top: 0;
  /* Add more styles for the plus icon */
}

.category-link.active::after {
  content: '-';
  /* Add more styles for the minus icon */
}


.subcategories {
  display: none;
  position: relative; /* Position relative to the parent category */
  top: 100%; /* Push down to appear below the parent category */
  left: 0;
  width: 100%;
  /* Your subcategory styles */
}
.listar-bothsections {
  display: flex;
  justify-content: space-between; /* Adjust as needed */
}

.sidebar {
  flex: 1; /* Adjust the ratio as needed */
  /* Your existing styles */
}

.listar-sectionspace {
  flex: 3; /* Adjust the ratio as needed */
  /* Your existing styles */
}




</style>


		<!--************************************
				Header End
		*************************************-->
		<!--************************************
				Home Slider Start
		*************************************-->

		<div id=" listar-homebannervthree" class=" listar-homebannervfour">
			<figure><img src="{{asset('bgparallax-13.jpg')}}" alt="image description"></figure>
			<div id="listar-homebanner" class="listar-homebanner">
				<div class="container">
					<div class="row">
						<div class="listar-bannercontent">
							<div class="col-xs-12 col-sm-12 col-md-7 col-lg-6 pull-left"> 
								<h1>Find the Best Deals,<span>Fast and Simple</span></h1>
								
							</div>
							<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 pull-right">
								<form class="listar-formtheme listar-formsearchlisting" action="{{ route('searchProducts') }}" method="GET">
									<fieldset>
										<div class="form-group listar-inputwithicon">
											<i class="icon-layers"></i>
											<input type="text" name="query" class="form-control-search" placeholder="Enter product name" value="{{ request('query') }}">
										</div>
										<div class="form-group listar-inputwithicon">
											<i class="icon-global"></i>
											<div class="listar-select listar-selectlocation">
												<select id="listar-locationchosen" name="category_name" class="listar-locationchosen listar-chosendropdown">
													<option value="">Choose a Category</option>
													@foreach($groupedCategories as $group)
														<option value="{{ $group['main']->name }}" {{ request('category_name') == $group['main']->name ? 'selected' : '' }}>{{ $group['main']->name }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<button type="submit" class="listar-btn listar-btngreen">Search Product</button>
									</fieldset>
								</form>
								
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--************************************
				Home Slider End
		*************************************-->
		<div class="listar-sectionhead">
			<div class="listar-sectiontitle">
				
			</div>
			<div class="listar-description">
				
			</div>
		</div>
		
		
		<!--************************************
					Explore The Category Start
			*************************************-->
			<!--************************************
					Explore The sellers
			*************************************-->
			<section class="listar-sectionspace listar-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="listar-sectionhead">
								<div class="listar-sectiontitle ">
									
									<h2>Verified Sellers</h2>
								</div>
								<div class="listar-description">
									<p>Shop with confidence from our network of verified suppliers.Each seller has been thoroughly vetted to ensure they meet our high standards of quality and reliability.</p>
								</div>
							</div>
							<div class="listar-horizontalthemescrollbar">
								<div class="listar-themeposts listar-categoryposts">
									@foreach($companyDetails as $company)
									<div class="listar-themepost listar-categorypost">
										<figure class="listar-featuredimg">
											
												
												<img src="{{!empty($company->img)? asset('uploads/'.$company->img) : asset('images/profile.png') }}" alt="Profile Image">
											</a>
												<div class="listar-contentbox">
													<div class="listar-postcontent">
														
														<h6>{{$company->company_name}}</h6>
														
													</div>
												</div>
										</figure>
									</div>
								@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Explore The sellers end
			*************************************-->
			
			<!--************************************
					New Products starts
			*************************************-->
			
			<div class="listar-sectionhead">
				<div class="listar-sectiontitle">
					<h2>New Products</h2>
				</div>
				<div class="listar-description">
					<p>Discover our curated selection of high-quality products sourced from trusted vendors across diverse industries. Whether you’re a business seeking bulk purchases or an individual looking for unique items, our collection caters to your needs. </p>
				</div>
			</div>
			
			<section class="listar-sectionspace listar-bglight listar-haslayout">
				<div class="product-main">
					<div class="product-grid">
						@foreach($products as $product)
							<!-- Wrapper div for each product card -->
							<div class="product-card-wrapper">
								<div class="showcase">
									<div class="showcase-banner">
										<!-- Use dynamic path for the default image if available -->
										<a href="{{ route('viewDetails', ['productId' => $product->id]) }}">
											<img src="{{ asset('uploads/'. $product->image) }}" alt="Product" class="product-img default" width="300">
											<img src="{{ asset('uploads/'. $product->image) }}" alt="Product" width="300" class="product-img hover">
										</a>
										
										<div class="showcase-actions">
											
										</div>
									</div>
									<div class="showcase-content">
										
										<a href="{{ route('viewDetails', ['productId' => $product->id]) }}">
											<h3 class="showcase-title">{{ $product->name }}</h3>
										</a>
										<div class="price-box">
											<p class="price"> ₹{{ $product->price }}</p>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			
			
		
				<div class="text-center">
					<a href="{{ route('productList') }}" class="btn btn-primary">More..</a>
				</div>
			</section>
			
			
			<!--************************************
					Explore The Product Start
			*************************************-->
		
		
		

			
			<!-- Pagination Controls Placeholder -->


			<!--************************************
					Explore The Product End
			*************************************-->

		<!--************************************
				Main Start
		*************************************-->
		<main id="listar-main" class="listar-main listar-haslayout">


			<!--************************************
					Theme Features Start
			*************************************-->
			<section class="listar-sectionspace listar-featuresarea">
				<div class="container">
					<div class="row">
						<div class="listar-features">
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<div class="listar-feature">
									<span class="listar-featureicon"><i class="icon-layers"></i></span>
									<h2>01 Register as buyer </h2>
									<div class="listar-description">
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh tempor cum soluta nobis consectetuer nihil imperdiet doming...</p>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<div class="listar-feature">
									<span class="listar-featureicon"><i class="icon-map3"></i></span>
									<h2>02 Search Product </h2>
									<div class="listar-description">
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh tempor cum soluta nobis consectetuer nihil imperdiet doming...</p>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<div class="listar-feature">
									<span class="listar-featureicon"><i class="icon-hotairballoon"></i></span>
									<h2>03 Send Enquiry to Vendor</h2>
									<div class="listar-description">
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh tempor cum soluta nobis consectetuer nihil imperdiet doming...</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Theme Features End
			*************************************-->
			<!--************************************
					Explore The sellers
			*************************************-->
			<section class="listar-sectionspace listar-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="listar-sectionhead">
								<div class="listar-sectiontitle ">
									
									<h2>Our Verified business Clients</h2>
								</div>
								
							</div>
							<div class="listar-horizontalthemescrollbar">
								<div class="listar-themeposts listar-categoryposts">
									@foreach($business as $business)
									<div class="listar-themepost listar-categorypost">
										<figure class="listar-featuredimg">
											<a href="javascript:void(0);">
												
												<img src="{{ !empty($business->company_logo) ? asset('storage/'.$business->company_logo) : asset('images/profile.png') }}" alt="Profile Picture">
											</a>
												<div class="listar-contentbox">
													<div class="listar-postcontent">
														
														<h4>{{$business->company_name}}</h4>
														<h6>{{$business->company_email}}</h6>
													</div>
												</div>
										</figure>
									</div>
								@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Explore The City End
			*************************************-->
			


<!--************************************
		Theme Features Start

************************************
		Recent Listing Start
*************************************-->
<section class="listar-sectionspace listar-recentlistingarea">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="listar-sectionhead">
                    <div class="listar-sectiontitle">
                        <h2>Recent Listings</h2>
                    </div>
                </div>
                <div class="tab-content tg-themetabcontent">
                    <div role="tabpanel" class="tab-pane active" id="one">
                        <div id="listar-recentlistingsliderone" class="listar-themeposts listar-recentlistingslider listar-threecolumnsslider owl-carousel">
                            @foreach($freshRecommendations as $product)
                            <div class="item">
                                <div class="listar-themepost listar-placespost">
                                    <figure class="listar-featuredimg">
                                        <a href="{{ route('viewDetails', ['productId' => $product->id]) }}">
                                            <img src="{{ asset('uploads/'.$product->image) }}" alt="Product" />
                                        </a>
                                    </figure>
                                    <div class="listar-postcontent">
                                        <h4>
                                            <a href="{{ route('viewDetails', ['productId' => $product->id]) }}">{{ $product->name }}</a>
                                        </h4>
                                        <p class="price">₹{{ $product->price }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--************************************
		Recent Listing End
*************************************-->


			
			
			<!--************************************
					Testimonials Start
			*************************************-->
			<section class="listar-sectionspace listar-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="listar-sectionhead">
								<div class="listar-sectiontitle">
									<h2>People Feedback</h2>
								</div>
								<div class="listar-description">
									<p>What our Clients Says <a class="listar-bluethemecolor" href="{{route('testimonials')}}">View All</a></p>
								</div>
							</div>
						</div>
						<div id="listar-testimonialslidervthree" class="listar-threecolumnsslider listar-testimonials listar-testimonialsvthree owl-carousel">
							@foreach($testimonials as $testimonial)
						
							<div class="item listar-testimonial">
								<blockquote>
									<h5>{{$testimonial->name}}</h5>
									<q>{{$testimonial->testimonial}}</q>
								</blockquote>
								<figure>
									
									<figcaption>
										<h3>{{$testimonial->company}}</h3>
										<h4>{{$testimonial->position}}</h4>
									</figcaption>
								</figure>
							</div>
							@endforeach
							
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Testimonials End
			*************************************-->
			<!--************************************
					Newsletter Start
			*************************************-->
			<section class="listar-newsletterarea listar-newsletterareavtwo">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="listar-sectionhead">
								<div class="listar-sectiontitle">
									<h2>Contact Us</h2>
								</div>
								<div class="listar-description">
									<p>Connect with us to explore our services and offerings.</p>
								</div>
							</div>
							<div class="listar-formarea">
								<form class="listar-formtheme listar-formnewsletter">
									<fieldset>
										<input type="email" name="email" class="form-control" placeholder="Enter your details">
										<button class="listar-btn listar-btngreen" type="button" onclick="window.location='{{ route('contactus') }}'">
											Click here
										</button>
										
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			<!--************************************
					Newsletter End
			*************************************-->
		</main>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
  $('.category-link').click(function(e) {
    e.preventDefault();
    var $this = $(this);
    $this.toggleClass('active');
    $this.next('.subcategories').slideToggle();
  });
});

</script>


			@endsection
		<!--************************************
				Main End
		*************************************-->
		<!--************************************
				Footer Start
		*************************************-->
		