@extends('admin.master') 
@section('content')
<!-- Start content -->
<div class="content">
    <div class="container">
      <!-- Page-Title -->
      <div class="row">
        <div class="col-md-12">
            <div class="panel panel-border panel-dark">
                <div class="panel-heading">
                    <h3 class="panel-title">SubCategory Table</h3>
                    <a href="{{ route('subcategory.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category Name</th>
                                            <th>SubCategory Name</th>
                                            <th>SubCategory Slug</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $subcategorys as $subcategory )
                                        <tr>
                                            <td>{{ $subcategory->id }}</td>
                                            <td>{{ $subcategory->category->category_name }}</td>
                                            <td>{{ $subcategory->subcategory_name }}</td>
                                            <td>{{ $subcategory->subcategory_slug }}</td>
                                            <td>
                                                <a href="{{ route('subcategory.edit',$subcategory->id)}}" class="btn btn-primary">Edit<i class="fa fa-eyedropper"></i></a>
                                                <form action="{{ route('subcategory.destroy',$subcategory->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm btn-icon-text">Delete <i class="mdi mdi-delete btn-icon-prepend"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                            </div>
                            <div class="d-flex justify-content-center pull-right">
                                {{  $subcategorys->links()  }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
      </div>
    </div>
</div>
@endsection