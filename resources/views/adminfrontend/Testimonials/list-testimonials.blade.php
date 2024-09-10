@extends('adminfrontend.layouts.main')

@section('main-container')
   

<body>
    <div class="container mt-5">
        <h1>List of Testimonials</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table ">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Company</th>
                    <th>Testimonial</th>
                    <th>Rating</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($testimonials as $testimonial)
                    <tr>
                        <td>{{ $testimonial->name }}</td>
                        <td>{{ $testimonial->position }}</td>
                        <td>{{ $testimonial->company }}</td>
                        <td>{{ $testimonial->testimonial }}</td>
                        <td>{{ $testimonial->rating }}</td>
                        <td>
                            <a href="{{ route('edittestimonial', $testimonial->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('deletetestimonial', $testimonial->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this testimonial?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection