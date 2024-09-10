@extends('adminfrontend.layouts.main')

@section('main-container')

<h4 class="head" style="font:bolder;">Edit Category</h4>
<div class="row justify-content-center">
    <div class="col-xl-5 col-lg-4">
      
            <div class="card-body">
                <div class="ec-cat-form text-center">
                    

                    <form action="{{ route('adminfrontend.update',$category->id) }}" method="post" >
                        @csrf
                    
                        <div class="form-group row">
                            <label for="text" class="col-12 col-form-label">
                                Category Name
                                <span class="required" style="color: red;">*</span>
                            </label>
                            
                            <div class="col-12">
                                <input id="text" name="name" class="form-control here slug-title" type="text" value="{{$category->name}}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="text" class="col-12 col-form-label"> 
                                Subcategory of
                                <span class="required" style="color:red;">*</span>
                            </label> 
                            <div class="col-12">
                                <select name="category_id" class="form-control col-md-7 col-xs-17">
                                    <option value="" @if($category->category_id==null)selected @endif>No Subcategory</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"@if($category->category_id!=null && $category->category_id==$category->id)selected @endif>{{ $category->name }}</option>
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





@endsection