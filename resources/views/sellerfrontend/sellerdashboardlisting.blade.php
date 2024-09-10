@extends('sellerfrontend.layouts.main')

@section('main-container')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<!-- Add Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- Add Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<!-- Add jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Add Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
    .move-up {
        margin-top: 5rem; /* Adjust the value as needed */
    }
    .table-custom {
    font-size: 1.3rem;
    font-weight: 700;
}

</style>
    <div>
        <div>
            <h1>Products List</h1>
            <p class="breadcrumbs">
                <span><a href="{{ route('sellerpage') }}">Home</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Product
            </p>
        </div>
      
        
        <div class="d-flex justify-content-end">
            <a href="{{ route('selleraddproducts') }}" class="btn btn-primary move-up">Add Product</a>
        </div>
        
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    </div>
    <div class="row">
        <table class="table table-striped table-custom">
            <thead>
                <tr>
                    <th>S.no</th>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Category Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $key => $product)
                    <tr @if($product->offers->count() > 0) class="table-warning" @endif>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <img style="height: 80px; width:80px;" src="{{ asset('uploads/' . $product->image) }}" alt="Product Image" />
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>@if($product->category->id){{ $product->category->name }} @endif</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->created_at->format('d-m-Y') }}</td>
                        <td>
                            <div class="btn-group mb-1">
                                <a href="{{ route('seller.products.edit', $product->id) }}" class="btn btn-outline-info" data-toggle="tooltip" title="Edit">
                                    <i class="fas fa-edit"></i> <!-- Edit Icon -->
                                </a>
                                <form action="{{ route('seller.products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this product?');">
                                        <i class="fas fa-trash-alt"></i> <!-- Delete Icon -->
                                    </button>
                                </form>
                                <a href="{{ route('offers.create', $product->id) }}" class="btn btn-outline-primary" data-toggle="tooltip" title="Add Offer">
                                    <i class="fas fa-tag"></i> <!-- Add Offer Icon -->
                                </a>
                            </div>
                            @if($product->offers->count() > 0)
                                <div class="mt-2">
                                    <span class="badge badge-success">Has Offer</span>
                                </div>
                            @endif
                        </td>
                        
                        <script>
                            $(document).ready(function(){
                                $('[data-toggle="tooltip"]').tooltip(); 
                            });
                        </script>
                        
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
