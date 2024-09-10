@extends('sellerfrontend.layouts.main')

@section('main-container')

<link rel="stylesheet" href="{{ asset('frontendcss/ps.css') }}">
    <!--************************************
            Main Start
    *************************************-->
    <main id="listar-main" class="listar-main listar-haslayout">
        <!--************************************
                Dashboard Banner Start
        *************************************-->
        <div class="listar-dashboardbanner">
            <ol class="listar-breadcrumb">
                <li><a href="javascript:void(0);">Home</a></li>
                <li class="listar-active">My Profile</li>
            </ol>
            <h1>My Profile</h1>
        </div>
        <!--************************************
                Dashboard Banner End
        *************************************-->
        <!--************************************
                Dashboard Content Start
        *************************************-->
        <div id="listar-content" class="listar-content">
            <form class="listar-formtheme listar-formaddlisting" method="POST" action="{{ route('seller.update-profile') }}" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <div class="listar-boxtitle">
                        <h3>My Profile</h3>
                    </div>
                    <div class="profilepic">
                        <div class="card">
                            <!-- Check if the img field is null, if so, use the default image, otherwise use the stored image -->
                            <img id="profile-img" src="{{!empty($company->img)? asset('uploads/'.$company->img) : asset('images/profile.png') }}" alt="Profile Image">
                            <label class="update" for="input-file">Update image</label>
                            <input type="file" accept="image/jpeg, image/png, image/jpg" id="input-file" name="img" style="display: none;">
                        <h4>SellerID: WIND24{{ $user->id }}</h4>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group listar-dashboardfield">
                                <label>Your Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group listar-dashboardfield">
                                <label>Email Address</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="listingstar@gmail.com">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group listar-dashboardfield">
                                <label>Phone Number</label>
                                <input type="text" name="phonenumber" value="{{ $user->phone_number }}" class="form-control" placeholder="013214577">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group listar-dashboardfield">
                                <label>Company Address</label>
                                <textarea name="address" rows="4" cols="50" class="form-control">{{ $company->address }}</textarea>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="listar-boxtitle">
                        <h3>Company Information</h3>
                    </div>
                    <div class="listar-dashboardsocial">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group listar-dashboardfield">
                                    <label>Company Name</label>
                                    <input type="text" name="company_name" value="{{ $company->company_name }}" class="form-control" placeholder="Enter company name">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group listar-dashboardfield">
                                    <label>GSTIN</label>
                                    <input type="text" name="GSTIN" value="{{ $company->GSTIN }}" class="form-control" placeholder="Enter GSTIN">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group listar-dashboardfield">
                                    <label>Website link</label>
                                    <input type="text" name="website_link" value="{{ $company->website_link }}" class="form-control" placeholder="Enter website link">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group listar-dashboardfield">
                                    <label>Pincode</label>
                                    <input type="text" name="pincode" value="{{ $company->pincode }}" class="form-control" placeholder="Enter pincode">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group listar-dashboardfield">
                                    <label>Region</label>
                                    <input type="text" name="region" value="{{ $company->region }}" class="form-control" placeholder="Enter region">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group listar-dashboardfield">
                                    <label>Country</label>
                                    <input type="text" name="country" value="{{ $company->country }}" class="form-control" placeholder="Enter country">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <button type="submit" value="Submit" class="listar-btn listar-btngreen">Update Profile</button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <!--************************************
                    Dashboard Content End
        *************************************-->
    </main>
    <!--************************************
                Main End
    *************************************-->


<script>
	let profileImg = document.getElementById('profile-img');
	let inputFile = document.getElementById('input-file');

	inputFile.onchange = function() {
		if (inputFile.files && inputFile.files[0]) {
			profileImg.src = URL.createObjectURL(inputFile.files[0]);
		}
	}
</script>
@endsection
