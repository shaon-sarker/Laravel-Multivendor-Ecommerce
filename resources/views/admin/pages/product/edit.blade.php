@extends('admin.master') 
@section('content')
@push('admin.css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endpush
<!-- Start content -->
<div class="content">
    <div class="container">
      <!-- Page-Title -->
      <form action="{{ route('product.update') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $products->id }}">

      <div class="row">
        <div class="col-md-6">
            <div class="panel panel-border panel-dark">
                <div class="panel-heading">
                    <h3 class="panel-title">Product Information</h3>
                </div>
                <div class="panel-body">
                    <div>
                        <label for="">Brand Name</label>
                        <select class="form-control" name="brand_id">
                            <option>Choose anyone</option>
                            @foreach ($brands as $brand)
                            <option {{ $products->brand_id === $brand->id ? 'Selected':'' }} value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div>
                        <label for="">Category Name</label>
                        <select class="form-control" name="category_id">
                            <option>Choose anyone</option>
                            @foreach ($categorys as $category)
                            <option {{ $products->category_id === $category->id ? 'Selected':'' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div>
                        <label for="">Sub-Category Name</label>
                        <select class="form-control" name="subcategory_id">
                            <option>Choose anyone</option>
                            @foreach ($sub_categorys as $sub_category)
                            <option {{ $products->subcategory_id === $sub_category->id ? 'Selected':'' }} value="{{ $sub_category->id }}">{{ $sub_category->subcategory_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div>
                        <label for="">Product Name</label>
                        <input type="text" class="form-control" value="{{ $products->product_name }}" name="product_name">
                    </div>
                    <br>
                    <div>
                        <label for="">Product SKU</label>
                        <input type="text" class="form-control" value="{{ $products->product_sku }}" name="product_sku">
                    </div>
                    <br>
                    <div>
                        <label for="">Product QTY</label>
                        <input type="number" class="form-control" value="{{ $products->product_qty }}" name="product_qty">
                    </div>
                    <br>
                    <div>
                        <label for="">Product Tags</label>
                        <input type="text" class="form-control" value="{{ $products->product_tags }}" name="product_tags">
                    </div>
                    <br>
                    <div>
                        <label for="">Product Size</label>
                        <input type="text" class="form-control" value="{{ $products->product_size }}" name="product_size">
                    </div>
                    <br>
                    <div>
                        <label for="">Product Features</label>
                        <select class="form-control" name="product_features">
                            <option>Choose anyone</option>
                            <option value="features" {{ ($products->product_features === 'features') ? 'Selected':'' }}>Features</option>
                            <option value="popular" {{ ($products->product_features === 'popular') ? 'Selected':'' }}>Popular</option>
                            <option value="new-added" {{ ($products->product_features === 'new-added') ? 'Selected':'' }}>New Added</option>
                        </select>
                    </div>
                    <br>
                    <div>
                        <label for="">Product Item Tags</label>
                        <select class="form-control" name="product_item_tags">
                            <option>Choose anyone</option>
                            <option value="Hot" {{ ($products->product_item_tags === 'Hot') ? 'Selected':'' }}>Hot</option>
                            <option value="New" {{ ($products->product_item_tags === 'New') ? 'Selected':'' }}>New</option>
                            <option value="BestSell" {{ ($products->product_item_tags === 'BestSell') ? 'Selected':'' }}>Best Sell</option>
                            <option value="Sale" {{ ($products->product_item_tags === 'Sale') ? 'Selected':'' }}>Sale</option>
                        </select>
                    </div>
                 
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-border panel-dark">
                <div class="panel-heading">
                    <h3 class="panel-title">Product Information</h3>
                </div>
                <div class="panel-body">
                    
                    <div>
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" value="{{ $products->selling_price }}" name="selling_price">
                    </div>
                    <br>
                    <div>
                        <label for="">Buying Price</label>
                        <input type="number" class="form-control" value="{{ $products->buying_price }}" name="buying_price">
                    </div>
                    <br>
                    <div>
                        <label for="">Discount Price</label>
                        <input type="number" class="form-control" value="{{ $products->discount_price }}" name="discount_price">
                    </div>
                    <br>
                    <div>
                        <label for="">Short DESCP</label>
                        <textarea class="form-control" name="short_descp" id="" cols="30" rows="10">{{ $products->short_descp }}</textarea>
                    </div>
                    <br>
                    <div>
                        <label for="">Long DESCP</label>
                        <textarea class="form-control" name="long_descp" id="" cols="30" rows="10">{{ $products->long_descp }}</textarea>
                    </div>
                    <br>
                    
                    <div>
                      <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
        </div>       
      </div>
    </form>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-border panel-dark">
                <div class="panel-heading">
                    <h3 class="panel-title">Product Image Information</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ route('product.update.image') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <input type="hidden" name="id" value="{{ $products->id }}">
                    <input type="text" name="old_img" value="{{ $products->product_image }}">

                    <div>
                        <label for="">Product Image</label>
                        <input type="file" class="form-control dropify" name="product_image" data-default-file="{{ asset('uploads/product/productimage') }}/{{ $products->product_image }}">
                    </div>
                    <br>
                    <div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
                 
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-border panel-dark">
                <div class="panel-heading">
                    <h3 class="panel-title">Product Multi Image Information</h3>
                </div>
                <div class="panel-body">
                    
                  
                    
                    <div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>       
      </div>
    </div>
</div>
@endsection
@push('admin.script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
$('.dropify').dropify({
    messages: {
        'default': 'Upload Product Image',
    }
});

$('.dropify2').dropify({
    messages: {
        'default': 'Upload Multi Product Image',
    }
});

</script>
@endpush