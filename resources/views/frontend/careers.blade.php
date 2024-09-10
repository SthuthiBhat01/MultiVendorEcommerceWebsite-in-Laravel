@extends('frontend.layouts.main')

@section('main-container')
<style>
    .rounded-image {
    width: 50px; /* Adjust as needed */
    height: 50px; /* Adjust as needed */
    border-radius: 50%;
}

</style>
    <div class="listar-innerbanner">
        <div class="listar-parallaxcolor listar-innerbannerparallaxcolor">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="listar-innerbannercontent">
                            <div class="listar-pagetitle">
                                <h1>Careers</h1>
                            </div>
                            <ol class="listar-breadcrumb">
                                <li><a href="javascript:void(0);">Home</a></li>
                                <li><a href="javascript:void(0);">Pages</a></li>
                                <li class="listar-active"><span>Careers</span></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main start -->
    <main id="listar-main" class="listar-main listar-haslayout">
        <section class="listar-sectionspace listar-haslayout">
            <div class="container">
                <div class="row">
                    @foreach($careers as $career)
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card mb-4 shadow">
                            <div class="d-flex align-items-center">
                                @if($career->company_logo)
                                    <img src="{{ asset('uploads/' . $career->company_logo) }}" class="rounded-image mr-2" alt="Company Logo">
                                @endif
                                <h4 class="mb-0">{{ $career->comp_name }}</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><b>{{ $career->job_title }}</b></h5>
                                <p class="card-text"><strong>Description:</strong> {{ $career->job_description }}</p>
                                <p class="card-text"><strong>Requirements:</strong> {{ $career->job_requirements }}</p>
                                <p class="card-text"><strong>Location:</strong> {{ $career->location }}</p>
                                <p class="card-text"><strong>Type:</strong> {{ $career->job_type }}</p>
                                <p class="card-text"><strong>Salary:</strong> {{ $career->salary }}</p>
                                <p class="card-text"><strong>Experience Level:</strong> {{ $career->experience_level }}</p>
                                <p class="card-text"><strong>Application Deadline</strong> {{ $career->application_deadline}}</p>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
