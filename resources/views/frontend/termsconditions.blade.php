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
                                <h1>Terms and Privacy Policy</h1>
                            </div>
                            <ol class="listar-breadcrumb">
                                <li><a href="javascript:void(0);">Home</a></li>
                                <li><a href="javascript:void(0);">Pages</a></li>
                                <li class="listar-active"><span>Terms and Privacy Policy</span></li>
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
    <main id="listar-main" class="listar-main listar-haslayout">
        <section class="listar-sectionspace listar-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Code of Conduct</h2>
                        <div class="listar-description">
                            <ul>
                                @foreach($details as $detail)
                                    @foreach(explode('.', $detail->code_of_conduct) as $point)
                                        @if(trim($point))
                                            <li>{{ trim($point) }}.</li>
                                        @endif
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-12">
                        <h2>Privacy Policy</h2>
                        <div class="listar-description">
                            <ul>
                                @foreach($details as $detail)
                                    @foreach(explode('.', $detail->privacy_policy) as $point)
                                        @if(trim($point))
                                            <li>{{ trim($point) }}.</li>
                                        @endif
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-12">
                        <h2>Terms and Conditions</h2>
                        <div class="listar-description">
                            <ul>
								@foreach($details as $detail)
								@foreach(explode('.',$detail->general_terms) as $point)
								@if(trim($point))
								<li>{{ trim($point) }} .</li>
								@endif
								@endforeach
								@endforeach
                                
                            </ul>
                        </div>
                    </div>
					
                    <div class="col-12">
                        <h2>Supported By</h2>
                        <div class="listar-description">
                            <ul>
                                @foreach($details as $detail)
                                    @foreach(explode('.', $detail->supported_by) as $point)
                                        @if(trim($point))
                                            <li>{{ trim($point) }}.</li>
                                        @endif
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--************************************
            Main End
    *************************************-->
@endsection
