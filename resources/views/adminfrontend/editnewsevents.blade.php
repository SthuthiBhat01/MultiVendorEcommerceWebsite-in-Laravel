@extends('adminfrontend.layouts.main')

@section('main-container')
<div class="ec-content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <div>
                <h1>Edit News/Event</h1>
                <p class="breadcrumbs">
                    <span><a href="{{ route('adminfrontend.index') }}">Home</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span><a href="{{ route('news_events.index') }}">News & Events</a>
                    <span><i class="mdi mdi-chevron-right"></i></span>Edit
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('adminfrontend.updatenewsevents', $newsEvent->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Use PUT method -->

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" value="{{ $newsEvent->title }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="description">{{ $newsEvent->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control-file" id="image">
                                @if($newsEvent->image)
                                    <img src="{{ asset('uploads/news_events/'.$newsEvent->image) }}" alt="Image" width="100">
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('news_events.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
