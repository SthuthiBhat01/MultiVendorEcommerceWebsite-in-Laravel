@extends('adminfrontend.layouts.main')

@section('main-container')
    <!-- Display Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- CONTENT WRAPPER -->
    <div class="ec-content-wrapper">
        <div class="content">
            <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                <div>
                    <h1>Add Product</h1>
                    <p class="breadcrumbs"><span><a href="{{ route('adminfrontend.index') }}">Home</a></span>
                        <span><i class="mdi mdi-chevron-right"></i></span>Product</p>
                </div>
                <div>
                    <a href="{{ asset('product-list') }}" class="btn btn-primary">View All</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Add Product</h2>
                        </div>
                        <form class="" action="{{ route('adminfrontend.product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="created_by" value="{{ auth()->id() }}">

                            <div class="card-body">
                                <div class="row ec-vendor-uploads">
                                    <div class="col-lg-4">
                                        <div class="ec-vendor-img-upload">
                                            <div class="ec-vendor-main-img">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type='file' name="image" id="image" class="ec-image-upload"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"><img
                                                                src="{{ asset('assets/img/icons/edit.svg') }}"
                                                                class="svg_img header_svg" alt="edit" /></label>
                                                    </div>
                                                    <div class="avatar-preview ec-preview">
                                                        <div class="imagePreview ec-div-preview">
                                                            <img class="ec-image-preview"
                                                                src="{{ asset('assets/img/products/vender-upload-preview.jpg') }}"
                                                                alt="edit" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="thumb-upload-set colo-md-12">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="ec-vendor-upload-detail">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="inputEmail4" class="form-label">Product name</label>
                                                    <input type="text" name="name" class="form-control slug-title" id="inputEmail4">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Select Categories</label>
                                                    <select name="category_id" id="Categories" class="form-select" required="">
                                                        <option value="">Select a category</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="slug" class="col-12 col-form-label">Slug</label> 
                                                    <div class="col-12">
                                                        <input id="slug" name="slug" class="form-control here set-slug" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Price <span>( In INR)</span></label>
                                                    <input type="number" name="price" class="form-control" id="price1">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Quantity</label>
                                                    <input type="number" name="quantity" class="form-control" id="quantity1">
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Full Description</label>
                                                    <textarea class="form-control" name="description" rows="6"></textarea>
                                                </div>

                                                <!-- Add Offer Section -->
                                                <div class="col-md-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="addOfferCheck">
                                                        <label class="form-check-label" for="addOfferCheck">
                                                            Add Offer
                                                        </label>
                                                    </div>
                                                </div>
                                                <div id="offerFields" style="display: none;">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Offer Name</label>
                                                        <input type="text" name="offer_name" class="form-control">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Discount Percentage</label>
                                                        <input type="number" name="discount_percentage" class="form-control" id="discountPercentage">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Discounted Price</label>
                                                        <input type="number" name="discounted_price" class="form-control" id="discountedPrice" readonly>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Start Date</label>
                                                        <input type="date" name="start_date" class="form-control">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">End Date</label>
                                                        <input type="date" name="end_date" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- End Content -->
    </div> <!-- End Content Wrapper -->

    <!-- JavaScript to toggle offer fields and calculate discounted price -->
    <script>
        document.getElementById('addOfferCheck').addEventListener('change', function() {
            var offerFields = document.getElementById('offerFields');
            offerFields.style.display = this.checked ? 'block' : 'none';
        });

        document.getElementById('discountPercentage').addEventListener('input', function() {
            var price = document.getElementById('price1').value;
            var discountPercentage = this.value;
            var discountedPrice = price - (price * (discountPercentage / 100));
            document.getElementById('discountedPrice').value = discountedPrice.toFixed(2);
        });
    </script>
@endsection
