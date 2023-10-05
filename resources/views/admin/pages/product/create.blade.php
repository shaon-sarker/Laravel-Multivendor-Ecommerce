@extends('admin.master') 
@section('content')
@push('admin.css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endpush
<!-- Start content -->
<div class="content">
    <div class="container">
      <!-- Page-Title -->
      <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
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
                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div>
                        <label for="">Category Name</label>
                        <select class="form-control" name="category_id">
                            <option>Choose anyone</option>
                            @foreach ($categorys as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div>
                        <label for="">Sub-Category Name</label>
                        <select class="form-control" name="subcategory_id">
                            <option>Choose anyone</option>
                            @foreach ($sub_categorys as $sub_category)
                            <option value="{{ $sub_category->id }}">{{ $sub_category->subcategory_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div>
                        <label for="">Product Name</label>
                        <input type="text" class="form-control" placeholder="Category Name" name="product_name">
                    </div>
                    <br>
                    <div>
                        <label for="">Product SKU</label>
                        <input type="text" class="form-control" placeholder="Category Name" name="product_sku">
                    </div>
                    <br>
                    <div>
                        <label for="">Product QTY</label>
                        <input type="number" class="form-control" placeholder="Category Name" name="product_qty">
                    </div>
                    <br>
                    <div>
                        <label for="">Product Image</label>
                        <input type="file" class="form-control dropify" name="product_image">
                    </div>
                    <br>
                    <div>
                        <label for="">Product Multiple Image</label>
                        <input type="file" class="form-control dropify2" name="photo_name[]" multiple="">
                    </div>
                    <br>
                    <div>
                        <label for="">Product Features</label>
                        <select class="form-control" name="product_features">
                            <option>Choose anyone</option>
                            <option value="features">Features</option>
                            <option value="popular">Popular</option>
                            <option value="new-added">New Added</option>
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
                        <label for="">Product Tags</label>
                        <input type="text" class="form-control" placeholder="Category Name" name="product_tags">
                    </div>
                    <br>
                    <div>
                        <label for="">Product Size</label>
                        <input type="text" class="form-control" placeholder="Category Name" name="product_size">
                    </div>
                    <br>
                    <div>
                        <label for="">Selling Price</label>
                        <input type="number" class="form-control" placeholder="Selling Price" name="selling_price">
                    </div>
                    <br>
                    <div>
                        <label for="">Buying Price</label>
                        <input type="number" class="form-control" placeholder="Buying Price" name="buying_price">
                    </div>
                    <br>
                    <div>
                        <label for="">Discount Price</label>
                        <input type="number" class="form-control" placeholder="Discount Price" name="discount_price">
                    </div>
                    <br>
                    <div>
                        <label for="">Short DESCP</label>
                        <textarea class="form-control" name="short_descp" id="" cols="30" rows="10"></textarea>
                    </div>
                    <br>
                    <div>
                        <label for="">Long DESCP</label>
                        <textarea class="form-control" name="long_descp" id="" cols="30" rows="10"></textarea>
                    </div>
                    <br>
                    <div>
                        <label for="">Product Item Tags</label>
                        <select class="form-control" name="product_item_tags">
                            <option>Choose anyone</option>
                            <option value="Hot">Hot</option>
                            <option value="New">New</option>
                            <option value="BestSell">Best Sell</option>
                            <option value="Sale">Sale</option>
                        </select>
                    </div>
                    <br>
                    <div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>       
      </div>
    </form>
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