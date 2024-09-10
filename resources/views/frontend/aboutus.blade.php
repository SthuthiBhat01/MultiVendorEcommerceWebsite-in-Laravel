@extends('frontend.layouts.main')

@section('main-container')
    <!-- Header and Inner Search Section Remains Unchanged -->

    <!-- Inner Banner Section -->
    <div class="listar-innerbanner">
        <div class="listar-parallaxcolor listar-innerbannerparallaxcolor">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="listar-innerbannercontent">
                            <div class="listar-pagetitle">
                                <h1>About Us</h1>
                            </div>
                            <ol class="listar-breadcrumb">
                                <li><a href="javascript:void(0);">Home</a></li>
                                <li class="listar-active"><span>about us</span></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Section -->
    <main id="listar-main" class="listar-main listar-innerspeace listar-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div id="listar-content" class="listar-content">
                        <div class="listar-howitwork">
                            <div class="listar-feature">
                                <figure><img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTXFMsMTTTo8n3kNVwcTUu_TPvp_H0mxfJit8Mj5crBlu1W8V2Q" alt="Community Marketplace"></figure>
                                <div class="listar-featurecontent">
                                    <i class="icon-layers"></i>
                                    <h2><span class="listar-bluethemecolor">01</span> A Community-Driven Marketplace</h2>
                                    <div class="listar-description">
                                      <p>  Welcome to our dynamic multi-vendor marketplace, where businesses and individuals converge to explore, discover, and purchase a wide variety of products. Whether you're seeking everyday essentials or unique items, our platform connects communities across the nation, fostering both business growth and consumer satisfaction.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="listar-feature">
                                <figure><img src="https://5.imimg.com/data5/AL/FS/MY-2067981/ecommerce-web-site-design-service-500x500.jpg" alt="Variety of Products"></figure>
                                <div class="listar-featurecontent">
                                    <i class="icon-map3"></i>
                                    <h2><span class="listar-bluethemecolor">02</span>Quality Products </h2>
                                    <div class="listar-description">
                                        <p>Our platform features an extensive selection of products, provided by trusted sellers who are committed to offering quality items. We monitor and ensure that our sellers adhere to our standards, and we take prompt action to address any issues, ensuring a reliable shopping experience for our customers. Moreover, we empower our sellers by allowing them to add their products to our platform for free, enabling them to reach a wider audience without any upfront cost.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="listar-feature">
                                <figure><img src="{{asset('images/enq.png')}}" alt="Support for Sellers and Buyers"></figure>
                                <div class="listar-featurecontent">
                                    <i class="icon-hotairballoon"></i>
                                    <h2><span class="listar-bluethemecolor">03</span> Empowering Sellers, Enhancing Buyer Experience</h2>
                                    <div class="listar-description">
                                        <p>We are dedicated to empowering our sellers by providing a robust platform to showcase their products, manage inquiries. Buyers can easily send inquiries if they are interested in a product, facilitating smooth and effective communication between buyers and sellers.</p>
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
		