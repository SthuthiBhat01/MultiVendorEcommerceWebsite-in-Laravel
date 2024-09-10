@extends('frontend.dashboardlayout.main')

@section('main-container')

<link rel="stylesheet" href="{{ asset('frontendcss/ps.css') }}">
<main id="main" class="main haslayout">
    <div class="dashboardbanner">
        <ol class="breadcrumb">
            <li><a href="javascript:void(0);">Home</a></li>
            <li class="active">My Profile</li>
        </ol>
        <h1>My Profile</h1>
    </div>
    <div id="content" class="content">
        <form class="formtheme formaddlisting" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <fieldset>
                <div class="boxtitle">
                    <h3>My Profile</h3>
                </div>
                <div class="profilepic">
                    <div class="card">
                        <img id="profile-img" src="{{ !empty($businessUser->company_logo) ? asset('storage/'.$businessUser->company_logo) : asset('images/profile.png') }}" alt="Profile Picture">
                    </div>
                </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                                <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $user->phone_number }}" required>
                                <span class="text-danger">@error('phone_number') {{ $message }} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="created_at">Joined On</label>
                                <input type="text" class="form-control" id="created_at" name="created_at" value="{{ $user->created_at->format('d-m-Y') }}" readonly>
                                <span class="text-danger">@error('created_at') {{ $message }} @enderror</span>
                            </div>

                            @if ($businessUser)
                                <div id="business-fields-wrapper">
                                    <div class="form-group">
                                        <label for="company_name">Company Name</label>
                                        <input type="text" class="form-control" id="company_name" name="company_name" value="{{ $businessUser->company_name }}">
                                        <span class="text-danger">@error('company_name') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="company_email">Company Email</label>
                                        <input type="email" class="form-control" id="company_email" name="company_email" value="{{ $businessUser->company_email }}">
                                        <span class="text-danger">@error('company_email') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="company_phone_number">Company Phone Number</label>
                                        <input type="text" class="form-control" id="company_phone_number" name="company_phone_number" value="{{ $businessUser->company_phone_number }}">
                                        <span class="text-danger">@error('company_phone_number') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="gstin">GSTIN</label>
                                        <input type="text" class="form-control" id="gstin" name="gstin" value="{{ $businessUser->gstin }}">
                                        <span class="text-danger">@error('gstin') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="company_logo">Company Logo</label>
                                        <input type="file" class="form-control" id="company_logo" name="company_logo">
                                        <span class="text-danger">@error('company_logo') {{ $message }} @enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="company_pincode">Company Pincode</label>
                                        <input type="text" class="form-control" id="company_pincode" name="company_pincode" value="{{ $businessUser->company_pincode }}">
                                        <span class="text-danger">@error('company_pincode') {{ $message }} @enderror</span>
                                    </div>
                                </div>
                            @endif

                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    
                </div>
            </fieldset>
        </form>
    </div>
</main>
@endsection
