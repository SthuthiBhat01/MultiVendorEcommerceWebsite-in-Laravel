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
                <h1>Business Users List</h1>
                <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Business Users</p>
            </div>
            <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addVendor"> Add Business User
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
                                        <th>No</th>
                                        <th>Company Logo</th>
                                        <th>Name</th>
                                        <th>Company Name</th>
                                        <th>Company Email</th>
                                        <th>Phone Number</th>
                                        <th>GSTIN</th>
                                        <th>Pincode</th>
                                        <th>Join On Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($businessUsers as $index => $businessUser)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            
                                            <img class="vendor-thumb" src="{{ !empty($businessUser->company_logo) ? asset('storage/' . $businessUser->company_logo) : asset('images/profile.png') }}" alt="business user image" />
                                        </td>
                                       
                                        <td>{{ $businessUser->user->name }}</td>
                                        <td>{{ $businessUser->company_name }}</td>
                                        <td>{{ $businessUser->company_email }}</td>
                                        <td>{{ $businessUser->company_phone_number }}</td>
                                        <td>{{ $businessUser->gstin }}</td>
                                        <td>{{ $businessUser->company_pincode }}</td>
                                        <td>{{ \Carbon\Carbon::parse($businessUser->created_at)->format('d-m-Y') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Business User Modal -->
        <div class="modal fade modal-add-contact" id="addVendor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <form id="vendorForm" method="POST" action="{{ route('admin.businessClients.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header px-4">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Add Business Clients</h5>
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
                                            <label for="phone_number">Phone Number</label>
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
                                    <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">Company Logo</label>
                                    <div class="col-sm-8 col-lg-10">
                                        <div class="custom-file mb-1">
                                            <input type="file" class="custom-file-input" id="company_logo" name="company_logo" required>
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
                                            <label for="company_email">Company Email</label>
                                            <input type="email" class="form-control" id="company_email" name="company_email" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="gstin">GSTIN</label>
                                            <input type="text" class="form-control" id="gstin" name="gstin" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="company_phone_number">Company Phone Number</label>
                                            <input type="text" class="form-control" id="company_phone_number" name="company_phone_number" value="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group mb-4">
                                            <label for="company_pincode">Pincode</label>
                                            <input type="text" class="form-control" id="company_pincode" name="company_pincode" value="">
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="modal-footer px-4">
                                        <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-primary btn-pill" id="prevStep" style="display: none;">Back</button>
                                        <button type="button" class="btn btn-primary btn-pill" id="nextStep">Next</button>
                                        <button type="submit" class="btn btn-primary btn-pill" id="saveVendor" style="display: none;">Save Business Client</button>
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
                                    
                                   
