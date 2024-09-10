@extends('adminfrontend.layouts.main')

@section('main-container')
<body>
    <div class="container mt-5">
        <h1>Edit Additional Information</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('updateadditionalinfo', $additionalDetail->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="supported_by" class="form-label">Supported By</label>
                <textarea class="form-control" id="supported_by" name="supported_by" rows="3" required>{{ $additionalDetail->supported_by }}</textarea>
            </div>
            <div class="mb-3">
                <label for="privacy_policy" class="form-label">Privacy Policy</label>
                <textarea class="form-control" id="privacy_policy" name="privacy_policy" rows="3" required>{{ $additionalDetail->privacy_policy }}</textarea>
            </div>
            <div class="mb-3">
                <label for="code_of_conduct" class="form-label">Code of Conduct</label>
                <textarea class="form-control" id="code_of_conduct" name="code_of_conduct" rows="3" required>{{ $additionalDetail->code_of_conduct }}</textarea>
            </div>
            <div class="mb-3">
                <label for="general_terms" class="form-label">General Terms & Conditions</label>
                <textarea class="form-control" id="general_terms" name="general_terms" rows="3" required>{{ $additionalDetail->general_terms }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
