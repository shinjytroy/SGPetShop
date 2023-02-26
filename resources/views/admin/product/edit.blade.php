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
              <label for="categorie_id">Category</label>
              <select name="categorie_id" id="categorie_id" class="form-control">

                @php
                $namecate =  DB::table('categories')->where('id',"=",$product->categorie_id)->value('categorie_name');

                @endphp
                <option value="{{ $product->categorie_id }}">{{$namecate}} - Select</option>
                
                @foreach ( $category as $item)
                <option value="{{ $item->id }}">{{ $item->categorie_name }}</option>

                <option value="{{ $product->categorie_id }}">{{ $product->categorie_id }}</option>
                @foreach ( $category as $item)
    >            <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->categorie_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="brand_id">Brand</label>
              <select name="brand_id" id="brand_id" class="form-control">
                <option value="{{ $product->brand_id }}">{{ $product->brand_id }}</option>
                @foreach ( $brand as $item)
                <option value="{{ $item->id }}">{{ $item->brand_name }}</option>
                @endforeach
              </select>
            </div>
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
              <input type="text" id="price" name="price" class="form-control" value="{{ $product->price }}">
            </div>
            <div class="form-group">
              <label for="sale_price">Sale Price</label>
              <input type="text" id="sale_price" name="sale_price" class="form-control" value="{{ $product->sale_price }}">
            </div>
            <div class="form-group">
              <label for="stock">Stock</label>
              <input type="number" id="stock" name="stock" class="form-control" value="{{ $product->stock }}">
            </div>
            <div class="form-group">
              <label for="status">Status</label>
              <select name="status" id="status" class="form-control">
                <option value="{{ $product->status }}">{{ $product->status }}</option>
                <option value="In Stock">In Stock</option>
                <option value="Out of Stock">Out of Stock</option>
              </select>
            </div>
            <div class="form-group">
              <label for="featured">Featured</label>
              <select name="featured" id="featured" class="form-control">
                <option value="{{ $product->featured }}">{{ $product->featured }}</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
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