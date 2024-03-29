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
          <li class="breadcrumb-item active">Create new Product</li>
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
      <h3 class="card-title">Product</h3>

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
            <h3 class="card-title">Create new Product</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <form action="{{ Route('admin.product.store') }}" method="post" class="card-body" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="categorie_id">Category</label>
              <select name="categorie_id" id="categorie_id" class="form-control">
                <option value="">Select Category</option>
                @foreach ( $category as $item)
                <option value="{{ $item->id }}">{{ $item->categorie_name }}</option>
                @endforeach
              </select>
              <span style="color:red"> @error('categorie_id'){{$message}}@enderror</span>
            </div>
            <div class="form-group">
              <label for="brand_id">Brand</label>
              <select name="brand_id" id="brand_id" class="form-control">
                <option value="">Select Brand</option>
                @foreach ( $brand as $item)
                <option value="{{ $item->id }}">{{ $item->brand_name }}</option>
                @endforeach
              </select>
              <span style="color:red"> @error('brand_id'){{$message}}@enderror</span>
            </div>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" id="name" name="name" class="form-control" placeholder="Enter product name">
              <span style="color:red"> @error('name'){{$message}}@enderror</span>
            </div>
            <div class="form-group">
              <label for="desc">Description</label>
              <textarea id="desc" name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="price">Price</label>
              <input type="number" id="price" name="price" class="form-control" placeholder="Enter price">
              <span style="color:red"> @error('price'){{$message}}@enderror</span>
            </div>
            <div class="form-group">
              <label for="price">Sale Price</label>
              <input type="number" id="sale_price" name="sale_price" class="form-control" placeholder="Enter sale price">
              <span style="color:red"> @error('sale_price'){{$message}}@enderror</span>
            </div>
            <div class="form-group">
              <label for="stock">Stock</label>
              <input type="number" id="stock" name="stock" class="form-control" placeholder="Enter number of stock">
              <span style="color:red"> @error('stock'){{$message}}@enderror</span>
            </div>
            <div class="form-group">
              <label for="status">Status</label>
              <select name="status" id="status" class="form-control">
                <option value="">Select Status</option>
                <option value="In Stock">In Stock</option>
                <option value="Out of Stock">Out of Stock</option>
              </select>
            </div>
            <div class="form-group">
              <label for="featured">Featured</label>
              <select name="featured" id="featured" class="form-control">
                <option value="">Select Featured</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
            <div class="form-group">
              <label for="image">Image</label>
              <input type="file" id="image" name="photo" class="form-control">
            </div>
            <input type="submit" value="Create" class="btn btn-success">
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