@extends('admin.master') 
@section('content')
@push('admin.css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
<!-- Start content -->
<div class="content">
    <div class="container">
      <!-- Page-Title -->
      <div class="row">
        <div class="col-md-10">
            <div class="panel panel-border panel-dark">
                <div class="panel-heading">
                    <h3 class="panel-title">Category Information</h3>
               
                </div>
                <div class="panel-body">
                  <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="">Category Name</label>
                        <input type="text" class="form-control" placeholder="Category Name" name="category_name">
                    </div>
                    <br>
                    <div>
                        <label for="">Category Image</label>
                        <input type="file" class="form-control dropify" name="category_image">
                    </div>
                    <br>
                    <div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

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
        'default': 'Upload Category Image',
    }
});
</script>
@endpush