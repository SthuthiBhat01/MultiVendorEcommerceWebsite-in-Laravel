@extends('frontend.layouts.main')

@section('main-container')
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
                                <h1>Testimonials</h1>
                            </div>
                            <ol class="listar-breadcrumb">
                                <li><a href="javascript:void(0);">Home</a></li>
                                <li><a href="javascript:void(0);">Pages</a></li>
                                <li class="listar-active"><span>Testimonials</span></li>
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
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div id="listar-content" class="listar-content">
                        <div id="listar-testimonials" class="listar-testimonials listar-testimonialsvtwo">
                            @foreach($testimonials as $testimonial)
                                <div class="listar-testimonial">
                                    <div class="listar-testimonialholder">
                                        <span class="listar-iconquote"><img src="{{ asset('images/icons/icon-06.png') }}" alt="image description"></span>
                                        
                                        <blockquote><q>{{ $testimonial->testimonial }}</q></blockquote>
                                        <h3>{{ $testimonial->name }}</h3>
                                        <h4>{{ $testimonial->position }}</h4>
                                        <h5>{{ $testimonial->company }}</h5>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--************************************
            Main End
    *************************************-->
@endsection
