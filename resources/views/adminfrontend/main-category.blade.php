@extends('adminfrontend.layouts.main')

@section('main-container')

<!-- CONTENT WRAPPER -->
<div class="ec-content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
            <h1>Main Category</h1>
            <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Main Category</p>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-12">
                <div class="ec-cat-list card card-default mb-24px">
                    <div class="card-body">
                        <div class="ec-cat-form">
                            <h4>Add New Category</h4>

                            <form action="{{ route('adminfrontend.main-category.store') }}" method="post">
                                @csrf

                                <div class="form-group row">
                                    <label for="text" class="col-12 col-form-label">
                                        Category Name
                                        <span class="required" style="color: red;">*</span>
                                    </label>

                                    <div class="col-12">
                                        <input id="text" name="name" class="form-control here slug-title" type="text">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="text" class="col-12 col-form-label">
                                        Subcategory of
                                        <span class="required" style="color:red;">*</span>
                                    </label>
                                    <div class="col-12">
                                        <select name="category_id" class="form-control col-md-7 col-xs-17">
                                            <option value="">No Subcategory</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-12">
                <div class="ec-cat-list card card-default">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="responsive-data-table" class="table">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Category Name</th>
                                        <th>Sub Categories of</th>
                                        <th>Created Date</th>
                                        {{-- <th>Product</th>
                                        <th>Total Sell</th> --}}


                                        {{-- <th>Trending</th>
                                        <th>Action</th> --}}
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($categories as $key=>$category)
                                    <tr>

                                        <td>{{$key+1}}</td>
                                        <td>
                                            {{$category->name}}
                                        </td>
                                        <td>
                                            @if($category->category_id)
                                            {{$category->parent->name}}


                                            @else
                                            No Parent Category


                                            @endif
                                        </td>
                                        <td>{{$category->created_at->format('d-m-Y')}}</td>



                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-outline-success">Info</button>
                                                <button type="button"
                                                    class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" data-display="static">
                                                    <span class="sr-only">Info</span>
                                                </button>

                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('adminfrontend.edit',$category->id) }}">Edit</a>
                                                    <a class="dropdown-item category-delete"
                                                        href="javascript:void(0)"
                                                        data-id="{{$category->id}}">Delete</a>
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
    </div> <!-- End Content -->
</div> <!-- End Content Wrapper -->
@endsection

@push('footer-script')
<script>
    $('.category-delete').on('click', function() {
        if (confirm('Are you sure to delete this category?')) {
            var id = $(this).data('id');
            $.ajax({
                url: '{{ route('adminfrontend.main-category.delete') }}',
                type: 'post',
                data: {
                    _token: "{{ csrf_token() }}",
                    'id': id
                },
                success: function(data) {
                    location.reload();
                },
                error: function(xhr, textStatus, errorThrown) {
                    alert('Error deleting category: ' + errorThrown);
                }
            });
        }
    });
</script>
@endpush
