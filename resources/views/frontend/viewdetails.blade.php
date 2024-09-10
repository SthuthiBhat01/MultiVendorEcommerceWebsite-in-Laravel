<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="{{asset('frontendcss/sendenquiry.css')}}">

    <title>View details</title>
    {{-- <link rel="preconnect" href="{{asset('https://fonts.googleapis.com/')}}">
	<link rel="preconnect" href="{{asset('https://fonts.gstatic.com/')}}" crossorigin> --}}
	

	{{-- <link href="../../../../../cdn.jsdelivr.net/npm/%40mdi/font%404.4.95/css/materialdesignicons.min.css" rel="stylesheet" /> --}}

	<!-- PLUGINS CSS STYLE -->
	{{-- <link href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet">
	<link href="{{asset('assets/plugins/simplebar/simplebar.css')}}" rel="stylesheet" /> --}}

	<!-- Ekka CSS -->
	<link id="ekka-css" href="{{asset('assets/css/ekka.css')}}" rel="stylesheet" />


</head>
<style>
.enquiry-header {
    font-size: 1.75rem; /* Larger font size for prominence */
    font-weight: 700; /* Bold text for emphasis */
    color: #000000; /* Initial color black */
    margin: 20px 0; /* Margin for spacing */
    text-align: center; /* Center align the text */
    font-family: 'Arial', sans-serif; /* Professional font family */
    animation: color-change 1.5s step-start infinite; /* Color change effect */
}

/* Color change effect */
@keyframes color-change {
    0%, 100% {
        color: #000000; /* Black color */
    }
    50% {
        color: #fe0505; /* Red color */
        opacity: 0.8; /* Reduced opacity for blinking effect */
    }
}

	/*product name */
	.product-title {
    font-size: 2rem; /* Large font size for prominence */
    font-weight: 700; /* Bold text for emphasis */
    color: #333; /* Dark color for readability */
    margin: 10px 0; /* Margin for spacing */
    text-transform: capitalize; /* Capitalize first letters */
    line-height: 1.2; /* Line height for better readability */
    border-bottom: 2px solid #ddd; /* Subtle border for separation */
    padding-bottom: 5px; /* Padding for spacing with the border */
    font-family: 'Arial', sans-serif; /* Professional font family */
}

@media (max-width: 768px) {
    .product-title {
        font-size: 1.5rem; /* Adjust font size for smaller screens */
    }
}

	/*product name css ends here*/
	/* Enquiry form styles */
	.product-price1 {
    font-size: 1.5rem; /* Larger font size for emphasis */
    font-weight: bold; /* Bold text to stand out */
    color: #28a745; /* Professional color, such as a shade of green */
    margin: 10px 0; /* Add some margin for spacing */
    display: flex; /* Use flexbox for alignment */
    align-items: center;
}

.product-price1::before {
    content: "₹"; /* Add the currency symbol */
    font-size: 1.2rem; /* Slightly smaller than the price */
    margin-right: 5px; /* Spacing between the symbol and price */
    color: #28a745; /* Match the color */
}

.product-price1::after {
    content: " INR"; /* Add the currency code */
    font-size: 1rem; /* Slightly smaller font size */
    margin-left: 5px; /* Spacing between the price and currency code */
    color: #28a745; /* Match the color */
}

	/*ends here*/
	/* Button Styles */
	.product-actions {
    display: flex;
    align-items: center;
	margin-left: 27rem;

}

.quantity {
    display: flex;
    align-items: center;
    margin-right: 10px;
}

.quantity button {
    padding: 5px 10px;
    font-size: 16px;
    cursor: pointer;
}

.quantity input {
    width: 50px;
    text-align: center;
    font-size: 16px;
    border: 1px solid #ccc;
    margin: 0 5px;
}
	.addtocart{
		color:rgb(9, 9, 9);
		background-color: #f8f8f8;
		border: 2px solid #000000;
		border-radius: 4px;
		width: 7rem;
		height: 2rem;
		margin-top: 2rem;
		align-content: center;
		justify-content: center;
		margin-left: 30rem;


	}


