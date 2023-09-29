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
                    <h3 class="panel-title">Category Table</h3>
                    <a href="{{ route('category.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
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
                                            <th>Category Slue</th>
                                            <th>Category Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $categorys as $category )
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            {{-- <td>{{ $loop->index+1 }}</td> --}}
                                            <td>{{ $category->category_name }}</td>
                                            <td>{{ $category->category_slug }}</td>
                                            <td><img width="100px" src="{{ asset('uploads/category') }}/{{ $category->category_image }}" alt=""></td>
                                            <td>
                                                {{-- <a href="{{ route('category.show',$category->id) }}" class="btn btn-primary"><i class="fa fa-bullseye">Show</i></a> --}}
                                                <a href="{{ route('category.edit',$category->id)}}" class="btn btn-primary">Edit<i class="fa fa-eyedropper"></i></a>
                                                <form action="{{ route('category.destroy',$category->id) }}" method="POST">
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
                                {{  $categorys->links()  }}
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