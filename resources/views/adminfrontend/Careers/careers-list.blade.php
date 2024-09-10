@extends('adminfrontend.layouts.main')

@section('main-container')
<body>
    <div class="container mt-5">
        <h3>Added Careers List</h3>
        <hr>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table ">
            <thead>
                <tr>
                    <th>Job Title</th>
                    <th>Location</th>
                    <th>Job Type</th>
                    <th>Salary</th>
                        <th>Experience Level</th>
                        <th>Application Deadline</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($careers as $career)
                    <tr>
                        <td>{{ $career->job_title }}</td>
                        <td>{{ $career->location }}</td>
                        <td>{{ $career->job_type }}</td>
                        <td>{{ $career->salary }}</td>
                        <td>{{ $career->experience_level }}</td>
                        <td>{{ $career->application_deadline }}</td>
                        <td>
                            <a href="{{ route('admin.careers.edit', $career->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('admin.careers.delete', $career->id) }}" method="POST" style="display:inline-block;">
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   @endsection
    