</style>
<body>
    


			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
						<div>
							<h1>Product Detail</h1>
							<p class="breadcrumbs"><span><a href="/">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Product
							</p>
						</div>
					</div>
						
					</div>
					<div class="row">
					
						<div class="col-12">
							<div class="card card-default">
								<div class="card-header card-header-border-bottom">
									<h2>Product Detail</h2>
									
								</div>
								
								<div class="container-fluid"> 
								<div class="card-body product-detail">
									<div class="row">
										<div class="col-xl-4 col-lg-6">
											<div class="row">
                                                <div class="single-pro-img">
                                                    <div class="single-product-scroll">
                                                        <div class="single-product-cover">
                                                            <div class="single-slide zoom-image-hover">
                                                                <img class="img-responsive" src="{{ asset('uploads/'. $product->image) }}" alt="{{ $product->name }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
											</div>
										</div>
										
										<!-- Use container-fluid for full width container -->
											<div class="row">
												<!-- Product Details Section -->
												<div class="col-md-6"> <!-- Adjust based on your preference for smaller screens -->
													<div class="row product-overview">
														<div class="col-12">
															<h3 class="product-title">{{ $product->name }}</h3>
															<h4 class="product-price1">Price: ₹{{ $product->price }}</h4>
															
															
															<div class="product-stock">
																<div class="stock">
																	<p class="title">Category</p>
																	<p class="text">{{ $product->category->name }}</p>
																</div>
																<div class="stock">
																	<p class="title">Quantity</p>
																	<p class="text">{{ $product->quantity }}</p>
																</div>
															</div>
															<!-- Display offers if they exist -->
															@if($product->offers->isNotEmpty())
																<div class="product-offers">
																	{{-- <h5 style="font-weight: bold;">Offers:</h5> --}}
																	<ul>
																		@foreach($product->offers as $offer)
																		<h4 class="product-price1">
																			<span style="text-decoration: line-through; color: grey;">{{ $product->price }}</span>
																			<span style="color: red;">₹{{ $offer->discounted_price }}</span>
																		</h4>
																			<li>
																				<span style="font-weight: bold; color: #ff9900;">{{ $offer->offer_name }}</span> - 
																				<span>{{ $offer->discount_percentage }}% off</span>
																			</li>
																		@endforeach
																	</ul>
																</div>
															@endif
														</div>
													</div>
												</div>
												
												
												
												<!-- Enquiry Form Section -->
												<div class="col-md-6"> <!-- Adjust based on your preference for smaller screens -->
													<div class="card-body product-detail">
														<!-- Enquiry Form -->
														<div class="enquiry-form">
															<h4 class="enquiry-header">Send Enquiry to {{ $companyDetail->company_name }}</h4>
															<form id="enquiryForm" action="{{ route('send.enquiry') }}" method="POST">
																@csrf
																<input type="hidden" name="product_id" value="{{ $product->id }}">
																<input type="hidden" name="seller_id" value="{{ $product->user->id }}">
																
																<div class="form-group">
																	<label for="buyerName">Name:</label>
																	<input type="text" name="name" id="buyerName" class="form-control" required>
																</div>
																<div class="form-group">
																	<label for="buyerEmail">Email:</label>
																	<input type="email" name="email" id="buyerEmail" class="form-control" required>
																</div>
																<div class="form-group">
																	<label for="quantity">Quantity</label>
																	<input type="number" class="form-control" id="quantity" name="quantity" required>
																</div>
																<div class="form-group">
																	<label for="buyerPhone">Phone Number:</label>
																	<input type="text" name="phone_number" id="buyerPhone" class="form-control" required>
																</div>
																<div class="form-group">
																	<label for="buyerAddress">Address:</label>
																	<textarea name="address" id="buyerAddress" class="form-control" required></textarea>
																</div>
																<button type="submit" id="inquiryButton" class="button" >
																	<div class="outline"></div>
  <div class="state state--default">
    <div class="icon">
      <svg
        width="1em"
        height="1em"
        viewBox="0 0 24 24"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <g style="filter: url(#shadow)">
          <path
            d="M14.2199 21.63C13.0399 21.63 11.3699 20.8 10.0499 16.83L9.32988 14.67L7.16988 13.95C3.20988 12.63 2.37988 10.96 2.37988 9.78001C2.37988 8.61001 3.20988 6.93001 7.16988 5.60001L15.6599 2.77001C17.7799 2.06001 19.5499 2.27001 20.6399 3.35001C21.7299 4.43001 21.9399 6.21001 21.2299 8.33001L18.3999 16.82C17.0699 20.8 15.3999 21.63 14.2199 21.63ZM7.63988 7.03001C4.85988 7.96001 3.86988 9.06001 3.86988 9.78001C3.86988 10.5 4.85988 11.6 7.63988 12.52L10.1599 13.36C10.3799 13.43 10.5599 13.61 10.6299 13.83L11.4699 16.35C12.3899 19.13 13.4999 20.12 14.2199 20.12C14.9399 20.12 16.0399 19.13 16.9699 16.35L19.7999 7.86001C20.3099 6.32001 20.2199 5.06001 19.5699 4.41001C18.9199 3.76001 17.6599 3.68001 16.1299 4.19001L7.63988 7.03001Z"
            fill="currentColor"
          ></path>
          <path
            d="M10.11 14.4C9.92005 14.4 9.73005 14.33 9.58005 14.18C9.29005 13.89 9.29005 13.41 9.58005 13.12L13.16 9.53C13.45 9.24 13.93 9.24 14.22 9.53C14.51 9.82 14.51 10.3 14.22 10.59L10.64 14.18C10.5 14.33 10.3 14.4 10.11 14.4Z"
            fill="currentColor"
          ></path>
        </g>
        <defs>
          <filter id="shadow">
            <fedropshadow
              dx="0"
              dy="1"
              stdDeviation="0.6"
              flood-opacity="0.5"
            ></fedropshadow>
          </filter>
        </defs>
      </svg>
    </div>
    <p>
      <span style="--i:0">S</span>
      <span style="--i:1">e</span>
      <span style="--i:2">n</span>
      <span style="--i:3">d</span>
      <span style="--i:4">E</span>
      <span style="--i:5">n</span>
      <span style="--i:6">q</span>
      <span style="--i:7">u</span>
      <span style="--i:8">i</span>
      <span style="--i:9">r</span>
      <span style="--i:10">y</span>
    </p>
  </div>
  <div class="state state--sent">
    <div class="icon">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        height="1em"
        width="1em"
        stroke-width="0.5px"
        stroke="black"
      >
        <g style="filter: url(#shadow)">
          <path
            fill="currentColor"
            d="M12 22.75C6.07 22.75 1.25 17.93 1.25 12C1.25 6.07 6.07 1.25 12 1.25C17.93 1.25 22.75 6.07 22.75 12C22.75 17.93 17.93 22.75 12 22.75ZM12 2.75C6.9 2.75 2.75 6.9 2.75 12C2.75 17.1 6.9 21.25 12 21.25C17.1 21.25 21.25 17.1 21.25 12C21.25 6.9 17.1 2.75 12 2.75Z"
          ></path>
          <path
            fill="currentColor"
            d="M10.5795 15.5801C10.3795 15.5801 10.1895 15.5001 10.0495 15.3601L7.21945 12.5301C6.92945 12.2401 6.92945 11.7601 7.21945 11.4701C7.50945 11.1801 7.98945 11.1801 8.27945 11.4701L10.5795 13.7701L15.7195 8.6301C16.0095 8.3401 16.4895 8.3401 16.7795 8.6301C17.0695 8.9201 17.0695 9.4001 16.7795 9.6901L11.1095 15.3601C10.9695 15.5001 10.7795 15.5801 10.5795 15.5801Z"
          ></path>
        </g>
      </svg>
    </div>
    <p>
      <span style="--i:5">S</span>
      <span style="--i:6">e</span>
      <span style="--i:7">n</span>
      <span style="--i:8">t</span>
    </p>
  </div>
		
																</button>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
										
											
										
									<div class="row review-rating mt-4">
										<div class="col-12">
											<ul class="nav nav-tabs" id="myRatingTab" role="tablist">
												<li class="nav-item">
													<a class="nav-link active"
														id="product-detail-tab" data-bs-toggle="tab"
														data-bs-target="#productdetail" href="#productdetail" role="tab"
														aria-selected="true">
														<i class="mdi mdi-library-books mr-1"></i> Detail</a>
												</li>

												<li class="nav-item">
													<a class="nav-link"
														id="product-information-tab" data-bs-toggle="tab"
														data-bs-target="#productinformation" href="#productinformation"
														role="tab" aria-selected="false">
														<i class="mdi mdi-information mr-1"></i>Vendor Info</a>
												</li>

												<li class="nav-item">
													<a class="nav-link"
														id="product-reviews-tab" data-bs-toggle="tab"
														data-bs-target="#productreviews" href="#productreviews"
														role="tab" aria-selected="false">
														<i class="mdi mdi-star-half mr-1"></i> Company Info</a>
												</li>
											</ul>
											<div class="tab-content" id="myTabContent2">
												<div class="tab-pane pt-3 fade show active" id="productdetail"
													role="tabpanel">
													<p>{{ $product->description }}
													</p>
													
														<p>Slug:{{ $product->slug }}</p>
														<p>Category:{{ $product->category->name }}</p>
														
													</ul>
												</div>

												<div class="tab-pane pt-3 fade" id="productinformation" role="tabpanel">
													<div class="image mb-3">
														<img src="{{!empty($companyDetail->img)? asset('uploads/'.$companyDetail->img) : asset('images/profile.png') }}"
															class="img-fluid rounded-circle" alt="Avatar Image">
													</div>
													<ul>

														<li><span>Vendor : </span> {{$sellerName}}</li>
														<li><span>Email :  </span><span>{{ $product->user->email }}</span></li>
															
															
														
														<li>Phone Number : </span> <span>+91 {{ $product->user->phone_number }}</span></li>
														
													</ul>
												</div>

												<div class="tab-pane pt-3 fade" id="productreviews" role="tabpanel">
													<div class="ec-t-review-wrapper">
														<div class="ec-t-review-item">
															<div class="ec-t-review-avtar">
																<img src="assets/img/review-image/1.jpg" alt="">
															</div>
															<div class="ec-t-review-content">
																<div class="ec-t-review-top">
																	<p class="ec-t-review-name">Company</p>
																	<div class="ec-t-rate">
																		<i class="mdi mdi-star is-rated"></i>
																		<i class="mdi mdi-star is-rated"></i>
																		<i class="mdi mdi-star is-rated"></i>
																		<i class="mdi mdi-star is-rated"></i>
																		<i class="mdi mdi-star"></i>
																	</div>
																</div>
																<div class="ec-t-review-bottom">
																	<p>{{ $companyDetail->company_name }}
																	</p>
																
																	<p>{{ $companyDetail->address }}
																	</p>
																	<p><span>{{ $companyDetail->city }} </span><span>{{ $companyDetail->region }}  </span><span>{{ $companyDetail->pincode }}</span>
																	</p>
																	
																</div>
															</div>
														</div>
														<div class="ec-t-review-item">
															<div class="ec-t-review-avtar">
																<img src="assets/img/review-image/2.jpg" alt="">
															</div>
															<div class="ec-t-review-content">
																<div class="ec-t-review-top">
																	<p class="ec-t-review-name">Visit Website</p>
																	<div class="ec-t-rate">
																		<i class="mdi mdi-star is-rated"></i>
																		<i class="mdi mdi-star is-rated"></i>
																		<i class="mdi mdi-star is-rated"></i>
																		<i class="mdi mdi-star is-rated"></i>
																		<i class="mdi mdi-star"></i>
																	</div>
																</div>
																<div class="ec-t-review-bottom">
																	<p>{{$companyDetail->website_link}}
																	</p>
																</div>
															</div>
														</div>

													</div>
												</div>
											</div>
										</div>
									</div>
								
							</div>
						</div>
					</div>
				</div> 
			</div> 
				<!-- End Content -->
				{{-- <div class="seller-info">
					<h5>Seller Information:</h5>
					<p>Name: {{ $product->user->name }}</p>
					<p>Email: {{ $product->user->email }}</p>
					<p>Phone Number: {{ $product->user->phone_number }}</p>
					
					@if($product->companyDetail)
						<h5>Company Details:</h5>
						<p>Company Name: {{ $product->companyDetail->company_name }}</p>
					
					@endif
				</div>
				 --}}
			<!-- End Content Wrapper -->
            <script src="{{asset('assets/plugins/jquery/jquery-3.5.1.min.js')}}"></script>
            <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
            <script src="{{asset('assets/plugins/simplebar/simplebar.min.js')}}"></script>
            <script src="{{asset('assets/plugins/jquery-zoom/jquery.zoom.min.js')}}"></script>
            <script src="{{asset('assets/plugins/slick/slick.min.js')}}"></script>
            
            <!-- Chart -->
            <script src="{{asset('assets/plugins/charts/Chart.min.js')}}"></script>
            <script src="assets/js/chart.js"></script>
            
            <!-- Google map chart -->
            <script src="{{asset('assets/plugins/charts/google-map-loader.js')}}"></script>
            <script src="{{asset('assets/plugins/charts/google-map.js')}}"></script>
            
            <!-- Date Range Picker -->
            <script src="{{asset('assets/plugins/daterangepicker/moment.min.js')}}"></script>
            <script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
            <script src="{{asset('assets/js/date-range.js')}}"></script>
            
            <!-- Option Switcher -->
            <script src="{{asset('assets/plugins/options-sidebar/optionswitcher.js')}}"></script>
            
            <!-- Ekka Custom -->
            <script src="{{asset('assets/js/ekka.js')}}"></script>

			
<script>
    function changeQuantity(amount) {
        let quantityField = document.getElementById('quantity');
        let currentQuantity = parseInt(quantityField.value);
        let newQuantity = currentQuantity + amount;
        
        if (newQuantity < 1) {
            newQuantity = 1; // Ensure quantity doesn't go below 1
        }
        
        quantityField.value = newQuantity;
    }
</script>

			<!-- Footer -->
        </body>
        </html>
		