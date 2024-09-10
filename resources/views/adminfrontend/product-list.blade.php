@extends('adminfrontend.layouts.main')

@section('main-container')
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
                <h1>Products</h1>
                <p class="breadcrumbs">
                    <span><a href="{{ route('adminfrontend.index') }}">Home</a></span>
                    <span><i class="mdi mdi-chevron-right"></i></span>Products
                </p>
            </div>
            <div>
                <a href="{{ route('adminfrontend.product-add') }}" class="btn btn-primary">Add Product</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-default">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="responsive-data-table" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Vendor.ID</th>
                                        <th>Product</th>
                                        <th>Name</th>
                                        <th>Category Name</th>
                                        <th>Added by</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Offer</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>
                                            @if($product->user && $product->user->user_type == 'seller')
                                               WIND24{{ $product->user->id }} <!-- Display seller's ID -->
                                            @else
                                               WIND2442
                                            @endif
                                        </td>
                                        <td>
                                            <img style="height: 80px; width: 80px;" 
                                                 src="{{ asset('uploads/' . $product->image) }}" 
                                                 alt="Product Image" />
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category->name ?? 'N/A' }}</td>
                                        <td>
                                            @if($product->user)
                                                {{ $product->user->name }}
                                            @else
                                                admin
                                            @endif
                                        </td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>
                                            @if($product->offer)
                                                <span class="badge bg-success">Offer</span>
                                            @else
                                                <span class="badge bg-secondary">No Offer</span>
                                            @endif
                                        </td>
                                        <td>{{ $product->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <div class="btn-group mb-1">
                                                <button type="button" class="btn btn-outline-success">Info</button>
                                                <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" 
                                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" 
                                                        data-display="static">
                                                    <span class="sr-only">Info</span>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('adminfrontend.product-edit', $product->id) }}">Edit</a>
                                                    <a class="dropdown-item category-delete" href="javascript:void(0)" data-id="{{ $product->id }}">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- herhe --}}
                        <div class="row justify-content-between bottom-information">
                            <div class="dataTables_info" id="responsive-data-table_info" role="status" aria-live="polite">
                                Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} entries
                            </div>
                            <div class="dataTables_paginate paging_simple_numbers" id="responsive-data-table_paginate">
                                <ul class="pagination">
                                    {{-- Previous Button --}}
                                    @if($products->currentPage() > 1)
                                        <li class="paginate_button page-item">
                                            <a href="?page={{ $products->currentPage() - 1 }}" aria-controls="responsive-data-table" tabindex="0" class="page-link">Previous</a>
                                        </li>
                                    @else
                                        <li class="paginate_button page-item disabled" id="responsive-data-table_previous">
                                            <a href="#" aria-controls="responsive-data-table" tabindex="0" class="page-link">Previous</a>
                                        </li>
                                    @endif
                                    
                                    {{-- Pagination Numbers --}}
                                    @for($i = 1; $i <= $products->lastPage(); $i++)
                                        <li class="paginate_button page-item {{ $products->currentPage() == $i ? 'active' : '' }}">
                                            <a href="?page={{ $i }}" aria-controls="responsive-data-table" tabindex="0" class="page-link">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    
                                    {{-- Next Button --}}
                                    @if($products->currentPage() < $products->lastPage())
                                        <li class="paginate_button page-item" id="responsive-data-table_next">
                                            <a href="?page={{ $products->currentPage() + 1 }}" aria-controls="responsive-data-table" tabindex="0" class="page-link">Next</a>
                                        </li>
                                    @else
                                        <li class="paginate_button page-item disabled">
                                            <a href="#" aria-controls="responsive-data-table" tabindex="0" class="page-link">Next</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        



                                
                        <!-- Pagination Links -->
                        {{-- <div class="d-flex justify-content-between bottom-information">
                            <div class="dataTables_info" id="responsive-data-table_info" role="status" aria-live="polite">
                                Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} entries
                            </div>
                            <div class="dataTables_paginate paging_simple_numbers" id="responsive-data-table_paginate">
                                <ul class="pagination">
                                    {{ $products->links() }}
                                </ul>
                            </div>
                        </div> --}}

                        
                        

                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Content -->
</div> <!-- End Content Wrapper -->
@endsection

@push('footer-script')
<script>
    $('.category-delete').on('click', function() {
        if (confirm('Are you sure to delete this Product?')) {
            var id = $(this).data('id');
            $.ajax({
                url: '{{ route('adminfrontend.product.delete') }}',
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    'id': id
                },
                success: function(data) {
                    location.reload();
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('Error deleting product: ' + errorThrown);
                }
            });
        }
    });
</script>
@endpush
