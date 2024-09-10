<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Testimonial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Testimonial</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('updatetestimonial', $testimonial->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $testimonial->name }}" required>
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <input type="text" class="form-control" id="position" name="position" value="{{ $testimonial->position }}" required>
            </div>
            <div class="mb-3">
                <label for="company" class="form-label">Company</label>
                <input type="text" class="form-control" id="company" name="company" value="{{ $testimonial->company }}" required>
            </div>
            <div class="mb-3">
                <label for="testimonial" class="form-label">Testimonial</label>
                <textarea class="form-control" id="testimonial" name="testimonial" rows="3" required>{{ $testimonial->testimonial }}</textarea>
            </div>
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <select class="form-control" id="rating" name="rating" required>
                    <option value="1" {{ $testimonial->rating == 1 ? 'selected' : '' }}>1 - Poor</option>
                    <option value="2" {{ $testimonial->rating == 2 ? 'selected' : '' }}>2 - Fair</option>
                    <option value="3" {{ $testimonial->rating == 3 ? 'selected' : '' }}>3 - Good</option>
                    <option value="4" {{ $testimonial->rating == 4 ? 'selected' : '' }}>4 - Very Good</option>
                    <option value="5" {{ $testimonial->rating == 5 ? 'selected' : '' }}>5 - Excellent</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
