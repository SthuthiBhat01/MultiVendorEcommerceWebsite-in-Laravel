@extends('adminfrontend.layouts.main')

@section('main-container')
<div class="ec-content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <div>
                <h1>News & Events</h1>
                <p class="breadcrumbs">
                    <span><a href="{{ route('adminfrontend.index') }}">Home</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>News & Events
                </p>
            </div>
            <div>
                <a href="{{ route('addnewsevents') }}" class="btn btn-primary">Add News/Event</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($newsEvents as $newsEvent)
                                    <tr>
                                        <td>{{ $newsEvent->id }}</td>
                                        <td>{{ $newsEvent->title }}</td>
                                        <td>{{ $newsEvent->description }}</td>
                                        <td>
                                            @if($newsEvent->image)
                                                <img src="{{ asset('uploads/news_events/'.$newsEvent->image) }}" alt="Image" width="50">
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('news_events.edit', $newsEvent->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('news_events.destroy', $newsEvent->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
