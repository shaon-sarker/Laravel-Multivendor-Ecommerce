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
                    <h3 class="panel-title">Product Table</h3>
                    <a href="{{ route('product.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Image</th>
                                            <th>Product Name</th>
                                            <th>Selling Price</th>
                                            <th>QTY</th>
                                            <th>Discount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $products as $product )
                                        <tr>
                                            <td>{{ $product->id }}</td>
                                            <td> <img src="{{  asset('uploads/product/productimage') }}/{{ $product->product_image }}" alt="" style="width:70px; height:40px"> </td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->selling_price }}</td>
                                            <td>{{ $product->product_qty }}</td>
                                            <td>
                                                @if ($product->discount_price == NULL)
                                                    <span class="badge rounded-pill bg-info">No Discount</span>
                                                @else
                                                    @php
                                                        $amount = $product->selling_price - $product->discount_price;
                                                        $discount = ($amount/$product->selling_price) * 100;
                                                    @endphp
                                                    <span class="badge rounded-pill bg-danger">{{ round($discount) }} %</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($product->status == 1)
                                                    <span class="badge rounded-pill bg-success">Active</span>
                                                @else
                                                    <span class="badge rounded-pill bg-danger">InActive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('product.edit',$product->id) }}" class="btn btn-primary">Edit<i class="fa fa-eyedropper"></i></a>
                                                <a href="{{ route('product.delete',$product->id) }}" class="btn btn-danger">Delete <i class="mdi mdi-delete btn-icon-prepend"></i></a>

                                                @if ($product->status == 1)
                                                <a href="{{ route('product.inactive',$product->id) }}" class="btn btn-primary" title="Inactive"> <i class="fa fa-thumbs-down"></i> </a>
                                                @else
                                                <a href="{{ route('product.active',$product->id) }}" class="btn btn-primary" title="Active"> <i class="fa fa-thumbs-up"></i> </a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
                            </div>
                            {{-- <div class="d-flex justify-content-center pull-right">
                                {{  $products->links()  }}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>       
      </div>
    </div>
</div>
@endsection