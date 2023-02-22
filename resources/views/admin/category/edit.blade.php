@extends('admin.layout.layout')

@section('contents')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Products</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ Route('admin.homedb') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ Route('admin.product.index') }}">Products</a></li>
          <li class="breadcrumb-item active">Edit Product</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Products</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body p-0">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Product</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <form action="{{ Route('admin.product.update', $product->id) }}" method="post" class="card-body" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{ $product->id }}"/>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}">
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea rows="4" cols="50" type="text" id="description" name="description" class="form-control" >{{$product->description}}</textarea>
            </div>
            <div class="form-group">
              <label for="price">Price</label>
              <!-- @php
              $price=number_format($product->price) ;
              @endphp -->
              <input type="text" id="price" name="price" class="form-control" value="{{ $product->price}}">
            </div>
            <!-- <div class="form-group">
              <label for="stock">Stock</label>
              <input type="number" id="stock" name="stock" class="form-control" value="{{ $product->stock }}">
            </div> -->
            <div class="form-group">
              <label for="image">Image</label>
              <img src="{{asset('/images/'.$product->image)}}" width="150px" height="200px">
            <input type="file" id="image" name="photo" class="form-control-file" value="{{$product->image}}">
            </div>
            <input type="submit" value="Update" class="btn btn-success">
          </form>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
@endsection