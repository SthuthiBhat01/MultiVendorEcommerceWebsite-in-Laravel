@extends('adminfrontend.layouts.main')

@section('main-container')

			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
						<div>
							<h1>Add Product</h1>
							<p class="breadcrumbs"><span><a href="{{route('adminfrontend.index')}}">Home</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Product</p>
						</div>
						<div>
							<a href="{{asset('product-list')}}" class="btn btn-primary"> View All
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card card-default">
								<div class="card-header card-header-border-bottom">
									<h2>Add Product</h2>
								</div>
								<form class="" action="{{route('adminfrontend.product-edit.update',$product->id)}}" method="post" enctype="multipart/form-data">
									@csrf
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
                                                                        src="{{asset('assets/img/icons/edit.svg')}}"
                                                                        class="svg_img header_svg" alt="edit" /></label>
                                                            </div>
                                                            <div class="avatar-preview ec-preview">
                                                                <div class="imagePreview ec-div-preview">
                                                                    @if($product->image)
                                                                        <img class="ec-image-preview" src="{{ asset('uploads/' . $product->image) }}" alt="Product Image" />
                                                                    @else
                                                                        <p>No image available</p>
                                                                    @endif
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
														<input type="text" name="name" value="{{$product->name}}" class="form-control slug-title" id="inputEmail4">
													</div>
													<div class="col-md-6">
														<label class="form-label">Select Categories</label>
														<select name="category_id" id="Categories" class="form-select" required="">
															<option value="">Select a category</option>
															@foreach ($categories as $category)
                                                            <option value="{{$category->id}}"
                                                                @if($product->category_id==$category->id) selected @endif>
                                                                {{$category->name}}
                                                            </option>
                                                            @endforeach

																
															{{-- <optgroup label="Fashion">
																<option value="t-shirt">T-shirt</option>
																<option value="dress">Dress</option>
															</optgroup>
															<optgroup label="Furniture">
																<option value="table">Table</option>
																<option value="sofa">Sofa</option>
															</optgroup>
															<optgroup label="Electronic">
																<option value="phone">I Phone</option>
																<option value="laptop">Laptop</option>
															</optgroup> --}}
														</select>
													</div>
													<div class="col-md-12">
														<label for="slug" class="col-12 col-form-label">Slug</label> 
														<div class="col-12">
															<input id="slug" name="slug" value="{{$product->slug}}" class="form-control here set-slug" type="text">
														</div>
													</div>
							
													<div class="col-md-6">
														<label class="form-label">Price <span>( In INR)
														       </span></label>
														<input type="number" name="price" value="{{$product->price}}"class="form-control" id="price1">
													</div>
													<div class="col-md-6">
														<label class="form-label">Quantity</label>
														<input type="number" value="{{$product->quantity}}" name="quantity" class="form-control" id="quantity1">
													</div>
													<div class="col-md-12">
                                                        <label class="form-label">Full Description</label>
                                                        <textarea class="form-control" name="description" rows="4">{{$product->description}}</textarea>
                                                    </div>
                                                    
													
													<div class="col-md-12">
														<button type="submit" value="Submit" class="btn btn-primary">Submit</button>
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
				</div> <!-- End Content -->
			</div> <!-- End Content Wrapper -->
			@endsection
			<!-- Footer -->
			