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
    <main id="listar-main" class="listar-main listar-innerspeace listar-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div id="listar-content" class="listar-content">
                        <div class="listar-posts listar-postsgrid listar-postsgridvtwo">
                            @foreach($newsEvents as $newsEvent)
                                <article class="listar-themepost listar-post">
                                    @if($newsEvent->image)
                                        <figure class="listar-featuredimg">
                                            <img src="{{ asset('uploads/news_events/' . $newsEvent->image) }}" alt="image description">
                                        </figure>
                                    @endif
                                    <div class="listar-postcontent">
                                        <div class="listar-postauthordpname">
                                            <div class="listar-title">
                                                <h2>{{ $newsEvent->title }}</h2>
                                            </div>
                                            <div class="listar-description">
                                                <p>{{ $newsEvent->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
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
        </div>
    </main>
    <!--************************************
            Main End
    *************************************-->
@endsection
