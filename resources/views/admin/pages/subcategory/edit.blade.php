@extends('admin.master') 
@section('content')

<!-- Start content -->
<div class="content">
    <div class="container">
      <!-- Page-Title -->
      <div class="row">
        <div class="col-md-10">
            <div class="panel panel-border panel-dark">
                <div class="panel-heading">
                    <h3 class="panel-title">Sub-Category Information</h3>
                </div>
                <div class="panel-body">
                  <form action="{{ route('subcategory.update',$subcategoys_update->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                      <label for="">Category Name</label>
                      <select class="form-control" name="category_id">
                        <option>Choose anyone</option>
                        @foreach ($categorys as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        <option {{ $subcategoys_update->category_id === $category->id ? 'Selected':'' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <br>
                    <div>
                        <label for="">Sub Category Name</label>
                        <input type="text" class="form-control" value="{{ $subcategoys_update->subcategory_name }}" placeholder="SubCategory Name" name="subcategory_name">
                    </div>
                    <br>
                    <div>
                      <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>

                </div>
            </div>
        </div>       
      </div>
    </div>
</div>
@endsection
