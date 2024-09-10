<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Career</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Career</h1>
        <form action="{{ route('admin.careers.update', $career->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="job_title">Company Name</label>
                <input type="text" class="form-control" id="comp_name" name="comp_name" value="{{ $career->comp_name}}" required>
            </div>
            <div class="form-group">
                <label for="job_title">Job Title</label>
                <input type="text" class="form-control" id="job_title" name="job_title" value="{{ $career->job_title }}" required>
            </div>
            <div class="form-group">
                <label for="job_description">Job Description</label>
                <textarea class="form-control" id="job_description" name="job_description" rows="4" required>{{ $career->job_description }}</textarea>
            </div>
            <div class="form-group">
                <label for="job_requirements">Job Requirements</label>
                <textarea class="form-control" id="job_requirements" name="job_requirements" rows="4" required>{{ $career->job_requirements }}</textarea>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $career->location }}" required>
            </div>
            <div class="form-group">
                <label for="job_type">Job Type</label>
                <select class="form-control" id="job_type" name="job_type" required>
                    <option value="full_time" {{ $career->job_type == 'full_time' ? 'selected' : '' }}>Full-Time</option>
                    <option value="part_time" {{ $career->job_type == 'part_time' ? 'selected' : '' }}>Part-Time</option>
                    <option value="contract" {{ $career->job_type == 'contract' ? 'selected' : '' }}>Contract</option>
                    <option value="internship" {{ $career->job_type == 'internship' ? 'selected' : '' }}>Internship</option>
                </select>
            </div>
            <div class="form-group">
                <label for="salary">Salary</label>
                <input type="text" class="form-control" id="salary" name="salary" value="{{ $career->salary }}" required>
            </div>
            <div class="form-group">
                <label for="experience_level">Experience Level</label>
                <select class="form-control" id="experience_level" name="experience_level" required>
                    <option value="entry" {{ $career->experience_level == 'entry' ? 'selected' : '' }}>Entry Level</option>
                    <option value="mid" {{ $career->experience_level == 'mid' ? 'selected' : '' }}>Mid Level</option>
                    <option value="senior" {{ $career->experience_level == 'senior' ? 'selected' : '' }}>Senior Level</option>
                </select>
            </div>
            <div class="form-group">
                <label for="application_deadline">Application Deadline</label>
                <input type="date" class="form-control" id="application_deadline" name="application_deadline" value="{{ $career->application_deadline }}" required>
            </div>
            <div class="form-group">
                <label for="company_logo">Company Logo</label>
                <input type="file" class="form-control-file" id="company_logo" name="company_logo">
                @if($career->company_logo)
                    <img src="{{ asset('uploads/' . $career->company_logo) }}" alt="Company Logo" width="100">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update Career</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
