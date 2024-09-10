@extends('adminfrontend.layouts.main')

@section('main-container')
<!-- CONTENT WRAPPER -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>

.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 400,
  'GRAD' 0,
  'opsz' 24
}
</style>

  
<div class="ec-content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-contacts">
            <div>
                <h1>Vendor List</h1>
                <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Vendor</p>
            </div>
            <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addVendor"> Add Vendor
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="ec-vendor-list card card-default">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="responsive-data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>Reg.ID</th>
                                        <th>Profile</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Shop Name</th>
                                        <th>GSTIN</th>
                                        <th>Weblink</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>Country</th>
                                        <th>Pincode</th>
                                        {{-- <th>Status</th> --}}
                                        <th>JoinOnDate</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vendors as $vendor)
                                    <tr>
                                        <td>WIND24{{ $vendor->seller_id }}</td>
                                        <td><img class="vendor-thumb" src="{{!empty($vendor->img)? asset('uploads/'.$vendor->img) : asset('images/profile.png') }}" alt="vendor image" /></td>
                                        <td>{{ $vendor->name }}</td>
                                        <td>{{ $vendor->email }}</td>
                                        <td>{{ $vendor->company_name }}</td>
                                        <td>{{ $vendor->gstin }}</td>
                                        <td>{{ $vendor->website_link }}</td>
                                        <td>{{ $vendor->address }}</td>
                                        <td>{{ $vendor->city }}</td>
                                        <td>{{ $vendor->country }}</td>
                                        <td>{{ $vendor->pincode }}</td>
										{{-- <td>
										@if($vendor['status'] == 1)
										<a class="updateVendorStatus" id="vendorstatus" seller_id="{{ $vendor->seller_id }}"  href="javascript:void(0)">
											<span>
												<!-- Using 'check_circle' as an example icon for active status -->
												<i style="font-size: 25px;"status="Active" class="material-icons">check_circle</i>
											</span>
										</a>
									@else
										<a class="updateVendorStatus" id="vendorstatus" seller_id="{{ $vendor->seller_id }}"  href="javascript:void(0)">
											<span>
												<!-- Using 'highlight_off' as an example icon for inactive status -->
												<i style="font-size: 25px;" status="Inactive" class="material-icons">highlight_off</i>
											</span>
										</a>
									@endif
								</td> --}}
										
                                        <td>{{ \Carbon\Carbon::parse($vendor->created_at)->format('d-m-Y') }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-outline-success">Info</button>
                                                <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                                    <span class="sr-only">Info</span>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <form action="{{ route('vendor.destroy', $vendor->seller_id) }}" method="POST" id="delete-form-{{ $vendor->seller_id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this vendor?')) document.getElementById('delete-form-{{ $vendor->seller_id }}').submit();">Delete</a>
                                                    </form>
                                                </div>
                                            </div>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       
            
        <script>
            $(document).on("click", ".updateVendorStatus", function() {
                var seller_id = $(this).attr('seller_id');
                var statusElement = $(this).find("i"); // Find the <i> element inside the clicked link
                var statusText = statusElement.text().trim(); // Get the text content of the <i> element, which holds the status ('Active' or 'Inactive')
            
                // Map the status text to the numeric value expected by the backend
                var status = statusText === 'Active'? 1 : 0;
            
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '{{route('vendor.updateStatus')}}',
                    data: {seller_id: seller_id, status: status},
                    success: function(data) {
                        // Update the UI based on the new status
                        if (data.status === 0) {
                            statusElement.replaceWith("<i style='font-size: 25px;' class='material-icons'>highlight_off</i>"); // Replace the old icon with a new one
                        } else if (data.status === 1) {
                            statusElement.replaceWith("<i style='font-size: 25px;' class='material-icons'>check_circle</i>"); // Replace the old icon with a new one
                        }
                    },
                    error: function() {
                        alert("Error updating status.");
                    }
                });
            });
            </script>
            
            
	
			
		
        <!-- Add Vendor Modal  -->

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


<div class="modal fade modal-add-contact" id="addVendor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form id="vendorForm" method="POST" action="{{ route('vendors.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header px-4">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add New Vendor</h5>
                </div>
                <div class="modal-body px-4">
                    <!-- Step 1: Personal Details -->
                    <div id="step-1" class="form-step">
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="username">User Name</label>
                                    <input type="text" class="form-control" id="username" name="username" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="phone_number">Company Phone Number</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" id="password" name="password" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Step 2: Company Details -->
                    <div id="step-2" class="form-step" style="display: none;">
                        <div class="form-group row mb-6">
                            <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">Company Image</label>
                            <div class="col-sm-8 col-lg-10">
                                <div class="custom-file mb-1">
                                    <input type="file" class="custom-file-input" id="img" name="img" required>
                                    <label class="custom-file-label" for="coverImage">Choose file...</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="company_address">Company Address</label>
                                    <input type="text" class="form-control" id="company_address" name="company_address" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="GSTIN">GSTIN</label>
                                    <input type="text" class="form-control" id="GSTIN" name="GSTIN" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="company_website">Company Website</label>
                                    <input type="text" class="form-control" id="company_website" name="company_website" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" name="city" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="region">Region</label>
                                    <input type="text" class="form-control" id="region" name="region" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" id="country" name="country" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="pincode">Pincode</label>
                                    <input type="text" class="form-control" id="pincode" name="pincode" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer px-4">
                    <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary btn-pill" id="prevStep" style="display: none;">Back</button>
                    <button type="button" class="btn btn-primary btn-pill" id="nextStep">Next</button>
                    <button type="submit" class="btn btn-primary btn-pill" id="saveVendor" style="display: none;">Save Vendor</button>
                </div>
            </form>
        </div>
    </div>
</div>  
 </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const nextStepBtn = document.getElementById('nextStep');
        const prevStepBtn = document.getElementById('prevStep');
        const saveVendorBtn = document.getElementById('saveVendor');

        const step1 = document.getElementById('step-1');
        const step2 = document.getElementById('step-2');

        nextStepBtn.addEventListener('click', function () {
            step1.style.display = 'none';
            step2.style.display = 'block';
            nextStepBtn.style.display = 'none';
            prevStepBtn.style.display = 'inline-block';
            saveVendorBtn.style.display = 'inline-block';
        });

        prevStepBtn.addEventListener('click', function () {
            step1.style.display = 'block';
            step2.style.display = 'none';
            nextStepBtn.style.display = 'inline-block';
            prevStepBtn.style.display = 'none';
            saveVendorBtn.style.display = 'none';
        });
    });
</script>
    
    
@endsection
