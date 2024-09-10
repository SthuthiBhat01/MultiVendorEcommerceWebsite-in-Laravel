@extends('adminfrontend.layouts.main')

@section('main-container')
<body>
    <div class="container mt-5">
        <h1> Terms & Policy</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
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
        <h2 class="mt-5">Existing Information</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Supported By</th>
                    <th>Privacy Policy</th>
                    <th>Code of Conduct</th>
                    <th>General Terms & Conditions</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($additionalDetails as $detail)
                    <tr>
                        <td>{{ $detail->supported_by }}</td>
                        <td>{{ $detail->privacy_policy }}</td>
                        <td>{{ $detail->code_of_conduct }}</td>
                        <td>{{ $detail->general_terms }}</td>
                        <td>
                            <a href="{{ route('editadditionalinfo', $detail->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('deleteadditionalinfo', $detail->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
