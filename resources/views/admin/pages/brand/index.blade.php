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
                    <h3 class="panel-title">Brand Table</h3>
                    <a href="{{ route('brand.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Brand Name</th>
                                            <th>Brand Slue</th>
                                            <th>Brand Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $brands as $brand )
                                        <tr>
                                            <td>{{ $brand->id }}</td>
                                            {{-- <td>{{ $loop->index+1 }}</td> --}}
                                            <td>{{ $brand->brand_name }}</td>
                                            <td>{{ $brand->brand_slug }}</td>
                                            <td><img width="100px" src="{{ asset('uploads/brand') }}/{{ $brand->brand_image }}" alt=""></td>
                                            <td>
                                                {{-- <a href="{{ route('category.show',$category->id) }}" class="btn btn-primary"><i class="fa fa-bullseye">Show</i></a> --}}
                                                <a href="{{ route('brand.edit',$brand->id)}}" class="btn btn-primary">Edit<i class="fa fa-eyedropper"></i></a>
                                                <form action="{{ route('brand.destroy',$brand->id) }}" method="POST">
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
                                {{  $brands->links()  }}
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