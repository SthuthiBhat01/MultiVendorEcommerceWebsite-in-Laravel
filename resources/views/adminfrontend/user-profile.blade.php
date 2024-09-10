<!-- resources/views/adminfrontend/user-profile.blade.php -->

@extends('adminfrontend.layouts.main')

@section('main-container')
<div class="ec-content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-contacts">
            <div>
                <h1>User Profile</h1>
                <p class="breadcrumbs">
                    <span><a href="{{ route('adminfrontend.index') }}">Home</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Profile
                </p>
            </div>
        </div>

        <div class="card bg-white profile-content">
            <div class="row">
                <div class="col-lg-4 col-xl-3">
                    <div class="profile-content-left profile-left-spacing">
                        <div class="text-center widget-profile px-0 border-0">
                            <div class="card-img mx-auto rounded-circle">
                                <img src="{{ asset('uploads/' . ($admin->company->img ?? 'default.jpg')) }}" alt="user image">
                            </div>
                            <div class="card-body">
                                <h4 class="py-2 text-dark">{{ $admin->name }}</h4>
                                <p>{{ $admin->email }}</p>
                            </div>
                        </div>
                        <hr class="w-100">
                        <div class="contact-info pt-4">
                            <h5 class="text-dark">Contact Information</h5>
                            <p class="text-dark font-weight-medium pt-24px mb-2">Email address</p>
                            <p>{{ $admin->email }}</p>
                            <p class="text-dark font-weight-medium pt-24px mb-2">Phone Number</p>
                            <p>{{ $admin->phone_number }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-xl-9">
                    <div class="profile-content-right profile-right-spacing py-5">
                        <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myProfileTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile" type="button" role="tab"
                                    aria-controls="profile" aria-selected="true">Profile</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="settings-tab" data-bs-toggle="tab"
                                    data-bs-target="#settings" type="button" role="tab"
                                    aria-controls="settings" aria-selected="false">Settings</button>
                            </li>
                        </ul>

                        <div class="tab-content px-3 px-xl-5" id="myTabContent">
                            <div class="tab-pane fade show active" id="profile" role="tabpanel"
                                aria-labelledby="profile-tab">
                                <div class="tab-widget mt-5">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card card-default">
                                                <div class="card-header justify-content-between mb-1">
                                                    <h2>Latest Notifications</h2>
                                                </div>
                                                <div class="card-body compact-notifications" data-simplebar
                                                    style="height: 434px;">
                                                    @foreach($enquiries as $enquiry)
        <div class="media py-3 align-items-center justify-content-between">
            <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-success text-white">
                <i class="mdi mdi-email-outline font-size-20"></i>
            </div>
            <div class="media-body pr-3">
                <a class="mt-0 mb-1 font-size-15 text-dark" href="#">New Enquiry </a>
                <p>{{ $enquiry->name }} has sent an enquiry, check your mail.</p>
            </div>
            <span class="font-size-12 d-inline-block"><i class="mdi mdi-clock-outline"></i> {{ $enquiry->created_at->format('M d, Y H:i') }}</span>
        </div>
    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="settings" role="tabpanel"
                                aria-labelledby="settings-tab">
                                <div class="tab-pane-content mt-5">
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('admin.update.profile') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group mb-4">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $admin->name) }}" required>
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="email">Email Address</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $admin->email) }}" required>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="phone_number">Phone Number</label>
                                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $admin->phone_number) }}" required>
                                            @error('phone_number')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password">
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="img">Company Image</label>
                                            <input type="file" class="form-control" id="img" name="img">
                                            @error('img')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="company_name">Company Name</label>
                                            <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name', $admin->company ? $admin->company->company_name : '') }}" required>
                                            @error('company_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                      
                                        <div class="form-group mb-4">
                                            <label for="GSTIN">GSTIN</label>
                                            <input type="text" class="form-control" id="GSTIN" name="GSTIN" value="{{ old('GSTIN', $admin->company ? $admin->company->GSTIN : '') }}" required>
                                            @error('gstin')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="website_link">Website Link</label>
                                            <input type="text" class="form-control" id="website_link" name="website_link" value="{{ old('website_link', $admin->company ? $admin->company->website_link : '') }}">
                                            @error('website_link')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $admin->company ? $admin->company->address : '') }}" required>
                                            @error('address')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="country">Country</label>
                                            <input type="text" class="form-control" id="country" name="country" value="{{ old('country', $admin->company ? $admin->company->country : '') }}" required>
                                            @error('country')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $admin->company ? $admin->company->city : '') }}" required>
                                            @error('city')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="region">Region</label>
                                            <input type="text" class="form-control" id="region" name="region" value="{{ old('region', $admin->company ? $admin->company->region : '') }}" required>
                                            @error('region')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="pincode">Pincode</label>
                                            <input type="text" class="form-control" id="pincode" name="pincode" value="{{ old('pincode', $admin->company ? $admin->company->pincode : '') }}" required>
                                            @error('pincode')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-0 text-center">
                                            <button type="submit" class="btn btn-primary">Update Profile</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
