@extends('adminfrontend.layouts.main')

@section('main-container')

    <div class="container mt-5">
        <h1>Add Additional Information</h1>
        <form action="{{ route('storeadditionalinfo') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="supported_by" class="form-label">Supported By</label>
                <textarea class="form-control" id="supported_by" name="supported_by" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="privacy_policy" class="form-label">Privacy Policy</label>
                <textarea class="form-control" id="privacy_policy" name="privacy_policy" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="code_of_conduct" class="form-label">Code of Conduct</label>
                <textarea class="form-control" id="code_of_conduct" name="code_of_conduct" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="general_terms" class="form-label">General Terms & Conditions</label>
                <textarea class="form-control" id="general_terms" name="general_terms" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
