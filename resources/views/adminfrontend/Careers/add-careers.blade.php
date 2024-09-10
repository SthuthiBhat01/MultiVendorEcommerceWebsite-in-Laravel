@extends('adminfrontend.layouts.main')

@section('main-container')

<body>
    <div class="container mt-5">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div >
        <h3>Add New Career</h3>
        <p class="breadcrumbs"><span><a href="{{route('adminfrontend.index')}}">Home</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Careers</p>
        <hr>
        </div>
        <div>
            <a href="{{route('showcareerlist')}}" class="btn btn-primary"> View All
            </a>
        </div>
        </div>
        <form action="{{ route('admin.careers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="job_title">Company Nane</label>
                <input type="text" class="form-control" id="comp_name" name="comp_name" required>
            </div>
            <div class="form-group">
                <label for="job_title">Job Title</label>
                <input type="text" class="form-control" id="job_title" name="job_title" required>
            </div>
            <div class="form-group">
                <label for="job_description">Job Description</label>
                <textarea class="form-control" id="job_description" name="job_description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="job_requirements">Job Requirements</label>
                <textarea class="form-control" id="job_requirements" name="job_requirements" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <div class="form-group">
                <label for="job_type">Job Type</label>
                <select class="form-control" id="job_type" name="job_type" required>
                    <option value="full_time">Full-Time</option>
                    <option value="part_time">Part-Time</option>
                    <option value="contract">Contract</option>
                    <option value="internship">Internship</option>
                </select>
            </div>
            <div class="form-group">
                <label for="salary">Salary</label>
                <input type="text" class="form-control" id="salary" name="salary" required>
            </div>
            <div class="form-group">
                <label for="experience_level">Experience Level</label>
                <select class="form-control" id="experience_level" name="experience_level" required>
                    <option value="entry">Entry Level</option>
                    <option value="mid">Mid Level</option>
                    <option value="senior">Senior Level</option>
                </select>
            </div>
            <div class="form-group">
                <label for="application_deadline">Application Deadline</label>
                <input type="date" class="form-control" id="application_deadline" name="application_deadline" required>
            </div>
            <div class="form-group">
                <label for="company_logo">Company Logo</label>
                <input type="file" class="form-control-file" id="company_logo" name="company_logo">
            </div>
            <button type="submit" class="btn btn-primary">Add Career</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
