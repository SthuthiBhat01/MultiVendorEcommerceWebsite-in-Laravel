@extends('adminfrontend.layouts.main')

@section('main-container')
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}


<body>
    <div class="container mt-5">
        <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
            <div >
            <h3>Add Testimonial</h3>
            <p class="breadcrumbs"><span><a href="{{route('adminfrontend.index')}}">Home</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Testimonial</p>
            <hr>
            </div>
            <div>
                <a href="{{route('listtestimonials')}}" class="btn btn-primary"> View All
                </a>
            </div>
            </div>
        <hr>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('storetestimonial') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <input type="text" class="form-control" id="position" name="position" required>
            </div>
            <div class="mb-3">
                <label for="company" class="form-label">Company</label>
                <input type="text" class="form-control" id="company" name="company" required>
            </div>
            <div class="mb-3">
                <label for="testimonial" class="form-label">Testimonial</label>
                <textarea class="form-control" id="testimonial" name="testimonial" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <select class="form-control" id="rating" name="rating" required>
                    <option value="1">1 - Poor</option>
                    <option value="2">2 - Fair</option>
                    <option value="3">3 - Good</option>
                    <option value="4">4 - Very Good</option>
                    <option value="5">5 - Excellent</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
@endsection
